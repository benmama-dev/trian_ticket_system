<?php
include('connection.php');

$Order_Id = $_GET['Order_Id'];

$sql = "DELETE FROM purchase_order WHERE Order_Id  = '$Order_Id '";
$result = mysqli_query($conn, $sql);

if ($result) {
    echo "<script type='text/javascript'>";
    echo "window.location = 'user_cancel.php';";
    echo "</script>";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

echo '<script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert-dev.js"></script>
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">';
