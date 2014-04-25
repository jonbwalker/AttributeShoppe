<?php
include("../../resources/library/phpscripts/checkout/cart.php");
include("../../resources/config.php");

if (!session_id()) session_start();
if (!$_SESSION['loggedIn']){
    header("Location:" . BASE_URL . "/account/login.php");
    die();
}

$msg='';
if (isset($_REQUEST['command'])) {
    if ($_REQUEST['command'] == 'delete' && $_REQUEST['pid'] > 0) {
        remove_product($_REQUEST['pid']);
    } else if ($_REQUEST['command'] == 'clear') {
        unset($_SESSION['cart']);
    } else if ($_REQUEST['command'] == 'update') {
        $lineItem = count($_SESSION['cart']);
        for ($i = 0; $i < $lineItem; $i++) {
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
    <link href='http://fonts.googleapis.com/css?family=Offside' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Cinzel' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Raleway:400,100' rel='stylesheet' type='text/css'>
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
            <h2 class="intro-text text-center">Shopping Cart
            </h2>
            <hr>
            <div class="col-lg-12">

                <form name="form1" method="post">
                    <input type="hidden" name="pid" />
                    <input type="hidden" name="command" />
                    <div style="margin:0px auto; width:800px;" >
                        <div style="color:#F00"><?=$msg?></div>

                        <table class="table table-striped table-bordered">                 
                            <thead>                    
                            <tr>                   

                                <th class="intro-text text-left" >Name</th>
                                <th class="intro-text text-left" >Price</th>
                                <th class="intro-text text-left" >Qty</th>
                                <th class="intro-text text-left" >Amount</th>
                                <th class="intro-text text-left" >Options</th>

                            </tr>                
                            </thead>
                            <tbody class="">
                            <?php
                            include("../../resources/library/phpscripts/checkout/list.php");?> 
                            <tr>
                                <td><b>Total: $<?= get_order_total() ?></b></td>
                            </tr>              
                            </tbody>            
                        </table>
                    </div>


                        <div class="checkout-buttons">
                            <input class="btn btn-default checkout" type="button" value="Clear Cart" onclick="clear_cart()">
                            <input class="btn btn-default checkout" type="button" value="Update Cart" onclick=" update_cart()">
                            <input class="btn btn-default checkout" type="button" value="Review Order" onclick="window.location='review.php'">
                        </div>

                    <div style="padding-bottom:10px">
                        <input class="btn btn-default checkout back-to-shopping" id="back-to-shopping" type="button" value="Back to Shopping" onclick="window.location='<?php echo BASE_URL?>/products.php'" />
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
    function delete_item(pid) {
        document.form1.pid.value = pid;
        document.form1.command.value = 'delete';
        document.form1.submit();
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