<?php
$nameError = $emailError = $mobileError = '';
require_once("../../resources/config.php");
if (!session_id()) session_start();
if (!$_SESSION['isAdmin']) {
    header("Location:" . BASE_URL . "/account/login.php");
    die();
}

$id = null;
if (!empty($_GET['id'])) {
    $id = $_REQUEST['id'];
}

if (null == $id) {
    header("Location: index.php");
}

if (!empty($_POST)) {
    // keep track validation errors
    $nameError = null;
    $emailError = null;
    $mobileError =  null;

    // keep track post values
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];

    // validate input
    $valid = true;
    if (empty($name)) {
        $nameError = 'Please enter Name';
        $valid = false;
    }

    if (empty($email)) {
        $emailError = 'Please enter Email Address';
        $valid = false;
    } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $emailError = 'Please enter a valid Email Address';
        $valid = false;
    }

    if (empty($phone)) {
        $mobileError = 'Please enter Phone Number';
        $valid = false;
    }

    // update data
    if ($valid) {
        $conn = new mysqli('localhost', 'attrib', 'password', 'attribute_shoppe');
        $sql = "UPDATE USER SET FIRST_NAME = '$name', EMAIL_ADDRESS = '$email', PHONE = '$phone' WHERE ID = '$id'";
        $result = $conn->query($sql);
        header("Location:" . BASE_URL . "/users/users.php");
    }
} else {
    $conn = new mysqli('localhost', 'attrib', 'password', 'attribute_shoppe');
    $sql = "SELECT * FROM USER WHERE ID = $id";
    $result = $conn->query($sql);
    $row = $result->fetch_array(MYSQLI_ASSOC);
    $name = $row['FIRST_NAME'];
    $email = $row['EMAIL_ADDRESS'];
    $phone = $row['PHONE'];
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
            <hr>
            <h2 class="intro-text text-center">Update <strong>User</strong>
            </h2>
            <hr>
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
                <form role="form" id="form-horizontal" action="update.php?id=<?php echo $id ?>" method="post">
                    <div class="row">
                            <div class="form-group col-lg-4">
                                <label>Name</label>
                                <input name="name" type="text" class="form-control" placeholder="Name"value="<?php echo !empty($name) ? $name : ''; ?>">
                                <span class="error"><?php echo $nameError; ?></span>
                            </div>
                            <div class="form-group col-lg-4">
                                <label>Email Address</label>
                                <input name="email" type="text" class="form-control" placeholder="Email Address" value="<?php echo !empty($email) ? $email : ''; ?>">
                                <span class="help-inline"><?php echo $emailError; ?></span>
                            </div>
                            <div class="form-group col-lg-4">
                                <label>Mobile Number</label>
                                <input name="phone" type="text" class="form-control" placeholder="Mobile Number" value="<?php echo !empty($phone) ? $phone : ''; ?>">
                                <span class="help-inline"><?php echo $mobileError; ?></span>
                            </div>
                        <div class="form-group col-lg-12">
                            <button type="submit" class="btn btn-success">Update</button>
                            <a class="btn btn-primary" href="<?php echo BASE_URL; ?>/users/users.php">Back</a>
                        </div>
                    </div>
                </form>
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
