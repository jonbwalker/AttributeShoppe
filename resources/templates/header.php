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
            if(isset($_SESSION['loggedIn']) && $_SESSION['loggedIn'] == 'true') {
                echo "<a href='" . BASE_URL. "/../resources/library/phpscripts/process-logout.php'> <input id='logout' class='btn btn-default' type='button' value='Logout'></a>";
            }?>
            <div>
                <a href="<?php echo BASE_URL; ?>/checkout/cart.php"> <input id='logout' class="btn btn-default checkout" type='button' value='Cart'></a>
            </div>
            <span id="session-welcome"> <?php
                if (isset($_SESSION['username'])) {
                    echo "Welcome: ", $_SESSION['username'];
                }
                ?>
           </span>
            <ul class="nav navbar-nav">
                <li><a href="<?php echo BASE_URL; ?>/index.php">Home</a></li>
                <li><a href="<?php echo BASE_URL; ?>/products.php">Products</a></li>
                <li><a href="<?php echo BASE_URL; ?>/main/about.php">About</a></li>
                <li><a href="<?php echo BASE_URL; ?>/main/contact.php">Contact</a></li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Account <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li><a href="<? echo BASE_URL; ?>/account/account.php">My Account</a></li>
                        <?php
                        if (!isset($_SESSION['username'])) {
                            echo "<li><a href=", BASE_URL, "/account/login.php>Login</a></li>";
                            echo "<li><a href=", BASE_URL, "/account/registration.php>Register</a></li>";
                        }
                        if(isset($_SESSION['isAdmin']) && $_SESSION['isAdmin'] == 'true') {
//                            echo "<li class='divider'></li>";
                            echo "<li><a href=", BASE_URL, "/account/admin.php>Admin</a></li>";
                        }?>
                    </ul>
                </li>
            </ul>
        </div>
        <!-- /.navbar-collapse -->
    </div>
    <!-- /.container -->
</nav>