<!-- หน้าสมัครสมาชิก -->
<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>สมัครสมาชิก</title>
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" rel="stylesheet" />
    <!-- MDB -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.10.0/mdb.min.css" rel="stylesheet" />
    <!-- font -->
    <link href="https://fonts.googleapis.com/css2?family=Sarabun:wght@200;300&display=swap" rel="stylesheet">
    <!-- Sweetalert -->
    <script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert-dev.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">
    <!-- css -->
    <link rel="stylesheet" href="css/staay.css">
</head>

<body background="bg-head.png">
    <div class="container">
        <section>
            <div class="container py-5 h-100">
                <div class="row d-flex justify-content-center align-items-center h-100">
                    <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                        <div class="card shadow-2-strong" style="border-radius: 1rem;">
                            <div class="card-body p-5 text-center">
                                <form action="register_db.php" method="post">
                                    <img src="logo.png" alt="logo" class="mt-2">
                                    <h2 style="text-align: center;">สมัครสมาชิก</h2><br>
                                    <!-- 2 column grid layout with text inputs for the first and last names -->
                                    <?php if (isset($_SESSION['exist_email'])) : ?>
                                        <div class="alert alert-danger" role="alert">
                                            <?php echo $_SESSION['exist_email']; ?>
                                        </div>
                                    <?php endif; ?>

                                    <?php if (isset($_SESSION['exist_id_card'])) : ?>
                                        <div class="alert alert-danger" role="alert">
                                            <?php echo $_SESSION['exist_id_card']; ?>
                                        </div>
                                    <?php endif; ?>

                                    <!-- ID Card -->
                                    <div class="form-outline mb-4">
                                        <input type="text" name="Id_Card" maxlength="13" id="form3Example3" pattern="[0-9]{1,}" title="กรอกเฉพาะตัวเลขเท่านั้น" autofocus class="form-control" required />
                                        <label class="form-label" for="form5Example5">หมายเลขบัตรประจําตัวประชาชน</label>
                                    </div>
                                    <div class="row mb-4">
                                        <!-- Fristname-lastname -->
                                        <div class="col">
                                            <div class="form-outline">
                                                <input type="text" name="First_Name" id="form3Example1" pattern="[A-Za-zก-๏]{1,}" title="กรอกตัวอักษรเท่านั้น" class="form-control" required />
                                                <label class="form-label" for="form3Example1">ชื่อ</label>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="form-outline">
                                                <input type="text" name="Last_Name" id="form3Example2" pattern="[A-Za-zก-๏]{1,}" title="กรอกตัวอักษรเท่านั้น" class="form-control" required />
                                                <label class="form-label" for="form3Example2">นามสกุล</label>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- NumberPhone -->
                                    <div class="form-outline mb-4">
                                        <input type="text" name="Tel" id="form3Example3" maxlength="10" pattern="[0-9]{1,}" title="กรอกเฉพาะตัวเลขเท่านั้น" class="form-control" required />
                                        <label class="form-label" for="form3Example3">เบอร์โทรศัพท์</label>
                                    </div>

                                    <!-- Email input -->
                                    <div class="form-outline mb-4">
                                        <input type="email" name="Email" id="form3Example3" class="form-control" required />
                                        <label class="form-label" for="form3Example3">อีเมล</label>
                                    </div>

                                    <!-- Ntoinnority -->
                                    <div class="form-outline mb-4">
                                        <input type="text" name="Nationality" id="form3Example3" pattern="[A-Za-zก-๏]{1,}" title="กรอกตัวอักษรเท่านั้น" class="form-control" required />
                                        <label class="form-label" for="form3Example3">สัญชาติ</label>
                                    </div>

                                    <!-- day -->
                                    <div class="form-outline mb-4">
                                        <input type="date" name="Birth" class="form-control form-control-lg" id="birthdayDate" required />
                                        <label class="form-label" for="form3Example3"></label>
                                    </div>

                                    <!-- Password input -->
                                    <div class="form-outline mb-4">
                                        <input type="password" name="Password" id="form3Example4" class="form-control" required />
                                        <label class="form-label" for="form3Example4">รหัสผ่าน</label>
                                    </div>

                                    <!-- Submit button -->
                                    <button type="submit" name="submit" class="btn btn-warning btn-block mb-2">สมัครสมาชิก</button>
                                </form>
                                <form action="register_db.php" method="POST">
                                    <button type="submit" name="submit2" class="btn btn-warning btn-block mb-2">ย้อนกลับไปหน้าหลัก</button>
                                </form><br>

                                <p style="text-align: center;">มีบัญชีแล้ว ? <a href="login.php">เข้าสู่ระบบ</a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>


    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.10.0/mdb.min.js"></script>
    <?php echo '<script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
                 <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert-dev.js"></script>
                 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">'; ?>

</body>

</html>

<?php
if (isset($_SESSION['exist_email'])) {
    unset($_SESSION['exist_email']);
}
?>