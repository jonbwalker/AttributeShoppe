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
    <?
    }
} else {
    echo "<tr bgColor='#FFFFFF'><p>There are no items in your shopping cart!</p>";
}
?>