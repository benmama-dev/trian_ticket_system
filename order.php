<?php
session_start();
include('hader.php');
$Travel_Id = $_GET['Travel_Id'];

$query = "SELECT t.Travel_Id,r.Source,r.Destination,t.Time_Date
FROM train_schedule as t
INNER JOIN route as r ON r.Path_ID = t.Path_ID
WHERE Travel_Id = $Travel_Id";
$result  = mysqli_query($conn, $query) or die("Error in sql : $query" . mysqli_error($conn));
$row1 = mysqli_fetch_array($result); ?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="node_modules/owl.carousel/dist/assets/owl.carousel.min.css" />
    <link rel="stylesheet" href="node_modules/owl.carousel/dist/assets/owl.theme.default.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.10.0/mdb.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="assets/css/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Sarabun:wght@200;300&display=swap" rel="stylesheet">

    <title>รายละเอียดคําสั่งซื้อ</title>
    <script src="https://code.jquery.com/jquery-3.3.1.js"></script>

    <!-- แอปแฟกการทํางานของ scroll bar ของ nav ในส่วนด้านบน -->
    <script type="text/javascript">
        $(window).on('scroll', function() {
            if ($(window).scrollTop()) {
                $('nav').addClass('black');
            } else {
                $('nav').removeClass('black');
            }
        })
        $(document).ready(function() {
            $('.menu h4').click(function() {
                $("nav ul").toggleClass("active")
            })
        })
    </script>

    <!-- การใส่ภาพและตกแต่งภาพพื้นหลัง -->
    <style>
        .box-1 {
            width: 1902px;
            height: 1000px;
            background-image: url(./assets/image/bg-head.png);
            background-repeat: no-repeat;
            background-size: 100% 100%;
        }
    </style>
</head>



