<form method="POST" action="<?php echo $html->url('/user/login/'); ?>">
<input type="text" name="data[User][user_name]" />
<input type="password" name="data[User][password]" />

<input type="submit" value="login" />

</form>