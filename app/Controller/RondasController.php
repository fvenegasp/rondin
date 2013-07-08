<?php

class RondasController extends AppController {

    var $helpers = array('Html', 'Js', 'JqueryEngine', 'Form');
    var $components = array('RequestHandler');
    var $uses = array('Users', 'Roles', 'RolUsuario');

    function index() {
        $this->layout = 'home';
    }
    
    function usuarios(){
        $this->layout = 'ajax';
        $this->set('roles',  $this->Roles->listRoles());
        $this->render('usuarios');
    }

    function mostrarUsuarios() {
        //$this->layout = 'ajax';
        $i = 0;
        foreach ($this->Users->searchAll() as $usu) {
            $rut = $usu['Users']['rut'] . "-" . $usu['Users']['dv'];
            $datos[$i] = array('DT_RowId' => 'row_' . $i,
                'rut' => $rut,
                'nombre' => $usu['Users']['nombre'],
                'ap_paterno' => $usu['Users']['ap_paterno'],
                'ap_materno' => $usu['Users']['ap_materno'],
                'rol' => $usu['r']['descripcion'],
                'acciones' =>"
                            <a id='agregar_usuario2' class='btn btn-warning' style='color:white;'  onclick='modalAgregarUsuario(\"".$rut."\")'><i class='icon-edit icon-white'></i></a>
                            <a class='btn btn-danger' style='color:white;' href='#eliminar_usuario' data-toggle='modal' onclick='selectRut(\"".$rut."\")'><i class='icon-minus icon-white'></i></a>"
            );

            $i++;
        }

        $data['id'] = -1;
        $data['error'] = "";
        $data['fieldErrors'] = array();
        $data['data'] = array();

        $data['aaData'] = $datos;

        $this->fn_json_encode($this, $data);
    }

    function editarUsuarios() {

        if ($this->data['action'] == 'create') {
            $rutx = strtoupper(ereg_replace('\.|,', '', strtoupper($this->data['rut'])));
            $rutx = explode('-', $rutx);
            $rut = $rutx[0];
            $dv = $rutx[1];
            $nombre = $this->data['nombre'];
            $ap_paterno = $this->data['ap_paterno'];
            $ap_materno = $this->data['ap_materno'];
            $rol = $this->data['rol'];
            $password = md5($this->data['password']);

            $datos = array('rut' => $rut, 'dv' => $dv,
                'nombre' => $nombre,
                'ap_paterno' => $ap_paterno,
                'ap_materno' => $ap_materno,
                'contrasena' => $password
            );

            if ($this->Users->agregarUsuario($datos)) {
                $fields = array('id_rol' => $rol);
                $conditions = array('rut' => $rut);
                $data['estado'] = $this->RolUsuario->modificarRolUsuario($fields, $conditions);

                $datos[0] = array('DT_RowId' => 'row_1',
                    'item' => '',
                    'done' => "To do",
                    'priority' => 1
                );

                $data['id'] = "row_1";
                $data['error'] = "";
                $data['fieldErrors'] = array();
                $data['data'] = array();

                $data['aaData'] = $datos;
            }else{
               
                $data['id'] = -1;
                $data['error'] = "ERROR AL AGREGAR...";
                $data['fieldErrors'] = array();
                $data['data'] = array();

                $data['aaData'] = array();
            }
        }
        
         if ($this->data['action'] == 'remove') {
             
         }

        $this->fn_json_encode($this, $data);
    }

}

?>
