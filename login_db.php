<!-- ไฟล์เชื่อมต่อ Databaase ของ login -->
<?php
session_start();

//ไฟล์ Script ของ Sweetalert
echo '<script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert-dev.js"></script>
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">';

include("connection.php");
if (isset($_POST['submit'])) {  //ใช้ isset ในการตรวจสอบโดยได้ส่งข้อมูลประเภท POST มาโดยอ้างองตาม name ของ Button คือ summit
    $Email = $_POST['Email']; //ประกาศตัวแปล 
    $Password = MD5($_POST['Password']);

    //เลือกข้อมูลในตาราง Customer โดยเจาะจงไปที่ Email และ Pass ของแต่ละแถว
    $sql = "SELECT * FROM customer
                  WHERE  Email='" . $Email . "' 
                  AND  Password='" . $Password . "' ";
    $result = mysqli_query($conn, $sql); // คิวรี่ข้อมูลจาก database มาเก้บไว้ยังตัวแปล $result

    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_array($result);

        $_SESSION["Id_Card"] = $row["Id_Card"];
        $_SESSION["First_Name"] = $row["First_Name"];
        $_SESSION["Last_Name"] = $row["Last_Name"];
        $_SESSION["Tel"] = $row["Tel"];
        $_SESSION["Email"] = $row["Email"];
        $_SESSION["Nationality"] = $row["Nationality"];
        $_SESSION["Birth"] = $row["Birth"];
        $_SESSION["role"] = $row["role"];

        if ($_SESSION["role"] == "A") { // สถานะ Admin
            echo '<script>
                       setTimeout(function() {
                        swal({
                            title: "เข้าสู่ระบบสําเร็จ",
                            text: "Welcome To The Train Ticket Booking System.",
                            type: "success"
                        }, function() {
                            window.location = "admin_page.php"; //หน้าที่ต้องการให้กระโดดไป
                        });
                      }, 1000);
                  </script>';
            //  header("Location: admin_page.php");
        }
        if ($_SESSION["role"] == "U") { //สถานะ User
            echo '<script>
                       setTimeout(function() {
                        swal({
                            title: "เข้าสู่ระบบสําเร็จ",
                            text: "Welcome To The Train Ticket Booking System.",
                            type: "success"
                        }, function() {
                            window.location = "user_page.php"; //หน้าที่ต้องการให้กระโดดไป
                        });
                      }, 1000);
                  </script>';
            // header("Location: user_page.php");
        }
    } else {
        $_SESSION['err_login'] = "อีเมลหรือรหัสผ่านไม่ถูกต้อง";
        header('location: login.php');
    }
} else  if (isset($_POST['submit1'])) {
    header("Location: register.php");
}


?>