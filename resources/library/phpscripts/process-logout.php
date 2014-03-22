<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
unset($_SESSION["loggedIn"]);  // where $_SESSION["nome"] is your own variable. if you do not have one use only this as follow **session_unset();**
header("Location: index.php");
}
?>

