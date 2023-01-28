<?php
include('connection.php');


// echo '<pre>';
// print_r($_POST);
// echo '</pre>';
// exit();
$id = $_POST['id'];

$Time_Date = $_POST['Time_Date'];
$query = "UPDATE train_schedule SET Time_Date = '$Time_Date' WHERE Travel_Id = $id";
if (mysqli_query($conn, $query)) {
    echo "Complete";
} else {
    echo "erroe";
}
