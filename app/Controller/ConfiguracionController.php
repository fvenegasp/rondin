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
       // $this->set('rondas', $this->Rondas->searchAll());   
       // $this->render('rondas');   
        $i = 0;
        foreach ($this->Rondas->searchAll() as $ronda) {
            $dias = str_replace(array('1', '2', '3', '4', '5', '6', '7'), array('L', 'M', 'X', 'J', 'V', 'S'), $ronda[0]['dias']);
            $dias = str_replace(",", " ", $dias);


            $horas =  $ronda[0]['horas'];
            $pcontrol = $ronda[0]['puntoscontrol'];

            $datos[$i] = array(
                'DT_RowId' => 'row_' . $i,
                'nombre' => $ronda['Rondas']['nombre'],
                'observaciones' => $ronda['Rondas']['observaciones'],
                'dias' => $dias,
                'horas' => $horas,
                'pcontrol' => $pcontrol,
                'acciones' =>"
                            <a id='agregar_usuario2' class='btn btn-warning' style='color:white;'  onclick='modalCrearRonda(".$ronda['Rondas']['idronda'].")'><i class='icon-edit icon-white'></i></a>
                            <a class='btn btn-danger' style='color:white;' href='#eliminar_ronda' data-toggle='modal' onclick='selectRonda(".$ronda['Rondas']['idronda'].")'><i class='icon-minus icon-white'></i></a>"
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
