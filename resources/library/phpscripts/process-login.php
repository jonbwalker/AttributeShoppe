<?php
// Create connection
$con=mysqli_connect("127.0.0.1","attrib","password","attribute_shoppe");

if (isset($_POST['submit'])){
}
    $user = trim ($_POST['username']);
    $passwd = trim ($_POST['password']);
    $dbcn = new mysqli("127.0.0.1","attrib","password","attribute_shoppe");

    // Check connection
    if(mysqli_connect_errno()) {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
        exit;
    }

    $sql = "SELECT username, password FROM USER ";

    $sql = $sql . "WHERE USERNAME='$user' AND PASSWORD=sha1('$passwd');";

    $result = $dbcn->query( $sql );

    if(!$result){
        echo( "Unable to query database at this time." );
        exit();
    }
?>