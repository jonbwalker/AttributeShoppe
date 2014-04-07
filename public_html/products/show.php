<?php
session_start();
// include the create category processing logic
include("../../resources/library/phpscripts/products/show.php")
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
                <img class="img-responsive img-full" alt="courage" itemprop="image"
                     src="../../resources/library/img/<?php echo$row['IMAGE_NAME']; ?>">
                <p>Item:  <?php echo $row['NAME']; ?></p>
                <p>Price: <?php echo $row['PRICE']; ?></p>
                <p>Description:   <?php echo $row['DESCRIPTION']; ?></p>

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
