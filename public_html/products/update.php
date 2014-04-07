<?php
session_start();
// include the create product processing logic
include("../../resources/library/phpscripts/products/update.php");
$uploadError = false;

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
    <link href="../../resources/library/css/bootstrap.css" rel="stylesheet">

    <!-- Add custom CSS here -->
    <link href="../../resources/library/css/main.css" rel="stylesheet">

    <!-- Google web fonts -->
    <link href='http://fonts.googleapis.com/css?family=Revalia' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Audiowide' rel='stylesheet' type='text/css'
    <link href='http://fonts.googleapis.com/css?family=Duru+Sans' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Rock+Salt' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Offside' rel='stylesheet' type='text/css'>
</head>

<body>
<?php
// include header navigation bar
require_once(TEMPLATES_PATH . "/header.php");
?>

<div class="container">

    <div class="row">
        <ol class="breadcrumb">
            <li><a href="<?php echo BASE_URL; ?>/account/admin.php">Admin</a></li>
            <li><a href="<?php echo BASE_URL; ?>/products/list.php">Products</a></li>
            <li class="active"><?php echo $id ?></li>
        </ol>
        <div class="box">
            <hr>
            <h2 class="intro-text text-center">Update <strong><?php echo !empty($row) ? $row['NAME'] : 'Product'; ?></strong>
            </h2>
            <hr>
            <div><span id="login-success-users"><?php
                    if($uploadError = false){
                    echo "Upload Success";
                    }?>

                </span>
            </div>
            <form role="form" id="form-horizontal" action="update.php?id=<?php echo $id ?>" method="post">
                <div class="row">
                    <div class="form-group col-lg-4">
                        <label>Name</label>
                        <input name="name" type="text" class="form-control" placeholder="Product Name"value="<?php echo !empty($name) ? $name : ''; ?>">
                        <span class="help-block form-error"><?php echo $nameError; ?></span>
                    </div>
                    <div class="form-group col-lg-4">
                        <label>Description</label>
                        <input name="description" type="text" class="form-control" placeholder="Description"value="<?php echo !empty($description) ? $description : ''; ?>">
                        <span class="help-block form-error"><?php echo $descriptionError; ?></span>
                    </div>
                    <div class="form-group col-lg-4">
                        <label>Price</label>
                        <input name="price" type="text" class="form-control" placeholder="Price" value="<?php echo !empty($price) ? $price : ''; ?>">
                        <span class="help-block form-error"><?php echo $priceError; ?></span>
                    </div>
                    <div class="form-group col-lg-4">
                        <label>Category</label>     <br />
                        <select name="category">
                            <option value="">Select Category</option>
                            <?
                            while ($row = $categoryList->fetch_array(MYSQLI_ASSOC)) {
                                echo "<option value=" . $row['ID'] . ">" . $row['NAME'] . "</option>";
                            }
                            ?>
                        </select>
                        <span class="help-block form-error"><?php echo $categoryError; ?></span>
                    </div>
                    <div class="form-group col-lg-4">
                        <label>Active</label>
                        <input name="active" type="text" class="form-control" placeholder="Active" value="<?php echo !empty($active) ? $active : ''; ?>">
                        <span class="help-inline"><?php echo $activeError; ?></span>
                    </div>
                    <div class="form-group col-lg-12">
                        <input type="submit" class="btn crud-btn" name="product-submit" value="Update">
                        <a class="btn btn-default" href="<?php echo BASE_URL; ?>/products/list.php">Back</a>
                    </div>
                </div>
            </form>

            <label>Upload Image</label>
            <form role="form" method ="post" action="update.php?id=<?php echo $id ?>" enctype="multipart/form-data">
                <input type="hidden" name="MAX_FILE_SIZE" value="2000000">
                <input type="hidden" value="<?echo $id ?>">
                <input type="file"  name="aFile" size="40">  <br />
                <input type="submit" class="btn crud-btn" name="upload-submit" value="Upload">
            </form>

        </div>
    </div>
</div>
<!-- /.container -->