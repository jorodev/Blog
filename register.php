<?php include 'includes/nav.inc.php' ?>

<?php 

if (isset($_POST['register'])) {
    $_SESSION['username'] = $_POST['username'];
    $_SESSION['email'] = $_POST['email'];
    
    $username = $mysqli->escape_string($_POST['username']);
    $email = $mysqli->escape_string($_POST['email']);
    $password = $mysqli->escape_string(password_hash($_POST['password'], PASSWORD_BCRYPT));
    $hash = $mysqli->escape_string(md5(rand(0, 1000)));
    
    $result = $mysqli->query("SELECT * FROM users WHERE email='$email'")
    or die($mysqli->error);
    
    $result2 = $mysqli->query("SELECT * FROM users WHERE username='$username'")
    or die($mysqli->error);
    
    if ($result->num_rows > 0) {
        $error_email = 'User with this email already exists!';
    } else if ($result2->num_rows > 0) {
        $error_username = 'User with this username already exists!';
    } else {
        $sql = "INSERT INTO users (username, email, password, hash) "
                . "VALUES ('$username', '$email', '$password', '$hash')";
    
        if ($mysqli->query($sql)) {
            $_SESSION['active'] = 0;
            $_SESSION['logged_in'] = true;
            $_SESSION['success'] = "You successfuly logged in your account!";
            $_SESSION['verify'] =
                    
                     "Confirmation link has been sent to $email, please verify
                     your account by clicking on the link in the message!";
    
            $to = $email;
            $subject = 'Account Verification ( www.blog.com )';
            $message_body = '
            Hello '.$username.',
    
            Thank you for signing up!
    
            Please click this link to activate your account:
    
            http://localhost/blog/verify.php?email='.$email.'&hash='.$hash;
    
            mail($to, $subject, $message_body);
    
            header("location: profile.php");
        }
    }
}

?>

<div class="alerts">
    <?php if (isset($error_email)) { ?>
    <div class="alert">
        <span class="closebtn">&times;</span>  
        <strong>Danger!</strong> <?php echo $error_email; ?>
    </div>
    <?php } ?>
    <?php if (isset($error_username)) { ?>
    <div class="alert">
        <span class="closebtn">&times;</span>  
        <strong>Danger!</strong> <?php echo $error_username; ?>
    </div>
    <?php } ?>
</div>
<div class="register-wrapper">
    <main class="register-main container">
        <div class="register-main--box">
            <h3 class="register-heading">Register</h3>
            <form class="register-form" action="" method="POST">
                <input type="text" name="username" placeholder="Username" required>
                <input type="email" name="email" placeholder="Email" required>
                <input type="password" name="password"placeholder="Password" required><br /><br />
                <input type="submit" name="register" value="Register"><br /><br />
                or <a href="login.php">Already have an account?</a>
            </form>
        </div>
    </main>
</div>

<?php include 'includes/footer.inc.php' ?>