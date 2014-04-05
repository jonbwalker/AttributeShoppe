<?php
require_once("../resources/config.php");
if (!session_id()) session_start();
if (!$_SESSION['isAdmin']){
    header("Location:" . BASE_URL . "/account/login.php");
    die();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Attribute Shoppe</title>

    <!-- Bootstrap core CSS -->
    <link href="../resources/library/css/bootstrap.css" rel="stylesheet">

    <!-- Add custom CSS here -->
    <link href="../resources/library/css/main.css" rel="stylesheet">

    <!-- Google web fonts -->
    <link href='http://fonts.googleapis.com/css?family=Revalia' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Audiowide' rel='stylesheet' type='text/css'
    <link href='http://fonts.googleapis.com/css?family=Duru+Sans' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Rock+Salt' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Offside' rel='stylesheet' type='text/css'>
</head>

<body>
<?php
// include header navigation bar
require_once(TEMPLATES_PATH . "/header.php");
?>

<div class="container">
    <div class="row">
        <div class="box">
            <div class="col-lg-12">
                <hr>
                <h2 class="intro-text text-center">Admin
                </h2>
                <hr>
            </div>
            <div class="panel-heading text-center">
                <?php
                if (isset($_SESSION['username'])) {
                echo  "Administrator: ", $_SESSION['username'];
                }
                ?>
            </div>
            <div class="list-group col-lg-4">
                <p class="list-group-item active">Users</p>
                <a href="<?php echo BASE_URL; ?>/users/list.php" class="list-group-item">View All Users</a>
                <a href="#" class="list-group-item">Create New User</a>
            </div>
            <div class="list-group col-lg-4">
                <p class="list-group-item active">Categories</p>
                <a href="<?php echo BASE_URL; ?>/categories/list.php" class="list-group-item">View All Categories</a>
                <a href="<?php echo BASE_URL; ?>/categories/create.php" class="list-group-item">Create New Category</a>
            </div>

            <div class="list-group col-lg-4">
                <p class="list-group-item active">Products</p>
                <a href="<?php echo BASE_URL; ?>/products/list.php" class="list-group-item">View All Products</a>
                <a href="<?php echo BASE_URL; ?>/products/create.php" class="list-group-item">Create New Product</a>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
</div>
<!-- /.container -->

<?php
// include header navigation bar
require_once(TEMPLATES_PATH . "/footer.php");
?>

<!-- JavaScript -->
<script src="../resources/library/js/jquery-1.10.2.js"></script>
<script src="../resources/library/js/bootstrap.js"></script>

</body>

</html>
