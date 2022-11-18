
<?php
@session_start();

unset($_SESSION['user_login']);
unset($_SESSION['user_pass']);
echo "<script type='text/javascript'>";
//echo "alert('ออกจากระบบเรียบร้อยแล้ว');";
echo "window.location = '../index.php'; ";
echo "</script>";

?>
