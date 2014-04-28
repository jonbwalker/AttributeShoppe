<?php
if (!session_id()) session_start();
$userId = $_SESSION['userid'];

$conn = new mysqli('localhost', 'attrib', 'password', 'attribute_shoppe');
if(isset($_SESSION['isAdmin']) && $_SESSION['isAdmin'] == 'true') {
    $sql = "SELECT * FROM ORDERS";
} else {
    $sql = "SELECT * FROM ORDERS WHERE USER_ID = '$userId'";

}
$result = $conn->query($sql);
foreach ($conn->query($sql) as $row) {
    $user=$row['USER_ID'];
    if(isset($_SESSION['isAdmin']) && $_SESSION['isAdmin'] == 'true')  {
        $sql = "SELECT USERNAME FROM USER where ID =$user";
        $result = $conn->query($sql);
        $userRow = $result->fetch_array(MYSQLI_ASSOC);
    }

    echo '<tr>';
    if(isset($_SESSION['isAdmin']) && $_SESSION['isAdmin'] == 'true')  {
    echo '<td>' . $userRow['USERNAME'] . '</td>';
    }
    echo '<td>' . $row['ID'] . '</td>';
    echo '<td>' . $row['DATE'] . '</td>';
    echo '<td width=250>';
    echo '<a class="btn btn-default" href="show.php?id=' . $row['ID'] . '">View</a>';
    echo ' ';
    echo '</td>';
    echo '</tr>';
}