<?php
// Create connection
$con=mysqli_connect("127.0.0.1","root","Blackrock13","attribute_shoppe");

// Check connection
if (mysqli_connect_errno())
{
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
?>