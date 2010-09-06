<h2>Last public blog</h2>
<pre>
<?php
     //print_r($blogs);     
?>
</pre>

<ul>
<?php
     
     foreach($blogs AS $BLOG)
     {
      echo '<li>
      <h3>'.$html->link($BLOG['Blog']['title'],'/blog/view/'.$BLOG['Blog']['id']).'
      </h3>
      <p>
      '.$BLOG['Blog']['body'].'
      </p>
      <span class="info">by : '.$html->link($BLOG['User']['user_name'],'/user/profile/'.$BLOG['User']['id']).'<span></li>';
     }
     
?>
</ul>


<h2>Last public discusions</h2>

<pre>
<?php
     //print_r($discu);     
?>
</pre>

<ul>
<?php
     
     foreach($discu AS $DISCUSION)
     {
      echo '<li>
      <h3>'.$html->link($DISCUSION['Discusion']['title'],'/discusions/view/'.$DISCUSION['Discusion']['id']).'
      </h3>
      <p>
      '.$DISCUSION['Discusion']['body'].'
      </p>
      <span class="info">by : '.$html->link($DISCUSION['User']['user_name'],'/user/profile/'.$BLOG['User']['id']).'<span></li>';
     }
     
?>
</ul>