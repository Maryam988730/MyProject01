<?php
include_once 'header.php'
?>

<section class="signup-form">
    <h2> Sign Up! </h2>
    <div class="signup-form-form">
        <form action="includes/signup.inc.php" method="post"> 
            <input type="text" name="name" placeholder="Full name...">
            <input type="text" name="email" placeholder="Email...">
            <input type="text" name="userUid" placeholder="Username...">
            <input type="text" name="pwd" placeholder="Password...">
            <input type="text" name="pwdrepeat" placeholder="Repeat password...">
            <button type="submit" name="submit" >Sign Up</button>

        </form>
    </div>

    <?php

    # if there exists an error in the url
    if(isset($_GET["error"])) {
        # if the error is equal to the given error, then display ther correct message
        if ($_GET["error"] == "emptyinput") {
            echo "<p>Fill in all fields!</p>";
        }

        if ($_GET["error"] == "invalidUid") {
            echo "<p>This username is invalid!</p>";
        }

        if ($_GET["error"] == "invalidemail") {
            echo "<p>This email is invalid!</p>";
        }

        if ($_GET["error"] == "passworddontmatch") {
            echo "<p>Passwords dont match!</p>";
        }

        if ($_GET["error"] == "usertaken") {
            echo "<p>This user is taken!</p>";
        }

        if ($_GET["error"] == "none") {
            echo "<p>Your signed up!</p>";
        }


        
    }

    ?>


</section>

<?php
include_once 'footer.php'
?>
