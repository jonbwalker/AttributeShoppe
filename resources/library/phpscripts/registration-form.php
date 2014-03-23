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
    $password = $_POST['password'];
    $isadmin = false;
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

//function saveToFile()  {
//$fp = fopen(”formdata.txt”, “a”);
//$savestring = $name . “,” . $email . “n”;
//fwrite($fp, $savestring);
//fclose($fp);
//echo “<h1>You data has been saved in a text file!</h1>”;
//}


//function saveUser(){
//    TRY {
////        $host = $config['db.host'];
////        $username = $config['db.username'];
////        $password = $config['db.password'];
////        $database = $config['db.dbname'];
////        $dsn = "mysql:host=$host;dbname=$database";
//        $host = "localhost";
//        $username = "attrib";
//        $password = "password";
//        $database = "attribute_shoppe";
//        $dsn = "mysql:host=$host;dbname=$database";
//
////        $conn = new mysqli("127.0.0.1","attrib","password","attribute_shoppe");
//        $conn = new PDO( $dsn, $username, $password );
//        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//
//        if (isset($_POST['submit'])) {
//            $firstname = $_POST['firstname'];
//            $lastname = $_POST['lastname'];
//            $email = $_POST['email'];
//            $phone = $_POST['phone'];
//            $dob = $_POST['dob'];
//            $gender = $_POST['gender'];
//            $username = $_POST['username'];
//            $password = $_POST['password'];
//
//            if (isset($_POST['id'])) {
//                //update mode, we have both POST data and ID, update the record
//                $id = $_POST['id'];
//
//                $sql = "UPDATE USER SET"
//                    . "FIRST_NAME=".$conn->quote($firstname)
//                    . ",LAST_NAME=".$conn->quote($lastname)
//                    . ",EMAIL_ADDRESS=".$conn->quote($email)
//                    . ",PHONE=".$conn->quote($phone)
//                    . ",DOB=".$conn->quote($dob)
//                    . ",GENDER=".$conn->quote($gender)
//                    . ",USERNAME=".$conn->quote($username)
//                    . ",PASSWORD=".$conn->quote($password)
//                    . " WHERE id = ".$conn->quote($id);
//                $userdata = $conn->query($sql);
//            } else {
//                // insert mode, there is no ID, but there are data, insert them as new
//                $sql = "INSERT INTO USER("
//                    . "FIRST_NAME, LAST_NAME, EMAIL_ADDRESS, PHONE, DOB, GENDER, USERNAME, PASSWORD "
//                    . " ) VALUES ("
//                    . $conn->quote($firstname).","
//                    . $conn->quote($lastname).","
//                    . $conn->quote($email).","
//                    . $conn->quote($phone).","
//                    . $conn->quote($dob).","
//                    . $conn->quote($gender).","
//                    . $conn->quote($username).","
//                    . $conn->quote($password).")";
//                $userdata = $conn->query($sql);
//            }
//        } elseif (isset($_GET['id'])) {
//            // edit mode, no POST data, but there is an ID param, prepopulate the form
//            $userEditDataRows = $conn->query('SELECT * FROM USER WHERE id ='.$conn->quote($_GET['id']));
//            if (sizeof($userEditDataRows)>0) {
//                $row = $userEditDataRows[0];
//                $firstname = $row['FIRST_NAME'];
//                $lastname = $row['LAST_NAME'];
//                $email = $row['EMAIL_ADDRESS'];
//                $phone = $row['PHONE'];
//                $dob = $row['DOB'];
//                $gender = $row['GENDER'];
//                $username = $row['USERNAME'];
//                $password = $row['PASSWORD'];
//                $id = $_GET['id'];
//            }
//
//        } else {
//            // set empty data
//            $firstname = '';
//            $lastname = '';
//            $email = '';
//            $phone = '';
//            $dob = '';
//            $gender = '';
//            $username = '';
//            $password = '';
//            $id = false;
//        }
////        //build the table
////        $sql = "SELECT * FROM USER";
////        $userdata = $conn->query($sql);
////        $table = '<table>';
////        $table .= '<tr>';
////        $table .= '<th>First Name</th>
////          <th>Last Name</th>
////          <th>Gender</th>
////          <th>Console</th>
////          <th>Edit</th>';
////        $table .= '</tr>';
////        foreach ($userdata as $userdata) {
////            $table .= '<tr>';
////            $table .= '  <td>' . $userdata['firstname'] . '</td>';
////            $table .= '  <td>' . $userdata['lastname'] . '</td>';
////            $table .= '  <td>' . $userdata['gender'] . '</td>';
////            $table .= '  <td>' . $userdata['Console'] . '</td>';
////            $table .= '  <td><a href="/process.php?id='.$userdata['id'].'">Edit</a></td>';
////            $table .= '  </tr> ';
////        }
////
////        $table .= '</table>';
//
//    } catch (PDOException $e) {
//        exit("Connection failed: " . $e->getMessage());
//    }
//}
?>