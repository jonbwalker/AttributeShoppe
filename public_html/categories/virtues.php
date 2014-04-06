<?php
//include("../../resources/library/phpscripts/products/update.php");
$conn = new mysqli('localhost', 'attrib', 'password', 'attribute_shoppe');
$sql = "SELECT * FROM PRODUCT";
$result = $conn->query($sql);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Products | Attribute Shoppe</title>

    <!-- Bootstrap core CSS -->
    <link href="../../resources/library/css/bootstrap.css" rel="stylesheet">

    <!-- custom CSS  -->
    <link href="../../resources/library/css/main.css" rel="stylesheet">

    <!-- Google web fonts -->
    <link href='http://fonts.googleapis.com/css?family=Revalia' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Audiowide' rel='stylesheet' type='text/css'
    <link href='http://fonts.googleapis.com/css?family=Duru+Sans' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Rock+Salt' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Offside' rel='stylesheet' type='text/css'>
    <?php
    // load config file
    require_once("../../resources/config.php");
    // include header navigation bar
    require_once(TEMPLATES_PATH . "/header.php");
    ?>
    <base href="<?php echo BASE_URL ?>"/>
</head>

<body>

<div class="container">
    <div class="row">
        <div class="box">
            <?php
            // include categories template
            require_once(TEMPLATES_PATH . "/categories.php");
            ?>
            <div class="col-lg-12">
                <hr>
                <h2 class="intro-text text-center">Virtues <strong>attribute shoppe</strong>
                </h2>
                <hr>
                <?php
                foreach($conn->query($sql) as $row) {
                echo '<div class="row">';
                    echo '<div class="col col-lg-4 col-sm-6">';
                        echo '<div class="thumbnail">';
                             echo '<a href="/resources/library/phpscripts/products/show.php?id='.$row['ID'].'" title="courage">';
                                 echo '<img alt="courage" itemprop="image" src="resources/library/img/'.$row['IMAGE_NAME'].'">';
                             echo '</a>';
                             echo '<div class="caption">';
                                 echo '<h5 class="ellipsis">';
                                     echo '<a href="/resources/library/phpscripts/products/show.php?id='.$row['ID'].'" itemprop="url" title="Courage">';
                                        echo '<span itemprop="brand">' .$row['NAME'].'</span>';
                                        echo '<span itemprop="name"></span>';
                                     echo '</a>';
                                 echo '</h5>';
                                 echo '<div itemprop="offers" itemscope itemtype="http://schema.org/Offer">';
                                     echo '<span class="label label-danger" itemprop="price">' .$row['PRICE'].'</span>';
                            echo '</div>';
                        echo '</div>';
                     echo '</div>';
                echo '</div>';
                }?>
                <!-- product -->
                <div class="row">
                    <div class="col col-lg-4 col-sm-6">
                        <div class="thumbnail">
                            <a href="/resources/library/phpscripts/products/show.php?id='.$row['ID'].'" title="courage">
                                <img alt="courage" itemprop="image" src="resources/library/img/COURAGE.png">
                            </a>
                            <div class="caption">
                                <h5 class="ellipsis">
                                    <a href="public_html/courage.php" itemprop="url"
                                       title="Courage">
                                        <span itemprop="brand">Courage</span>
                                        <span itemprop="name"></span>
                                    </a>
                                </h5>

                                <div itemprop="offers" itemscope itemtype="http://schema.org/Offer">
                                    <span class="label label-danger" itemprop="price">$2,249.00</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end product -->

                    <!-- product -->
                    <div class="col col-lg-4 col-sm-6">
                        <div class="thumbnail" itemscope itemtype="http://schema.org/Product">
                            <a href="public_html/integrity.php" title="Integrity">
                                <img alt="integrity" itemprop="image"
                                     src="resources/library/img/Integrity.jpg">
                            </a>
                            <div class="caption">
                                <h5 class="ellipsis">
                                    <a href="public_html/integrity.php" itemprop="url"
                                       title="Integrity">
                                        <span itemprop="brand">Integrity</span>
                                        <span itemprop="name"></span>
                                    </a>
                                </h5>
                                <div itemprop="offers" itemscope itemtype="http://schema.org/Offer">
                                    <span class="label label-danger" itemprop="price">$2,599.00</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end product -->

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
    <script src="../../resources/library/js/jquery-1.10.2.js"></script>
    <script src="../../resources/library/js/bootstrap.js"></script>

</body>

</html>
