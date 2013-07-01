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
       $params = array(
            'fields' => array('Rondas.idronda', 'Rondas.nombre', 'Rondas.observaciones', 'GROUP_CONCAT(DISTINCT(dr.dia) ORDER BY dr.dia) AS dias', 'GROUP_CONCAT(DISTINCT(hr.hora)) AS horas', 'GROUP_CONCAT(DISTINCT(pc.nombre)) AS puntoscontrol'),
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

   function agregarRonda($datos){
      $ret = ($this->save($datos))? true : false;
      
      return $ret;
   }
   
}?>
