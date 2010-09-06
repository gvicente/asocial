<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<?php echo $this->Html->charset(); ?>
	<title>
		<?php echo $title_for_layout; ?>
	</title>
	<?php
		//echo $this->Html->meta('icon');

    echo $this->Html->css('dropdown.upward');    

		echo $this->Html->css('main');
    echo $this->Html->css('default.ultimate.upward');


		echo $scripts_for_layout;
		
		// nacitani potrebnych casti pre prihlasenych userov
		if(isset($_SESSION['User'])) {
		  echo $this->Html->css('chat');
		  echo $this->Javascript->link('jquery/jquery');
		  echo $this->Javascript->link('jquery_chat/chat');
		}
		
	?>
</head>
<body>
	<div id="container">
		<div id="header">

			
			<?php
			  			  
			  
			  // tmp
			  if(isset($_SESSION['User'])) {
			  
          if($_SESSION['User']['user_name'] == 'lola')
          {
          echo '<a href="javascript:void(0)" onclick="javascript:chatWith(\'quaplo\')">Chat With quaplo</a>';  
          } else {
          echo '<a href="javascript:void(0)" onclick="javascript:chatWith(\'lola\')">Chat With lola</a>';
          }
          
        }
			?>
			
		</div>
		<div id="content">

			<?php echo $this->Session->flash(); ?>

			<?php echo $content_for_layout; ?>


		</div>
		<div id="footer">
			<?php echo $this->Html->link(
					$this->Html->image('cake.power.gif', array('alt'=> __('CakePHP: the rapid development php framework', true), 'border' => '0')),
					'http://www.cakephp.org/',
					array('target' => '_blank', 'escape' => false)
				);
			?>
			
				
			
		</div>
	</div>
	<?php echo $this->element('sql_dump'); ?>
</body>
</html>