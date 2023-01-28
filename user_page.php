<!-- หน่าใรส่วนของ User -->
<?php
session_start();
include('hader.php');
// include('adminview.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="node_modules/owl.carousel/dist/assets/owl.carousel.min.css" />
    <link rel="stylesheet" href="node_modules/owl.carousel/dist/assets/owl.theme.default.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Sarabun:wght@200;300&display=swap" rel="stylesheet">
    <!-- datatable css -->
    <link rel="stylesheet" href="//cdn.datatables.net/1.11.4/css/jquery.dataTables.min.css">
    <title>การรถไฟแห่งประเทศไทย</title>
    <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
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

    <style>
        * {
            margin: 0;
            padding: 0;
        }

        .wallpaper {
            position: relative;
            width: 100%;
            margin: 0 auto;
        }

        .heading {
            color: rgb(97, 31, 4);
            position: absolute;
            top: 20%;
            width: 100%;
            text-align: center;
            font-size: 65px;
        }

        .heading1 {
            color: rgb(97, 31, 4);
            position: absolute;
            top: 30%;
            width: 100%;
            text-align: center;
            font-size: 33px;
        }
    </style>
</head>



<body>

    <?php
    $query = "SELECT * FROM  route " or die("Error:" . mysqli_error($conn));
    $result = mysqli_query($conn, $query);
    ?>

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

    <!-- Section detail -->
    <section>
        <div>
            <div class="wallpaper">
                <img src="./assets/image/bg-head.png" width="100%" height="50%">
                <h1 class="heading">การรถไฟแห่งประเทศไทย</h1>
                <h3 class="heading1">จองง่าย ตรวจสอบสะดวก</h3>
            </div>

            <form action="Show_db.php" method="POST">
                <div class="container blog-shadow-two bg-head p-2 ">
                    <div class=" row m-lg-3 col-20">
                        <div class="col-md-12" style="text-align: center; ">
                            <h1>จองตั๋วรถไฟ</h1>
                            <hr class="style14"><br>
                        </div>
                        <div class="col-2"></div>
                        <!-- <div class="col-sm-1"></div> -->
                        <div class="col-sm-2  border-ed-2 p-0">
                            <select name="Source" id="Path_ID" class="form-select form-control-lg" style="text-align: center; width: 180px; height: 59px; border-color: #C48A0e ;" required>
                                <option selected disabled>ต้นทาง</option>
                                <?php foreach ($result as $row) { ?>
                                    <option value="<?php echo $row["Source"] ?>">
                                        <?php echo $row["Source"] ?>
                                    </option>
                                <?php } ?>
                            </select>
                        </div>

                        <div class="col-sm-2  border-ed-2 p-0">
                            <select name="Destination" id="Path_ID" class="form-select form-control-lg" style="text-align: center; width: 180px; height: 59px; border-color: #C48A0e ;" required>
                                <option selected disabled>ปลายทาง</option>
                                <?php foreach ($result as $row) { ?>
                                    <option value="<?php echo $row["Destination"] ?>">
                                        <?php echo $row["Destination"] ?>
                                    </option>
                                <?php } ?>
                            </select>
                        </div>

                        <div class="col-4 col-sm-2 border-ed-2 p-0">
                            <input type="date" name="Time_Date" id="form3Example4" value="วันที่เดินทาง" class="form-control" style="text-align: center; width: 180px; height: 59px; border-color: #C48A0e ;" required />
                        </div>

                        <div class="col-4 col-sm-2 border-ed-2 p-0">
                            <select name="Quantity" id="Quantity" style="text-align: center; width: 180px; height: 59px; border-color: #C48A0e ;" required>
                                <option selected disabled>จำนวณผู้โดยสาร</option>
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
                        <input type="hidden" name="Amount" value="0">


                        <div class="col-4 col-sm-2 button-1 p-0">
                            <button style="width: 85px; height: 59px; background-color:#C48A0e; " type="submit" class="btn btn-primary">ค้นหา</button>
                        </div>
                    </div>
                </div>
            </form>
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
                    <p>ค้นหาขวนรถ</p>
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


    <script src="node_modules/jquery/dist/jquery.min.js"></script>
    <script src="node_modules/popper.js/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <script src="node_modules/jarallax/dist/jarallax.min.js"></script>
    <script src="node_modules/owl.carousel/dist/owl.carousel.min.js"></script>
    <script src="assets/js/main.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.10.0/mdb.min.js"></script>
    <!-- datatable -->
    <script src="//cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>
</body>

</html>