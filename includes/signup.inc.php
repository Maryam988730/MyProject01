<?php

if (isset($_POST["submit"])) {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $username = $_POST["userUid"];
    $pwd = $_POST["pwd"];
    $pwdRepeat = $_POST["pwdrepeat"];

    require_once 'dbh.inc.php';
    require_once 'functions.inc.php';

    
    # error checking
    # emptyInputSignup is a function from the functions.inc.php file
    if (emptyInputSignup($name, $email, $username, $pwd, $pwdRepeat) !== false){
        #if the user left the any box(s) empty send user back to signup page and exit() stops the script, and adds error poiunter to the url so we can add error message later
        header("location: ../signup.php?error=emptyinput");
        exit();
    } 
    
    if (invalidUid($username) !== false){
        header("location: ../signup.php?error=invalidUid");
        exit();
    } 

    if (invalidEmail($email) !== false){
        header("location: ../signup.php?error=invalidemail");
        exit();
    } 

    if (pwdMatch($pwd, $pwdRepeat) !== false){
        header("location: ../signup.php?error=passworddontmatch");
        exit();
    } 

    if (uidExists($conn, $username, $email) !== false){
        header("location: ../signup.php?error=usertaken");
        exit();
    } 

    createUser($conn, $name, $email, $username, $pwd);
}


else {
    #takes user back to signup page if they accessed it incorrectly
    # ../ goes back a directoty outside of the includes directory
    header("location: ../signup.php");
    exit();
}
