<?php include 'includes/nav.inc.php' ?>

<?php

if (!isset($_SESSION['logged_in'])) {
    $_SESSION['error'] = "You have to be logged in to view user profiles! Please log in!";

    header("location: login.php");
    exit();
} else {
    if (isset($_SESSION['username'])) {
        $username = $_SESSION['username'];
    
        $result = $mysqli->query("SELECT * FROM users WHERE username='$username' AND active='0'");
        
        if ($result->num_rows > 0) {
            $_SESSION['not_active'] = "Your account is not activated! Please check your email for confirmation link and click it to verify your account!";
        }
    }
}

$user = $_GET['user'];
$result2 = $mysqli->query("SELECT id FROM users WHERE username='$user'");


if ($result2->num_rows != 1) {
    $_SESSION['error'] = "User with that name doesn't exist!";

    header('Location: index.php');
    exit();
} else {
    $row = $result2->fetch_assoc();
    $user_id = $row['id'];

    $result3 = $mysqli->query("SELECT COUNT(author_id) as counter FROM articles WHERE author_id='$user_id'");
    $row2 = $result3->fetch_assoc();
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

<div class="profile-wrapper">
    <div class="profile container">
        <div class="profile-box--left">
            <img class="profile-box--avatar" src="assets/images/defaultavatar.png" alt="">
            <span class="profile-box--nick"><?php echo $_GET['user']; ?></span>
            <div class="profile-box--tab">
                <button class="tablinks" id="defaultOpen" onclick="openTab(event, 'posts')">Articles <span class="counter">(<?php echo $row2['counter']; ?>)</span></button>
                <button class="tablinks" onclick="openTab(event, 'friends')">Friends <span class="counter">(0)</span></button>
                <button class="tablinks" onclick="openTab(event, 'settings')">Settings</button>
            </div>
        </div>
        <div class="profile-box--right">
            <div id="posts" class="tabcontent">
                <div style="overflow-x:auto;">
                    <table>
                    <tr>
                        <th>#</th>
                        <th>Title</th>
                        <th>Created</th>
                    </tr>
                    <?php 
                    $result4 = $mysqli->query("SELECT id, title, created FROM articles WHERE author_id='$user_id'");

                    if ($result4->num_rows > 0) {
                        while($row4 = $result4->fetch_assoc()) { ?>
                            <tr>
                                <td><?php echo $row4['id']; ?></td>
                                <td><?php echo $row4['title']; ?></td>
                                <td><?php echo $row4['created']; ?></td>
                            </tr>
                    <?php } 
                    } else {
                        echo "0 results";
                    }
                    ?>
                    </table>
                </div>
            </div>

            <div id="friends" class="tabcontent">
                <p>friends</p>
            </div>

            <div id="settings" class="tabcontent">
                <p>settings</p>
            </div>
        </div>
    </div>
</div>

<?php include 'includes/footer.inc.php' ?>