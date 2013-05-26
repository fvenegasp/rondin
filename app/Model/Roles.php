<?php

class Roles extends AppModel {
    public $useTable = 'rol';
    
   function listRoles(){  
       $params = array(
            'conditions' => array('id_rol !='=>'1'),
            'fields' => array('id_rol','descripcion')
        );
        $resp = $this->find('all', $params);
        return $resp;
   }
   
}

?>
