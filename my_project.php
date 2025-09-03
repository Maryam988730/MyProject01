<?php

include_once 'header.php';
?>

<section class="index-intro">
    <?php
    #if there is a session that means user is logged in
    if (isset($_SESSION["useruid"])) {
        echo "<p> Hello   ".$_SESSION["useruid"]."  </p>";
    }
    ?>
    <h1>This is the intro</h1>
</section>

<section class="index-categories">
    <h2> some basic categories</h2>

    <div class="categories-list">
        <div>
            <h3>c1</h3>
        </div>
        <div>
            <h2>c2</h2>
        </div>
        <div>
            <h3>c3</h3>
        </div>
    </div>

</section>



<h2> some basics </h2>
<h3> page contents </h3>

<?php
include_once 'footer.php';
?>

    

