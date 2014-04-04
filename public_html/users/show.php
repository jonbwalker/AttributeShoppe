<?php
include("../../resources/library/phpscripts/users/show.php")
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
        <ol class="breadcrumb">
            <li><a href="<?php echo BASE_URL; ?>/admin.php">Admin</a></li>
            <li><a href="<?php echo BASE_URL; ?>/users/list.php">Users</a></li>
            <li class="active"><?php echo $id ?></li>
        </ol>
        <div class="box">
            <div><span id="login-success-users"><?php
                    if (isset($_GET['status'])) {
                        $status = $_GET['status'];
                        if ($status == 1) {
                            echo "Login Success";
                        } else if ($status == 0) {
                            echo "Unable to send message";
                        }
                    }
                    ?> </span>
            </div>
            <div class="form-horizontal">

                <div class="control-group">
                    <p class="show">First Name: </p>

                    <div class="show-data">
                        <?php echo $row['FIRST_NAME']; ?>
                    </div>
                </div>

                </label>
                <div class="control-group">
                    <p class="show">Last Name:</p>

                    <label class="show-data">
                        <?php echo $row['LAST_NAME']; ?>
                    </label>
                </div>

                <div class="control-group">
                    <p class="show">Email Address:</p>

                    <label class="show-data">
                    <?php echo $row['EMAIL_ADDRESS']; ?>

                </div>

                <div class="control-group">
                    <p class="show">Username:</p>

                        <label class="show-data">
                            <?php echo $row['USERNAME']; ?>
                        </label>
                </div>

                <div class="control-group">
                    <p class="show">Password:</p>

                        <label class="show-data">
                            <?php echo $row['PASSWORD']; ?>
                        </label>
                </div>

                <div class="control-group">
                    <p class="show">Admin:</p>

                        <label class="show-data">
                            <?php echo $row['IS_ADMIN']; ?>
                        </label>
                </div>

                <div class="control-group">
                    <p class="show">Gender:</p>

                        <label class="show-data">
                            <?php echo $row['GENDER']; ?>
                        </label>
                </div>

                <div class="control-group">
                    <p class="show">DOB:</p>

                        <label class="show-data">
                            <?php echo $row['DOB']; ?>
                        </label>
                </div>

                <div class="control-group">
                    <p class="show">Phone:</p>

                        <label class="show-data">
                            <?php echo $row['PHONE']; ?>
                        </label>
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