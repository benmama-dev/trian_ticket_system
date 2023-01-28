<?php
include('connection.php');

$Travel_Id = $_POST['Travel_Id'];
$Time_Date = $_POST['Time_Date'];
$Path_ID = $_POST['Path_ID'];
//เพิ่มข้อมูล teble1

$query = "SELECT COUNT(Travel_Id) AS count_Travel_Id  FROM train_schedule WHERE Travel_Id = '$Travel_Id'";
$result1 = mysqli_query($conn, $query);
$row = mysqli_fetch_assoc($result1);

if ($row['count_Travel_Id']  == 0) {
    $sql1 = " INSERT INTO train_schedule (Travel_Id,Time_Date,Path_ID) VALUES ('$Travel_Id','$Time_Date','$Path_ID')";
    $result1 = mysqli_query($conn, $sql1);
    if ($result1) {
        echo '<script>
                       setTimeout(function() {
                        swal({
                            title: "เพิ่มข้อมูลสําเร็จ",
                            type: "success"
                        }, function() {
                            window.location = "admin_page.php"; //หน้าที่ต้องการให้กระโดดไป
                        });
                      }, 1000);
                  </script>';
    }
} else {
    echo '<script>
                       setTimeout(function() {
                        swal({
                            title: "เพิ่มข้อมูลไม่สําเร็จ",
                            type: "error"
                        }, function() {
                            window.location = "admin_page.php"; //หน้าที่ต้องการให้กระโดดไป
                        });
                      }, 1000);
                  </script>';
}
echo '<script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert-dev.js"></script>
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">';
