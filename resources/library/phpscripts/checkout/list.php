<?php
if (isset($_SESSION['cart'])) {
    $max = count($_SESSION['cart']);
    for ($i = 0; $i < $max; $i++) {
        $pid = $_SESSION['cart'][$i]['productid'];
        $q = $_SESSION['cart'][$i]['qty'];
        $pname = get_product_name($pid);
        if ($q == 0) continue;
        ?>
        <tr>
            <td><?= $i + 1 ?></td>
            <
            <td><?= $pname ?></td>
            <td>$<?= get_price($pid) ?></td>
            <td><input type="text" name="product<?= $pid ?>" value="<?= $q ?>" maxlength="3" size="2"/></td>
            <td>$<?= get_price($pid) * $q ?>.00</td>
            <td><a class="btn btn-danger" data-toggle="modal" data-target=".bs-example-modal-sm">Remove</a></td>
        </tr>

        //delete modal
        <div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel"
             aria-hidden="true">
            <div class="modal-dialog modal-sm">
                <div class="modal-content">
                    <div class="modal-header">
                        <a class="close" data-dismiss="modal">×</a>
                        <h4>Delete</h4>
                    </div>
                    <div class="modal-body">
                        <p>Are You Sure You Want to Remove This Product</p>
                    </div>
                    <div class="modal-footer">
                        <a href="javascript:delete_item(<?= $pid ?>)" class="btn btn-danger">Delete</a>
                        <a href="#" class="btn btn-default" data-dismiss="modal">Close</a>
                    </div>
                </div>
            </div>
        </div>
        </div>
    <? } ?>
    <tr>
        <td><b>Order Total: $<?= get_order_total() ?></b></td>
        <td colspan="5" align="right"><input class="btn btn-default" type="button" value="Clear Cart"
                                             onclick="clear_cart()"><input class="btn btn-default" type="button"
                                                                           value="Update Cart"
                                                                           onclick="update_cart()"><input
                class="btn btn-default" type="button" value="Place Order" onclick="window.location='billing.php'"></td>
    </tr>
<?
} else {
    echo "<tr bgColor='#FFFFFF'><p>There are no items in your shopping cart!</p>";
}


?>