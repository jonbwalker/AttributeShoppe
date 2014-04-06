<?php
// define variables and initialize with empty values
$firstnameErr = $lastnameErr = $emailErr = $phoneErr = $dobErr = $genderErr =  $usernameErr = $passwordErr = "";
$firstname = $lastname = $email = $phone = $dob = $gender = $username = $password =  "";
$error = array();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["firstname"])) {
        $firstnameErr = "Please enter your first name";
        array_push($error, $firstnameErr);
    }
    else {
        $firstname = sanitize($_POST["firstname"]);
    }

    if (empty($_POST["lastname"])) {
        $lastnameErr = "Please enter your last name";
        array_push($error, $lastnameErr);
    }
    else {
        $lastname = sanitize($_POST["lastname"]);
    }

    if (empty($_POST["email"]))  {
        $emailErr = "Please enter a valid email";
        array_push($error, $emailErr);
    }
    else {
        $email = sanitize($_POST["email"]);
    }

    if (empty($_POST["phone"])) {
        $phoneErr = "Please enter a valid Us phone number";
        array_push($error, $phoneErr);
    }
    else {
        $phone = sanitize($_POST["phone"]);
    }

    if (empty($_POST["dob"])) {
        $dobErr = "Please enter a valid date";
        array_push($error, $dobErr);
    }
    else {
        $dob = sanitize($_POST["dob"]);
    }

    if (!isset($_POST["gender"])) {
        $genderErr = "Please select a gender";
        array_push($error, $genderErr);
    }
    else {
        $gender = $_POST["gender"];
    }

    if (empty($_POST["username"])) {
        $usernameErr = "Please enter a username";
        array_push($error, $usernameErr);
    }
    else {
        $username = sanitize($_POST["username"]);
    }

    if (empty($_POST["password"])) {
        $passwordErr = "Please enter a password";
        array_push($error, $passwordErr);
    }
    else {
        $password = sanitize($_POST["password"]);
    }

    if(empty($error)) {
        saveUser();
        header("Location: success.php");
    }else{
        $formError = "Errors in form";
    }
}

function sanitize($input)
{
    $input = trim($input);
    $input = stripslashes($input);
    $input = htmlspecialchars($input);
    return $input;
}

function saveUser(){
    $conn = new mysqli('localhost', 'attrib', 'password', 'attribute_shoppe');

    if (mysqli_connect_errno()) {
        header("Location: index.php");
        echo("Error creating Database Connection");
        exit;
    }

    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];
    $address = null;
    $username = $_POST['username'];
    $password = md5($_POST['password']);
    $isadmin = 0;
    $gender = $_POST['gender'];
    $dob = $_POST['dob'];
    $phone = $_POST['phone'];



    $sql = "INSERT INTO USER (FIRST_NAME,LAST_NAME,EMAIL_ADDRESS,ADDRESS_ID,USERNAME,PASSWORD,IS_ADMIN,GENDER,DOB,PHONE)
    VALUES ('$firstname', '$lastname', '$email',NULL ,'$username', '$password','$isadmin', '$gender', '$dob', '$phone')";

    $result = $conn->query($sql);

    if ($result) {
        echo("" . $conn->affected_rows . " news items inserted");
    } else {
        echo("Error inserting Data");
    }
    $conn->close();
}


function write(){
    $data = 'User: ' . $_POST['firstname'] . ' '
        . $_POST['lastname'] . ' '
        . $_POST['email'] . ' '
        . $_POST['phone'] . ' '
        . $_POST['dob'] . ' '
        . $_POST['gender'] . ' '
        . $_POST['username'] . ' '
        . $_POST['password'] ."\n";
    $ret = file_put_contents('/Users/jon/Desktop/registration.txt', $data, FILE_APPEND | LOCK_EX);
    if($ret === false) {
        die('There was an error writing this file');
    }
    else {
        echo "$ret bytes written to file";
    }
}
?>