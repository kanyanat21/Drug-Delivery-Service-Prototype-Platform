<?php
	@session_start();
	
	session_destroy();

	echo "กำลังกลับหน้าหลัก กรุณารอสักครู่....";
	echo "<meta http-equiv=\"refresh\" content=\"2;URL=basket.php\">";
	//header("Location: page_user.php");

?>
<meta charset="utf-8">