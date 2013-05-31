<?php

class Rondas extends AppModel {
   public $useTable = 'ronda';
  
   function searchLogin($conditions){
       $params = array(
            'conditions' => $conditions,
            'fields' => array('nombre', 'observaciones')
        );
        $resp = $this->find('all', $params);
        return $resp;
   }
   
   function searchAll(){
    /*
    SELECT  ronda.nombre, 
    GROUP_CONCAT(diaronda.dia) AS dias, 
    GROUP_CONCAT(horarioronda.hora) AS horarios, 
    GROUP_CONCAT(puntocontrol.nombre) AS puntoscontrol, 
    ronda.observaciones  
    FROM ronda 
      LEFT JOIN diaronda ON ronda.idronda = diaronda.ronda_idronda 
      LEFT JOIN horarioronda ON ronda.idronda = horarioronda.ronda_idronda
      LEFT JOIN ronda_puntocontrol ON ronda.idronda = ronda_puntocontrol.ronda_idronda
      LEFT JOIN puntocontrol ON ronda_puntocontrol.puntocontrol_idtag = puntocontrol.idtag
    GROUP BY ronda.idronda;
    
    $params = array(
            'conditions' => array('Users.rut !='=>1),
            'fields' => array('Users.rut', 'Users.dv', 'Users.nombre', 'Users.ap_paterno', 'Users.ap_materno', 'r.descripcion'),
            'joins' => array(
                array(
                    'table' => 'usuariorol',
                    'alias' => 'ur',
                    'type'  => 'left',
                    'conditions' => array('ur.rut = Users.rut')
                ),
                array(
                    'table' => 'rol',
                    'alias' => 'r',
                    'type'  => 'left',
                    'conditions' => array('ur.id_rol = r.id_rol')
                )
            ),
            'group' => 
            'order' => array('Users.rut ASC')
        );


GROUP_CONCAT(diaronda.dia) AS dias, 
    GROUP_CONCAT(horarioronda.hora) AS horarios, 
    GROUP_CONCAT(puntocontrol.nombre) AS puntoscontrol, 
    */

       $params = array(
            'fields' => array('Rondas.nombre', 'Rondas.observaciones', 'GROUP_CONCAT(DISTINCT(dr.dia) ORDER BY dr.dia) AS dias', 'GROUP_CONCAT(DISTINCT(hr.hora)) AS horas', 'GROUP_CONCAT(DISTINCT(pc.nombre)) AS puntoscontrol'),
            'joins' => array(
                array(
                    'table' => 'diaronda',
                    'alias' => 'dr',
                    'type'  => 'left',
                    'conditions' => array('dr.ronda_idronda = Rondas.idronda')
                ),
                array(
                    'table' => 'horarioronda',
                    'alias' => 'hr',
                    'type'  => 'left',
                    'conditions' => array('hr.ronda_idronda = Rondas.idronda')
                ),
                array(
                    'table' => 'ronda_puntocontrol',
                    'alias' => 'rpc',
                    'type'  => 'left',
                    'conditions' => array('rpc.ronda_idronda = Rondas.idronda')
                ),
                array(
                    'table' => 'puntocontrol',
                    'alias' => 'pc',
                    'type'  => 'left',
                    'conditions' => array('pc.idtag = rpc.puntocontrol_idtag')
                )
            ),
            'group' => 'Rondas.idronda'        
        );
        $resp = $this->find('all', $params);
        return $resp;
   }
   
   function searchData($conditions){
       $params = array(
            'conditions' => $conditions,
            'fields' => array('Users.nombre', 'Users.ap_paterno', 'Users.ap_materno', 'ur.id_rol'),
            'joins' => array(
                array(
                    'table' => 'usuariorol',
                    'alias' => 'ur',
                    'type'  => 'left',
                    'conditions' => array('ur.rut = Users.rut')
                )
            ),
           'order' => array('Users.rut ASC')
        );
        $resp = $this->find('all', $params);
        return $resp;
   }
   
   function modificarUsuario($fields, $condition){
      $ret = ($this->updateAll($fields,$condition))? true : false;
      
      return $ret;
   }
   
   function agregarUsuario($datos){
      $ret = ($this->save($datos))? true : false;
      
      return $ret;
   }
   
   function eliminarUsuario($conditions){
      $ret = ($this->deleteAll($conditions, false))? true : false;
      return $ret; 
   }
   
}?>
