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
            <?php
            // include categories template
            require_once(TEMPLATES_PATH . "/categories.php");
            ?>
            <div class="col-lg-12">
                <hr>
                <h2 class="intro-text text-center">Attributes <strong>attribute shoppe</strong>
                </h2>
                <hr>

                <div class="col col-lg-4 col-sm-6">
                    <div class="thumbnail" itemscope itemtype="http://schema.org/Product">
                        <a href="strength.php" title="strength">
                            <img alt="strength" itemprop="image"
                                 src="../resources/library/img/STRENGTH.png">
                        </a>

                        <div class="caption">
                            <h5 class="ellipsis">
                                <a href="strength.php" itemprop="url"
                                   title="Courage">
                                    <span itemprop="brand">Strength</span>
                                    <span itemprop="name"></span>
                                </a>
                            </h5>

                            <div itemprop="offers" itemscope itemtype="http://schema.org/Offer">
                                <span class="label label-danger" itemprop="price">$5,249.00</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col col-lg-4 col-sm-6">
                    <div class="thumbnail" itemscope itemtype="http://schema.org/Product">
                        <a href="wisdom.php" title="wisdom">
                            <img alt="integrity" itemprop="image"
                                 src="../resources/library/img/WISDOM.png">
                            <!--src="http://michelewoodward.com/wp-content/uploads/2011/04/Integrity.jpg">-->
                        </a>
                        <div class="caption">
                            <h5 class="ellipsis">
                                <a href="wisdom.php" itemprop="url"
                                   title="wisdom">
                                    <span itemprop="brand">Wisdom</span>
                                    <span itemprop="name"></span>
                                </a>
                            </h5>
                            <div itemprop="offers" itemscope itemtype="http://schema.org/Offer">
                                <span class="label label-danger" itemprop="price">$3,000.00</span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="clearfix"></div>
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
