<?php
require_once("../../resources/config.php");

if (!session_id()) session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user = $_SESSION['userid'];
    $creditcard = $_SESSION['cardnumber'];
    $expiration = $_SESSION['expiration'];
    $ordertotal = $_SESSION['ordertotal'];
    $cart = $_SESSION['cart'];
    $paymentId = 1;
    $confirmation = mt_rand(100000, 999999);
    $_SESSION['confirmation'] = $confirmation;

    $conn = new mysqli('localhost', 'attrib', 'password', 'attribute_shoppe');

    $order = "INSERT INTO ORDERS VALUES(
          DEFAULT,
          DEFAULT,
         '$user',
         '$confirmation')";
    $conn->query($order);
    $orderId = $conn->insert_id;

//    $payment = "INSERT INTO PAYMENT_METHOD VALUES(
//          DEFAULT,
//          '$user',
//          '$creditcard',
//         '$expiration')";
//    $conn->query($payment);
//    $paymentId = $conn->insert_id;

    $orderpayment = "INSERT INTO ORDER_PAYMENT VALUES(
           DEFAULT,
          '$orderId',
          '$ordertotal',
          '$paymentId')";
    $conn->query($orderpayment);


    $statement = $conn->prepare("INSERT INTO ORDER_DETAIL VALUES (DEFAULT ,?,?,?)");
    var_dump($conn->error);
    $statement->bind_param('iii', $quantity, $orderId, $productid);

    foreach($cart as $items) {
        $quantity = $items['qty'];
        $productid = $items['productid'];
        $statement->execute();
    }
    header("Location:" . BASE_URL . "/checkout/confirmation.php");
}
