<?php
require_once("../../resources/config.php");
if (!session_id()) session_start();
if (!$_SESSION['isAdmin']){
    header("Location:" . BASE_URL . "/account/login.php");
    die();
}
$conn = new mysqli('localhost', 'attrib', 'password', 'attribute_shoppe');
$sql = "SELECT ID, USERNAME, EMAIL_ADDRESS, IS_ADMIN FROM USER";
$result = $conn->query($sql);
foreach($conn->query($sql) as $row) {
    echo '<tr>';
    echo '<td>' . $row['ID'] .'</td>';
    echo '<td>' . $row['USERNAME'] . '</td>';
    echo '<td>' . $row['EMAIL_ADDRESS'] . '</td>';
    echo '<td width=250>';
    echo '<a class="btn btn-default" href="show.php?id='.$row['ID'].'">Read</a>';
    echo ' ';
    echo '<a class="btn btn-default crud-btn" href="update.php?id='.$row['ID'].'">Update</a>';
    echo ' ';
    echo '<a class="btn btn-danger" data-toggle="modal" data-target=".bs-example-modal-sm">Delete</a>';
    echo '</td>';
    echo '</tr>';
}?>
