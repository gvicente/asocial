<?php

class Blog extends AppModel {
    var $name = 'Blog';
    
    
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