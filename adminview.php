<!-- หน้าแก้ไขโปรไฟล์ -->
<?php
include('connection.php');
session_start();
include('hader.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.10.0/mdb.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="assets/css/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Sarabun:wght@200;300&display=swap" rel="stylesheet">
    <!-- datatable css -->
    <link rel="stylesheet" href="//cdn.datatables.net/1.11.4/css/jquery.dataTables.min.css">
    <title>ตรวจสอบข้อมูลเที่ยวเดินทาง</title>
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>

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
    <?php
    $sql = "SELECT t.Travel_Id,r.Source,r.Destination,t.Time_Date
            FROM train_schedule as t
            INNER JOIN route as r ON r.Path_ID = t.Path_ID" or die("Error" . mysqli_error($connect));
    $result = mysqli_query($conn, $sql);
    ?>


    <!-- Section Navbar -->
    <section>
        <nav>
            <div class="logo">
                <a href="admin_page.php">
                    <img src="./assets/image/logo.png" alt="logo" />
                </a>
            </div>
            <ul style="float: right;">
                <li><a href="admin_page.php">เพิ่มข้อมูล</a></li>
                <li><a href="admin_view_path.php">ตรวจสอบข้อมูลเส้นทาง</a></li>
                <li>
                    <p style="font-size: 1.3rem; ">ยินดีต้อนรับ <?php echo $row['First_Name']; ?>
                    </p>
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
                        <div class="p-1 py-5">
                            <div class="d-flex justify-content-between align-items-center mb-5-md-12">
                                <h3>ข้อมูลเที่ยวเดินทาง</h3>
                            </div><br>
                            <form action="" method="post">
                                <table class="table table-bordered" id="myTable">
                                    <thead class="text-center table-info">
                                        <tr>
                                            <th scope="col">Travel ID</th>
                                            <th scope="col">ต้นทาง</th>
                                            <th scope="col">ปลายทาง</th>
                                            <th scope="col">วันที่เดินทาง</th>
                                            <th scope="col">Delete</th>
                                            <th scope="col">Edit</th>
                                        </tr>
                                    </thead>
                                    <tbody class="text-center">
                                        <?php foreach ($result as $data) : ?>
                                            <tr>
                                                <td><?= $data['Travel_Id'] ?></td>
                                                <td><?= $data['Source'] ?></td>
                                                <td><?= $data['Destination'] ?></td>
                                                <td><?= $data['Time_Date'] ?></td>
                                                <td><a href="delete_admin_db.php?Travel_Id=<?php echo $data['Travel_Id'] ?>" onclick="return confirm('คุณต้องการลบหรือไม่')" class="btn  btn-danger">ลบ</a></td>
                                                <td><button type="button" class="btn btn-warning updateTravel" id="<?php echo $data['Travel_Id'] ?>">แก้ไข</button></td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
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


    <!-- Modal Update Footer-->
    <div class="modal fade" id="updateTravel" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title" id="exampleModalLabel">แก้ไข</h3>
                </div>
                <div class="modal-body">
                    <form method="POST" id="update-form">
                        <label>วันที่เดินทางไป</label>
                        <input type="hidden" id="id" name="id">
                        <input type="date" class="form-control form-control-lg" name="Time_Date" id="Time_Date">
                        <div class="modal-footer ">
                            <input type="submit" id="insert" class="btn btn-success btn-lg">
                            <button type="submit" class="btn btn-dark btn-lg" data-bs-dismiss="modal">Close</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <!-- <script src="node_modules/jquery/dist/jquery.min.js"></script> -->
    <!-- <script src="node_modules/popper.js/dist/umd/popper.min.js"></script> -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <!-- <script src="node_modules/jarallax/dist/jarallax.min.js"></script> -->
    <!-- <script src="node_modules/owl.carousel/dist/owl.carousel.min.js"></script> -->
    <!-- <script src="assets/js/main.js"></script> -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.10.0/mdb.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <!-- datatable -->
    <script src="//cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>
</body>

</html>

<script>
    $(document).ready(function() {
        $('#myTable').DataTable({
            language: {
                "decimal": "",
                "emptyTable": "ไม่มีข้อมูลในระบบ",
                "info": "แสดง _START_ - _END_ จาก _TOTAL_ รายการ",
                "infoEmpty": "แสดง 0 to 0 จาก 0 รายการ",
                "infoFiltered": "(จากการค้นหาทั้งหมด _MAX_ รายการ)",
                "infoPostFix": "",
                "thousands": ",",
                "lengthMenu": "แสดง _MENU_ รายการ",
                "loadingRecords": "Loading...",
                "processing": "Processing...",
                "search": "ค้นหา:",
                "zeroRecords": "ไม่พบข้อมูล",
                "paginate": {
                    "first": "First",
                    "last": "Last",
                    "next": "หน้าถัดไป",
                    "previous": "ก่อนหน้า"
                },
                "aria": {
                    "sortAscending": ": activate to sort column ascending",
                    "sortDescending": ": activate to sort column descending"
                }
            }
        });
        $('#update-form').on('submit', function(e) {
            e.preventDefault();
            $.ajax({
                url: "update1.php",
                method: "post",
                data: $('#update-form').serialize(),
                beforeSend: function() {},
                success: function(date) {
                    location.reload();
                }
            });
        });
    });
</script>

<script>
    $('.updateTravel').click(function() {
        // console.log($(this).attr('id'))
        var Travel_Id = $(this).attr('id');
        $.ajax({
            url: "facth1.php",
            method: "post",
            data: {
                id: Travel_Id
            },
            dataType: "json",
            success: function(data) {
                $('#id').val(data.Travel_Id)
                $('#Time_Date').val(data.Time_Date);
                $('#updateTravel').modal('show');
                $('#insert').val('update');
            }
        });
    });
</script>