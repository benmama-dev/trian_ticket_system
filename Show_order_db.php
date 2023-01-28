<!-- หน้าเชื่อมต่อ Database ของการแก้ไขประวัฒิส่วนตัว -->
<?php
session_start();
// ไฟล์ ่js ของ sweetalert
include('connection.php');

// ประกาศตัวแแปลต่างๆในเมดธอด post
$Travel_date = $_POST['Travel_date'];
$Quantity = $_POST['Quantity'];
$Amount = $_POST['Amount'];
$Travel_Id  = $_POST['Travel_Id'];
$Id_Card = $_POST['Id_Card'];

$sql1 = "INSERT INTO purchase_order (Travel_date,Quantity,Amount,Travel_Id,Id_Card) VALUES ('$Travel_date', '$Quantity','$Amount','$Travel_Id','$Id_Card')";
$result1 = mysqli_query($conn, $sql1);
//ถ้าสำเร็จให้ขึ้นอะไร
if ($result1) {
    echo '<script>
                       setTimeout(function() {
                        swal({
                            title: "การจองสําเร็จ",
                            type: "success"
                        }, function() {
                            window.location = "user_page.php"; //หน้าที่ต้องการให้กระโดดไป
                        });
                      }, 1000);
                  </script>';
} else {
    echo '<script>
    setTimeout(function() {
     swal({
         title: "การจองไม่สําเร็จ",
         type: "success"
     }, function() {
         window.location = "tsts.php"; //หน้าที่ต้องการให้กระโดดไป
     });
   }, 1000);
</script>';
}

echo '<script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert-dev.js"></script>
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">';
