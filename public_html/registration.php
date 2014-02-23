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
    <link href="../resources/library/css/datepicker.css" rel="stylesheet">

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
                <h2 class="intro-text text-center">Registration <strong>form</strong>
                </h2>
                <hr>
                <p>Personal Info</p>
                <div class="form-group">
                    (*) = Required Fields
                </div>
                <form role="form" id="registration-form" method="POST" action="registration-form-submission.php">
                    <div class="row">
                        <div class="form-group col-lg-4">
                            <label>First Name</label>*
                            <input type="text" class="form-control" name="firstName" id="firstName" placeholder="First Name">
                        </div>
                        <div class="form-group col-lg-4">
                            <label>Last Name</label>*
                            <input type="text" class="form-control" name="lastName" id="lastName" placeholder="Last Name">
                        </div>
                        <div class="form-group col-lg-4">
                            <label>Email Address</label>*
                            <input type="email" class="form-control" name="email" id="email" placeholder="yourname@domain.com">
                        </div>
                        <div class="form-group col-lg-4">
                            <label>Phone Number</label>*
                            <input type="tel" class="form-control" name="phone" data-name="phone" placeholder="xxx-xxx-xxxxx">
                        </div>
                        <div class="form-group col-lg-4" id="dp3" data-date="12-02-2012" data-date-format="dd-mm-yyyy">
                            <label>DOB</label>*
                            <input name="dob" id="dp1" class="form-control" size="16" type="text" value="01-01-1980">
                            <span class="add-on"><i class="icon-th"></i></span>
                        </div>

                        <div class="form-group col-lg-4">
                            <label>Sex</label><br>
                            <fieldset>
                                <input type="radio" name="sex" value="male"> Male<br>
                                <input type="radio" name="sex" value="female"> Female
                            </fieldset>
                            <label  for="sex" class="error"></label>
                        </div>

<!--                        <div class="form-group col-lg-4">-->
<!--                            <div class="btn-group">-->
<!--                                <lable>Sex</lable><br>-->
<!--                                <button type="button" class="btn btn-default" name="sex" value="male" >Male</button>-->
<!--                                <button type="button" class="btn btn-default" name="sex" value="female" >Female</button>-->
<!--                            </div>-->
<!--                        </div>-->

                        <div class="clearfix"></div>

                        <p>Login Info</p>
                        <div class="form-group col-lg-4">
                            <label>UserName</label>*
                            <input type="text" class="form-control" id="username" name="username" placeholder="User Name">
                        </div>
                        <div class="form-group col-lg-4">
                            <label>Password</label>*
                            <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                        </div>

                        <div class="clearfix"></div>
                        <p>Misc</p>
                        <div class="form-group col-lg-4">
                            <label>Pirate OR Ninja</label>
                            <select class="form-control">
                                <option label="pirate">Pirate</option>
                                <option label="ninja">Ninja</option>
                            </select>
                        </div>

                        <div class="form-group col-lg-4">
                            <div class="btn-group">
                                <lable>Race</lable><br>
                                <button type="button" class="btn btn-default" name="race" value="timelord" >Time Lord</button>
                                <button type="button" class="btn btn-default" name="race" value="dalek" >Dalek</button>
                                <button type="button" class="btn btn-default" name="race" value="shadow" >The Shadow</button>
                                <button type="button" class="btn btn-default" name="race" value="sycorax" >Sycorax</button>
                                <button type="button" class="btn btn-default" name="race" value="catkind" >Catkind</button>
                                <button type="button" class="btn btn-default" name="race" value="cyberman" >Cyberman</button>
                                <button type="button" class="btn btn-default" name="race" value="ood" >Ood</button>
                                <button type="button" class="btn btn-default" name="race" value="blood" >Family of Blood</button>
                                <button type="button" class="btn btn-default" name="race" value="nerada" >Vashta Nerada</button>
                                <button type="button" class="btn btn-default" name="race" value="sontaran" >Sontaran</button>
                            </div>
                        </div>


                        <div class="clearfix"></div>
                        <div class="form-group col-lg-12">
                            <label>Message</label>
                            <textarea class="form-control" rows="6" id="message" name="message"></textarea>
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

</div>
<!-- /.container -->

<?php
// include header navigation bar
require_once(TEMPLATES_PATH . "/footer.php");
?>

<!-- JavaScript -->
<script src="../resources/library/js/jquery-1.10.2.js"></script>
<script src="../resources/library/js/bootstrap.js"></script>
<script src="../resources/library/js/bootstrap-datepicker.js"></script>
<script src="../resources/library/js/form-validation.js"></script>
<script src="../resources/library/js/jquery.validate.js"></script>
<script src="../resources/library/js/additional-methods.js"></script>
<script>
    $('#dp1').datepicker({
        format: 'mm-dd-yyyy'
    });
</script>
</body>

</html>
