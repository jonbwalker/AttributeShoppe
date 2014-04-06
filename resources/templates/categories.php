<?php
$conn = new mysqli('localhost', 'attrib', 'password', 'attribute_shoppe');
$category = "SELECT * FROM CATEGORY";
$result = $conn->query($category);


?>

<div class="panel">
    <div class="panel-heading">
        <h4>Categories</h4>
    </div>
    <div class="list-group list-group-flush">
        <?php

        foreach ($conn->query($category) as $row) {
            $id = $row['ID'];
            $product = "SELECT COUNT(*) FROM PRODUCT WHERE CATEGORY_ID = '$id'";
            $result = $conn->query($product);
            $count = $result->fetch_row();

            echo '<a class="list-group-item" href="' . BASE_URL . '/products/product.php?id='.$id.'">';
            echo '<span class="badge">'.$count[0].'</span>';
            echo $row['NAME'];
            echo '</a>';
        }?>
    </div>
</div>