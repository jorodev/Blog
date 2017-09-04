<?php 

require 'db/dbconnection.php';
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if ($_POST['newpassword'] == $_POST['confirmpassword']) { 
        $new_password = password_hash($_POST['newpassword'], PASSWORD_BCRYPT);
        
        $email = $mysqli->escape_string($_POST['email']);
        $hash = $mysqli->escape_string($_POST['hash']);
        
        $sql = "UPDATE users SET password='$new_password' WHERE email='$email' AND hash='$hash'";

        if ($mysqli->query($sql)) {
            $_SESSION['success'] = "Your password has been changed successfully! Log in with your new password!";
            header('location: login.php');
            exit();
        }
    } else {
        $_SESSION['error'] = "Two passwords you entered don't match, try again!";
        header('Location: ' . $_SERVER['HTTP_REFERER']);
        exit();
    }

}

?>

<div class="alerts">
    <?php if (isset($_SESSION['success'])) { ?>
    <div class="alert success">
        <span class="closebtn">&times;</span>  
        <strong></strong> <?php echo $_SESSION['success']; unset($_SESSION['success']); ?>
    </div>
    <?php } ?>
    <?php if (isset($_SESSION['error'])) { ?>
    <div class="alert">
        <span class="closebtn">&times;</span>  
        <strong></strong> <?php echo $_SESSION['error']; unset($_SESSION['error']); ?>
    </div>
    <?php } ?>
</div>