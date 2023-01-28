<?php
include('connection.php');


// echo '<pre>';
// print_r($_POST);
// echo '</pre>';
// exit();
$id = $_POST['id'];

$Travel_date = $_POST['Travel_date'];
$query = "UPDATE purchase_order SET Travel_date = '$Travel_date' WHERE Order_Id = $id";
if (mysqli_query($conn, $query)) {
    echo "Complete";
} else {
    echo "erroe";
}
