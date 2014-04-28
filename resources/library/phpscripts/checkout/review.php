<?php
require_once("../../resources/config.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $_SESSION['cardnumber'] = $_POST['cardnumber'];
    $_SESSION['expiration'] = $_POST['expiration'];
    $_SESSION['ordertotal'] = get_order_total();
    header("Location:" . BASE_URL . "/checkout/confirm.php");
}

$productId = $msg = $cardNumber = $expiration = '';
if (isset($_SESSION['cart'])) {
    $lineItem = count($_SESSION['cart']);
    for ($i = 0; $i < $lineItem; $i++) {
        $productId = $_SESSION['cart'][$i]['productid'];
        $quantity = $_SESSION['cart'][$i]['qty'];
        $pname = get_product_name($productId);
        if ($quantity == 0) continue;
        ?>
        <tr>
            <td><?= $pname ?></td>
            <td>$<?= get_price($productId) ?></td>
            <td>$<?= get_price($productId) * $quantity ?>.00</td>
            <td><?= $quantity ?></td>
        </tr>

    <?}?>
    <tr>
        <td ><b>Total: $<?= get_order_total() ?></b></td>
    </tr>
<?
} else {
    echo "<tr bgColor='#FFFFFF'><p>There are no items in your shopping cart!</p>";
}

//function getUserAddress(){
//    $username = $_SESSION['username'];
//
//    $conn = new mysqli('localhost', 'attrib', 'password', 'attribute_shoppe');
//    $user = "SELECT * FROM USER WHERE USERNAME= '$username' ";
//    $result = $conn->query($user);
//    $userResults = $result->fetch_array(MYSQLI_ASSOC);
//
//    $userId = $userResults['ADDRESS_ID'];
//
//    $address = "SELECT * FROM ADDRESS WHERE ID = '$userId' ";
//    $addressQuery = $conn->query($address);
//    $addressResults = $addressQuery->fetch_array(MYSQLI_ASSOC);
//    $street = $addressResults['STREET'];
//    $city = $addressResults['CITY'];
//    $state = $addressResults['STATE'];
//    $zip = $addressResults['ZIPCODE'];
//    return compact("street", "city", "state", "zip");
//}

function getUserPaymentMethod(){
    $userId = $_SESSION['userid'];

    $conn = new mysqli('localhost', 'attrib', 'password', 'attribute_shoppe');
    $payment = "SELECT * FROM PAYMENT_METHOD WHERE USER_ID = '$userId' ";
    $paymentQuery = $conn->query($payment);
    $paymentResults = $paymentQuery->fetch_array(MYSQL_ASSOC);

    $cardnumber = $paymentResults['CARD_NUMBER'];
    $expiredate = $paymentResults['EXPIRATION_DATE'];

    return compact("cardnumber","expiredate");



}
?>