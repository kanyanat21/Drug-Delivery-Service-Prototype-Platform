<?php

	include("../connectdb.php");

   $id=$_GET["id"];

   $sql="SELECT * FROM tb_admin WHERE id=$id";
   $result=mysqli_query($conn, $sql);
   $row=mysqli_fetch_assoc($result);
?>
<!DOCTYPE html>
<html lang="en"> 
<head>
    <title>ร้านขายยาใกล้บ้าน</title>
    
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
			            <div class="app-utility-item app-user-dropdown dropdown">
				            <a class="dropdown-toggle" id="user-dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false"><img src="../assets/assets/images/admin.png" alt="user profile"></a>
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
		            <a class="app-logo" href="index.php"><img class="logo-icon me-2" src="../assets/assets/images/heart.png" alt="logo">
					<span class="logo-text">eXta Plus Pharmacy</span></a>
		        </div><!--//app-branding-->  
		        
			    <nav id="app-nav-main" class="app-nav app-nav-main flex-grow-1">
				    <ul class="app-menu list-unstyled accordion" id="menu-accordion">
					    <li class="nav-item">
					        <!--//Bootstrap Icons: https://icons.getbootstrap.com/ -->
					        <a class="nav-link" href="../index.php">
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
					        <a class="nav-link active" href="../admin.php">
								<span class="nav-icon">
									<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person" viewBox="0 0 16 16">
										<path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0zm4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10z"/>
									</svg>
						         </span>
		                         <span class="nav-link-text">ข้อมูลพนักงาน</span>
					        </a><!--//nav-link-->
					    </li><!--//nav-item-->

					    <li class="nav-item">
					        <!--//Bootstrap Icons: https://icons.getbootstrap.com/ -->
					        <a class="nav-link" href="../reserv/reser_list.php">
						        <span class="nav-icon">
						        	<svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-card-list" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
										<path fill-rule="evenodd" d="M14.5 3h-13a.5.5 0 0 0-.5.5v9a.5.5 0 0 0 .5.5h13a.5.5 0 0 0 .5-.5v-9a.5.5 0 0 0-.5-.5zm-13-1A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h13a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 14.5 2h-13z"/>
										<path fill-rule="evenodd" d="M5 8a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7A.5.5 0 0 1 5 8zm0-2.5a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5zm0 5a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5z"/>
										<circle cx="3.5" cy="5.5" r=".5"/>
										<circle cx="3.5" cy="8" r=".5"/>
										<circle cx="3.5" cy="10.5" r=".5"/>
									</svg>
						         </span>
		                         <span class="nav-link-text">ข้อมูลสินค้า</span>
					        </a><!--//nav-link-->
					    </li><!--//nav-item-->

						<li class="nav-item">
					        <!--//Bootstrap Icons: https://icons.getbootstrap.com/ -->
					        <a class="nav-link" href="service1/service.php">
						        <span class="nav-icon">
									<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-bag-heart" viewBox="0 0 16 16">
										<path fill-rule="evenodd" d="M10.5 3.5a2.5 2.5 0 0 0-5 0V4h5v-.5Zm1 0V4H15v10a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V4h3.5v-.5a3.5 3.5 0 1 1 7 0ZM14 14V5H2v9a1 1 0 0 0 1 1h10a1 1 0 0 0 1-1ZM8 7.993c1.664-1.711 5.825 1.283 0 5.132-5.825-3.85-1.664-6.843 0-5.132Z"/>
									  </svg>
									</svg>
						         </span>
		                         <span class="nav-link-text">จัดการข้อมูลประเภทสินค้า</span>
					        </a><!--//nav-link-->
					    </li><!--//nav-item-->

						<li class="nav-item">
					        <!--//Bootstrap Icons: https://icons.getbootstrap.com/ -->
					        <a class="nav-link" href="customer/customer.php">
						        <span class="nav-icon">
									<svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-columns-gap" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
										<path fill-rule="evenodd" d="M6 1H1v3h5V1zM1 0a1 1 0 0 0-1 1v3a1 1 0 0 0 1 1h5a1 1 0 0 0 1-1V1a1 1 0 0 0-1-1H1zm14 12h-5v3h5v-3zm-5-1a1 1 0 0 0-1 1v3a1 1 0 0 0 1 1h5a1 1 0 0 0 1-1v-3a1 1 0 0 0-1-1h-5zM6 8H1v7h5V8zM1 7a1 1 0 0 0-1 1v7a1 1 0 0 0 1 1h5a1 1 0 0 0 1-1V8a1 1 0 0 0-1-1H1zm14-6h-5v7h5V1zm-5-1a1 1 0 0 0-1 1v7a1 1 0 0 0 1 1h5a1 1 0 0 0 1-1V1a1 1 0 0 0-1-1h-5z"/>
									  </svg>
						         </span>
								 
		                         <span class="nav-link-text">ข้อมูลลูกค้า</span>
					        </a><!--//nav-link-->
					    </li><!--//nav-item-->

		                        
					    <li class="nav-item">
					        <!--//Bootstrap Icons: https://icons.getbootstrap.com/ -->
					        <a class="nav-link" href="admin/admin.php">
								<span class="nav-icon">
						       		<svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-card-list" fill="currentColor" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-basket" viewBox="0 0 16 16">
										<path d="M5.757 1.071a.5.5 0 0 1 .172.686L3.383 6h9.234L10.07 1.757a.5.5 0 1 1 .858-.514L13.783 6H15a1 1 0 0 1 1 1v1a1 1 0 0 1-1 1v4.5a2.5 2.5 0 0 1-2.5 2.5h-9A2.5 2.5 0 0 1 1 13.5V9a1 1 0 0 1-1-1V7a1 1 0 0 1 1-1h1.217L5.07 1.243a.5.5 0 0 1 .686-.172zM2 9v4.5A1.5 1.5 0 0 0 3.5 15h9a1.5 1.5 0 0 0 1.5-1.5V9H2zM1 7v1h14V7H1zm3 3a.5.5 0 0 1 .5.5v3a.5.5 0 0 1-1 0v-3A.5.5 0 0 1 4 10zm2 0a.5.5 0 0 1 .5.5v3a.5.5 0 0 1-1 0v-3A.5.5 0 0 1 6 10zm2 0a.5.5 0 0 1 .5.5v3a.5.5 0 0 1-1 0v-3A.5.5 0 0 1 8 10zm2 0a.5.5 0 0 1 .5.5v3a.5.5 0 0 1-1 0v-3a.5.5 0 0 1 .5-.5zm2 0a.5.5 0 0 1 .5.5v3a.5.5 0 0 1-1 0v-3a.5.5 0 0 1 .5-.5z"/>
									</svg>
						         </span>
		                         <span class="nav-link-text">คำสั่งซื้อ</span>
					        </a><!--//nav-link-->
					    </li><!--//nav-item-->	

						<li class="nav-item">
					        <!--//Bootstrap Icons: https://icons.getbootstrap.com/ -->
					        <a class="nav-link" href="admin/admin.php">
								<span class="nav-icon">
						        	<svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-files" fill="currentColor" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-window-stack" viewBox="0 0 16 16">
										<path d="M4.5 6a.5.5 0 1 0 0-1 .5.5 0 0 0 0 1ZM6 6a.5.5 0 1 0 0-1 .5.5 0 0 0 0 1Zm2-.5a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0Z"/>
										<path d="M12 1a2 2 0 0 1 2 2 2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2 2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h10ZM2 12V5a2 2 0 0 1 2-2h9a1 1 0 0 0-1-1H2a1 1 0 0 0-1 1v8a1 1 0 0 0 1 1Zm1-4v5a1 1 0 0 0 1 1h10a1 1 0 0 0 1-1V8H3Zm12-1V5a1 1 0 0 0-1-1H4a1 1 0 0 0-1 1v2h12Z"/>
									</svg>
						         </span>
		                         <span class="nav-link-text">รายงานการขาย</span>
					        </a><!--//nav-link-->
					    </li><!--//nav-item-->
				    
				    </ul><!--//app-menu-->
			    </nav><!--//app-nav-->
			    <div class="app-sidepanel-footer">
				    <nav class="app-nav app-nav-footer">
					    <ul class="app-menu footer-menu list-unstyled">
						    <li class="nav-item">
						        <!--//Bootstrap Icons: https://icons.getbootstrap.com/ -->
						        <a class="nav-link" href="../../index.php">
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
	    <div class="app-content pt-3 p-md-3 p-lg-4">
		    <div class="container-xl">			    
			<h3 class="section-title">แก้ไขข้อมูลผู้ดูแลระบบ</h3>
			    <hr class="mb-4">
                <div class="row g-4 settings-section">
	                <div class="col-12 col-md-8">
                        <br>
		                <a href="admin.php" class="btn btn-secondary text-white mb-4 float-right">ย้อนกลับ</a>
                        <br>
                        <br>
		                <div class="app-card app-card-settings shadow-sm p-4">   
						    <div class="app-card-body">

							    <form action="update_admin.php" method="POST">
									<input type="hidden" value="<?php echo $row["id"]; ?>" name=" id">
								    <div class="mb-3">
									    <label  class="form-label">ชื่อ-นามสกุล</label>
									    <input type="text" class="form-control" name="name" value="<?php echo $row["name"]; ?>">
									</div>
									<div class="mb-3">
									    <label  class="form-label">username</label>
									    <input type="text" class="form-control" name="user" value="<?php echo $row["user"]; ?>" >
									</div>
								    <div class="mb-3">
									    <label  class="form-label">password</label>
									    <input type="text" class="form-control" name="password"  value="<?php echo $row["password"]; ?>">
									</div>
                                    <div class="mb-3">
									    <label  class="form-label">E-mail</label>
									    <input type="text" class="form-control" name="email" value="<?php echo $row["email"]; ?>">
									</div>
                                    <div class="mb-3">
									    <label  class="form-label">เบอร์โทร</label>
									    <input type="text" class="form-control" name="phone" value="<?php echo $row["phone"]; ?>">
									</div>
									<button type="submit" class="btn btn-primary text-white mb-4 float-right" name="Submit">บันทึก</button>
							    </form>

						    </div><!--//app-card-body-->
						</div><!--//app-card-->
	                </div>
                </div><!--//row-->
			    <hr class="my-4">
		    </div><!--//container-fluid-->
	    </div><!--//app-content-->      				
 
    <!-- Javascript -->          
    <script src="../assets/assets/plugins/popper.min.js"></script>
    <script src="../assets/assets/plugins/bootstrap/js/bootstrap.min.js"></script>  
    
    <!-- Page Specific JS -->
    <script src="../assets/assets/js/app.js"></script> 

</body>
</html> 

