<?php
/* /app/views/helpers/link.php */

class MenuHelper extends AppHelper {

var $helpers = array('Html');

  function main(){
  
  
  
    $output = '<ul id="mainmenu">';
    
    $output .= '<li>'.$this->Html->link('Home','/').'</li>';
    
    $output .= '<li>'.$this->Html->link('logout','/user/logout/').'</li>';
    
    $output .= '</ul>';
    
    return $this->output($output);
  }

}

?>