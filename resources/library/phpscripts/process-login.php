<?php

session_start();

//Connect to server
$conn = new mysqli('localhost', 'attrib', 'password', 'attribute_shoppe');

if ($_SERVER["REQUEST_METHOD"] == "POST") {

// Secure the login credentials
    $username = mysql_real_escape_string($_POST['username']);
    $password = mysql_real_escape_string($_POST['password']);

// Check the users input against the DB.
    $sql = "SELECT USERNAME, PASSWORD FROM USER WHERE USERNAME = '$username' AND PASSWORD = '$password'";
    $result = $conn->query($sql);

    $row_cnt = $result->num_rows;
    if ($row_cnt === 0) {
        $_SESSION['loggedIn'] = "false";
        trigger_error('Wrong SQL: ' . $sql . ' Error: ' . $conn->error, E_USER_ERROR);
        header("Location: ../public_html/index.php");
    } else {
        $_SESSION['loggedIn'] = "true";
        $_SESSION['username'] = $username;

        $rows_returned = $result->num_rows;
        header("Location: ../public_html/products.php");
    }
}
?>

