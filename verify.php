<?php 

require 'db/dbconnection.php';
session_start();

if (isset($_GET['email']) && !empty($_GET['email']) AND isset($_GET['hash']) && !empty($_GET['hash'])) {
    $email = $mysqli->escape_string($_GET['email']);
    $hash = $mysqli->escape_string($_GET['hash']);

    $result = $mysqli->query("SELECT * FROM users WHERE email='$email' AND hash='$hash' AND active='0'");

    if ($result->num_rows == 0) {
        $_SESSION['error'] = "Account has already been activated or the URL is invalid!";

        header("location: profile.php");
        exit();
    } else {
        unset($_SESSION['not_active']);
        $_SESSION['activated'] = "Your account has been activated!";

        $mysqli->query("UPDATE users SET active='1' WHERE email='$email'")
        or die($mysqli->error);

        $_SESSION['active'] = 1;

        header("location: profile.php");
        exit();
    }
} else {
    $_SESSION['error'] = "Invalid parameters provided for account verification!";
    header("location: profile.php");
    exit();
}

?>