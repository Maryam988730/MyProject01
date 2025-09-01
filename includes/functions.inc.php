<?php

function emptyInputSignup($name, $email, $username, $pwd, $pwdRepeat){
    $result;
    if (empty($name) || empty($email) || empty($username) || empty($pwd) || empty($pwdRepeat) ) {
        $result = true;
    }
    else {
        $result = false;
    }
    return $result;
}

function invalidUid($username){
    $result;
    #checks if username doesnt contain a-z A-Z 0-9
    if (!preg_match("/^[a-zA-Z0-9]*$/", $username)) {
        $result = true;
    }
    else {
        $result = false;
    }
    return $result;
}

function invalidEmail($email){
    $result;
    #built in php email checker 
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $result = true;
    }
    else {
        $result = false;
    }
    return $result;
}

function pwdMatch($pwd, $pwdRepeat){
    $result;
    if ($pwd !== $pwdRepeat){
        $result = true;
    }
    else {
        $result = false;
    }
    return $result;
}


function uidExists($conn, $username, $email){
    # an sql statement needs semicolon to close it
    # ? is a placeholder 
    $sql = "SELECT * FROM users WHERE userUid = ? OR userEmail = ?;";
    # initialising a prepared statement to avoid sql injection
    # Think of this as creating an empty container (a statement object) where we can load our SQL.
    $stmt = mysqli_stmt_init($conn);

    # We try to load the SQL query into the statement container.
    # runs the sql statement in the database and checks for any errors
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../signup.php?error=stmtfailed");
        exit();
    }

    # if no errors, pass in the data from the user
    # ss means 2 strings
    # so now the data from the user is bound to the statement
    mysqli_stmt_bind_param($stmt, "ss", $username, $email);
    # execute the statement
    mysqli_stmt_execute($stmt);

    $resultData = mysqli_stmt_get_result($stmt);


    # if there is data in the database with that user then grab the data (can be used for the login system as well)
    # also creating a varibale called row whilst checking for true/false
    if ($row = mysqli_fetch_assoc($resultData)) {
        return $row;
        #so if the user exits we return all the data from the database
    }

    # if there is no data in the database with that user, then set result to false
    else {
        $result = false;
        return $result;
    }

    mysqli_stmt_close($stmt);
}


function createUser($conn, $name, $email, $username, $pwd){
   
    $sql = "INSERT INTO users (userName, userEmail, userUid, userPwd) VALUES (?, ?, ?, ?);";
   
    $stmt = mysqli_stmt_init($conn);

    
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../signup.php?error=stmtfailed");
        exit();
    }

    #hashing the password before it enters the database
    # PASSWORD_DEFAULT is a built in function for hashing
    $hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);

    
    mysqli_stmt_bind_param($stmt, "ssss", $name, $email, $username, $hashedPwd);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);

    # sends the user somewhere once they have signed up successfully
    header("location: ../signup.php?error=none");
    exit();
}