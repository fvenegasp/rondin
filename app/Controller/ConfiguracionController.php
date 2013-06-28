<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Administracion
 *
 * @author Felipe Venegas
 */


class ConfiguracionController extends AppController {

    var $helpers = array('Html', 'Js', 'JqueryEngine', 'Form');
    var $components = array('RequestHandler');    
    var $uses = array('Rondas');

    function index() {
        $this->layout = 'home';
    }

    function mostrarRondas() {
        $this->set('rondas', $this->Rondas->searchAll());
        $this->render('rondas');   
        $i = 0;
        foreach ($this->Rondas->searchAll() as $ronda) {
            $datos[$i] = array(
                'DT_RowId' => 'row_' . $i,
                'nombre' => $ronda['Rondas']['nombre'],
                'observaciones' => $ronda['Rondas']['observaciones'],
                'acciones' => " <button class='btn btn-warning' type='button'><i class='icon-edit icon-white'></button>
                                
                                <a class='btn btn-danger' href='#eliminar_usuario' data-toggle='modal' onclick='selectRut()'><i class='icon-minus icon-white'></i></a>"
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

    function editarRondas(){
        if ($this->data['action'] == 'create') {
            $nombre         = $this->data['nombre'];
            $observaciones  = $this->data['observaciones'];

            $datos = array(
                'nombre'        => $nombre,
                'observaciones' => $observaciones
            );

            if ($this->Rondas->agregarRonda($datos)) {
                
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
