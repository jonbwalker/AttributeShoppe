<?php
require_once("../../resources/config.php");
if (!session_id()) session_start();
if (!$_SESSION['isAdmin']){
    header("Location:" . BASE_URL . "/account/login.php");
    die();
}

$nameError = $emailError = $mobileError = '';
require_once("../../resources/config.php");
if (!session_id()) session_start();
if (!$_SESSION['isAdmin']) {
    header("Location:" . BASE_URL . "/account/login.php");
    die();
}

$id = null;
if (!empty($_GET['id'])) {
    $id = $_REQUEST['id'];
}

if (null == $id) {
    header("Location: index.php");
}

if (!empty($_POST)) {
    // keep track validation errors
    $nameError = null;
    $emailError = null;
    $mobileError =  null;

    // keep track post values
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];
    $address = null;
    $username = $_POST['username'];
    $password = $_POST['password'];
    $admin = $_POST['admin'];
    $gender = $_POST['gender'];
    $dob = $_POST['dob'];
    $phone = $_POST['phone'];

    // validate input
    $valid = true;
    if (empty($firstname)) {
        $nameError = 'Please enter Name';
        $valid = false;
    }

    if (empty($email)) {
        $emailError = 'Please enter Email Address';
        $valid = false;
    } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $emailError = 'Please enter a valid Email Address';
        $valid = false;
    }

    if (empty($phone)) {
        $mobileError = 'Please enter Phone Number';
        $valid = false;
    }

    // update data
    if ($valid) {
        $conn = new mysqli('localhost', 'attrib', 'password', 'attribute_shoppe');
        $sql = "UPDATE USER SET
         FIRST_NAME = '$firstname',
         LAST_NAME = '$lastname',
         EMAIL_ADDRESS = '$email',
         USERNAME = '$username',
         PASSWORD = '$password',
         IS_ADMIN = '$admin',
         GENDER = '$gender',
         DOB = '$dob',
         PHONE = '$phone'
         WHERE ID = '$id'";
        $result = $conn->query($sql);
        header("Location:" . BASE_URL . "/users/list.php");
    }
} else {
    $conn = new mysqli('localhost', 'attrib', 'password', 'attribute_shoppe');
    $sql = "SELECT * FROM USER WHERE ID = $id";
    $result = $conn->query($sql);
    $row = $result->fetch_array(MYSQLI_ASSOC);
    $firstname = $row['FIRST_NAME'];
    $lastname = $row['LAST_NAME'];
    $email = $row['EMAIL_ADDRESS'];
//    $address = null;
    $username = $row['USERNAME'];
    $password = $row['PASSWORD'];
    $admin = $row['IS_ADMIN'];
    $gender = $row['GENDER'];
    $dob = $row['DOB'];
    $phone = $row['PHONE'];
}
?>