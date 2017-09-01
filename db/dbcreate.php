<?php 

$host = 'localhost';
$user = '';
$password = '';
$mysqli = new mysqli($host, $user, $password);

if ($mysqli->connect_errno) {
    printf("Connection failed: %s\n", $mysqli->connect_error);
    die();
}

if ( !$mysqli->query('CREATE DATABASE blog') ) {
    printf("Errormessage: %s\n", $mysqli->error);
}

$mysqli->query('
CREATE TABLE `blog`.`users`
(
    `id` INT NOT NULL AUTO_INCREMENT,
    `username` VARCHAR(50) NOT NULL,
    `email` VARCHAR(100) NOT NULL,
    `password` VARCHAR(100) NOT NULL,
    `hash` VARCHAR(32) NOT NULL,
    `active` BOOLEAN NOT NULL DEFAULT 0,
PRIMARY KEY (`id`) 
);') or die($mysqli->error);

?>