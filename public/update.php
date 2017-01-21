<?php
require_once('conn.php');
$idp= $_REQUEST['id'];
$name= $_POST['name'];
$phone= $_POST['phone'];
$db->exec("UPDATE `users` SET name='$name',phone='$phone' where id=$idp");
$db->close();
header("location:home.php?action");
?>