<?php
require_once("../../resources/config.php");
if (!session_id()) session_start();
if (!$_SESSION['isAdmin']) {
    header("Location:" . BASE_URL . "/account/login.php");
    die();
}

$nameError = $descriptionError = $activeError = '';

//$id = null;
//if (!empty($_GET['id'])) {
//    $id = $_REQUEST['id'];
//}
//
//if (null == $id) {
//    header("Location: index.php");
//}

if (!empty($_POST)) {
    // keep track validation errors
    $nameError = null;
    $descriptionError = null;
    $activeError = null;

    // keep track post values
    $name = $_POST['name'];
    $description = $_POST['description'];
    $active = $_POST['active'];

    // validate input
    $valid = true;
    if (empty($name)) {
        $nameError = 'Please enter Name';
        $valid = false;
    }

    if (empty($description)) {
        $descriptionError = 'Please enter a description';
        $valid = false;
    }

    if (empty($active)) {
        $activeError = 'Please show active indicator';
        $valid = false;
    }

    // update data
    if ($valid) {
        $conn = new mysqli('localhost', 'attrib', 'password', 'attribute_shoppe');
        $sql = "INSERT INTO CATEGORY VALUES(
          DEFAULT,
         '$name',
         '$description',
         '$active')";
        $result = $conn->query($sql);
        header("Location:" . BASE_URL . "/admin.php");
    }
}
?>
