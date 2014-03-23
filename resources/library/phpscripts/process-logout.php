<?php
session_start();
include_once"../../config.php";
if (isset($_SESSION['username'])){
    unset($_SESSION['loggedIn']);
    unset($_SESSION['username']);
    session_destroy();
    header("Location:" . BASE_URL . "/index.php");
}else{
    header("Location:" . BASE_URL . "/login.php");
}
?>

