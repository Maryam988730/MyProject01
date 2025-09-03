<?php
include_once 'header.php';
?>

<section class="signup-form">
    <h2> Login! </h2>
    <div class="login-form-form">
        <form action="includes/login.inc.php" method="post"> 
            <!-- when form is submitted The browser sends the form data to the inc file-->
            
            <input type="text" name="name" placeholder="Email/Username...">
            <input type="text" name="pwd" placeholder="Password...">
            <button type="submit" name="submit" >Login</button>

        </form>
    </div>
    <?php

    # if there exists an error in the url
    if(isset($_GET["error"])) {
        # if the error is equal to the given error, then display ther correct message
        if ($_GET["error"] == "emptyinput") {
            echo "<p>Fill in all fields!</p>";
        }

        if ($_GET["error"] == "wronglogin") {
            echo "<p>Incorrect login info!</p>";
        }
    }

    ?>

</section>

<?php
include_once 'footer.php';
?>
