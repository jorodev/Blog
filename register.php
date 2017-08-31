<?php include 'includes/nav.inc.php' ?>

<div class="register-wrapper">
    <main class="register-main container">
        <div class="register-main--box">
            <h3 class="register-heading">Register</h3>
            <form class="register-form" action="" method="POST">
                <input type="text" name="username" placeholder="Username" required>
                <input type="email" name="email" placeholder="Email" required>
                <input type="password" name="passowrd"placeholder="Password" required><br /><br />
                <input type="submit" name="submit" value="Register"><br /><br />
                or <a href="login.php">Already have an account?</a>
            </form>
        </div>
    </main>
</div>

<?php include 'includes/footer.inc.php' ?>