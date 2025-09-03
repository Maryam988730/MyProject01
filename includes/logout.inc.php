<?php
#destroy the session

session_start();
session_unset();
session_destroy();

header("location: ../my_project.php");
exit();
?>