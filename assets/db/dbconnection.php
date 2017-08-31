<?php 

$host = 'localhost';
$user = 'root';
$pass = '';
$db = 'blog';

$mysqli = new mysqli($host, $user, $pass, $db)
or die($mysqli->error);

?>