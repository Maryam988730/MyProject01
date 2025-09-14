<?php
session_start();

require_once 'dbh.inc.php';




# if there user is logged in and of they submited a post
if (isset($_POST['message']) && isset($_SESSION["useruid"])) {
    #stores users id in a variable and links blog post to the correct user in the posts table
    $user_id = $_SESSION['userid'];

    #reads the blog post from the form and cleans it up a bit that prevents injections
    $message = htmlspecialchars($_POST['message'], ENT_QUOTES, 'UTF-8');

    #prepared statement to prevent sql injection
    $stmt = $conn->prepare("INSERT INTO posts(user_id, message) VALUES (?,?)");

    # binds the actual php variables to the placeholder i=integer s=string
    $stmt->bind_param("is", $user_id, $message);

    $stmt->execute();
    $stmt->close();
    header("Location: ../my_project.php");

    exit;


}

