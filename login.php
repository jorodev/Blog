<?php include 'includes/nav.inc.php' ?>

<?php 

if (isset($_POST['login'])) {
    $email = $mysqli->escape_string($_POST['email']);
    $result = $mysqli->query("SELECT * FROM users WHERE email='$email'");
    
    if ($result->num_rows == 0) {
        $error = "User with that email doesn't exist!";
        echo $error_email;
    } else {
        $user = $result->fetch_assoc();
    
        if (password_verify($_POST['password'], $user['password'])) {
            $_SESSION['email'] = $user['email'];
            $_SESSION['username'] = $user['username'];
            $_SESSION['active'] = $user['active'];
            
            // This is how we'll know the user is logged in
            $_SESSION['logged_in'] = true;
    
            header("location: profile.php");
        } else {
            $error = "You have entered wrong email or password, try again!";
            echo $error;
        }
    }
}

?>

<div class="login-wrapper">
    <main class="login-main container">
        <div class="login-main--box">
            <h3 class="register-heading">Login</h3>
            <form class="login-form" action="" method="POST">
                <input type="email" name="email" placeholder="Email" required>
                <input type="password" name="password"placeholder="Password" required><br /><br />
                <a href="#">Forgot Password?</a>
                <input type="submit" name="login" value="Login"><br /><br />
                or <a href="register.php">Make an account?</a>
            </form>
        </div>
    </main>
</div>

<?php include 'includes/footer.inc.php' ?>