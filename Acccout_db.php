<!-- หน้าเชื่อมต่อ Database ของการแก้ไขประวัฒิส่วนตัว -->
<?php
session_start();
// ไฟล์ ่js ของ sweetalert
include('connection.php');
// ประกาศตัวแแปลต่างๆในเมดธอด post
$First_Name = $_POST['First_Name'];
$Last_Name = $_POST['Last_Name'];
$Tel = $_POST['Tel'];
$Nationality = $_POST['Nationality'];
$Birth = $_POST["Birth"];
$Id_Card = $_POST['Id_Card'];



//ใช้ภาษา sqli ในการ update ข้อมูลของสมาชิก
$sql = "UPDATE customer SET
			First_Name = '$First_Name',
			Last_Name = '$Last_Name',
			Tel = '$Tel',
			Nationality = '$Nationality',
			Birth= '$Birth'
			WHERE Id_Card = $Id_Card	
			";


//คิวรีข้อมูล จาก database จากตัวแปล sql มาเก็บยังตัวแปล resultS
$result = mysqli_query($conn, $sql);
mysqli_close($conn);

if ($result) {
    echo '<script>
                       setTimeout(function() {
                        swal({
                            title: "แก้ไขข้อมูลสําเร็จ",
                            type: "success"
                        }, function() {
                            window.location = "Acccout.php"; //หน้าที่ต้องการให้กระโดดไป
                        });
                      }, 1000);
                  </script>';
} else {
    '<script>
                       setTimeout(function() {
                        swal({
                            title: "แก้ไขข้อมูลไม่สําเร็จ",
                            type: "success"
                        }, function() {
                            window.location = "Acccout.php"; //หน้าที่ต้องการให้กระโดดไป
                        });
                      }, 1000);
                  </script>';
}


echo '<script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert-dev.js"></script>
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">';



?>