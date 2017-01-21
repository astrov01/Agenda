<?php
require_once('conn.php');
$name= $_POST['name'];
$pd= $_POST['phone'];
$db->exec("INSERT INTO `users` (name, phone) VALUES ('$name', '$pd')");
header("location:home.php?action");
$db->close();
?>