<?php include 'includes/nav.inc.php' ?>

<?php 

if (isset($_POST['login'])) {
    $email = $mysqli->escape_string($_POST['email']);
    $result = $mysqli->query("SELECT * FROM users WHERE email='$email'");
    
    if ($result->num_rows == 0) {
        $_SESSION['error'] = "You have entered wrong email or password, try again!";
    } else {
        $user = $result->fetch_assoc();
    
        if (password_verify($_POST['password'], $user['password'])) {
            $_SESSION['email'] = $user['email'];
            $_SESSION['username'] = $user['username'];
            $username = $_SESSION['username'];
            $_SESSION['active'] = $user['active'];
            $_SESSION['logged_in'] = true;
            $_SESSION['success'] = "You have successfuly logged in your account!";
    
            header("location: profile.php?user=$username");
            exit();
        } else {
            $_SESSION['error'] = "You have entered wrong email or password, try again!";
        }
    }
}

?>

<div class="alerts">
    <?php if (isset($_SESSION['error'])) { ?>
    <div class="alert">
        <span class="closebtn">&times;</span>  
        <strong></strong> <?php echo $_SESSION['error']; unset($_SESSION['error']); ?>
    </div>
    <?php } ?>
    <?php if (isset($_SESSION['success'])) { ?>
    <div class="alert success">
        <span class="closebtn">&times;</span>  
        <strong></strong> <?php echo $_SESSION['success']; unset($_SESSION['success']); ?>
    </div>
    <?php } ?>
</div>

<div class="login-wrapper">
    <main class="login-main container">
        <div class="login-main--box">
            <h3 class="register-heading">Login</h3>
            <form class="login-form" action="" method="POST">
                <input type="email" name="email" placeholder="Email" required>
                <input type="password" name="password" placeholder="Password" required><br /><br />
                <a href="forgot.php">Forgot Password?</a>
                <input type="submit" name="login" value="Login"><br /><br />
                or <a href="register.php">Make an account?</a>
            </form>
        </div>
    </main>
</div>

<?php include 'includes/footer.inc.php' ?>