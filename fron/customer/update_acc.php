<?php

   include("../connectdb.php");

   //ตรวจสอบถ้าว่างให้เด้งไปหน้าหลักและไม่แก้ไขข้อมูล
if($_POST["cus_id"]==''){
    echo "<script type='text/javascript'>"; 
    echo "alert('Error Contact !!');"; 
    echo "window.location = 'account.php'; "; 
    echo "</script>";
    }
     
    //สร้างตัวแปรสำหรับรับค่าที่นำมาแก้ไขจากฟอร์ม
        $id = $_POST["id"];
        $name = $_POST["name"];
        $user = $_POST["user"];
        $email = $_POST["email"];
		$address = $_POST["address"];
        $phone = $_POST["phone"];
     
    //ทำการปรับปรุงข้อมูลที่จะแก้ไขลงใน database 
        
        $sql = "UPDATE tb_customer SET  
               
               name='$name' , 
               user='$user' ,
               email='$email' ,
			   address='$address' ,
               phone='$phone'
                WHERE id='$id' ";
     
    $result = mysqli_query($conn, $sql) or die ("Error in query: $sql " . mysqli_error());
     
    mysqli_close($conn); //ปิดการเชื่อมต่อ database 
     
    //จาวาสคริปแสดงข้อความเมื่อบันทึกเสร็จและกระโดดกลับไปหน้าฟอร์ม
        
        if($result){
        echo "<script type='text/javascript'>";
        echo "alert('Update Succesfuly');";
        echo "window.location = 'account.php'; ";
        echo "</script>";
        }
        else{
        echo "<script type='text/javascript'>";
        echo "alert('Error back to Update again');";
            echo "window.location = 'account.php'; ";
        echo "</script>";
    }
?>

<!DOCTYPE html>
<html lang="en"> 
<head>
    <title>ร้านขายยาใกล้บ้าน</title>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- Meta -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <meta name="description" content="ร้านขายยาใกล้บ้าน">
    <meta name="author" content="Xiaoying Riley at 3rd Wave Media">    
    <link rel="shortcut icon" href="favicon.ico"> 
    <!-- FontAwesome JS-->
    <script defer src="../assets/assets/plugins/fontawesome/js/all.min.js"></script>
   
    <!-- App CSS -->  
    <link id="theme-style" rel="stylesheet" href="../assets/assets/css/portal.css">

</head> 

<?php 
@session_start();?>
<?php
include("../connectdb.php");
$sql_count  = "SELECT COUNT(id) as days1 FROM `bookings` WHERE DATEDIFF(NOW(),start_datetime)=-1";
$query_count  = mysqli_query($conn,$sql_count );
$result_count  = mysqli_fetch_assoc($query_count );
?>


<?php

include("../connectdb.php");

$a_user = $_SESSION['user'];

$sql="SELECT * FROM td_admin WHERE a_user= '$a_user'";
$query=mysqli_query($conn, $sql);
$result=mysqli_fetch_assoc($query);

