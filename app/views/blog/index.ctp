

<?php
  foreach($blogs AS $bloglist)
  {
    echo '
    '.$bloglist['User']['user_avatar'].'
    <div class="bloglist left">
    <h2>'.$this->Html->link($bloglist['Blog']['title'],'/blog/view/'.$bloglist['Blog']['id']).'</h2>
    '.$bloglist['Blog']['body'].'
    </div>';
  }
?>

