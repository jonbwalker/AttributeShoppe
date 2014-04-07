<?php
require_once("../../../config.php");
if ( !empty($_GET['id'])) {
    $id = $_REQUEST['id'];
}

    // delete data
    $conn = new mysqli('localhost', 'attrib', 'password', 'attribute_shoppe');
    $sql = "DELETE FROM USER WHERE id = '$id'";
    $result = $conn->query($sql);
    header("Location:" . BASE_URL . "/users/list.php");

?>