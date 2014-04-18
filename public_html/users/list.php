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
            <li class="active">Users</li>
        </ol>
        <div class="box">
            <hr>
            <h2 class="intro-text text-center">Users
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
            <div class="col-lg-12">

                <!-- Delete modal -->
                <div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-sm">
                        <div class="modal-content">
                            <div class="modal-header">
                                <a class="close" data-dismiss="modal">×</a>
                                <h4 >Delete</h4>
                            </div>
                            <div class="modal-body">
                                <p>Are You Sure You Want to Delete This User</p>
                            </div>
                            <div class="modal-footer">
                                <a href="#" class="btn btn-danger">Delete</a>
                                <a href="#" class="btn btn-default" data-dismiss="modal">Close</a>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

                <table class="table table-striped table-bordered">                 
                    <thead>                    
                    <tr>                   
                        <th class="intro-text text-left">ID</th>    
                        <th class="intro-text text-left" >User Name</th>
                        <th class="intro-text text-left" >Email</th>
                        <th class="intro-text text-left" >Interact</th>

                    </tr>                
                    </thead>
                    <tbody class="">
                    <?php
                    include("../../resources/library/phpscripts/users/list.php");?>               
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
