<?php
if(is_array($_SESSION['cart'])){
    $max=count($_SESSION['cart']);
    for($i=0;$i<$max;$i++){
        $pid=$_SESSION['cart'][$i]['productid'];
        $q=$_SESSION['cart'][$i]['qty'];
        $pname=get_product_name($pid);
        if($q==0) continue;
        ?>
        <tr>
            <td><?=$i+1?></td><
            <td><?=$pname?></td>
            <td>$ <?=get_price($pid)?></td>
            <td><input type="text" name="product<?=$pid?>" value="<?=$q?>" maxlength="3" size="2" /></td>
            <td>$ <?=get_price($pid) * $q?></td>
            <td><a href="javascript:del(<?=$pid?>)">Remove</a></td>
        </tr>
    <?
    }
    ?>
    <tr><td><b>Order Total: $<?=get_order_total()?></b></td><td colspan="5" align="right"><input type="button" value="Clear Cart" onclick="clear_cart()"><input type="button" value="Update Cart" onclick="update_cart()"><input type="button" value="Place Order" onclick="window.location='billing.php'"></td></tr>
<?
}
else{
    echo "<tr bgColor='#FFFFFF'><td>There are no items in your shopping cart!</td>";
}
?>