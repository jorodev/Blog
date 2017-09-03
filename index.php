<?php include 'includes/nav.inc.php' ?>

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
        <hr class="home-main-hr">
        <article class="home-main--article">
            <img class="article-image" src="http://via.placeholder.com/300x150" alt="Image coudn't load">
            <div class="article-group">
                <h3 class="article-title"3>Some really big title here to test it out for bugs</h3>
                <div class="article-date">Posted <span><?php echo date('d.m.y h:i') ?></span></div>
                <div class="article-author">by <a href="#">Username</a></div>
                <p class="article-content">Lorem ipsum dolor sit amet consectetur adipisicing elit. Impedit et incidunt, sapiente nisi molestias provident totam magnam rem delectus nesciunt culpa ab quam, fuga ut laudantium quis dolores voluptatibus mollitia.</p>
                <a class="article-button" href="#">Read more</a><br /><br />
            </div>
        </article>
        <article class="home-main--article">
            <img class="article-image" src="http://via.placeholder.com/300x150" alt="Image coudn't load">
            <div class="article-group">
                <h3 class="article-title"3>Some really big title here to test it out for bugs</h3>
                <div class="article-date">Posted <span><?php echo date('d.m.y h:i') ?></span></div>
                <div class="article-author">by <a href="#">Username</a></div>
                <p class="article-content">Lorem ipsum dolor sit amet consectetur adipisicing elit. Impedit et incidunt, sapiente nisi molestias provident totam magnam rem delectus nesciunt culpa ab quam, fuga ut laudantium quis dolores voluptatibus mollitia.</p>
                <a class="article-button" href="#">Read more</a><br /><br />
            </div>
        </article>
        <article class="home-main--article">
            <img class="article-image" src="http://via.placeholder.com/300x150" alt="Image coudn't load">
            <div class="article-group">
                <h3 class="article-title"3>Some really big title here to test it out for bugs</h3>
                <div class="article-date">Posted <span><?php echo date('d.m.y h:i') ?></span></div>
                <div class="article-author">by <a href="#">Username</a></div>
                <p class="article-content">Lorem ipsum dolor sit amet consectetur adipisicing elit. Impedit et incidunt, sapiente nisi molestias provident totam magnam rem delectus nesciunt culpa ab quam, fuga ut laudantium quis dolores voluptatibus mollitia.</p>
                <a class="article-button" href="#">Read more</a><br /><br />
            </div>
        </article>
        <article class="home-main--article">
            <img class="article-image" src="http://via.placeholder.com/300x150" alt="Image coudn't load">
            <div class="article-group">
                <h3 class="article-title"3>Some really big title here to test it out for bugs</h3>
                <div class="article-date">Posted <span><?php echo date('d.m.y h:i') ?></span></div>
                <div class="article-author">by <a href="#">Username</a></div>
                <p class="article-content">Lorem ipsum dolor sit amet consectetur adipisicing elit. Impedit et incidunt, sapiente nisi molestias provident totam magnam rem delectus nesciunt culpa ab quam, fuga ut laudantium quis dolores voluptatibus mollitia.</p>
                <a class="article-button" href="#">Read more</a><br /><br />
            </div>
        </article>
        <article class="home-main--article">
            <img class="article-image" src="http://via.placeholder.com/300x150" alt="Image coudn't load">
            <div class="article-group">
                <h3 class="article-title"3>Some really big title here to test it out for bugs</h3>
                <div class="article-date">Posted <span><?php echo date('d.m.y h:i') ?></span></div>
                <div class="article-author">by <a href="#">Username</a></div>
                <p class="article-content">Lorem ipsum dolor sit amet consectetur adipisicing elit. Impedit et incidunt, sapiente nisi molestias provident totam magnam rem delectus nesciunt culpa ab quam, fuga ut laudantium quis dolores voluptatibus mollitia.</p>
                <a class="article-button" href="#">Read more</a><br /><br />
            </div>
        </article>
        <article class="home-main--article">
            <img class="article-image" src="http://via.placeholder.com/300x150" alt="Image coudn't load">
            <div class="article-group">
                <h3 class="article-title"3>Some really big title here to test it out for bugs</h3>
                <div class="article-date">Posted <span><?php echo date('d.m.y h:i') ?></span></div>
                <div class="article-author">by <a href="#">Username</a></div>
                <p class="article-content">Lorem ipsum dolor sit amet consectetur adipisicing elit. Impedit et incidunt, sapiente nisi molestias provident totam magnam rem delectus nesciunt culpa ab quam, fuga ut laudantium quis dolores voluptatibus mollitia.</p>
                <a class="article-button" href="#">Read more</a><br /><br />
            </div>
        </article>
    </main>
</div>

<?php include 'includes/footer.inc.php' ?>