<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<?php echo $this->Html->charset(); ?>
	<title>
		<?php echo $title_for_layout; ?>
	</title>
	<?php
	//	echo $this->Html->meta('icon');

		echo $this->Html->css('cake.generic');

		echo $scripts_for_layout;
				
	?>
</head>
<body>
	<div id="container">
		<div id="header">
			<h1 id="logo"><a href="<?php echo $this->Html->url('/'); ?>"><span>neurocity.cz</span></a></h1>
			
			<ul id="mainmenu">
			    <li><?php echo $this->Html->link('Home', '/'); ?></li>
			    <li><?php echo $this->Html->link('Blogs', '/blog/'); ?></li>
			    <li><?php echo $this->Html->link('Discusions', '/'); ?></li>
			    <li><?php echo $this->Html->link('Gallery', '/'); ?></li>
          <li><?php echo $this->Html->link('login','/user/login/'); ?></li>			     
			    
			</ul>
						
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