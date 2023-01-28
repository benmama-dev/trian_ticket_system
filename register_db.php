<!-- ไฟล์เชื่อมต่อ Database ในส่วนของการสมัครสมาชิก -->
<?php
session_start();
include('connection.php');

if (isset($_POST['submit'])) {

    $Id_Card = mysqli_real_escape_string($conn, $_POST['Id_Card']);
    $First_Name = mysqli_real_escape_string($conn, $_POST['First_Name']);
    $Last_Name = mysqli_real_escape_string($conn, $_POST['Last_Name']);
    $Tel = mysqli_real_escape_string($conn, $_POST['Tel']);
    $Email = mysqli_real_escape_string($conn, $_POST['Email']);
    $Nationality = mysqli_real_escape_string($conn, $_POST['Nationality']);
    $Birth = mysqli_real_escape_string($conn, $_POST['Birth']);
    $Password = MD5($_POST['Password']);


    $query = "SELECT COUNT(Email) AS count_email  FROM customer WHERE Email = '$Email'";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($result);

    if ($row['count_email']  == 0) {
        $query = "INSERT INTO customer ( Id_Card, First_Name, Last_Name, Tel, Email, Nationality, Birth, Password, role) VALUES ('$Id_Card', '$First_Name', '$Last_Name', '$Tel', '$Email', '$Nationality', '$Birth', '$Password', 'U')";
        $result = mysqli_query($conn, $query);

        if ($result) {
            echo '<script>
                       setTimeout(function() {
                        swal({
                            title: "ลงทะเบียนสําเร็จ",
                            text: "Welcome To The Train Ticket Booking System.",
                            type: "success"
                        }, function() {
                            window.location = "login.php"; //หน้าที่ต้องการให้กระโดดไป
                        });
                      }, 1000);
                  </script>';
            // header('location: login.php');
        }
    } else {
        $_SESSION['exist_email'] = "อีเมลนี้มีผู้ใช้งานแล้ว";
        header('location: register.php');
    }
} else if (isset($_POST['submit2'])) {
    header('location: index.php');
}

echo '<script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
          <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert-dev.js"></script>
          <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">';
?>