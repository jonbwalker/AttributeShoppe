<?php
session_start();
require_once("../../../config.php");
if ( !empty($_GET['id'])) {
    $id = $_REQUEST['id'];
}

    // delete data
    $conn = new mysqli('localhost', 'attrib', 'password', 'attribute_shoppe');
    $sql = "DELETE FROM PRODUCT WHERE id = '$id'";
    $result = $conn->query($sql);
    header("Location:" . BASE_URL . "/products/list.php");

?>