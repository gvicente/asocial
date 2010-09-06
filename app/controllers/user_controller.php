<?php

class UserController extends AppController {



	var $name = 'User';

	

	

	function login()

	{ 

      if(!empty($this->data))

      {

        $user = $this->User->FindByUserName(mysql_real_escape_string($this->data['User']['user_name']));

        if($user['User']['password'] == md5($this->data['User']['password']))

        {

          $this->Session->write('User', $user['User']);          

          $this->redirect('/');

        } else {

          $this->Session->setFlash('<h1 class="error_messange">Neplatne heslo nebo jmeno</h1>');
          $this->redirect('/user/login/');
        }

        

      } 

    

  }

  

  function logout(){

    $this->Session->delete('User');
    $this->Session->delete('openChatBoxes');
    $this->Session->delete('chatHistory');
    $this->Session->delete('tsChatBoxes');

    $this->redirect('/');

  }   

	

}

?>