<?php
include('connection.php');

$Path_ID = $_GET['Path_ID'];

$sql = "DELETE FROM route WHERE Path_ID = '$Path_ID'";
$result = mysqli_query($conn, $sql);

if ($result) {
    echo "<script type='text/javascript'>";
    echo "window.location = 'admin_view_path.php';";
    echo "</script>";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

 echo '<script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert-dev.js"></script>
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">';
