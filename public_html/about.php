<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>About | Attribute Shoppe</title>

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
                <h2 class="intro-text text-center">About <strong>attribute shoppe</strong>
                </h2>
                <hr>
            </div>
            <div class="col-md-6">
                <img class="img-responsive img-border-left" src="../resources/library/img/Attributes900x350.png" alt="">
            </div>
            <div class="col-md-6">
                <p>The Attribute Shoppe project is a prototype that sells units of attributes that will
                directly enhance you in areas such as <strong>Honor</strong>, <strong>Strength</strong>,
                    <strong>Integrity</strong>, <strong>Focus</strong>and many more.
                    Take a look for yourself.
                </p>

                <p>Lid est laborum dolo rumes fugats untras. Etharums ser quidem rerum facilis dolores nemis omnis
                    fugats vitaes nemo minima rerums unsers sadips amets.</p>

                <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium,
                    totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae
                    dicta sunt explicabo.</p>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>

    <div class="row">
        <div class="box">
            <div class="col-lg-12">
                <hr>
                <h2 class="intro-text text-center">Our <strong>Team</strong>
                </h2>
                <hr>
            </div>
            <div class="col-sm-4 text-center">
                <img class="img-responsive" src="http://placehold.it/750x450" alt="">

                <h3>John Smith
                    <small>Job Title</small>
                </h3>
            </div>
            <div class="col-sm-4 text-center">
                <img class="img-responsive" src="http://placehold.it/750x450" alt="">

                <h3>John Smith
                    <small>Job Title</small>
                </h3>
            </div>
            <div class="col-sm-4 text-center">
                <img class="img-responsive" src="http://placehold.it/750x450" alt="">

                <h3>John Smith
                    <small>Job Title</small>
                </h3>
            </div>
            <div class="clearfix"></div>
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
