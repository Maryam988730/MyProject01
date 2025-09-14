<?php
session_start();
#starts a session on every single page
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <title> Blog app </title>
        <link rel="stylesheet" href="style.css">

       

    </head>
    <body>
    <p>...</p>
        <nav>
            <div class="wrapper">
                <ul>
                    <?php
                    #if there is a session that means user is logged in
                    if (isset($_SESSION["useruid"])) {
                        echo "<li><a href='profile.php'> Profile page</a></li>";
                        echo "<li><a href='includes/logout.inc.php'> log out</a></li>";
                    } else {  #if not then the user is not logged in
                        echo "<li><a href='signup.php'> sign up</a></li>";
                        echo "<li><a href='login.php'> log in</a></li>";
                    }
                    ?>

                </ul>
            </div>
        </nav>

    <div class="wrapper">