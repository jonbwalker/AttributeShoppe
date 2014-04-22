<?php
$productId = '';
if(isset($_SESSION['cart'])) {
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
            <td><input type="text" name="product<?= $productId ?>" value="<?= $quantity ?>" maxlength="3" size="2"/></td>
            <td>$<?= get_price($productId) * $quantity ?>.00</td>
            <td><a class="btn btn-default remove" data-toggle="modal" data-target=".bs-example-modal-sm">Remove</a></td>
        </tr>
    <? } ?>

    <!--delete modal-->
    <div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel"
         aria-hidden="true">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <a class="close" data-dismiss="modal">×</a>
                    <h4>Remove</h4>
                </div>
                <div class="modal-body">
                    <p>Are You Sure You Want to Remove This Product</p>
                </div>
                <div class="modal-footer">
                    <a href="javascript:delete_item(<?= $productId ?>)" class="btn btn-danger">Delete</a>
                    <a href="#" class="btn btn-default" data-dismiss="modal">Close</a>
                </div>
            </div>
        </div>
    </div>

    <tr>
        <td><b>Total: $<?= get_order_total() ?></b></td>
        <td colspan="5" align="right"><input class="btn btn-default checkout" type="button" value="Clear Cart"
                                             onclick="clear_cart()"><input class="btn btn-default checkout" type="button"
                                                                           value="Update Cart" onclick="update_cart()"><input
                class="btn btn-default checkout" type="button" value="Review Order" onclick="window.location='review.php'"></td>
    </tr>
<?
} else {
    echo "<tr bgColor='#FFFFFF'><p>There are no items in your shopping cart!</p>";
}
?>