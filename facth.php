<?php
include('connection.php');

$id = $_POST['id'];

$query = "SELECT * FROM  route  WHERE Path_ID = $id";
$result = mysqli_query($conn, $query);
$row = mysqli_fetch_array($result);
echo json_encode($row);
