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

    <title>Attribute Shoppe</title>

    <!-- Bootstrap core CSS -->
    <link href="../resources/library/css/bootstrap.css" rel="stylesheet">

    <!-- Add custom CSS here -->
    <link href="../resources/library/css/main.css" rel="stylesheet">

    <!-- Google web fonts -->
    <link href='http://fonts.googleapis.com/css?family=Offside' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Cinzel' rel='stylesheet' type='text/css'>
</head>

<body>
<?php
// load config file
require_once("../resources/config.php");
// include header navigation bar
require_once(TEMPLATES_PATH . "/header.php");
//include("../resources/library/phpscripts/process-logout.php")
?>

<div class="container">
    <div class="row">
        <div class="box">
            <span id="logout-success">
                <?php
                    if (isset($_GET['status'])) {
                        $status = $_GET['status'];
                        if ($status == 0) {
                            echo "Logout Success";
                        } else if ($status == 0) {
                            echo "Unable to send message";
                        }
                    }?>
            </span>

            <div class="col-lg-12 text-center">
                <div id="carousel-example-generic" class="carousel slide">
                    <!-- Indicators -->
                    <ol class="carousel-indicators hidden-xs">
                        <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                        <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                        <li data-target="#carousel-example-generic" data-slide-to="2"></li>
                    </ol>
                    <?php
                    print_r($_SESSION);
                    ?>
                    <!-- Wrapper for slides -->
                    <div class="carousel-inner">
                        <div class="item active">
                            <img class="img-responsive img-full" src="../resources/library/img/slide-1.jpg" alt="">
                        </div>
                        <div class="item">
                            <img class="img-responsive img-full" src="../resources/library/img/slide-2.jpg" alt="">
                        </div>
                        <div class="item">
                            <img class="img-responsive img-full" src="../resources/library/img/slide-3.jpg" alt="">
                        </div>
                    </div>
                    <!-- Controls -->
                    <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
                        <span class="icon-prev"></span>
                    </a>
                    <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
                        <span class="icon-next"></span>
                    </a>
                </div>
                <h2>
                    <small>Welcome to</small>
                </h2>
                <h1>
                    <span class="brand-name">Attribute Shoppe</span>
                </h1>
                <hr class="tagline-divider">
                <h2>
                    <small>By <strong>Enhancements</strong></small>
                </h2>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="box">
            <div class="col-lg-12">
                <hr>
                <h2 class="intro-text text-center">Build a website <strong>worth visiting</strong>
                </h2>
                <hr>
                <img class="img-responsive img-border img-left" src="../resources/library/img/intro-pic.jpg" alt="">
                <hr class="visible-xs">
                <p>The boxes used in this template are nested inbetween a normal Bootstrap row and the start of your
                    column layout. The boxes will be full-width boxes, so if you want to make them smaller then you will
                    need to customize.</p>

                <p>A huge thanks to <a href="http://join.deathtothestockphoto.com/" target="_blank">Death to the Stock
                        Photo</a> for allowing us to use the beautiful photos that make this template really come to
                    life. When using this template, make sure your photos are decent. Also make sure that the file size
                    on your photos is kept to a minumum to keep load times to a minimum.</p>

                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc placerat diam quis nisl vestibulum
                    dignissim. In hac habitasse platea dictumst. Interdum et malesuada fames ac ante ipsum primis in
                    faucibus. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis
                    egestas.</p>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="box">
            <div class="col-lg-12">
                <hr>
                <h2 class="intro-text text-center">Beautiful boxes <strong>to showcase your content</strong>
                </h2>
                <hr>
                <p>Use as many boxes as you like, and put anything you want in them! They are great for just about
                    anything, the sky's the limit!</p>

                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc placerat diam quis nisl vestibulum
                    dignissim. In hac habitasse platea dictumst. Interdum et malesuada fames ac ante ipsum primis in
                    faucibus. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis
                    egestas.</p>
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
<script>
    // Activates the Carousel
    $('.carousel').carousel({
        interval: 5000
    })
</script>

</body>

</html>
