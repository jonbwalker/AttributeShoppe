<?php
if (!session_id()) session_start();
$id = null;
if (!empty($_GET['id'])) {
    $id = $_REQUEST['id'];
}
//include("../../resources/library/phpscripts/products/update.php");
$conn = new mysqli('localhost', 'attrib', 'password', 'attribute_shoppe');
$sql = "SELECT * FROM PRODUCT WHERE CATEGORY_ID = '$id'";
$result = $conn->query($sql);


foreach($conn->query($sql) as $row) {

    echo '<div class="row">';
    echo '<div class="col col-lg-4 col-sm-6">';
    echo '<div class="thumbnail">';
    echo '<a href="public_html/products/show.php?id='.$row['ID'].'" title="courage">';
    echo '<img alt="courage" itemprop="image" src="resources/library/img/'.$row['IMAGE_NAME'].'">';
    echo '</a>';
    echo '<div class="caption">';
    echo '<h5 class="ellipsis">';
    echo '<a href="public_html/products/show.php?id='.$row['ID'].'" itemprop="url" title="Courage">';
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
}
?>