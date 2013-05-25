<?php

class Recursos extends AppModel {
    public $useTable = 'recurso';
    
   function getMenu(){  
       $params = array(
            'conditions' => array('atr_tipo_recurso'=>'1')
        );
        $resp = $this->find('all', $params);
        return $resp;
   }
   
}

?>
