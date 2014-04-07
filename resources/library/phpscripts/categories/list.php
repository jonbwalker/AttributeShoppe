<?php
if (!session_id()) session_start();
if (!$_SESSION['isAdmin']){
    header("Location:" . BASE_URL . "/account/login.php");
    die();
}
$conn = new mysqli('localhost', 'attrib', 'password', 'attribute_shoppe');
$sql = "SELECT ID, NAME, ACTIVE FROM CATEGORY";
$result = $conn->query($sql);
foreach($conn->query($sql) as $row) {
    echo '<tr>';
    echo '<td>' . $row['ID'] .'</td>';
    echo '<td>' . $row['NAME'] . '</td>';
    echo '<td>' . $row['ACTIVE'] . '</td>';
    echo '<td width=250>';
    echo '<a class="btn btn-default" href="show.php?id='.$row['ID'].'">Read</a>';
    echo ' ';
    echo '<a class="btn btn-default crud-btn" href="update.php?id='.$row['ID'].'">Update</a>';
    echo ' ';
    echo '<a class="btn btn-danger" data-toggle="modal" data-target=".bs-example-modal-sm">Delete</a>';
    echo '</td>';
    echo '</tr>';
}
echo '<div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">';
echo '<div class="modal-dialog modal-sm">';
echo '<div class="modal-content">';
echo '<div class="modal-header">';
echo '<a class="close" data-dismiss="modal">×</a>';
echo '<h4 >Delete</h4>';
echo '</div>';
echo '<div class="modal-body">';
echo '<p>Are You Sure You Want to Delete This Category</p>';
echo '</div>';
echo '<div class="modal-footer">';
echo '<a href="/AttributeShoppe/resources/library/phpscripts/categories/delete.php?id=' . $row['ID'] . '" class="btn btn-danger"  >Delete</a>';
echo '<a href="#" class="btn btn-default" data-dismiss="modal">Close</a>';
echo '</div>';
echo '</div>';
echo '</div>';
echo '</div>';
echo '</div>';
?>