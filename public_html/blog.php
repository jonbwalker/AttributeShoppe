<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Blog | Attribute Shoppe</title>

    <!-- Bootstrap core CSS -->
    <link href="../resources/library/css/bootstrap.css" rel="stylesheet">

    <!-- Add custom CSS here -->
    <link href="../resources/library/css/main.css" rel="stylesheet">
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
                <h2 class="intro-text text-center">Company <strong>blog</strong>
                </h2>
                <hr>
            </div>
            <div class="col-lg-12 text-center">
                <img class="img-responsive img-border img-full" src="../resources/library/img/slide-1.jpg" alt="">
                <h2>Post Title
                    <br>
                    <small>October 13, 2013</small>
                </h2>
                <p>Lid est laborum dolo rumes fugats untras. Etharums ser quidem rerum facilis dolores nemis omnis fugats vitaes nemo minima rerums unsers sadips amets. Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.</p>
                <a href="#" class="btn btn-default btn-lg">Read More</a>
                <hr>
            </div>
            <div class="col-lg-12 text-center">
                <img class="img-responsive img-border img-full" src="../resources/library/img/slide-2.jpg" alt="">
                <h2>Post Title
                    <br>
                    <small>October 13, 2013</small>
                </h2>
                <p>Lid est laborum dolo rumes fugats untras. Etharums ser quidem rerum facilis dolores nemis omnis fugats vitaes nemo minima rerums unsers sadips amets. Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.</p>
                <a href="#" class="btn btn-default btn-lg">Read More</a>
                <hr>
            </div>
            <div class="col-lg-12 text-center">
                <img class="img-responsive img-border img-full" src="../resources/library/img/slide-3.jpg" alt="">
                <h2>Post Title
                    <br>
                    <small>October 13, 2013</small>
                </h2>
                <p>Lid est laborum dolo rumes fugats untras. Etharums ser quidem rerum facilis dolores nemis omnis fugats vitaes nemo minima rerums unsers sadips amets. Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.</p>
                <a href="#" class="btn btn-default btn-lg">Read More</a>
                <hr>
            </div>
            <div class="col-lg-12 text-center">
                <ul class="pager">
                    <li class="previous"><a href="#">&larr; Older</a>
                    </li>
                    <li class="next"><a href="#">Newer &rarr;</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>

</div>
<!-- /.container -->

<footer>
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <p>Copyright &copy; Company 2013</p>
            </div>
        </div>
    </div>
</footer>

<!-- JavaScript -->
<script src="../resources/library/js/jquery-1.10.2.js"></script>
<script src="../resources/library/js/bootstrap.js"></script>

</body>

</html>