<body>

    <!-- Section Navbar -->
    <section>
        <nav>
            <div class="logo">
                <a href="user_page.php">
                    <img src="./assets/image/logo.png" alt="logo" />
                </a>
            </div>
            <ul>
                <li><a href="user_page.php">หน้าแรก</a></li>
                <li><a href="user_history.php">ประวัติการซื้อตั๋ว</a></li>
                <li><a href="user_chang.php">เปลี่ยนแปลงตั๋ว</a></li>
                <li><a href="user_cancel.php">ยกเลิกตั๋วโดยสาร</a></li>
                <li><a href="Acccout.php">ยินดีต้อนรับ
                        <?php echo $row['First_Name']; ?>
                        <?php echo $row['Last_Name']; ?></a></li>

                <li style="font-size: 25px;">|</li>
                <li><a href="logout.php" onclick="return confirm('คุณต้องการออกจากระบบหรือไม่?')">ออกจากระบบ</a></li>
            </ul>
        </nav>
    </section>


    <br><br><br><br><br>
    <section>
        <div class="box-1"><br>
            <div class="container rounded bg-white mt-5 mb-5">
                <div class="row">
                    <div class="col-md-2 border-right">
                    </div>
                    <div class="col-md-8 border-right">
                        <div class="p-1 py-5">
                            <div class="d-flex justify-content-between align-items-center mb-3-md-12">
                                <h3>รายละเอียดคําสั่งซื้อ</h3>
                            </div>
                            <form action="Show_order_db.php" method="POST">
                                <div class="row mt-3">
                                    <div class="col-md-12"><label class="labels">หมายเลขเที่ยวเดินทาง</label><input type="text" name="Travel_Id" id="Travel_Id" class="form-control form-control-lg" value="<?php echo $row1['Travel_Id']; ?>" readonly>
                                    </div>
                                    <div class="row col-md-12">
                                        <div class="col">
                                            <label class="labels">ต้นทาง</label>
                                            <input type="text" class="form-control form-control-lg" value="<?php echo $row1['Source']; ?>" disabled>

                                        </div>
                                        <div class="col">
                                            <label class="labels">ปลายทาง</label>
                                            <input type="text" class="form-control form-control-lg" value="<?php echo $row1['Destination']; ?>" disabled>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <label class="labels">จํานวณผู้โดยสาร</label>
                                            <!-- ส่งค่า NAME Path_ID  ไปยังหน้า Stori01.php -->
                                            <select onclick="calc();" name="Quantity" id="Quantity" class="form-select form-control-lg" required autofocus>
                                                <option selected disabled value=" ">จำนวณผู้โดยสาร</option>
                                                <option value="1">1 คน</option>
                                                <option value="2">2 คน</option>
                                                <option value="3">3 คน</option>
                                                <option value="4">4 คน</option>
                                                <option value="5">5 คน</option>
                                                <option value="6">6 คน</option>
                                                <option value="7">7 คน</option>
                                                <option value="8">8 คน</option>
                                                <option value="9">9 คน</option>
                                                <option value="10">10 คน</option>
                                            </select>
                                        </div>
                                        <div class="col">
                                            <label class="labels"> ราคาตั๋วละ75บาทต่อ1ผู้โดยสาร</label>
                                            <input type="text" id="Amount" name="Amount" class="form-control form-control-lg" placeholder="" aria-label="" aria-describedby="basic-addon1" readonly required>
                                        </div>
                                        <script>
                                            function calc() {
                                                var n1 = document.getElementById('Quantity').value;
                                                if (n1 === '1') {
                                                    var n2 = document.getElementById('Amount').value = 1 * 75.00 + " บาท";
                                                } else if (n1 === '2') {
                                                    var n2 = document.getElementById('Amount').value = 2 * 75.00 + " บาท";
                                                } else if (n1 === '3') {
                                                    var n2 = document.getElementById('Amount').value = 3 * 75.00 + " บาท";
                                                } else if (n1 === '4') {
                                                    var n2 = document.getElementById('Amount').value = 4 * 75.00 + " บาท";
                                                } else if (n1 === '5') {
                                                    var n2 = document.getElementById('Amount').value = 5 * 75.00 + " บาท";
                                                } else if (n1 === '6') {
                                                    var n2 = document.getElementById('Amount').value = 6 * 75.00 + " บาท";
                                                } else if (n1 === '7') {
                                                    var n2 = document.getElementById('Amount').value = 7 * 75.00 + " บาท";
                                                } else if (n1 === '8') {
                                                    var n2 = document.getElementById('Amount').value = 8 * 75.00 + " บาท";
                                                } else if (n1 === '9') {
                                                    var n2 = document.getElementById('Amount').value = 9 * 75.00 + " บาท";
                                                } else if (n1 === '10') {
                                                    var n2 = document.getElementById('Amount').value = 10 * 75.00 + " บาท";
                                                }
                                            }
                                        </script>
                                        <div class="col-md-12"><label class="labels">วันที่เดินทาง</label><input type="date" name="Travel_date" id="Travel_date" class="form-control form-control-lg" required>
                                        </div>
                                        <div class="col-md-12"><label class="labels">รหัสบัตรประชาชน</label><input type="text" name="Id_Card" id="Id_Card" class="form-control form-control-lg" value="<?php echo $row['Id_Card']; ?>" readonly>
                                        </div>
                                        <div class="row">
                                            <div class="col">
                                                <label class="labels">ชื่อ</label>
                                                <input type="text" class="form-control form-control-lg" value="<?php echo $row['First_Name']; ?>" disabled>
                                            </div>
                                            <div class="col">
                                                <label class="labels">นามสกุล</label>
                                                <input type="text" class="form-control form-control-lg" value="<?php echo $row['Last_Name']; ?>" disabled>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="mt-3 text-center"><button class="btn btn-warning btn-lg" type="submit" name="submit" onclick="return confirm('คุณต้องการจองหรือไม่')">ยื่นยันคําสั่งซื้อ</button></div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
        <div class="col-md-0">
        </div>
    </section><br>

    <!-- Section ticket -->
    <section>
        <div class="container">
            <div class="row">
                <div class="col-md-12 ic-7">
                    <h2>วิธีการจองตั๋ว</h2>
                    <img src="./assets/image/icon_7.png">
                </div>
            </div>
        </div>

        <div class="container">
            <div class="row" style="padding-bottom: 30px;">
                <div class="col-md-2 ic-all">
                    <img src="./assets/image/icon_1.png" alt="">
                    <p>ค้นหาขบวนรถ</p>
                </div>
                <div class="col-md-2 ic-all">
                    <img src="./assets/image/icon_2.png" alt="">
                    <p>เลือกขบวนรถโดยสาร</p>
                </div>
                <div class="col-md-2 ic-all">
                    <img src="./assets/image/icon_3.png" alt="">
                    <p>เลือกตู้ที่มีที่นั่งว่าง</p>
                </div>
                <div class="col-md-2 ic-all">
                    <img src="./assets/image/icon_4.png" alt="">
                    <p>ระบุข้อมูลผู้โดยสารและเลือกที่นั่ง</p>
                </div>
                <div class="col-md-2 ic-all">
                    <img src="./assets/image/icon_5.png" alt="">
                    <p>ชำระเงิน</p>
                </div>
                <div class="col-md-2 ic-all">
                    <img src="./assets/image/icon_6.png" alt="">
                    <p>พิมพ์ตั๋ว</p>
                </div>
            </div>
        </div>
    </section>


    <!-- Section Footer -->
    <footer class="semi-footer p-5 text-center text-md-left mt-0">
        <div class="row">
            <div class="col-md-12 ft-1">
                <a class="navbar-brand" href="#" style="text-align: center;">
                    <img src="./assets/image/logo.png" width="50" height="50" class="d-inline-block align-top">
                    การรถไฟแห่งประเทศไทย
                </a>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <p>
                    <i class="fas fa-phone-square"></i> สายด่วน :<span><b>1669</b></span><br>
                    <i class="fas fa-phone-square"></i> SRT Hotline :1690 <br>
                    <i class="fas fa-envelope"></i> Email: pittawat.ju@rmuti.ac.th <br>
                </p>
                <a href="https://www.facebook.com/pr.railway?_rdc=1&_rdr/" target="_blank">
                    <i class="fab fa-facebook-square"></i>
                </a>
                <a href="https://www.youtube.com/channel/UCX0RfGzGjovQmxDYyGquJ_Q/" target="_blank">

                    <i class="fab fa-youtube"></i>
                </a>
                <a href="https://twitter.com/prrailwaysrt/" target="_blank">
                    <i class="fab fa-twitter-square"></i>
                </a>
            </div>

            <div class="col-md-6">
                <p>
                    <i class="fas fa-map-marker-alt"></i> เลขที่ 1 ถนนรองเมือง แขวงรองเมือง
                <p style="padding-left: 22px;">เขตปทุมวัน กรุงเทพมหานคร 10330</p>
                </p>

            </div>
        </div>
    </footer>


    <script src="node_modules/jquery/dist/jquery.min.js"></script>
    <script src="node_modules/popper.js/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <script src="node_modules/jarallax/dist/jarallax.min.js"></script>
    <script src="node_modules/owl.carousel/dist/owl.carousel.min.js"></script>
    <script src="assets/js/main.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.10.0/mdb.min.js"></script>
</body>

</html>