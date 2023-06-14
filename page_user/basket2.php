<?php
ob_start();
session_start();
include("../fron/connectdb.php");    
	
if(!isset($_SESSION["intLine"])) 
{

	 $_SESSION["intLine"] = 0;
	 $_SESSION["strProductID"][0] = $_GET["med_id"];	//รหัสสินค้า
	 $_SESSION["strQty"][0] = 1;					//จำนวนสินค้า

	 header("location:basket.php");
} 
else
{
	
	$key = array_search($_GET["med_id"], $_SESSION["strProductID"]);
	if((string)$key != "")
	{
		 $_SESSION["strQty"][$key] = $_SESSION["strQty"][$key] + 1;
	}
	else
	{
		
		 $_SESSION["intLine"] = $_SESSION["intLine"] + 1;
		 $intNewLine = $_SESSION["intLine"];
		 $_SESSION["strProductID"][$intNewLine] = $_GET["med_id"];
		 $_SESSION["strQty"][$intNewLine] = 1;
	}
	
	 header("location:basket.php");

}
?>