if(isset($_POST) && !empty($_POST)){
	if(isset($_POST['profile'])){
		
        $a_name = $_POST["a_name"];
        $a_user = $_POST["a_user"];
        $a_email = $_POST["a_email"];
        $a_phone = $_POST["a_phone"];

		$sql = "UPDATE td_admin SET  
               
			   a_name='$a_name' , 
			   a_user='$a_user' ,
			   a_email='$a_email' ,
			   a_phone='$a_phone'
			WHERE a_user= '$a_user' ";

			if(mysqli_query($conn, $sql)){
				echo "<script>";
				echo "Swal.fire({
					icon: 'success',
					title: 'อัปเดตข้อมูลสำเร็จแล้ว',
					showConfirmButton: false,
					timer: 3000
				  });";
				echo "</script>";
			}else{
				echo "<script>";
				echo "Swal.fire({
					icon: 'error',
					title: 'อัปเดตข้อมูลไม่สำเร็จ กรุณาทำรายการอีกครั้ง',
					showConfirmButton: false,
					timer: 3000
				});";
				echo "</script>";
				}

			mysqli_close($conn); //ปิดการเชื่อมต่อ database 

			
	}
	if(isset($_POST['changepass'])){
			//echo '<pre>';
			//print_r($_POST);
			//echo '</pre>';
		$oldpass = $_POST['oldpass'];
		$newpass = $_POST['newpass'];
		$cofirmpass = $_POST['cofirmpass'];
		if(isset($oldpass) && !empty($oldpass)){
			$sql_check = "SELECT * FROM td_admin WHERE a_user= '$a_user' AND a_pass = '$oldpass'";
			$query_check = mysqli_query($conn,$sql_check);
			$row_check = mysqli_num_rows($query_check);
			if($row_check == 0){
				echo "<script>";
				echo "Swal.fire({
					icon: 'error',
					title: 'รหัสผ่านเก่าไม่ถูกต้อง กรุณากรอกใหม่',
					showConfirmButton: false,
					timer: 3000
				});";
				echo "</script>";
			}else{
				if($newpass != $cofirmpass){
					echo "<script>";
				echo "Swal.fire({
					icon: 'error',
					title: 'ยืนยันรหัสผ่านไม่ถูกต้อง กรุณากรอกใหม่',
					showConfirmButton: false,
					timer: 3000
				});";
				echo "</script>";
				}else{
					$sql = "UPDATE td_admin SET a_pass = '$newpass' WHERE a_user= '$a_user'";
					if(mysqli_query($conn, $sql)){
						echo "<script>";
						echo "Swal.fire({
							icon: 'success',
							title: 'เปลี่ยนรหัสผ่านสำเร็จ',
							showConfirmButton: false,
							timer: 3000
						  });";
						echo "</script>";
						}else{
							echo "<script>";
				echo "Swal.fire({
					icon: 'error',
					title: 'ไม่สามารถเปลี่ยนรหัสผ่าน',
					showConfirmButton: false,
					timer: 3000
				});";
				echo "</script>";
							}
			
						mysqli_close($conn); //ปิดการเชื่อมต่อ database 
				}
			}
		}
	}
}


?>   	
<body class="app">   	
<header class="app-header fixed-top">	   	            
        <div class="app-header-inner">  
	        <div class="container-fluid py-2">
		        <div class="app-header-content"> 
		            <div class="row justify-content-between align-items-center">
			        
				    <div class="col-auto ">
					    <a id="sidepanel-toggler" class="sidepanel-toggler d-inline-block d-xl-none" href="#">
						    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 30 30" role="img"><title>Menu</title><path stroke="currentColor" stroke-linecap="round" stroke-miterlimit="10" stroke-width="2" d="M4 7h22M4 15h22M4 23h22"></path></svg>
					    </a>
				    </div><!--//col-->
		            
		            
		            <div class="app-utilities col-auto">
			            <div class="app-utility-item app-notifications-dropdown dropdown">    
						<a class="dropdown-toggle no-toggle-arrow" id="notifications-dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false" title="Notifications">
					            <!--//Bootstrap Icons: https://icons.getbootstrap.com/ -->
					            <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-bell icon" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
  <path d="M8 16a2 2 0 0 0 2-2H6a2 2 0 0 0 2 2z"/>
  <path fill-rule="evenodd" d="M8 1.918l-.797.161A4.002 4.002 0 0 0 4 6c0 .628-.134 2.197-.459 3.742-.16.767-.376 1.566-.663 2.258h10.244c-.287-.692-.502-1.49-.663-2.258C12.134 8.197 12 6.628 12 6a4.002 4.002 0 0 0-3.203-3.92L8 1.917zM14.22 12c.223.447.481.801.78 1H1c.299-.199.557-.553.78-1C2.68 10.2 3 6.88 3 6c0-2.42 1.72-4.44 4.005-4.901a1 1 0 1 1 1.99 0A5.002 5.002 0 0 1 13 6c0 .88.32 4.2 1.22 6z"/>
