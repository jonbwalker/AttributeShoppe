<?php
require_once("../../resources/config.php");
if (!session_id()) session_start();
if (!$_SESSION['loggedIn']){
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
        <div class="box">
            <hr>
            <h2 class="intro-text text-center">Orders
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

                <table class="table table-striped table-bordered">                 
                    <thead>                    
                    <tr>               
                        <?if(isset($_SESSION['isAdmin']) && $_SESSION['isAdmin'] == 'true'){
                            echo "<th class='intro-text text-left'>User</th>";
                        }?>
                            
                        <th class="intro-text text-left">ID</th>    
                        <th class="intro-text text-left" >Order #</th>
                        <th class="intro-text text-left" >View</th>
                    </tr>                
                    </thead>
                    <tbody class="">
                    <?php
                    include("../../resources/library/phpscripts/orders/list.php");?>
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
