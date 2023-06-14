<?php
@session_start();
//session_destroy();
unset($_SESSION['id']);
echo "<script type='text/javascript'>";
//echo "alert('ออกจากระบบเรียบร้อยแล้ว');";
echo "window.location = '../index.php'; ";
echo "</script>";
?>
