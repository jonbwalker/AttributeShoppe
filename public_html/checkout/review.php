<?php
include("../../resources/library/phpscripts/checkout/cart.php");
include("../../resources/library/phpscripts/checkout/review.php");
include("../../resources/config.php");

if (!session_id()) session_start();
if (!$_SESSION['loggedIn']){
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
        <ol class="breadcrumb">
            <li><a href="<? echo BASE_URL; ?>/account/admin.php">Admin</a></li>
            <li class="active">Products</li>
        </ol>
        <div class="box">
            <hr>
            <h2 class="intro-text text-center">Order Review
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
                                <th class="intro-text text-left" >Amount</th>
                                <th class="intro-text text-left" >Qty</th>

                            </tr>                
                            </thead>
                            <tbody class="">
                            <?
                            include("../../resources/library/phpscripts/checkout/review.php");?>               
                            </tbody>            
                        </table>
                    </div>
                    <div style="padding-bottom:10px">
                        <input class="btn btn-default back-to-shopping" id="back-to-shopping" type="button" value="Back to Cart" onclick="window.location='<?php echo BASE_URL?>/checkout/cart.php'" />
                    </div>
                </form>

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