<?php session_start(); ?>
<meta charset="utf-8"> 
<?php
if(empty($_SESSION['id'])){
    
}
	include("../fron/connectdb.php");  
	
		foreach($_SESSION['sid'] as $pid) {
			$sum[$pid] = $_SESSION['sprice'][$pid] * $_SESSION['sitem'][$pid] ;
			@$name = $_SESSION['sname'][$id];
			@$total += $sum[$pid] ;
		}
	
	$sql = "insert into `tb_order` values('', '$total', CURRENT_TIMESTAMP, '{$_SESSION['id']}');" ; 
	mysqli_query($conn, $sql) or die ("insert error") ;
	$id = mysqli_insert_id($conn);
	//var_dump($sql);
	foreach($_SESSION['sid'] as $pid) {
		$sql2 = "insert into tb_orders_detail values('', '$id', '".$_SESSION['sid'][$pid]."', '".$_SESSION['sitem'][$pid]."');" ;
		mysqli_query($conn, $sql2);
	}
	
echo "<meta http-equiv=\"refresh\" content=\"0;URL=order2.php\">";
?>