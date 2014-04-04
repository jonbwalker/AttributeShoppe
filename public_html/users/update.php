<?php
require_once("../../resources/config.php");
if (!session_id()) session_start();
if (!$_SESSION['isAdmin']){
    header("Location:" . BASE_URL . "/account/login.php");
    die();
}

$nameError = $emailError = $mobileError = '';
require_once("../../resources/config.php");

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
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];
    $address = null;
    $username = $_POST['username'];
    $password = $_POST['password'];
    $admin = $_POST['admin'];
    $gender = $_POST['gender'];
    $dob = $_POST['dob'];
    $phone = $_POST['phone'];

    // validate input
    $valid = true;
    if (empty($firstname)) {
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
        $sql = "UPDATE USER SET
         FIRST_NAME = '$firstname',
         LAST_NAME = '$lastname',
         EMAIL_ADDRESS = '$email',
         USERNAME = '$username',
         PASSWORD = '$password',
         IS_ADMIN = '$admin',
         GENDER = '$gender',
         DOB = '$dob',
         PHONE = '$phone'
         WHERE ID = '$id'";
        $result = $conn->query($sql);
        header("Location:" . BASE_URL . "/users/users.php");
    }
} else {
    $conn = new mysqli('localhost', 'attrib', 'password', 'attribute_shoppe');
    $sql = "SELECT * FROM USER WHERE ID = $id";
    $result = $conn->query($sql);
    $row = $result->fetch_array(MYSQLI_ASSOC);
    $firstname = $row['FIRST_NAME'];
    $lastname = $row['LAST_NAME'];
    $email = $row['EMAIL_ADDRESS'];
//    $address = null;
    $username = $row['USERNAME'];
    $password = $row['PASSWORD'];
    $admin = $row['IS_ADMIN'];
    $gender = $row['GENDER'];
    $dob = $row['DOB'];
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
                                <label>First Name</label>
                                <input name="firstname" type="text" class="form-control" placeholder="First Name"value="<?php echo !empty($firstname) ? $firstname : ''; ?>">
                                <span class="error"><?php echo $nameError; ?></span>
                            </div>
                            <div class="form-group col-lg-4">
                                <label>Last Name</label>
                                <input name="lastname" type="text" class="form-control" placeholder="Last Name"value="<?php echo !empty($lastname) ? $lastname : ''; ?>">
                                <span class="error"><?php echo $nameError; ?></span>
                            </div>
                            <div class="form-group col-lg-4">
                                <label>Email Address</label>
                                <input name="email" type="text" class="form-control" placeholder="Email Address" value="<?php echo !empty($email) ? $email : ''; ?>">
                                <span class="help-inline"><?php echo $emailError; ?></span>
                            </div>
                            <div class="form-group col-lg-4">
                                <label>User Name</label>
                                <input name="username" type="text" class="form-control" placeholder="User Name" value="<?php echo !empty($username) ? $username : ''; ?>">
                                <span class="help-inline"><?php echo $mobileError; ?></span>
                            </div>
                            <div class="form-group col-lg-4">
                                <label>Password</label>
                                <input name="password" type="text" class="form-control" placeholder="Password" value="<?php echo !empty($password) ? $password : ''; ?>">
                                <span class="help-inline"><?php echo $mobileError; ?></span>
                            </div>
                            <div class="form-group col-lg-4">
                                <label>Admin</label>
                                <input name="admin" type="text" class="form-control" placeholder="Admin" value="<?php echo !empty($admin) ? $admin : ''; ?>">
                                <span class="help-inline"><?php echo $mobileError; ?></span>
                            </div>
                            <div class="form-group col-lg-4">
                                <label>Gender</label>
                                <input name="gender" type="text" class="form-control" placeholder="Gender" value="<?php echo !empty($gender) ? $gender : ''; ?>">
                                <span class="help-inline"><?php echo $mobileError; ?></span>
                            </div>
                            <div class="form-group col-lg-4">
                                <label>DOB</label>
                                <input name="dob" type="text" class="form-control" placeholder="DOB" value="<?php echo !empty($dob) ? $dob : ''; ?>">
                                <span class="help-inline"><?php echo $mobileError; ?></span>
                            </div>
                            <div class="form-group col-lg-4">
                                <label>Phone Number</label>
                                <input name="phone" type="text" class="form-control" placeholder="Mobile Number" value="<?php echo !empty($phone) ? $phone : ''; ?>">
                                <span class="help-inline"><?php echo $mobileError; ?></span>
                            </div>
                        <div class="form-group col-lg-12">
                            <button type="submit" class="btn crud-btn">Update</button>
                            <a class="btn btn-default" href="<?php echo BASE_URL; ?>/users/users.php">Back</a>
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
