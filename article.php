<?php include 'includes/nav.inc.php' ?>

<?php 

$id = $_GET['id'];
$sql = "SELECT * FROM articles WHERE id=$id";
$result = $mysqli->query($sql);

?>

<div class="article-main--wrapper">
    <main class="article-main container">
        <div class="article-main--articles">
        <?php 
        
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) { ?>
                <?php 
                

                $author_id = $row['author_id']; 
                $sql2 = "SELECT users.username FROM users INNER JOIN articles ON articles.author_id = users.id WHERE articles.author_id = $author_id";
                $result2 = $mysqli->query($sql2);
                $row2 = $result2->fetch_assoc();
                
                ?>
                <article class="article-main--article">
                    <img class="article-article--image" src="<?php echo $row['image']; ?>" alt="Image coudn't load">
                    <div class="article-article--group">
                        <h3 class="article-article--title"3><?php echo $row['title']; ?></h3>
                        <div class="article-article--date">Posted <span><?php echo $row['created'] ?></span></div>
                        <div class="article-article--author">by <a href="profile.php?u=<?php echo $row2['username']; ?>"><?php echo $row2['username']; ?>    
                        </a></div>
                        <p class="article-article--content"><?php echo $row['content']; ?></p>
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