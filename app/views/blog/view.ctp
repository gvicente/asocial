<pre>
<?php
  //print_r($blog);
?>
</pre>

<?php echo '<h2 id="'.$blog['Blog']['id'].'">'.$blog['Blog']['title'].'</h2>' ; ?>
<div id="blog_eneries">
<?php echo $blog['Blog']['body']; ?>
</div>