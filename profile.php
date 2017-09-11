<?php include 'includes/nav.inc.php' ?>

<?php

$username = $_SESSION['username'];
$result = $mysqli->query("SELECT * FROM users WHERE username='$username' AND active='0'");

if ($result->num_rows > 0) {
    $_SESSION['not_active'] = "Your account is not activated! Please check your email for confirmation link and click it to verify your account!";
}

?>

<div class="alerts">
    <?php if (isset($_SESSION['logged_in']) && isset($_SESSION['success'])) { ?>
    <div class="alert success">
        <span class="closebtn">&times;</span>  
        <strong>Hello, <?php echo $_SESSION['username']; ?>.</strong> <?php echo $_SESSION['success']; unset($_SESSION['success']); ?>
    </div>
    <?php } ?>
    <?php if (isset($_SESSION['activated'])) { ?>
    <div class="alert success">
        <span class="closebtn">&times;</span>  
        <strong></strong> <?php echo $_SESSION['activated']; unset($_SESSION['activated']); ?>
    </div>
    <?php } ?>
    <?php if (isset($_SESSION['verify'])) { ?>
    <div class="alert info">
        <span class="closebtn">&times;</span>  
        <strong></strong> <?php echo $_SESSION['verify']; unset($_SESSION['verify']); ?>
    </div>
    <?php } ?>
    <?php if (isset($_SESSION['error'])) { ?>
    <div class="alert">
        <span class="closebtn">&times;</span>  
        <strong></strong> <?php echo $_SESSION['error']; unset($_SESSION['error']); ?>
    </div>
    <?php } ?>
    <?php if (isset($_SESSION['not_active'])) { ?>
    <div class="alert warning">
        <span class="closebtn">&times;</span>  
        <strong></strong> <?php echo $_SESSION['not_active']; ?>
    </div>
    <?php } ?>
</div>

<?php include 'includes/footer.inc.php' ?>