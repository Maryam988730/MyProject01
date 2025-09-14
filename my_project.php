<?php
include_once 'header.php';

?>

<section class="index-intro">
    <?php
    #if there is a session that means user is logged in
    if (isset($_SESSION['useruid'])) {
        echo "<p> Hello   ".$_SESSION["useruid"]." welcome to the blogr  </p>";
    }
    ?>
    <h1>Blog</h1>
</section>

<section class="index-categories">
    <h2> write blogs for your friends to see</h2>

    

    <div class="categories-list">
        <div>
        <form action="includes/process.inc.php" method="post">
            <label for="message">Start typing your blog post:</label><br><br>
            <input type="text" id="message" name="message" placeholder="Type something..." required><br><br>
            <input type="submit" value="Post" >
        </form>
        </div>
        
        <div>
            <h2>All Posts</h2>
            <?php include __DIR__ . '/includes/show_post.php'; ?>
        </div>
        
        <div>
            <h3>c3</h3>
        </div>
    </div>

</section>


<?php
include_once 'footer.php';
?>

    

