<?php include 'includes/nav.inc.php' ?>



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
    <?php if (isset($_SESSION['info'])) { ?>
    <div class="alert info">
        <span class="closebtn">&times;</span>  
        <strong></strong> <?php echo $_SESSION['info']; unset($_SESSION['info']); ?>
    </div>
    <?php } ?>
</div>
<div class="forgot-wrapper">
    <main class="forgot-main container">
        <div class="forgot-main--box">
            <h3 class="forgot-heading">Reset Your Password</h3>
            <form class="forgot-form" action="forgot.php" method="POST">
                <input type="email" name="email" placeholder="Email" required>
                <input type="submit" name="reset" value="Reset"><br /><br />
            </form>
        </div>
    </main>
</div>

<?php 

// if ($_SERVER['REQUEST_METHOD'] == 'POST') {
if (isset($_POST['reset'])) {
    $email = $mysqli->escape_string($_POST['email']);
    $result = $mysqli->query("SELECT * FROM users WHERE email='$email'");

    if ($result->num_rows == 0) { 
        $_SESSION['error'] = "User with that email doesn't exist!";
        header('Location: ' . $_SERVER['HTTP_REFERER']);
        exit();
    } else {

        $user = $result->fetch_assoc();
        
        $email = $user['email'];
        $hash = $user['hash'];
        $username = $user['username'];

        $_SESSION['info'] = "

        Please check your email $email"
        . " for a confirmation link to complete your password reset!";

        $to      = $email;
        $subject = 'Password Reset Link ( blog.com )';
        $message_body = '
        Hello '.$username.',

        You have requested password reset!

        Please click this link to reset your password:

        http://localhost/blog/reset.php?email='.$email.'&hash='.$hash;  

        mail($to, $subject, $message_body);

        header('Location: ' . $_SERVER['HTTP_REFERER']);
        exit();
    }
}

?>

<?php include 'includes/footer.inc.php' ?>