<?php

class Users extends AppModel {
   public $useTable = 'usuario';
  
   function searchLogin($conditions){
       $params = array(
            'conditions' => $conditions,
            'fields' => array('nombre', 'ap_paterno', 'ap_materno')
        );
        $resp = $this->find('all', $params);
        return $resp;
   }
   
   function searchAll(){
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
            'order' => array('Users.rut ASC')
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
