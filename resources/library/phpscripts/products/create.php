<?php
require_once("../../resources/config.php");
if (!session_id()) session_start();
if (!$_SESSION['isAdmin']) {
    header("Location:" . BASE_URL . "/account/login.php");
    die();
}

$nameError = $descriptionError = $priceError = $categoryError = $activeError = '';

// populate category list
$conn = new mysqli('localhost', 'attrib', 'password', 'attribute_shoppe');
$sql = "SELECT ID, NAME, ACTIVE FROM CATEGORY";
$categoryList = $conn->query($sql);

if (!empty($_POST)) {
    // keep track validation errors
    $nameError = null;
    $descriptionError = null;
    $priceError = null;
    $categoryError = null;
    $activeError = null;

    // keep track post values
    $name = $_POST['name'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $category = $_POST['category'];
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
        $sql1 = "INSERT INTO PRODUCT VALUES(
          DEFAULT,
         '$name',
         '$description',
         '$price',
         '$category',
         '$active')";
        $result1 = $conn->query($sql1);
        header("Location:" . BASE_URL . "/admin.php");
    }
}

?>
