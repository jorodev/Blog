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

$mysqli->query('
CREATE TABLE `blog`.`articles`
(
    `id` INT NOT NULL AUTO_INCREMENT,
    `title` VARCHAR(200) NOT NULL,
    `image` VARCHAR(150) NOT NULL DEFAULT 'assets/images/default.png',
    `created` DATETIME NOT NULL,
    `author_id` INT NOT NULL,
    `content` VARCHAR(2000) NOT NULL,
    PRIMARY KEY (`id`),
    FOREIGN KEY (author_id) REFERENCES users(id)
);') or die($mysqli->error);

?>