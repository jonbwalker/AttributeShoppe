<?php
// define variables and initialize with empty values
$firstNameErr = $lastNameErr = $emailErr = $phoneErr = $dobErr = $genderErr =  $usernameErr = $passwordErr = "";
$firstName = $lastName = $email = $phone = $dob = $gender = $username = $password =  "";
$favFruit = array();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["firstName"])) {
        $firstNameErr = "Please enter your first name";
    }
    else {
        $firstName = sanitize($_POST["firstName"]);
    }

    if (empty($_POST["lastName"])) {
        $lastNameErr = "Please enter your last name";
    }
    else {
        $lastName = sanitize($_POST["lastName"]);
    }

    if (empty($_POST["email"]))  {
        $emailErr = "Please enter a valid email";
    }
    else {
        $email = sanitize($_POST["email"]);
    }

    if (empty($_POST["phone"])) {
        $phoneErr = "Please enter a valid Us phone number";
    }
    else {
        $phone = sanitize($_POST["phone"]);
    }

    if (empty($_POST["dob"])) {
        $dobErr = "Please enter a valid date";
    }
    else {
        $dob = sanitize($_POST["dob"]);
    }

    if (!isset($_POST["gender"])) {
        $genderErr = "Please select a gender";
    }
    else {
        $gender = $_POST["gender"];
    }

    if (empty($_POST["username"])) {
        $usernameErr = "Please enter a username";
    }
    else {
        $username = sanitize($_POST["username"]);
    }


    if (empty($_POST["password"])) {
        $passwordErr = "Please enter a password";
    }
    else {
        $password = sanitize($_POST["password"]);
    }
}

function sanitize($input)
{
    $input = trim($input);
    $input = stripslashes($input);
    $input = htmlspecialchars($input);
    return $input;
}

//function saveToFile()  {
//$fp = fopen(”formdata.txt”, “a”);
//$savestring = $name . “,” . $email . “n”;
//fwrite($fp, $savestring);
//fclose($fp);
//echo “<h1>You data has been saved in a text file!</h1>”;
//}

function save(){
    if(isset($_POST['field1']) && isset($_POST['field2'])) {
        $data = $_POST['field1'] . '-' . $_POST['field2'] . "\n";
        $ret = file_put_contents('/tmp/mydata.txt', $data, FILE_APPEND | LOCK_EX);
        if($ret === false) {
            die('There was an error writing this file');
        }
        else {
            echo "$ret bytes written to file";
        }
    }
    else {
        die('no post data to process');
    }
}
?>