</svg>
<span class="icon-badge"><?=$result_count['days1']?></span>
					        </a><!--//dropdown-toggle-->
					        
					        <div class="dropdown-menu p-0" aria-labelledby="notifications-dropdown-toggle">
					            <div class="dropdown-menu-header p-3">
						            <h5 class="dropdown-menu-title mb-0">แจ้งเตือนคิวจอง</h5>
						        </div><!--//dropdown-menu-title-->
						        <div class="dropdown-menu-content">
								<?php
					include("../connectdb.php");
					$sql = "SELECT * FROM `bookings` WHERE DATEDIFF(NOW(),start_datetime)=-1";
					//var_dump($sql);
					$rs = mysqli_query($conn, $sql) ;
					while ($data = mysqli_fetch_array($rs, MYSQLI_BOTH)) {
					?>
							       <div class="item p-3">
								        <div class="row gx-2 justify-content-between align-items-center">
									        <div class="col-auto">
										        <div class="app-icon-holder">
											        <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-receipt" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
	  <path fill-rule="evenodd" d="M1.92.506a.5.5 0 0 1 .434.14L3 1.293l.646-.647a.5.5 0 0 1 .708 0L5 1.293l.646-.647a.5.5 0 0 1 .708 0L7 1.293l.646-.647a.5.5 0 0 1 .708 0L9 1.293l.646-.647a.5.5 0 0 1 .708 0l.646.647.646-.647a.5.5 0 0 1 .708 0l.646.647.646-.647a.5.5 0 0 1 .801.13l.5 1A.5.5 0 0 1 15 2v12a.5.5 0 0 1-.053.224l-.5 1a.5.5 0 0 1-.8.13L13 14.707l-.646.647a.5.5 0 0 1-.708 0L11 14.707l-.646.647a.5.5 0 0 1-.708 0L9 14.707l-.646.647a.5.5 0 0 1-.708 0L7 14.707l-.646.647a.5.5 0 0 1-.708 0L5 14.707l-.646.647a.5.5 0 0 1-.708 0L3 14.707l-.646.647a.5.5 0 0 1-.801-.13l-.5-1A.5.5 0 0 1 1 14V2a.5.5 0 0 1 .053-.224l.5-1a.5.5 0 0 1 .367-.27zm.217 1.338L2 2.118v11.764l.137.274.51-.51a.5.5 0 0 1 .707 0l.646.647.646-.646a.5.5 0 0 1 .708 0l.646.646.646-.646a.5.5 0 0 1 .708 0l.646.646.646-.646a.5.5 0 0 1 .708 0l.646.646.646-.646a.5.5 0 0 1 .708 0l.646.646.646-.646a.5.5 0 0 1 .708 0l.509.509.137-.274V2.118l-.137-.274-.51.51a.5.5 0 0 1-.707 0L12 1.707l-.646.647a.5.5 0 0 1-.708 0L10 1.707l-.646.647a.5.5 0 0 1-.708 0L8 1.707l-.646.647a.5.5 0 0 1-.708 0L6 1.707l-.646.647a.5.5 0 0 1-.708 0L4 1.707l-.646.647a.5.5 0 0 1-.708 0l-.509-.51z"/>
	  <path fill-rule="evenodd" d="M3 4.5a.5.5 0 0 1 .5-.5h6a.5.5 0 1 1 0 1h-6a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h6a.5.5 0 1 1 0 1h-6a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h6a.5.5 0 1 1 0 1h-6a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h6a.5.5 0 0 1 0 1h-6a.5.5 0 0 1-.5-.5zm8-6a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 0 1h-1a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 0 1h-1a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 0 1h-1a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 0 1h-1a.5.5 0 0 1-.5-.5z"/>
	</svg>
										        </div>
									        </div><!--//col-->
									        <div class="col">
										        <div class="info"> 
											        <div class="desc"><?=$data['title'];?></div>
											        
										        </div>
												<ul class="notification-meta list-inline mb-0">
							        <li class="list-inline-item"><?=$data['start_datetime'];?></li>
							        <li class="list-inline-item">|</li>
							        <li class="list-inline-item"><?=$data['description'];?></li>
						        </ul>
								<ul class="notification-meta list-inline mb-0">
							        <li class="list-inline-item"><?=$data['s_name'];?></li>
							        <li class="list-inline-item">|</li>
							        <li class="list-inline-item"><?=$data['s_price'];?> บาท</li>
						        </ul>
									        </div><!--//col-->
								        </div><!--//row-->
								        <a class="link-mask" href="notify.php"></a>
							       </div><!--//item-->
							       <?php  }  ?>	
						        </div><!--//dropdown-menu-content-->
						        
						        <div class="dropdown-menu-footer p-2 text-center">
							        <a href="../notify/notify.php">View all</a>
						        </div>
														
							</div><!--//dropdown-menu-->					        
				        </div><!--//app-utility-item-->
			           
			            
			            <div class="app-utility-item app-user-dropdown dropdown">
				            <a class="dropdown-toggle" id="user-dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false"><img src="../assets/assets/images/user.png" alt="user profile"><?= $_SESSION['user_login']?></a>
				            <ul class="dropdown-menu" aria-labelledby="user-dropdown-toggle">
								<li><a class="dropdown-item" href="account.php">Account</a></li>
								
								<li><hr class="dropdown-divider"></li>
								<li><a class="dropdown-item" href="login.php">Log Out</a></li>
							</ul>
			            </div><!--//app-user-dropdown--> 
		            </div><!--//app-utilities-->
		        </div><!--//row-->
	            </div><!--//app-header-content-->
	        </div><!--//container-fluid-->
        </div><!--//app-header-inner-->
        <div id="app-sidepanel" class="app-sidepanel"> 
	        <div id="sidepanel-drop" class="sidepanel-drop"></div>
	        <div class="sidepanel-inner d-flex flex-column">
		        <a href="#" id="sidepanel-close" class="sidepanel-close d-xl-none">&times;</a>
		        <div class="app-branding">
		            <a class="app-logo" href="index.php"><img class="logo-icon me-2" src="../assets/assets/images/app-logo.svg" alt="logo"><span class="logo-text">NAIL ROOM</span></a>
	
		        </div><!--//app-branding-->  
		        
			    <nav id="app-nav-main" class="app-nav app-nav-main flex-grow-1">
				    <ul class="app-menu list-unstyled accordion" id="menu-accordion">
					    <li class="nav-item">
					        <!--//Bootstrap Icons: https://icons.getbootstrap.com/ -->
					        <a class="nav-link " href="index.php">
						        <span class="nav-icon">
						        <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-house-door" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
		  <path fill-rule="evenodd" d="M7.646 1.146a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 .146.354v7a.5.5 0 0 1-.5.5H9.5a.5.5 0 0 1-.5-.5v-4H7v4a.5.5 0 0 1-.5.5H2a.5.5 0 0 1-.5-.5v-7a.5.5 0 0 1 .146-.354l6-6zM2.5 7.707V14H6v-4a.5.5 0 0 1 .5-.5h3a.5.5 0 0 1 .5.5v4h3.5V7.707L8 2.207l-5.5 5.5z"/>
		  <path fill-rule="evenodd" d="M13 2.5V6l-2-2V2.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5z"/>
		</svg>
						         </span>
		                         <span class="nav-link-text">หน้าหลัก</span>
					        </a><!--//nav-link-->
					    </li><!--//nav-item-->
					    <li class="nav-item">
					        <!--//Bootstrap Icons: https://icons.getbootstrap.com/ -->
					        <a class="nav-link" href="404.php">
						        <span class="nav-icon">
									<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-calendar-check" viewBox="0 0 16 16">
										<path d="M10.854 7.146a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L7.5 9.793l2.646-2.647a.5.5 0 0 1 .708 0z"/>
										<path d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5zM1 4v10a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V4H1z"/>
									  </svg>
						         </span>
		                         <span class="nav-link-text">ปฏิทินการจองคิว</span>
					        </a><!--//nav-link-->
					    </li><!--//nav-item-->
					    <li class="nav-item">
					        <!--//Bootstrap Icons: https://icons.getbootstrap.com/ -->
					        <a class="nav-link" href="reser_list.php">
						        <span class="nav-icon">
						        <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-card-list" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
  <path fill-rule="evenodd" d="M14.5 3h-13a.5.5 0 0 0-.5.5v9a.5.5 0 0 0 .5.5h13a.5.5 0 0 0 .5-.5v-9a.5.5 0 0 0-.5-.5zm-13-1A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h13a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 14.5 2h-13z"/>
  <path fill-rule="evenodd" d="M5 8a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7A.5.5 0 0 1 5 8zm0-2.5a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5zm0 5a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5z"/>
  <circle cx="3.5" cy="5.5" r=".5"/>
  <circle cx="3.5" cy="8" r=".5"/>
  <circle cx="3.5" cy="10.5" r=".5"/>
