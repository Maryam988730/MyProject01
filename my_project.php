<?php

include_once 'header.php';
?>

<section class="index-intro">
    <?php
    #if there is a session that means user is logged in
    if (isset($_SESSION["useruid"])) {
        echo "<p> Hello   ".$_SESSION["useruid"]." welcome to the blogr  </p>";
    }
    ?>
    <h1>Blog</h1>
</section>

<section class="index-categories">
    <h2> write blogs for your friends to see</h2>

    <div class="categories-list">
        <div>
            <h2>c2</h2>
        </div>
        <div>
            <h2>c2</h2>
        </div>
        <div>
            <h3>c3</h3>
        </div>
    </div>

</section>



<h2> content? </h2>
<h3> content? </h3>

<?php
include_once 'footer.php';
?>

    

