<?php

class Discusion extends AppModel {
    var $name = 'Discusion';
    
    
    var $belongsTo = array(
          'User' => array('className' => 'User',
          'foreignKey' => 'user_id',
          'conditions' => '',
          'fields' => 'user_name,id',
          'order' => '',
          'counterCache' => ''
        )
        
    );    
}

?>