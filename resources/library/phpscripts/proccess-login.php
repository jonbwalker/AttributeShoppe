<?php
//// Create connection
//$con=mysqli_connect("127.0.0.1","attrib","password","attribute_shoppe");
//
//if (isset($_POST['submit'])){
//}
//    $user = trim ($_POST['username']);
//    $passwd = trim ($_POST['password']);
//    $conn = new mysqli('localhost', 'attrib', 'password', 'attribute_shoppe');
//
//    // Check connection
//    if(mysqli_connect_errno()) {
//        echo "Failed to connect to MySQL: " . mysqli_connect_error();
//        exit;
//    }
//
//    $sql = "SELECT username, password FROM USER ";
//
//    $sql = $sql . "WHERE USERNAME='$user' AND PASSWORD=sha1('$passwd');";
//
//    $result = $conn->query( $sql );
//
//    if(!$result){
//        echo( "Unable to query database at this time." );
//        exit();
//    }
//
?>

<?php


    session_start();

//Connect to server
    $conn = new mysqli('localhost', 'attrib', 'password', 'attribute_shoppe');
if ($_SERVER["REQUEST_METHOD"] == "POST") {
// Get the login credentials from user
//    $username = $_POST['username'];
//    $password = $_POST['password'];

// Secure the credentials
//    $username = mysql_real_escape_string($_POST['username']);
    $username = $_POST['username'];
//    $password = mysql_real_escape_string($_POST['password']);
    $password = $_POST['password'];

// Check the users input against the DB.
    $sql = "SELECT USERNAME, PASSWORD FROM USER WHERE USERNAME = '$username' AND PASSWORD = '$password'";
    $result = $conn->query($sql);

//    $row = mysql_fetch_assoc($result);
    $row_cnt = $result->num_rows;
    if($row_cnt === 0) {
//        trigger_error('Wrong SQL: ' . $sql . ' Error: ' . $conn->error, E_USER_ERROR);
        header("Location: ../public_html/index.php");
    } else {
        $rows_returned = $result->num_rows;
        header("Location: ../public_html/products.php");
    }

//    if ($rows_returned == 1) {
//        $_SESSION['loggedIn'] = "true";
//        header("Location: ../products.php");
//    } else {
//        $_SESSION['loggedIn'] = "false";
//        echo "<p>Login failed, username or password incorrect.</p>";
//        header("Location: ../index.php");
//    }
}
?>

