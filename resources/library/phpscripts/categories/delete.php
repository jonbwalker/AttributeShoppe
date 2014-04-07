<?php
require_once("../../../config.php");
if ( !empty($_GET['id'])) {
    $id = $_REQUEST['id'];
}
    // delete data
    $conn = new mysqli('localhost', 'attrib', 'password', 'attribute_shoppe');
    $sql = "DELETE FROM CATEGORY  WHERE id = '$id'";
    $result = $conn->query($sql);
    header("Location:" . BASE_URL . "/categories/list.php");
?>