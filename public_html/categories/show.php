<?php
session_start();
// include the create category processing logic
include("../../resources/library/phpscripts/categories/show.php")
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
        <ol class="breadcrumb">
            <li><a href="<?php echo BASE_URL; ?>/account/admin.php">Admin</a></li>
            <li><a href="<?php echo BASE_URL; ?>/categories/list.php">Categories</a></li>
            <li class="active"><?php echo $id ?></li>
        </ol>
        <div class="box">
            <div class="form-horizontal">

                <div class="control-group">
                    <p class="show">Name: </p>

                    <div class="show-data">
                        <?php echo $row['NAME']; ?>
                    </div>
                </div>

                </label>
                <div class="control-group">
                    <p class="show">Description:</p>

                    <label class="show-data">
                        <?php echo $row['DESCRIPTION']; ?>
                    </label>
                </div>

                <div class="control-group">
                    <p class="show">Active</p>

                    <label class="show-data">
                    <?php echo $row['ACTIVE']; ?>

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
