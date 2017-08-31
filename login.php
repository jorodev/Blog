<?php include 'includes/nav.inc.php' ?>

<div class="login-wrapper">
    <main class="login-main container">
        <div class="login-main--box">
            <h3 class="register-heading">Login</h3>
            <form class="login-form" action="" method="POST">
                <input type="email" name="email" placeholder="Email" required>
                <input type="password" name="passowrd"placeholder="Password" required><br /><br />
                <a href="#">Forgot Password?</a>
                <input type="submit" name="submit" value="Login"><br /><br />
                or <a href="register.php">Make an account?</a>
            </form>
        </div>
    </main>
</div>

<?php include 'includes/footer.inc.php' ?>