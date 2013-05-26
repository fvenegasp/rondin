<?php

class RolUsuario extends AppModel {
     public $useTable = 'usuariorol';
     
     function modificarRolUsuario($fields,$conditions){
     
      $ret = false;
      $resp = $this->find('count',array('conditions' => $conditions));
      if($resp>0){
         $ret = ($this->updateAll($fields,$conditions))? true : false;
      }else{
         foreach ($fields as $key => $value){$data[$key] = $value;}
         foreach ($conditions as $key => $value){$data[$key] = $value;}
        
         $ret = ($this->save($data))? true : false;
      }
      
      return $ret;
   }
     
}

?>
