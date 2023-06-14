<?php session_start();?> 
<?php 
if(empty($_SESSION['id'])){
    exit;
}
	echo "กำลังไปที่หน้าชำระเงิน กรุณารอสักครู่....";
	echo "<meta http-equiv=\"refresh\" content=\"2;URL=order.php\">";
	//header("Location: page_user.php");

?>
<meta charset="utf-8">