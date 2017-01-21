<?php
require_once('conn.php');
$idp= $_REQUEST['id'];
$db->exec("delete from `users` where id=$idp");
$db->close();
header("location:home.php?action");
?>