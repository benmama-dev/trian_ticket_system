<?php
include('connection.php');
session_start();

$Source = $_POST['Source'];
$Destination = $_POST['Destination'];
$Capacity = $_POST['Capacity'];

//เพิ่มข้อมูล teble1
$sql1 = " INSERT INTO route (Source,Destination,Capacity) VALUES ('$Source', '$Destination',$Capacity)";
$result1 = mysqli_query($conn, $sql1);

//เพิ่มข้อมูล teble1
mysqli_close($conn);
//ถ้าสำเร็จให้ขึ้นอะไร
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
} else {
    echo '<script>
    setTimeout(function() {
     swal({
         title: "เพิ่มข้อมูลไม่สําเร็จ",
         type: "success"
     }, function() {
         window.location = "admin_page.php"; //หน้าที่ต้องการให้กระโดดไป
     });
   }, 1000);
</script>';
}

echo '<script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert-dev.js"></script>
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">';
