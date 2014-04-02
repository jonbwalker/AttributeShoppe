<?php
require_once("../../resources/config.php");
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
            <li class="active">Users</li>
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
            <p>
                <a href="create.php" class="btn btn-success">Create</a>
            </p>
            <div class="col-lg-12">
                <table class="table table-striped table-bordered">                 
                    <thead>                    
                    <tr>                   
                        <th class="intro-text text-left">ID</th>    
                        <th class="intro-text text-left" >User Name</th>
                        <th class="intro-text text-left" >Email</th>
                    </tr>                
                    </thead>
                    <tbody>
                    <?php
                    $conn = new mysqli('localhost', 'attrib', 'password', 'attribute_shoppe');
                    $sql = "SELECT ID, USERNAME, EMAIL_ADDRESS, IS_ADMIN FROM USER";
                    $result = $conn->query($sql);
                    foreach($conn->query($sql) as $row) {
                        echo '<tr>';
                        echo '<td><a class="btn" href="read.php?id='.$row['ID'].'">'.$row['ID'].'</a></td>';
                        echo '<td>' . $row['USERNAME'] . '</td>';
                        echo '<td>' . $row['EMAIL_ADDRESS'] . '</td>';
                        echo '</tr>';
                    }?>               
                    </tbody>            
                </table>
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
