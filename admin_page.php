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
    <!-- <link rel="stylesheet" href="node_modules/owl.carousel/dist/assets/owl.carousel.min.css" /> -->
    <!-- <link rel="stylesheet" href="node_modules/owl.carousel/dist/assets/owl.theme.default.min.css"> -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.10.0/mdb.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="assets/css/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Sarabun:wght@200;300&display=swap" rel="stylesheet">
    <title>เพิ่มข้อมูล</title>
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
                <a href="admin_page.php">
                    <img src="./assets/image/logo.png" alt="logo" />
                </a>
            </div>
            <ul style="float: right;">
                <li><a href="adminview.php">ตรวจสอบข้อมูลเที่ยวเดินทาง</a></li>
                <li><a href="admin_view_path.php">ตรวจสอบข้อมูลเส้นทาง</a></li>
                <li>
                    <p style="font-size: 1.3rem;">ยินดีต้อนรับ <?php echo $row['First_Name']; ?></p>
                </li>
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
                        <div class="p-1 py-10"><br>
                            <div class="d-flex justify-content-between align-items-center mb-2-md-5">
                                <!-- <h3>เพิ่มข้อมูลรถไฟ</h3> -->
                            </div><br>
                            <form action="admin_page_db.php" method="post">
                                <div class="row mb-4">
                                    <h3>เส้นทาง</h3>
                                    <div class="col-md-4">
                                        <div class="form-outline">
                                            <input class="form-control form-control-lg" pattern="[A-Za-zก-๏]{1,}" title="กรอกตัวอักษรเท่านั้น" name="Source" type="text" aria-label=".form-control-lg example" required autofocus>
                                            <label class="form-label" for="form3Example1">ต้นทาง</label>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-outline">
                                            <input class="form-control form-control-lg" pattern="[A-Za-zก-๏]{1,}" title="กรอกตัวอักษรเท่านั้น" name="Destination" type="text" aria-label=".form-control-lg example" required>
                                            <label class="form-label" for="form3Example2">ปลายทาง</label>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-outline">
                                            <input class="form-control form-control-lg" pattern="[0-9]{1,}" title="กรอกเฉพาะตัวเลขเท่านั้น" maxlength="3" name="Capacity" type="text" aria-label=".form-control-lg example" required>
                                            <label class="form-label" for="form3Example2">ความจุ</label>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-outline">
                                            <div class="text-center">
                                                <button type="submit" class="btn btn-warning btn-lg">เพิ่มข้อมูล</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form><br>

                            <?php
                            $query = "SELECT * FROM  route  ORDER BY Path_ID asc" or die("Error:" . mysqli_error($conn));
                            $result = mysqli_query($conn, $query);
                            ?>

                            <hr>
                            <form action="adminview_db.php" method="POST">
                                <h3>วันที่เดินรถ</h3>
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">หมายเลขเที่ยวเดินทาง</label>
                                    <input class="form-control form-control-lg" maxlength="10" pattern="[0-9]{1,}" title="กรอกเฉพาะตัวเลขเท่านั้น" name="Travel_Id" type="text" aria-label=".form-control-lg example" required>
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputPassword1" class="form-label">วันที่เดินทาง</label>
                                    <input class="form-control form-control-lg" name="Time_Date" type="date" aria-label=".form-control-lg example" required>
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputPassword1" class="form-label">เส้นทาง</label>
                                    <!-- ส่งค่า NAME Path_ID  ไปยังหน้า Stori01.php -->
                                    <select name="Path_ID" class="form-select form-control-lg">
                                        <option selected disabled>เส้นทาง</option>
                                        <?php foreach ($result as $row) { ?>
                                            <option value="<?php echo $row["Path_ID"] ?>">
                                                <?php echo $row["Source"] . '-' . $row["Destination"] ?>
                                            </option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="text-center">
                                    <button type="submit" class="btn btn-warning btn-lg">เพิ่มข้อมูล</button>
                                </div>
                            </form><br>
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
    <footer class="semi-footer p-5 text-center text-md-left">
        <div class="row">
            <div class="col-md-12 ft-1">
                <a class="navbar-brand" href="#">
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


    <!-- <script src="node_modules/jquery/dist/jquery.min.js"></script> -->
    <!-- <script src="node_modules/popper.js/dist/umd/popper.min.js"></script> -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <!-- <script src="node_modules/jarallax/dist/jarallax.min.js"></script> -->
    <!-- <script src="node_modules/owl.carousel/dist/owl.carousel.min.js"></script> -->
    <!-- <script src="assets/js/main.js"></script> -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.10.0/mdb.min.js"></script>

</body>

</html>