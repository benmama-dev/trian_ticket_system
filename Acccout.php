<!-- หน้าแก้ไขโปรไฟล์ -->
<?php
session_start();
include('hader.php'); ?>
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
    <title>แก้ไขข้อมูลส่วนตัว</title>
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
                                <h3>แก้ไขข้อมูลส่วนตัว</h3>
                            </div>
                            <form action="Acccout_db.php" method="post">
                                <div class="row mt-3">
                                    <div class="col-md-12"><label class="labels">หมายเลขบัตรประจําตัวประชาชน</label><input type="text" name="Id_Card" class="form-control" value="<?php echo $row['Id_Card']; ?>" readonly>
                                    </div>
                                    <div class="col-md-12"><label class="labels">ชื่อ</label><input type="text" pattern="[A-Za-zก-๏]{1,}" title="กรอกตัวอักษรเท่านั้น" name="First_Name" class="form-control" value="<?php echo $row['First_Name']; ?>" required></div>
                                    <div class="col-md-12"><label class="labels">นามสกุล</label><input type="text" pattern="[A-Za-zก-๏]{1,}" title="กรอกตัวอักษรเท่านั้น" name="Last_Name" class="form-control" value="<?php echo $row['Last_Name']; ?>" required></div>
                                    <div class="col-md-12"><label class="labels">เบอร์โทร</label><input type="text" maxlength="10" pattern="[0-9]{1,}" title="กรอกเฉพาะตัวเลขเท่านั้น" name="Tel" class="form-control" value="<?php echo $row["Tel"] ?>" required>
                                    </div>
                                    <div class="col-md-12"><label class="labels">อีเมล</label><input type="email" name="Email" class="form-control" value="<?php echo $row["Email"] ?>" disabled></div>
                                    <div class="col-md-12"><label class="labels">สัญชาติ</label><input type="text" name="Nationality" pattern="[A-Za-zก-๏]{1,}" title="กรอกตัวอักษรเท่านั้น" class="form-control" value="<?php echo $row["Nationality"] ?>" required></div>
                                    <div class="col-md-12"><label class="labels">วันเกิด</label><input type="date" name="Birth" class="form-control" value="<?php echo $row["Birth"] ?>" required></div>
                                </div>
                                <div class="mt-3 text-center"><button class="btn btn-primary btn-lg" type="submit" name="submit">บันทึกการแก้ไข</button></div>
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