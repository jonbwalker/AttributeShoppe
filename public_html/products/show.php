<?php
if (!session_id()) session_start();
// include the create category processing logic
include("../../resources/library/phpscripts/products/show.php");
include("../../resources/library/phpscripts/checkout/cart.php");
// load config file
require_once("../../resources/config.php");

if (isset($_REQUEST['command'])) {
    if ($_REQUEST['command'] == 'add' && $_REQUEST['productid'] > 0) {
        $pid = $_REQUEST['productid'];
        addtocart($pid, 1);
        header("Location:" . BASE_URL . "/checkout/cart.php");
        exit();
    }
}
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

    <script language="javascript">
        function addtocart(pid){
            document.form1.productid.value=pid;
            document.form1.command.value='add';
            document.form1.submit();
        }
    </script>


    <!-- Google web fonts -->
    <link href='http://fonts.googleapis.com/css?family=Offside' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Raleway:400,100' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Cinzel' rel='stylesheet' type='text/css'>
</head>

<body>
<?php
// load config file
require_once("../../resources/config.php");
// include header navigation bar
require_once(TEMPLATES_PATH . "/header.php");
?>

<form name="form1">
    <input type="hidden" name="productid" />
    <input type="hidden" name="command" />
</form>

<div class="container">

    <div class="row">
        <?
        if (isset($_SESSION['isAdmin']) && $_SESSION['isAdmin'] == 'true') {
            echo '<ol class="breadcrumb">';
            echo    '<li><a href="'.BASE_URL.'/account/admin.php">Admin</a></li>';
            echo    '<li><a href="'.BASE_URL.'/products/list.php">Products</a></li>';
            echo    '<li class="active">' . $id . '</li>';
            echo '</ol>';
        }?>
        <div class="box">
            <div class="form-horizontal">

                <div class="clearfix"></div>
                <img class="img-responsive img-left" alt="courage" itemprop="image"
                     src="../../resources/library/img/<?php echo$row['IMAGE_NAME']; ?>">
                <p>Item:  <?php echo $row['NAME']; ?></p>
                <p>Price: <?php echo $row['PRICE']; ?></p>
                <p>Description:   <?php echo $row['DESCRIPTION']; ?></p>

                <input class="btn btn-default add-to-cart" type="button" value="Add to Cart" onclick="addtocart('<?php echo $row['ID']; ?>')" />
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
