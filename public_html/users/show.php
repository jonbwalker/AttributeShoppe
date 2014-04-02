<?php
require_once("../../resources/config.php");
if (!session_id()) session_start();
if (!$_SESSION['isAdmin']){
    header("Location:" . BASE_URL . "/account/login.php");
    die();
}

$id = null;
if (!empty($_GET['id'])) {
    $id = $_REQUEST['id'];
}

if (null == $id) {
    header("Location: index.php");
} else {
    $conn = new mysqli('localhost', 'attrib', 'password', 'attribute_shoppe');
    $sql = "SELECT * FROM USER WHERE ID = $id";
    $result = $conn->query($sql);
    $row = $result->fetch_array(MYSQLI_ASSOC);
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
            <li><a href="<?php echo BASE_URL; ?>/users/users.php">Users</a></li>
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
                    <label class="control-label">Name</label>

                    <div class="controls">
                        <label class="checkbox">
                            <?php echo $row['FIRST_NAME']; ?>
                        </label>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label">Email Address</label>

                    <div class="controls">
                        <label class="checkbox">
                            <?php echo $row['EMAIL_ADDRESS']; ?>
                        </label>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label">Password</label>

                    <div class="controls">
                        <label class="checkbox">
                            <?php echo $row['PASSWORD']; ?>
                        </label>
                    </div>
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

<!-- JavaScript -->
<script src="../resources/library/js/jquery-1.10.2.js"></script>
<script src="../resources/library/js/bootstrap.js"></script>

</body>

</html>