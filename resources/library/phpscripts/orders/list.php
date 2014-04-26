<?php
if (!session_id()) session_start();
$userId = $_SESSION['userid'];

$conn = new mysqli('localhost', 'attrib', 'password', 'attribute_shoppe');
$sql = "SELECT * FROM ORDERS where USER_ID = '$userId'";
$result = $conn->query($sql);
foreach($conn->query($sql) as $row) {
    echo '<tr>';
    echo '<td>' . $row['ID'] .'</td>';
    echo '<td>' . $row['DATE'] . '</td>';
    echo '<td width=250>';
    echo '<a class="btn btn-default" href="show.php?id='.$row['ID'].'">View</a>';
    echo ' ';
    echo '</td>';
    echo '</tr>';
}