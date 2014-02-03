<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Products | Attribute Shoppe</title>

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
?>

<div class="container">

    <div class="row">

        <div class="box">
            <div class="col-lg-12">
                <hr>
                <h2 class="intro-text text-center">Products <strong>attribute shoppe</strong>
                </h2>
                <hr>
            <div class="clearfix"></div>
        </div>
    </div>
        <div class="panel">
            <div class="panel-heading">
                <h4>Categories</h4>
            </div>
            <div class="list-group list-group-flush">
                <a class="list-group-item" href="/categories/water-bottles-slash-cages">
                    <span class="badge">6</span>
                    Virtues
                </a>
                <a class="list-group-item" href="/categories/bar-tape">
                    <span class="badge">4</span>
                    Attributes
                </a>
                <a class="list-group-item" href="/categories/computers">
                    <span class="badge">5</span>
                    Enhancements
                </a>
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
