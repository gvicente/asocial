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
    
    
    var $hasAndBelongsToMany = array('Tag' => 
                               array('className'    => 'Tag', 
                                     'joinTable'    => 'posts_tags', 
                                     'foreignKey'   => 'post_id', 
                                     'associationForeignKey'=> 'tag_id', 
                                     'conditions'   => '', 
                                     'order'        => '', 
                                     'limit'        => '', 
                                     'unique'       => true, 
                                     'finderQuery'  => '', 
                                     'deleteQuery'  => '', 
                               ) 
                               );        
}

?>