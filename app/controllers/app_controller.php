<?php

/**

 * @author Gregor Demo (demo.gregor@gmail.com)

 *

 */



class AppController extends Controller {

    

    // loading components

    var $helpers = array('Html','Menu','Javascript','Session');
    
    var $ERROR_MESSANGE = array(
    'HACK_ACTION' => 'to neskušaj bo taky ban ti dam že sa dosereš!',
    );
        



    

    function __construct() {

    

      //$this->privateArea();
      if(empty($_SESSION['User']))
      {
        $this->layout = 'default';
      } else {
        $this->layout = 'users';
      }
      
      parent::__construct();    

    }

    

    function privateArea(){

      if(empty($_SESSION['User']))

      {

        //$this->layout = 'pure';

      //parent::redirect('/user/login/');

      }    

    }

    /*
    * testovanie premennej
    * $type = 
    * number => numueric if data is numeric return true else return false        
    */
            
    function testRequest($type = null,$data = null)
    {
      switch($type)
      {
        case 'number' : 
          if(is_numeric($data))
          {
            return true;
          } else {
            return false;
          }
        break;
      
      }
    }

    

}



?>