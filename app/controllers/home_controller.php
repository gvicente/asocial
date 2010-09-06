<?php

class HomeController extends AppController {

	var $name = 'Home';

	var $helpers = array('Menu');

	var $uses = array('Discusion','Blog','Action');

	function index(){

  

    if(empty($_SESSION['User']))

    {

    $this->layout = 'default';
    //$this->redirect('/user/login/');

    } else {
    $this->layout = 'users';
    }	 

	$Bfcon = array(
  	'conditions' => array('Blog.permissions' => 2), 
  	//'recursive' => 1, //int
  	'fields' => array('Blog.title', 'Blog.body', 'Blog.id','User.id','User.user_name'), 
  	'order' => array('Blog.created DESC'), //string or array defining order
  	//'joins' => array(), // array of arrays defining join operations
  	//'group' => array('Model.field'), //fields to GROUP BY
  	'limit' => 4, //int
  	//'page' => n, //int
  	//'offset'=> n, //int
  	//'callbacks' => true //other possible values are false, 'before', 'after'
  );
	
	  $blogs = $this->Blog->find('all',$Bfcon);
    $this->set('blogs',$blogs);
    //$this->layout = 'html/homepage';

	$Dfcon = array(
  	'conditions' => array('Discusion.permissions' => 2), 
  	//'recursive' => 1, //int
  	'fields' => array('Discusion.title', 'Discusion.body', 'Discusion.id','User.id','User.user_name'), 
  	'order' => array('Discusion.created DESC'), //string or array defining order
  	//'joins' => array(), // array of arrays defining join operations
  	//'group' => array('Model.field'), //fields to GROUP BY
  	'limit' => 4, //int
  	//'page' => n, //int
  	//'offset'=> n, //int
  	//'callbacks' => true //other possible values are false, 'before', 'after'
  );

	  $discu = $this->Discusion->find('all',$Dfcon);
    $this->set('discu',$discu);
    
    $this->set('title_for_layout','jeioo');
    
  }
  
  

}



?>