<?php
require_once("../../resources/config.php");
if (!session_id()) session_start();
if (!$_SESSION['isAdmin']){
    header("Location:" . BASE_URL . "/account/login.php");
    die();
}

$nameError = $descriptionError = $priceError = $categoryError = $activeError = '';
$uploadSuccess = false;

// populate category list
$conn = new mysqli('localhost', 'attrib', 'password', 'attribute_shoppe');
$sql = "SELECT ID, NAME, ACTIVE FROM CATEGORY";
$categoryList = $conn->query($sql);

$id = null;
if (!empty($_GET['id'])) {
    $id = $_REQUEST['id'];
}

if (null == $id) {
    header("Location: index.php");
}

if (!empty($_POST['product-submit'])) {
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

    if (empty($price)) {
        $priceError = 'Please enter a price';
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

    // update data
    if ($valid) {
        $conn = new mysqli('localhost', 'attrib', 'password', 'attribute_shoppe');
        $sql = "UPDATE PRODUCT SET
         NAME = '$name',
         DESCRIPTION = '$description',
         PRICE = '$price',
         CATEGORY_ID = '$category',
         ACTIVE = '$active'
         WHERE ID = '$id'";
        $result = $conn->query($sql);
        header("Location:" . BASE_URL . "/products/list.php");
    }
} else {
    $conn = new mysqli('localhost', 'attrib', 'password', 'attribute_shoppe');
    $sql = "SELECT * FROM PRODUCT WHERE ID = $id";
    $result = $conn->query($sql);
    $row = $result->fetch_array(MYSQLI_ASSOC);
    $name = $row['NAME'];
    $description = $row['DESCRIPTION'];
    $price = $row['PRICE'];
    $category = $row['CATEGORY_ID'];
    $active = $row['ACTIVE'];
}

if (!empty($_POST['upload-submit'])) {
    $uploadSuccess = false;
    $id = null;
    if (!empty($_GET['id'])) {
        $id = $_REQUEST['id'];
    }

    if (null == $id) {
        header("Location: index.php");
    }

    if (is_uploaded_file ($_FILES['aFile']['tmp_name'])) {
        $realName = $_FILES['aFile']['name'];
        move_uploaded_file ($_FILES['aFile']['tmp_name'], "/usr/local/zend/apache2/htdocs/AttributeShoppe/resources/library/img/".$realName );
        $uploadSuccess = true;

        if (!$conn = new mysqli('localhost', 'attrib', 'password', 'attribute_shoppe')) {
            echo "Error connecting to DB";
            exit();
        }

        $conn = new mysqli('localhost', 'attrib', 'password', 'attribute_shoppe');
        $sql = "UPDATE PRODUCT SET
         NAME = '$name',
         DESCRIPTION = '$description',
         PRICE = '$price',
         CATEGORY_ID = '$category',
         ACTIVE = '$active',
         IMAGE_NAME = '$realName'
         WHERE ID = '$id'";
        $result = $conn->query($sql);

        if (!$result)  {
            echo "Error in query";
            exit();
        }
        mysqli_close($conn);

    } else {
        echo "Error uploading";
        $uploadSuccess = false;
        exit();
    }
}
?>
