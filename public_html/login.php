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
// load config file
require_once("../resources/config.php");
// include header navigation bar
require_once(TEMPLATES_PATH . "/header.php");
// include the login processing logic
include("../resources/library/phpscripts/process-login.php")
?>

<div class="container">
    <div class="row">
        <div class="box">
            <div class="col-lg-12">
                <hr>
                <h2 class="intro-text text-center">Login <strong>form</strong>
                </h2>
                <hr>
                <form role="form" id="process-login" method="POST"
                      action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                    <div class="row">

                        <div class="form-group col-lg-4">
                            <label>UserName</label>*
                            <input type="text" class="form-control" id="username" name="username"
                                   placeholder="User Name">
                            <span class="error"></span>

                            <label>Password</label>*
                            <input type="password" class="form-control" id="password" name="password"
                                   placeholder="Password">
                            <span class="error"></span>
                        </div>

                        <div class="form-group col-lg-12">
                            <input type="hidden" name="save" value="login">
                            <button type="submit" class="btn btn-default">Submit</button>
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
<script src="../resources/library/js/jquery-1.10.2.js"></script>
<script src="../resources/library/js/bootstrap.js"></script>

</body>

</html>
GRANT ALL ON attribute_shoppe.* TO attrib@localhost IDENTIFIED BY 'password';