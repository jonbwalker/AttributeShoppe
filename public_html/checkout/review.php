<?php
include("../../resources/library/phpscripts/checkout/cart.php");
include("../../resources/library/phpscripts/checkout/review.php");
include("../../resources/config.php");

if (!session_id()) session_start();
if (!$_SESSION['loggedIn']) {
    header("Location:" . BASE_URL . "/account/login.php");
    die();
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
<?
// include header navigation bar
require_once(TEMPLATES_PATH . "/header.php");
?>

<div class="container">

    <div class="row">
        <div class="box">
            <hr>
            <h2 class="intro-text text-center">Order Review
            </h2>
            <hr>

            <form name="form1"method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                <input type="hidden" name="pid"/>
                <input type="hidden" name="command"/>

                <div id="review-order">
                    <div style="color:#F00"><?= $msg ?></div>

                    <h4 class="inline">Products</h4>
                    <table class="table table-striped table-bordered">                 
                        <thead>                    
                        <tr>                   
                            <th class="intro-text text-left">Name</th>
                            <th class="intro-text text-left">Price</th>
                            <th class="intro-text text-left">Amount</th>
                            <th class="intro-text text-left">Qty</th>
                        </tr>
                                        
                        </thead>
                        <tbody class="">
                        <?
                        include("../../resources/library/phpscripts/checkout/review.php");?>               
                        </tbody>
                                    
                    </table>
                </div>

                <div id="review-address">
                    <div style="color:#F00"><?= $msg ?></div>


                    <h4 class="inline">Billing Address</h4>
                    <table class="table table-striped table-bordered">                 
                        <thead>                    
                        <tr>                   
                            <th class="intro-text text-left">Street</th>
                            <th class="intro-text text-left">City</th>
                            <th class="intro-text text-left">Street</th>
                            <th class="intro-text text-left">Zip</th>
                        </tr>
                                        
                        </thead>
                        <tbody class="">
                        <? $addressArray = getUserAddress() ?>
                        <tr>
                            <td><? print_r($addressArray["street"]) ?></td>
                            <td><? print_r($addressArray["city"]) ?></td>
                            <td><? print_r($addressArray["state"]) ?></td>
                            <td><? print_r($addressArray["zip"]) ?></td>
                        </tr>
                                       
                        </tbody>
                                    
                    </table>
                </div>

                    <div id="review-payment">
                        <div style="color:#F00"><?= $msg ?></div>

                        <h4>Payment Details</h4>
                        <?$cardInfoArray = getUserPaymentMethod()?>
                        <div class="row">
                            <div class="form-group col-lg-3">
                                <label>Card Number</label>*
                                <input type="text" class="form-control" name="cardnumber" id="cardnumber" value="<?echo $cardInfoArray['cardnumber']; ?>" placeholder="" ng-model="first">
                            </div>
                            <div class="form-group col-lg-3">
                                <label>Expiration Date</label>*
                                <input date type="text" class="form-control" name="expiration" id="expiration" value="<? echo $cardInfoArray['expiredate']; ?>" placeholder="MM/YY" ng-model="last">
                            </div>
                        </div>
                    </div>

                <div class="checkout-buttons" id="order-placed">
                    <input class="btn btn-default checkout" type="submit" value="Confirm Order">
                </div>
            </form>

            <div style="padding-bottom:10px;">
                <input class="btn btn-default checkout back-to-shopping" id="back-to-shopping" type="button" value="Back to Cart"
                       onclick="window.location='<?php echo BASE_URL ?>/checkout/cart.php'"/>
            </div>
        </div>
    </div>
</div>
<!-- /.container -->

<?
// include header navigation bar
require_once(TEMPLATES_PATH . "/footer.php");
?>

<!-- JavaScript -->
<script src="../../resources/library/js/jquery-1.10.2.js"></script>
<script src="../../resources/library/js/bootstrap.js"></script>

</body>

</html>