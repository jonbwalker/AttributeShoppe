<?php
$loginError = $row = $loginSuccess = "";

//Connect to server
$conn = new mysqli('localhost', 'attrib', 'password', 'attribute_shoppe');

if ($_SERVER["REQUEST_METHOD"] == "POST") {

// Secure the login credentials
    $username = mysql_real_escape_string($_POST['username']);
    $password = md5(mysql_real_escape_string($_POST['password']));


    /* check the users credentials against the DB.*/
    $sql = "SELECT USERNAME, PASSWORD, IS_ADMIN FROM USER WHERE USERNAME = '$username' AND PASSWORD = '$password'";
    $result = $conn->query($sql);

    /* associative array */
    $row = $result->fetch_array(MYSQLI_ASSOC);

    $row_cnt = $result->num_rows;
    if ($row_cnt === 0) {
        $_SESSION['loggedIn'] = "false";
        unset($_SESSION['loggedIn']);
        unset($_SESSION['username']);
        $loginError = "We could not locate your account, please check your credentials and try again";
    } else {
        $_SESSION['loggedIn'] = "true";
        $_SESSION['username'] = $username;
        $_SESSION['password'] = $password;
//        $_SESSION['row'] = $row;
        $rows_returned = $result->num_rows;
        if ($row['IS_ADMIN'] == 1) {
            $_SESSION['isAdmin'] = "true";
            header("Location:" . BASE_URL . "/users/list.php?status=1");
        }else{
            header("Location:" . BASE_URL . "/products.php?status=1");

        }
    }
}
?>

