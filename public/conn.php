<?php
$db = new SQLite3('db/mydb.sqlite');	

//Create Table
$do=$db->exec('create table if not exists `users` (`id` INTEGER PRIMARY KEY, `name` VARCHAR(128), `phone` VARCHAR (128))');
unset($do);	
?>
