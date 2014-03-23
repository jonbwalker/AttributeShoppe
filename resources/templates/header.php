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

            <a href="../resources/library/phpscripts/process-logout.php"> <input id="logout" type="button" value="Logout"></a>
<!--            --><?php
//            if (!isset($_SESSION['username'])) {
//                echo "<a href=",BASE_URL,"/login.php> <input id='login' type='button' value='Login'></a>";
//                echo "<a href='registration.php'> <input id='register' type='button' value='Register'></a>";
//            }
//            ?>
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
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Login <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <?php
                        if (!isset($_SESSION['username'])) {
                            echo "<li><a href=", BASE_URL, "/login.php> Login</a></li>";
                            echo "<li><a href=", BASE_URL, "/registration.php>Register</a></li>";
                            echo "<li class='divider'></li>";
                        }?>
                        <li><a href="#">Admin</a></li>
                    </ul>
                </li>
            </ul>
            <span id="session-welcome"> <?php
                if (isset($_SESSION['username'])) {
                    echo "Welcome: ", $_SESSION['username'];
                }
                ?>
           </span>
        </div>
        <!-- /.navbar-collapse -->
    </div>
    <!-- /.container -->
</nav>