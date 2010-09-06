<?php
class BlogController extends AppController {

	var $name = 'Blog';

  function index()
  {   
    	$Bfcon = array(
      	'conditions' => array('Blog.permissions' => 2), 
      	//'recursive' => 1, //int
      	'fields' => array('Blog.title', 'Blog.body', 'Blog.id','User.id','User.user_name','User.user_avatar'), 
      	'order' => array('Blog.created DESC'), //string or array defining order
      	//'joins' => array(), // array of arrays defining join operations
      	//'group' => array('Model.field'), //fields to GROUP BY
      	'limit' => 20, //int
      	//'page' => n, //int
      	//'offset'=> n, //int
      	//'callbacks' => true //other possible values are false, 'before', 'after'
      );

	  $blogs = $this->Blog->find('all',$Bfcon);
	  
	  $this->set('title_for_layout','Blogy');
	  
    $this->set('blogs',$blogs);  
  }
	
	function view($id = null)
	{
   
   if($this->testRequest('number',$id)){
   
    	$Bfcon = array(
      	'conditions' => array('Blog.id' => $id), 
      	//'recursive' => 1, //int
      	'fields' => array('Blog.title', 'Blog.body', 'Blog.id','User.id','User.user_name'), 
      	'order' => array('Blog.created DESC'), //string or array defining order
      	//'joins' => array(), // array of arrays defining join operations
      	//'group' => array('Model.field'), //fields to GROUP BY
      	'limit' => 1, //int
      	//'page' => n, //int
      	//'offset'=> n, //int
      	//'callbacks' => true //other possible values are false, 'before', 'after'
      );

	  $blog = $this->Blog->find('first',$Bfcon);
	  
	  $this->set('title_for_layout',$blog['Blog']['title']);
	  
    $this->set('blog',$blog);
    //$this->layout = 'html/homepage';      
      
   } else {
          $this->Session->setFlash('<h1 class="error_messange">'.$this->ERROR_MESSANGE['HACK_ACTION'].'</h1>');
          $this->redirect('/');
   }
  }
  
  
}
?>
