<?php
// ไฟล์ connect DATABASE
 $conn = mysqli_connect('localhost','root','','trian_ticket');
 if(!$conn){
     die("Failed to connect" . mysqli_connect_error());
 }
