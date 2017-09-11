<?php include 'includes/nav.inc.php' ?>

<?php 

$sql = "SELECT id, image, title, created, author_id, LEFT(content, 200) AS content FROM articles";
$result = $mysqli->query($sql);

?>

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
<div class="home-main--wrapper">
    <main class="home-main container">
        <h2 class="home-main--heading">Recent Articles</h2>
        <div class="home-main--articles">
        <?php 
        
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) { ?>
                <?php 
                
                $author_id = $row['author_id']; 
                $sql2 = "SELECT users.username FROM users INNER JOIN articles ON articles.author_id = users.id WHERE articles.author_id = $author_id";
                $result2 = $mysqli->query($sql2);
                $row2 = $result2->fetch_assoc();

                ?>
                <article class="home-main--article">
                    <img class="home-article--image" src="<?php echo $row['image']; ?>" alt="Image coudn't load">
                    <div class="home-article--group">
                        <h3 class="home-article--title"3><?php echo $row['title']; ?></h3>
                        <div class="home-article--date">Posted <span><?php echo $row['created']; ?></span></div>
                        <div class="home-article--author">by <a href="profile.php?u=<?php echo $row2['username']; ?>"><?php echo $row2['username']; ?>    
                        </a></div>
                        <p class="home-article--content"><?php echo $row['content'] . "..."; ?></p>
                        <a class="home-article--button" href="article.php?id=<?php echo $row['id']; ?>">Read more</a><br /><br />
                    </div>
                </article>
        <?php    }
        } else {
            echo "0 results";
        }
        
        ?>
        </div>
    </main>
</div>

<?php include 'includes/footer.inc.php' ?>