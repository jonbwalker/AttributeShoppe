<?php
session_start();
// include the create category processing logic
include("../../resources/library/phpscripts/orders/show.php")
?>
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
<!--        <ol class="breadcrumb">-->
<!--            <li><a href="--><?php //echo BASE_URL; ?><!--/account/admin.php">Admin</a></li>-->
<!--            <li><a href="--><?php //echo BASE_URL; ?><!--/categories/list.php">Categories</a></li>-->
<!--            <li class="active">--><?php //echo $id ?><!--</li>-->
<!--        </ol>-->
        <div class="box">
            <div class="form-horizontal">

                <div class="col-lg-12">
                    <hr>
                    <h2 class="intro-text text-center">Order: <?php echo $orders['CONFIRMATION']; ?><br>
                    </h2>
                    <hr>
                    <div id="review-order">
                        <h4 style="display: inline;">Products</h4>
                        <table class="table table-striped table-bordered">                 
                            <thead>                    
                            <tr>                   
                                <th class="intro-text text-left">Name</th>
                                <th class="intro-text text-left">Price</th>
                                <th class="intro-text text-left">Qty</th>
                            </tr>
                                            
                            </thead>
                            <? foreach($conn->query($orderdetail) as $row){
                            $productId = $row['PRODUCT_ID'];
                            $product = "SELECT * FROM PRODUCT WHERE ID = $productId";
                            $prductresults = $conn->query($product);
                            $products = $prductresults->fetch_array(MYSQLI_ASSOC);
                            ?>

                            <tbody class="">
                            <tr>
                                <td> <?php echo $products['NAME']; ?></td>
                                <td><?php echo $products['PRICE']; ?></td>
                                <td><?php echo $row['QUANTITY']; ?></td>
                            </tr>
                            <?}?>
                            <tr>
                                <td><b>Total: $<?= $paymentdetails['AMOUNT'] ?></b></td>
                            </tr>               
                            </tbody>
                                        
                        </table>
                    </div>
            </div>

        </div>
    </div>
</div>
<!-- /.container -->

<?php
// include header navigation bar
require_once(TEMPLATES_PATH . "/footer.php");
?>

</body>
