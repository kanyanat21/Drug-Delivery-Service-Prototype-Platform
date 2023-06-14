<?php session_start(); ?>
<meta charset="utf-8">
<?php
	@session_start();
	$id2 = $_GET['id'] ;
	unset($_SESSION['sid'][$id2]) ;
	unset($_SESSION['stitle'][$id2]) ;
	unset($_SESSION['sprice'][$id2]) ;
	unset($_SESSION['simage'][$id2]) ; 
	unset($_SESSION['sitem'][$id2]) ;
	echo "<meta http-equiv=\"refresh\" content=\"0;URL=basket.php\">";

?>