<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Administracion
 *
 * @author Nelson Gomez
 */
class AdministracionController  extends AppController {
   
    var $helpers = array('Html', 'Js', 'JqueryEngine', 'Form');
    var $components = array('RequestHandler');
    var $uses = array('Users', 'Roles');
     
    function index(){
        $this->chekSession();
        $this->layout = 'home';
    }
    
    function mostrarUsuarios(){
        $this->layout = 'ajax';
        $this->set('usuarios', $this->Users->searchAll());
        $this->render('usuarios');
    }
    
    function progreso(){
        $this->layout = 'ajax';
        $this->render('progreso');
    }
    
    function agregarUsuario(){
        $this->layout = 'ajax';
        $this->set('roles',  $this->Roles->listRoles());
        $this->render('agregar');
    }
    
    function checkUsuario(){
        $rutx = strtoupper(ereg_replace('\.|,','', strtoupper($this->data['rut'])));
        $rutx = explode('-', $rutx);
        $rut = $rutx[0];
        $dv = $rutx[1];
        
        $conditions = array('Users.rut' => $rut, 'Users.dv' => $dv);
        $resp = $this->Users->searchData($conditions);
           if ($resp) {
                foreach ($resp as $value) {
                   $data['nombre'] = $value['Users']['nombre'];
                   $data['ap_paterno'] = $value['Users']['ap_paterno'];
                   $data['ap_materno'] = $value['Users']['ap_materno'];
                   $data['id_rol'] = $value['ur']['id_rol'];
                }
                               
                $data['msg'] = 'datos validos';
                $data['estado'] = true;
            } else {
                $data['msg'] = 'datos no validos';
                $data['estado'] = false;
            }
       
        $this->fn_json_encode($this, $data);
    }
}

?>
