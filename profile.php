<?php include 'includes/nav.inc.php' ?>

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
        <strong></strong> <?php echo $_SESSION['verify']; unset($_SESSION['verify']) ?>
    </div>
    <?php } ?>
    <?php if (isset($_SESSION['error'])) { ?>
    <div class="alert">
        <span class="closebtn">&times;</span>  
        <strong></strong> <?php echo $_SESSION['error']; unset($_SESSION['error']) ?>
    </div>
    <?php } ?>
</div>

<?php include 'includes/footer.inc.php' ?>