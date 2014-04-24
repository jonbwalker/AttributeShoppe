<?php

$productId = $msg = '';
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

function getUserAddress(){
    $username = $_SESSION['username'];

    $conn = new mysqli('localhost', 'attrib', 'password', 'attribute_shoppe');
    $user = "SELECT * FROM USER WHERE USERNAME= '$username' ";
    $result = $conn->query($user);
    $userResults = $result->fetch_array(MYSQLI_ASSOC);

    $userId = $userResults['ADDRESS_ID'];

    $address = "SELECT * FROM ADDRESS WHERE ID = '$userId' ";
    $addressQuery = $conn->query($address);
    $addressResults = $addressQuery->fetch_array(MYSQLI_ASSOC);
    $street = $addressResults['STREET'];
    $city = $addressResults['CITY'];
    $state = $addressResults['STATE'];
    $zip = $addressResults['ZIPCODE'];
    return compact("street", "city", "state", "zip");
}
?>