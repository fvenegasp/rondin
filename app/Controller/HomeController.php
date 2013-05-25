<?php

class HomeController extends AppController {

    var $helpers = array('Html', 'Js', 'JqueryEngine', 'Form');
    var $components = array('RequestHandler');
    var $uses = array('Users', 'Recursos');
    
    function index() {
       $this->chekSession();
       $this->redirect('/home/login'); 
    }

    function login() {
        $this->layout = 'login';
    }
    
    function home() {
        $this->chekSession();
        $this->layout = 'home';
    }
    
    function logout() {
        $this->Session->delete('Users');
        $this->Session->destroy();
        $data['msg'] = 'OK';
        $this->fn_json_encode($this, $data);
    }

    

    function checkUsuario() {
        
        $rutx = strtoupper(ereg_replace('\.|,','', strtoupper($this->data['rut'])));
        $rutx = explode('-', $rutx);
        $password = md5($this->data['password']);


        if (count($rutx) > 1) {
            $rut = $rutx[0];
            $dv = $rutx[1];

            $conditions = array('rut' => $rut, 'dv' => $dv, 'contrasena' => $password);
            $resp = $this->Users->searchLogin($conditions);
            if ($resp) {
                $this->Session->write('Users.acceso', true);
                
                foreach ($resp as $value) {
                   $this->Session->write('Users.nombre', $value['Users']['nombre']);
                   $this->Session->write('Users.ap_paterno', $value['Users']['ap_paterno']);
                   $this->Session->write('Users.ap_materno', $value['Users']['ap_materno']);
                }
                $this->Session->write('Users.rut', $rut.'-'.$dv);
                
                $this->Session->write('Users.menu', $this->Recursos->getMenu());
                
                $data['msg'] = 'datos validos';
                $data['estado'] = true;
            } else {
                $data['msg'] = 'datos no validos';
                $data['estado'] = false;
            }
        } else {
            $data['estado'] = false;
            $data['msg'] = 'datos no validos...';
        }

        $this->fn_json_encode($this, $data);
    }

}//End class
?>