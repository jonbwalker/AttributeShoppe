<?php
if (!session_id()) session_start();
include("../../resources/library/phpscripts/checkout/cart.php");
// load config file
require_once("../../resources/config.php");

//if (isset($_REQUEST['command'])) {
//    if ($_REQUEST['command'] == 'add' && $_REQUEST['productid'] > 0) {
//        $pid = $_REQUEST['productid'];
//        addtocart($pid, 1);
//        header("Location:" . BASE_URL . "/checxkout/cart.php");
//        exit();
//    }
//}
//?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Products | Attribute Shoppe</title>
<!---->
<!--    <script language="javascript">-->
<!--        function addtocart(pid){-->
<!--            document.form1.productid.value=pid;-->
<!--            document.form1.command.value='add';-->
<!--            document.form1.submit();-->
<!--        }-->
<!--    </script>-->

    <!-- Bootstrap core CSS -->
    <link href="../../resources/library/css/bootstrap.css" rel="stylesheet">

    <!-- custom CSS  -->
    <link href="../../resources/library/css/main.css" rel="stylesheet">

    <!-- Google web fonts -->
    <link href='http://fonts.googleapis.com/css?family=Offside' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Cinzel' rel='stylesheet' type='text/css'>
    <?php
    // include header navigation bar
    require_once(TEMPLATES_PATH . "/header.php");
    ?>
    <base href="<?php echo BASE_URL ?>"/>
</head>

<body>

<form name="form1">
    <input type="hidden" name="productid" />
    <input type="hidden" name="command" />
</form>

<div class="container">
    <div class="row">
        <div class="box">
            <?php
            // include categories template
            require_once(TEMPLATES_PATH . "/categories.php");
            ?>
            <div class="col-lg-12">
                <hr>
                <h2 class="intro-text text-center"> <strong>attribute shoppe</strong>
                </h2>
                <hr>
                <?php
                include("../../resources/library/phpscripts/products/product.php");
                ?>
                <div class="clearfix"></div>
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
