<?php
require_once("../../resources/config.php");

$id = null;
if (!empty($_GET['id'])) {
    $id = $_REQUEST['id'];
}

if (null == $id) {
    header("Location:" . BASE_URL . "/index.php");
} else {
    $conn = new mysqli('localhost', 'attrib', 'password', 'attribute_shoppe');
    $sql = "SELECT * FROM PRODUCT WHERE ID = $id";
    $result = $conn->query($sql);
    $row = $result->fetch_array(MYSQLI_ASSOC);
}
?>
