<?php
include('connection.php');

$id = $_POST['id'];

$Source = $_POST['Source'];
$Destination = $_POST['Destination'];
$Capacity = $_POST['Capacity'];
$query = "UPDATE route SET Source = '$Source',Destination = '$Destination',Capacity = '$Capacity' WHERE Path_ID = $id";
if (mysqli_query($conn, $query)) {
    echo "Complete";
} else {
    echo "erroe";
}
