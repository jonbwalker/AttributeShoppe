<?php
require_once("../../resources/config.php");
if (!session_id()) session_start();
if (!$_SESSION['loggedIn']){
    header("Location:" . BASE_URL . "/account/login.php");
    die();
}

$id = null;
if (!empty($_GET['id'])) {
    $id = $_REQUEST['id'];
}

if (null == $id) {
    header("Location:" . BASE_URL . "/index.php");
} else {
    $conn = new mysqli('localhost', 'attrib', 'password', 'attribute_shoppe');
    $orderdetail = "SELECT * FROM ORDER_DETAIL WHERE ORDER_ID = $id";
    $orderresult = $conn->query($orderdetail);
    $orderdetails = $orderresult->fetch_array(MYSQLI_ASSOC);

    $productId =   $orderdetails['PRODUCT_ID'];

    $orderpayment = "SELECT * FROM ORDER_PAYMENT WHERE ORDER_ID = $id";
    $paymentresult = $conn->query($orderpayment);
    $paymentdetails = $paymentresult->fetch_array(MYSQLI_ASSOC);




}
?>
