<?php
include('connection.php');

// echo '<pre>';
// print_r($_POST);
// echo '</pre>';
// exit();
$id = $_POST['id'];

$query = "SELECT * FROM  purchase_order  WHERE Order_Id = $id";
$result = mysqli_query($conn, $query);
$row = mysqli_fetch_array($result);
echo json_encode($row);
