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
    echo $this->Html->css('default.ultimate');


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
		
		
		
<div id="usermenu">
  <div id="usermenu-inner">

<ul id="nav" class="dropdown dropdown-upward">
	<li><a href="./">Home</a></li>
	<li><span class="dir">Blog</span>
		<ul>
			<li><a href="./">create</a></li>
			<li><a href="./">new blogs</a></li>
			<li><a href="./">Clients</a></li>
			<li><a href="./">Testimonials</a></li>
			<li><a href="./">Press</a></li>
			<li><a href="./">FAQs</a></li>
		</ul>
	</li>
	<li><span class="dir">Services</span>
		<ul>
			<li><a href="./">Product Development</a></li>
			<li><a href="./">Delivery</a></li>
			<li><a href="./">Shop Online</a></li>
			<li><a href="./">Support</a></li>
			<li><a href="./">Training &amp; Consulting</a></li>
		</ul>
	</li>
	<li><span class="dir">Products</span>
		<ul>
			<li><a href="./" class="dir">New</a>
				<ul>
					<li><a href="./">Corporate Use</a></li>
					<li><a href="./">Private Use</a></li>
				</ul>
			</li>
			<li><a href="./" class="dir">Used</a>
				<ul>
					<li><a href="./">Corporate Use</a></li>
					<li><a href="./">Private Use</a></li>
				</ul>
			</li>
			<li><a href="./">Featured</a></li>
			<li><a href="./">Top Rated</a></li>
			<li><a href="./">Prices</a></li>
		</ul>
	</li>
	<li><a href="./">Gallery</a></li>
	<li><a href="./">Events</a></li>
	<li><a href="./">Careers</a></li>
	<li><a href="./" class="dir">Account</a>
		<ul>
			<li><a href="./">Logout</a></li>
			<li><a href="./">Setting</a></li>
		</ul>
	</li>
</ul>
  </div>
</div>


	</div>
	<?php echo $this->element('sql_dump'); ?>
</body>
</html>