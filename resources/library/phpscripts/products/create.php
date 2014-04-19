<?php
if (!session_id()) session_start();
require_once("../../resources/config.php");
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
    $image = null;
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

    if (empty($category)) {
        $categoryError = 'Please choose a category';
        $valid = false;
    }

    if (empty($active)) {
        $activeError = 'Please show active indicator';
        $valid = false;
    }

    // insert data
    if ($valid) {
        $conn = new mysqli('localhost', 'attrib', 'password', 'attribute_shoppe');
        $sql1 = "INSERT INTO PRODUCT VALUES(
          DEFAULT,
         '$name',
         '$description',
         '$price',
         '$category',
         '$active',
         '$image')";

        $result1 = $conn->query($sql1);
        header("Location:" . BASE_URL . "/account/admin.php");
    }
}

?>