</svg>
						         </span>
		                         <span class="nav-link-text">จัดการข้อมูลการจองคิว</span>
					        </a><!--//nav-link-->
					    </li><!--//nav-item-->
						<li class="nav-item">
					        <!--//Bootstrap Icons: https://icons.getbootstrap.com/ -->
					        <a class="nav-link" href="service.php">
						        <span class="nav-icon">
									<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-bag-heart" viewBox="0 0 16 16">
										<path fill-rule="evenodd" d="M10.5 3.5a2.5 2.5 0 0 0-5 0V4h5v-.5Zm1 0V4H15v10a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V4h3.5v-.5a3.5 3.5 0 1 1 7 0ZM14 14V5H2v9a1 1 0 0 0 1 1h10a1 1 0 0 0 1-1ZM8 7.993c1.664-1.711 5.825 1.283 0 5.132-5.825-3.85-1.664-6.843 0-5.132Z"/>
									  </svg>
</svg>
						         </span>
		                         <span class="nav-link-text">จัดการข้อมูลบริการ</span>
					        </a><!--//nav-link-->
					    </li><!--//nav-item-->
						<li class="nav-item">
					        <!--//Bootstrap Icons: https://icons.getbootstrap.com/ -->
					        <a class="nav-link" href="customer.php">
						        <span class="nav-icon">
									<svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-columns-gap" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
										<path fill-rule="evenodd" d="M6 1H1v3h5V1zM1 0a1 1 0 0 0-1 1v3a1 1 0 0 0 1 1h5a1 1 0 0 0 1-1V1a1 1 0 0 0-1-1H1zm14 12h-5v3h5v-3zm-5-1a1 1 0 0 0-1 1v3a1 1 0 0 0 1 1h5a1 1 0 0 0 1-1v-3a1 1 0 0 0-1-1h-5zM6 8H1v7h5V8zM1 7a1 1 0 0 0-1 1v7a1 1 0 0 0 1 1h5a1 1 0 0 0 1-1V8a1 1 0 0 0-1-1H1zm14-6h-5v7h5V1zm-5-1a1 1 0 0 0-1 1v7a1 1 0 0 0 1 1h5a1 1 0 0 0 1-1V1a1 1 0 0 0-1-1h-5z"/>
									  </svg>
						         </span>
		                         <span class="nav-link-text">จัดการข้อมูลลูกค้า</span>
					        </a><!--//nav-link-->
					    </li><!--//nav-item-->
					    <li class="nav-item">
					        <!--//Bootstrap Icons: https://icons.getbootstrap.com/ -->
					        <a class="nav-link" href="404.php">
						        <span class="nav-icon">
						        <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-bar-chart-line" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
	  <path fill-rule="evenodd" d="M11 2a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v12h.5a.5.5 0 0 1 0 1H.5a.5.5 0 0 1 0-1H1v-3a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v3h1V7a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v7h1V2zm1 12h2V2h-2v12zm-3 0V7H7v7h2zm-5 0v-3H2v3h2z"/>
	</svg>
						         </span>
		                         <span class="nav-link-text">คะแนน&ความคิดเห็น</span>
					        </a><!--//nav-link-->
					    </li><!--//nav-item-->
						<li class="nav-item">
					        <!--//Bootstrap Icons: https://icons.getbootstrap.com/ -->
					        <a class="nav-link" href="../notify/notify.php">
						        <span class="nav-icon">
								<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-bell" viewBox="0 0 16 16">
  <path d="M8 16a2 2 0 0 0 2-2H6a2 2 0 0 0 2 2zM8 1.918l-.797.161A4.002 4.002 0 0 0 4 6c0 .628-.134 2.197-.459 3.742-.16.767-.376 1.566-.663 2.258h10.244c-.287-.692-.502-1.49-.663-2.258C12.134 8.197 12 6.628 12 6a4.002 4.002 0 0 0-3.203-3.92L8 1.917zM14.22 12c.223.447.481.801.78 1H1c.299-.199.557-.553.78-1C2.68 10.2 3 6.88 3 6c0-2.42 1.72-4.44 4.005-4.901a1 1 0 1 1 1.99 0A5.002 5.002 0 0 1 13 6c0 .88.32 4.2 1.22 6z"/>
