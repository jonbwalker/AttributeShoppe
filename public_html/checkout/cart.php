<?php

include("../../resources/library/phpscripts/checkout/cart.php");

$msg='';
if (isset($_REQUEST['command'])) {
    if ($_REQUEST['command'] == 'delete' && $_REQUEST['pid'] > 0) {
        remove_product($_REQUEST['pid']);
    } else if ($_REQUEST['command'] == 'clear') {
        unset($_SESSION['cart']);
    } else if ($_REQUEST['command'] == 'update') {
        $max = count($_SESSION['cart']);
        for ($i = 0; $i < $max; $i++) {
            $pid = $_SESSION['cart'][$i]['productid'];
            $q = intval($_REQUEST['product' . $pid]);
            if ($q > 0 && $q <= 999) {
                $_SESSION['cart'][$i]['qty'] = $q;
            } else {
                $msg = 'Some proudcts not updated!, quantity must be a number between 1 and 999';
            }
        }
    }
}
?>

<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Attribute Shoppe</title>
    <!-- Bootstrap core CSS -->
    <link href="../../resources/library/css/bootstrap.css" rel="stylesheet">

    <!-- Add custom CSS here -->
    <link href="../../resources/library/css/main.css" rel="stylesheet">

    <!-- Google web fonts -->
    <link href='http://fonts.googleapis.com/css?family=Revalia' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Audiowide' rel='stylesheet' type='text/css'
    <link href='http://fonts.googleapis.com/css?family=Duru+Sans' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Rock+Salt' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Offside' rel='stylesheet' type='text/css'>
</head>

<body>
<?php
// load config file
require_once("../../resources/config.php");
// include header navigation bar
require_once(TEMPLATES_PATH . "/header.php");
?>

<div class="container">

    <div class="row">
        <ol class="breadcrumb">
            <li><a href="<?php echo BASE_URL; ?>/account/admin.php">Admin</a></li>
            <li class="active">Products</li>
        </ol>
        <div class="box">
            <hr>
            <h2 class="intro-text text-center">Products
            </h2>
            <hr>
            <div class="col-lg-12">

                <form name="form1" method="post">
                    <input type="hidden" name="pid" />
                    <input type="hidden" name="command" />
                    <div style="margin:0px auto; width:600px;" >
                        <div style="padding-bottom:10px">
                            <h1 align="center">Your Shopping Cart</h1>
                            <input type="button" value="Continue Shopping" onclick="window.location='products.php'" />
                        </div>
                        <div style="color:#F00"><?=$msg?></div>
                        <table border="0" cellpadding="5px" cellspacing="1px" style="font-family:Verdana, Geneva, sans-serif; font-size:11px; background-color:#E1E1E1" width="100%">
                            <?
                            if(is_array($_SESSION['cart'])){
                                echo '<tr bgcolor="#FFFFFF" style="font-weight:bold"><td>Serial</td><td>Name</td><td>Price</td><td>Qty</td><td>Amount</td><td>Options</td></tr>';
                                $max=count($_SESSION['cart']);
                                for($i=0;$i<$max;$i++){
                                    $pid=$_SESSION['cart'][$i]['productid'];
                                    $q=$_SESSION['cart'][$i]['qty'];
                                    $pname=get_product_name($pid);
                                    if($q==0) continue;
                                    ?>
                                    <tr bgcolor="#FFFFFF"><td><?=$i+1?></td><td><?=$pname?></td>
                                        <td>$ <?=get_price($pid)?></td>
                                        <td><input type="text" name="product<?=$pid?>" value="<?=$q?>" maxlength="3" size="2" /></td>
                                        <td>$ <?=get_price($pid)*$q?></td>
                                        <td><a href="javascript:del(<?=$pid?>)">Remove</a></td></tr>
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
                        </table>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>
<!-- /.container -->

<?php
// include header navigation bar
require_once(TEMPLATES_PATH . "/footer.php");
?>

<!-- JavaScript -->
<script src="../../resources/library/js/jquery-1.10.2.js"></script>
<script src="../../resources/library/js/bootstrap.js"></script>

</body>

</html>

<script language="javascript">
    function del(pid){
        if(confirm('Do you really mean to delete this item')){
            document.form1.pid.value=pid;
            document.form1.command.value='delete';
            document.form1.submit();
        }
    }
    function clear_cart(){
        if(confirm('This will empty your shopping cart, continue?')){
            document.form1.command.value='clear';
            document.form1.submit();
        }
    }
    function update_cart(){
        document.form1.command.value='update';
        document.form1.submit();
    }


</script>