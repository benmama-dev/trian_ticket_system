<!-- หน้า login  -->
<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>เข้าสู่ระบบ</title>
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" rel="stylesheet" />
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet" />
    <!-- MDB -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.10.0/mdb.min.css" rel="stylesheet" />

    <!-- font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Sarabun:wght@200;300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css" />
    <script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert-dev.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">


    <!-- css -->
    <link rel="stylesheet" href="css/staay.css">
</head>

<body background="bg-head.png">
    <div class="contenner">
        <section class="vh-100 gradient-custom">
            <div class="container py-5 h-100">
                <div class="row d-flex justify-content-center align-items-center h-100">
                    <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                        <div class="card shadow-2-strong" style="border-radius: 1rem;">
                            <div class="card-body p-5 text-center">
                                <form action="login_db.php" method="post">
                                    <img src="logo.png" alt="logo" class="mt-2">
                                    <h2 style="text-align: center;">เข้าสู่ระบบ</h2><br>
                                    <?php if (isset($_SESSION['err_login'])) : ?>
                                        <div class="alert alert-danger" role="alert">
                                            <?php echo $_SESSION['err_login']; ?>
                                        </div>
                                    <?php endif; ?>
                                    <!-- Email input -->
                                    <div class="form-outline mb-4">
                                        <input type="email" name="Email" id="form1Example1" autofocus class="form-control" required />
                                        <label class="form-label" for="form1Example1">อีเมล</label>
                                    </div>

                                    <!-- Password input -->
                                    <div class="form-outline mb-4">
                                        <input type="password" name="Password" id="form1Example2" class="form-control" required />
                                        <label class="form-label" for="form1Example2">รหัสผ่าน</label>
                                    </div>

                                    <!-- Submit button -->
                                    <button type="submit" name="submit" class="btn btn-warning btn-block mb-2" style="width: 100%;">เข้าสู่ระบบ</button>
                                </form>

                                <form action="register_db.php" method="POST">
                                    <button type="submit" name="submit2" class="btn btn-warning btn-block mb-3">ย้อนกลับไปหน้าหลัก</button>
                                </form><br>
                                <div>
                                    <p style="text-align: center;">สมาชิกใหม่ ? <a href="register.php">สมัครสมาชิก</a>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <!-- MDB -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.10.0/mdb.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert-dev.min.js" integrity="sha512-t89+ZHqiI+cJO2EZ1zy846TMzc7K0VH22insNeb32hMoVymAMd0aYeLzmNF4WuRLDUXPVo6dzbZ1zI7MBWlqlQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <?php echo '<script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert-dev.js"></script>
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">';
    ?>
</body>

</html>

<?php
if (isset($_SESSION['err_login'])) {
    unset($_SESSION['err_login']);
}
?>