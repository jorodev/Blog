<?php include 'includes/nav.inc.php' ?>

<?php 

if(isset($_GET['email']) && !empty($_GET['email']) AND isset($_GET['hash']) && !empty($_GET['hash'])) {
    $email = $mysqli->escape_string($_GET['email']); 
    $hash = $mysqli->escape_string($_GET['hash']); 

    $result = $mysqli->query("SELECT * FROM users WHERE email='$email' AND hash='$hash'");

    if ($result->num_rows == 0) { 
        $_SESSION['error'] = "You have entered invalid URL for password reset!";
        header('Location: ' . $_SERVER['HTTP_REFERER']);
        exit();
    }
} else {
    $_SESSION['error'] = "Sorry, verification failed, try again!";
    header('Location: ' . $_SERVER['HTTP_REFERER']);
    exit();
}

?>

<div class="alerts">
    <?php if (isset($_SESSION['error'])) { ?>
    <div class="alert">
        <span class="closebtn">&times;</span>  
        <strong></strong> <?php echo $_SESSION['error']; unset($_SESSION['error']); ?>
    </div>
    <?php } ?>
</div>
<div class="reset-wrapper">
    <main class="reset-main container">
        <div class="reset-main--box">
            <h3 class="reset-heading">Reset Password</h3>
            <form class="reset-form" action="reset_password.php" method="POST">
                <input type="password" name="newpassword" placeholder="New Password" required>
                <input type="password" name="confirmpassword"placeholder="Confirm Password" required><br /><br />
                <input type="hidden" name="email" value="<?= $email ?>">    
                <input type="hidden" name="hash" value="<?= $hash ?>">  
                <input type="submit" name="reset" value="Apply"><br /><br />
            </form>
        </div>
    </main>
</div>

<?php include 'includes/footer.inc.php' ?>