</svg>
						         </span>
		                         <span class="nav-link-text">แจ้งเตือนคิวจอง</span>
								
					        </a><!--//nav-link-->
					    </li><!--//nav-item-->	
		                        
					    <li class="nav-item">
					        <!--//Bootstrap Icons: https://icons.getbootstrap.com/ -->
					        <a class="nav-link" href="account.php">
						        <span class="nav-icon">
									<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person" viewBox="0 0 16 16">
										<path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0zm4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10z"/>
									  </svg>
						         </span>
		                         <span class="nav-link-text">บัญชีผู้ดูแลระบบ</span>
					        </a><!--//nav-link-->
					    </li><!--//nav-item-->	
				    
				    </ul><!--//app-menu-->
			    </nav><!--//app-nav-->
			    <div class="app-sidepanel-footer">
				    <nav class="app-nav app-nav-footer">
					    <ul class="app-menu footer-menu list-unstyled">
						    <li class="nav-item">
						        <!--//Bootstrap Icons: https://icons.getbootstrap.com/ -->
						        <a class="nav-link" href="login.php">
							        <span class="nav-icon">
							            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-box-arrow-left" viewBox="0 0 16 16">
											<path fill-rule="evenodd" d="M6 12.5a.5.5 0 0 0 .5.5h8a.5.5 0 0 0 .5-.5v-9a.5.5 0 0 0-.5-.5h-8a.5.5 0 0 0-.5.5v2a.5.5 0 0 1-1 0v-2A1.5 1.5 0 0 1 6.5 2h8A1.5 1.5 0 0 1 16 3.5v9a1.5 1.5 0 0 1-1.5 1.5h-8A1.5 1.5 0 0 1 5 12.5v-2a.5.5 0 0 1 1 0v2z"/>
											<path fill-rule="evenodd" d="M.146 8.354a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L1.707 7.5H10.5a.5.5 0 0 1 0 1H1.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3z"/>
										  </svg>
							        </span>
			                        
			                        <span class="nav-link-text">ออกจากระบบ</span>
						        </a><!--//nav-link-->
						    </li><!--//nav-item-->

					    </ul><!--//footer-menu-->
				    </nav>
			    </div><!--//app-sidepanel-footer-->
		       
	        </div><!--//sidepanel-inner-->
	    </div><!--//app-sidepanel-->
    </header><!--//app-header-->
    
    <div class="app-wrapper">
		 <br>  
	<h4 class="app-card-title">บัญชีของฉัน</h4>
	<br>  
	    <div class="app-content">
		    <div class="container">
                <div class="row gy-4">
	                <div class="col-12 col-lg-6">
		                <div class="app-card app-card-account shadow-sm d-flex flex-column align-items-start">
						    <div class="app-card-header p-3 border-bottom-0">
						        <div class="row align-items-center gx-3">
							        <div class="col-auto">
								        
										<i class='fas fa-user-circle' style='font-size:30px;color:#FFACC7'></i>
									   
						                
							        </div><!--//col-->
							        <div class="col-auto">
								        <h4 class="app-card-title">Profile</h4>
							        </div><!--//col-->
						        </div><!--//row-->
						    </div><!--//app-card-header-->
							
						    <div class="app-card-body px-4 w-100">
							<form action="" method="POST">
							    <div class="item border-bottom py-3">
								    <div class="row justify-content-between align-items-center">
									    <div class="">
										    <div class="item-label"><strong>Username</strong></div>
									        <div class="item-data">
											<input type="text" class="form-control" name="a_user" value="<?php echo $result["a_user"]; ?>" >
											</div>
									    </div><!--//col-->
									    
								    </div><!--//row-->
							    </div><!--//item-->
							    <div class="item border-bottom py-3">
								    <div class="row justify-content-between align-items-center">
									    <div class="">
										    <div class="item-label"><strong>ชื่อ</strong></div>
									        <div class="item-data">
											<input type="text" class="form-control" name="a_name" value="<?php echo $result["a_name"]; ?>">
											</div>
									    </div><!--//col-->
									    
								    </div><!--//row-->
							    </div><!--//item-->
							    <div class="item border-bottom py-3">
								    <div class="row justify-content-between align-items-center">
									    <div class="">
										    <div class="item-label"><strong>Email</strong></div>
									        <div class="item-data">
											<input type="text" class="form-control" name="a_email" value="<?php echo $result["a_email"]; ?>">
									        </div>
									    </div><!--//col-->
									    
								    </div><!--//row-->
							    </div><!--//item-->
							    <div class="item border-bottom py-3">
								    <div class="row justify-content-between align-items-center">
									    <div class="">
										    <div class="item-label"><strong>เบอร์โทร</strong></div>
									        <div class="item-data">
											<input type="text" class="form-control" name="a_phone" value="<?php echo $result["a_phone"]; ?>">
									        </div>
									    </div><!--//col-->
									    
								    </div><!--//row-->
							    </div><!--//item-->
								<input type="hidden" name="profile">
								<input type="submit" class="btn  btn-success" value="อัปเดตข้อมูล"></input>
								
								</form>
						    </div><!--//app-card-body-->
						    
						   
						</div><!--//app-card-->
	                </div><!--//col-->
	                
	                <div class="col-12 col-lg-4">
		                <div class="app-card app-card-account shadow-sm d-flex flex-column align-items-start">
						    <div class="app-card-header p-3 border-bottom-0">
						        <div class="row align-items-center gx-3">
							        <div class="">
									<i class='fas fa-shield-alt' style='font-size:30px;color:#FFACC7'></i>
						                
							        </div><!--//col-->
							        <div class="">
								        <h4 class="app-card-title">Security</h4>
							        </div><!--//col-->
						        </div><!--//row-->
						    </div><!--//app-card-header-->
							
						    <div class="app-card-body px-4 w-100">
							<form action="" method="POST">
							    <div class="item border-bottom py-3">
								    <div class="row justify-content-between align-items-center">
									<div class="">
										    <div class="item-label"><strong>รหัสผ่านเก่า</strong></div>
									        <div class="item-data">
											<input type="text" class="form-control" name="oldpass" placeholder="รหัสผ่านเก่า">
									        </div>
									    </div><!--//col-->
										
									    
								    </div><!--//row-->
							    </div><!--//item-->
							    <div class="item border-bottom py-3">
								    <div class="row justify-content-between align-items-center">
									<div class="">
										    <div class="item-label"><strong>รหัสผ่านใหม่</strong></div>
									        <div class="item-data">
											<input type="text" class="form-control" name="newpass" placeholder="รหัสผ่านใหม่">
									        </div>
									    </div><!--//col-->
								    </div><!--//row-->
							    </div><!--//item-->
								<div class="item border-bottom py-3">
								    <div class="row justify-content-between align-items-center">
									<div class="">
										    <div class="item-label"><strong>ยืนยันรหัสผ่าน</strong></div>
									        <div class="item-data">
											<input type="text" class="form-control" name="cofirmpass" placeholder="ยืนยันรหัสผ่าน">
									        </div>
									    </div><!--//col-->
								    </div><!--//row-->
							    </div><!--//item-->
								<input type="hidden" name="changepass">
								<input type="submit" class="btn  btn-success" value="ยืนยันการเปลี่ยนรหัสผ่าน"></input>
								</form>
						    </div><!--//app-card-body-->
							
						</div><!--//app-card-->
	                </div>
    </div><!--//app-wrapper-->    					

 
    <!-- Javascript -->          
    <script src="../assets/assets/plugins/popper.min.js"></script>
    <script src="../assets/assets/plugins/bootstrap/js/bootstrap.min.js"></script>  
    
    <!-- Page Specific JS -->
    <script src="../assets/assets/js/app.js"></script> 

</body>
</html> 

