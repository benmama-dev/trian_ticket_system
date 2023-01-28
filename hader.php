<!-- //ไฟล์เชื่อมต่อ Databasae ในส่วนของงการดึงข้อมูลต่างๆ -->
<?php
//ต้องประกาศทุกครั้งเมื่อมีการใช้ Session
include('connection.php');

//ประกาศตัวแปล SESSION ของแต่ละคอลลัมพ์เพื่อดึงข้อมูลมาใช้งาน
$Id_Card = $_SESSION['Id_Card'];
$First_Name = $_SESSION['First_Name'];
$Last_Name = $_SESSION['Last_Name'];
$Tel = $_SESSION['Tel'];
$Email = $_SESSION['Email'];
$Nationality = $_SESSION['Nationality'];
$Birth = $_SESSION['Birth'];


//เลือกข้อมูลมาแสดงผลโดยใช้ภาษา SQL * คือเอาทุกคอลลัมพ์ในตารางนั้นออกมาใช้งาน โดยอิงตามคีย์หลักของแต่ละแถว หรือ row
$sql = "SELECT * FROM customer WHERE Id_Card=$Id_Card";
$result = mysqli_query($conn, $sql); // คิวรีข้อมูลจากตาราง customer ออกมาจากตัวแปลที่ได้เก็บค่าคือตัวแปล $sql และตัวแปล $conn จากไฟล์ connerct
$row = mysqli_fetch_array($result); //กําหนดให้นําข้อมูลออกมาแสดงผ่านตัวแปล $result และเก็บค่าของแต่ละตัวไว้ในตัวแปล $row เพื่อนําไป Echo ข้อมูลใน Database ออกมาใช้งาน
extract($row);

// // echo '<pre>';
// // print_r($row);
// echo '</pre>';
?>