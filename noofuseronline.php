<?php
include_once('users-online/online.php');
list($online, $record) = users_online();
?>
<p>There are currently <?=$online?> users online. The most ever online is <?=$record?></p>
