<?php
$serverName = "127.0.0.1";
$dBUsername = "root";
$dBPassword = "";
$dBName = "myProject01";

$conn = mysqli_connect($serverName, $dBUsername, $dBPassword, $dBName  );

if (!$conn) {
    die("connection failed: " . mysqli_connect_error());
}

