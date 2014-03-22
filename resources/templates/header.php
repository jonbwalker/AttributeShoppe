<div class="brand">Attribute Shoppe</div>
<div class="address-bar">The Plaza | 5483 Better Live Ave. | Saint Paul, MN 55107</div>

<nav class="navbar navbar-default" role="navigation">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="index.php">Attribute Shoppe</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse navbar-ex1-collapse">
            <?php
            if(isset($_SESSION['username'])){
                echo "Welcome: ", $_SESSION['username'];
            }
            ?>
            <a href="<?php echo BASE_URL; ?>/index.php"> <input id="logout" type="button" value="Logout"></a>
            <a href="<?php echo BASE_URL; ?>/login.php"> <input id="login" type="button" value="Login"></a>
            <a href="registration.php"> <input id="register" type="button" value="Register"></a>
            <ul class="nav navbar-nav">
                <li><a href="<?php echo BASE_URL; ?>/index.php">Home</a>
                </li>
                <li><a href="<?php echo BASE_URL; ?>/products.php">Products</a>
                </li>
                <li><a href="<?php echo BASE_URL; ?>/about.php">About</a>
                </li>
<!--                <li><a href="blog.php">Blog</a>-->
<!--                </li>-->
                <li><a href="contact.php">Contact</a>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Admin <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li><a href="#">Action</a></li>
                        <li><a href="#">Another action</a></li>
                        <li><a href="#">Something else here</a></li>
                        <li class="divider"></li>
                        <li><a href="#">Separated link</a></li>
                        <li class="divider"></li>
                        <li><a href="#">One more separated link</a></li>
                    </ul>
                </li>
            </ul>
        </div>

        <!-- /.navbar-collapse -->
    </div>
    <!-- /.container -->
</nav>