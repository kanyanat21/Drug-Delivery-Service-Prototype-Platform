<?php session_start() ;  
include("../fron/connectdb.php");         
if(!isset($_SESSION['id'])){             
    $_SESSION['error'] = 'กรุณาเข้าสู่ระบบ';              
    header('location: ../fron/customer/login.php');        
    } ?>

<!DOCTYPE html>
<html lang="en">

<?php
include("../fron/connectdb.php");  
$id = $_SESSION['id'];

$sql="SELECT * FROM tb_customer WHERE id= '$id'";
$query=mysqli_query($conn, $sql);
$result=mysqli_fetch_assoc($query);

if(isset($_POST) && !empty($_POST)){
	if(isset($_POST['profile'])){
		//echo '<pre>';
		//	print_r($_POST);
			//echo '</pre>';
        $name = $_POST["name"];
        $user = $_POST["user"];
        $email = $_POST["email"];
        $phone = $_POST["phone"];
        $address = $_POST["address"];

		$sql = "UPDATE tb_customer SET  
               
		name='$name' , 
		user='$user' ,
		email='$email' ,
		phone='$phone' ,
		address='$address'
		WHERE id= '$id' ";

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
			$sql_check = "SELECT * FROM tb_customer WHERE id= '$id' AND password = '$oldpass'";
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
					$sql = "UPDATE tb_customer SET pass = '$newpass' WHERE id= '$id'";
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

<head>
    <meta charset="utf-8">
    <title>ร้านขายยาใกล้บ้าน</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="../stores/img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;500&family=Lora:wght@600;700&display=swap" rel="stylesheet"> 

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="../stores/lib/animate/animate.min.css" rel="stylesheet">
    <link href="../stores/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="../stores/css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="../stores/css/style.css" rel="stylesheet">

	 <!-- Bootstrap core CSS -->
	 <link href="../account/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">


	<!-- Additional CSS Files -->
	<link rel="stylesheet" href="../account/assets/css/fontawesome.css">
	<link rel="stylesheet" href="../account/assets/css/templatemo-cyborg-gaming.css">
	<link rel="stylesheet" href="../account/assets/css/owl.css">
	<link rel="stylesheet" href="../account/assets/css/animate.css">
	<link rel="stylesheet"href="https://unpkg.com/swiper@7/swiper-bundle.min.css"/>
	<!--TemplateMo 579 Cyborg Gaming https://templatemo.com/tm-579-cyborg-gaming-->
</head>
<style>
    body {
	  font-family: Kanit;
	  }
</style>
<body>
    <!-- Spinner Start -->
    <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-border text-primary" role="status"></div>
    </div>
    <!-- Spinner End -->

    <!-- Navbar Start -->
    <div class="container-fluid fixed-top px-0 wow fadeIn" data-wow-delay="0.1s">
        <div class="top-bar row gx-0 align-items-center d-none d-lg-flex">
            <div class="col-lg-6 px-5 text-start">
                <small><i class="fa fa-map-marker-alt me-2"></i>123 ขามเรียง, กันทรวิชัย, มหาสารคาม</small>
                <small class="ms-4"><i class="fa fa-envelope me-2"></i>pharmacy@gmail.com</small>
            </div>
        </div>

        <nav class="navbar navbar-expand-lg navbar-light py-lg-0 px-lg-5 wow fadeIn" data-wow-delay="0.1s">
            <a href="index.php" class="navbar-brand ms-4 ms-lg-0">
                <h1 class="text-danger" >Pharmacy</h1>
            </a>
            <button type="button" class="navbar-toggler me-4" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <div class="navbar-nav ms-auto p-4 p-lg-0">
                    <li class="scroll-to-section"><a href="index.php" class="nav-item nav-link">Home</a></li>
                    <li class="scroll-to-section"><a href="account.php" class="nav-item nav-link active">Account</a></li>
                    <li class="scroll-to-section"><a href="product.php" class="nav-item nav-link">Products</a></li>
                    <li class="scroll-to-section"><a href="#Contact" class="nav-item nav-link">Contact Us</a></li>
                    
                        <div class="d-none d-lg-flex ms-1">
                            <a class="btn-sm-square bg-danger rounded-circle ms-3 mt-3" href="basket.php">
                                <small class="bi bi-cart-fill text-body"></small> 
                            </a>
                        <div class="app-utility-item app-user-dropdown dropdown"> 
                            <a class="btn-sm-square bg-danger rounded-circle ms-3 mt-3" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false"><small class="fa fa-user text-body"></small></a>
                            
                            <ul class="dropdown-menu" aria-labelledby="user-dropdown-toggle">
                                <li><a class="dropdown-item" href="../fron/customer/logout.php">Log Out</a></li>
                            </ul>
                </div>
                    </div><!--//app-user-dropdown--> 
                </div>
            </div>
        </nav>
    </div>
    <!-- Navbar End -->


<!-- ***** Header Area End ***** -->

          <!-- ***** Banner Start ***** -->
          <div class="container bg-light mt-5 py-4">
          <div class="most-popular">
            <div class="row">
            <div class="app-wrapper"> 
            <div class="app-content">
                <div class="container">
                <div class="row gy-4">
	                <div class="col-12 col-lg-6">
		                <div class="app-card app-card-account shadow-sm d-flex flex-column align-items-start">
						    <div class="app-card-header p-3 border-bottom-0">
						        <div class="row align-items-center gx-3">
							        
						        </div><!--//row-->
						    </div><!--//app-card-header-->
							<style>
                                img {
                                    width: 150px;
                                    height: 150;
                                    border-radius: 150%;
                                    padding: 5px;
                                }
                            </style>
						    <div class="app-card-body px-4 w-100">
                                <?php 
                                    if(isset($_SESSION['id'])){
                                        $u_id = $_SESSION['id'];
                                        $rs = $conn->query("SELECT * FROM tb_customer WHERE id= '$u_id'");
                                        $data = mysqli_fetch_array($rs);
                                    }
                                ?>
							<form action="" method="POST">
                                <img src="../fron/admin/customer/upload_customer/<?=$data['image']?>">
                                <div class="input-group mb-3 py-3">
                                    <input type="file" class="form-control" id="inputGroupFile01">
                                </div>
                                <div class="col-auto">
								        <h3 class="app-card-title">Profile</h3>
							        </div><!--//col-->
                                <div class="d-flex bd-highlight">
							    <div class="item border-bottom py-3">
								    <div class="row justify-content-between align-items-center">
									    <div class="">
										    <div class="item-label"><strong>Username</strong></div>
									        <div class="item-data">
											<input type="text" class="form-control" name="user" value="<?=$data['user']?>" >
											</div>
									    </div><!--//col-->
								    </div><!--//row-->
							    </div><!--//item-->
							    <div class="item border-bottom py-3"> 
								    <div class="row justify-content-between align-items-center">
									    <div class="">
										    <div class="item-label"><strong>ชื่อ-นามสกุล</strong></div>
									        <div class="item-data">
											<input type="text" class="form-control" name="name" value="<?=$data['name']?>">
											</div>
									    </div><!--//col-->
								    </div><!--//row-->
							    </div><!--//item-->
                                </div>

                                <div class="d-flex bd-highlight">
                                <div class="item border-bottom py-3"> 
								    <div class="row justify-content-between align-items-center">
									    <div class="">
										    <div class="item-label"><strong>Email</strong></div>
									        <div class="item-data">
											<input type="email" class="form-control" name="email" value="<?=$data['email']?>">
											</div>
									    </div><!--//col-->
								    </div><!--//row-->
							    </div><!--//item-->

								<div class="item border-bottom py-3">
								    <div class="row justify-content-between align-items-center">
									    <div class="">
										    <div class="item-label"><strong>เบอร์โทร</strong></div>
									        <div class="item-data">
											<input type="text" class="form-control" name="phone" value="<?=$data['phone']?>">
									        </div>
									    </div><!--//col-->
								    </div><!--//row-->
							    </div><!--//item-->
                                </div>

							    <div class="item border-bottom py-3">
								    <div class="row justify-content-between align-items-center">
									    <div class="">
										    <div class="item-label"><strong>ที่อยู่</strong></div>
									      <div class="item-data">
											    <input type="text" class="form-control" name="address" value="<?=$data['address']?>">
									      </div>
									    </div><!--//col-->
								    </div><!--//row-->
                                </div><!--//item-->
								<input type="hidden" name="profile">
								<input type="submit"  class="btn btn-success rounded-pill py-sm-2 px-sm-3" value="อัปเดตข้อมูล"></input>
								
								</form>
						    </div><!--//app-card-body-->
						</div><!--//app-card-->
	                </div><!--//col-->
	                
	                <div class="col-12 col-lg-4">
		                <div class="app-card app-card-account shadow-sm d-flex flex-column align-items-start">
						    <div class="app-card-header p-3 border-bottom-0">
                            <br>
                                <br>
                                <br>
                                <br>
                                <br>
                                <br>
                                <br>
                                <br>
                                <br>
                                <br>
						        <div class="row align-items-center gx-3">
							        <div class="col-auto">
								        <h3 class="app-card-title">Security</h3>
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
								<input type="submit" class="btn btn-success rounded-pill py-sm-2 px-sm-3" value="ยืนยันการเปลี่ยนรหัสผ่าน"></input>
								</form>
						    </div><!--//app-card-body-->
						</div><!--//app-card-->
	                </div>
                </div><!--//app-wrapper-->  
                </div>
            </div>
            <!-- ***** Banner End ***** -->
        </div>
        </div>
    </div>
    
    
          <!-- ***** Most Popular Start ***** -->
          <div class="most-popular">
            <div class="row">
              <div class="col-lg-12">
                <div class="heading-section">           
                  <h3>สถานะการจัดส่ง</h3>
                </div>

                <br>
                        <!-- Button trigger modal -->
                        <a type="button" class="btn btn-light rounded-pill py-sm-2 px-sm-3" data-bs-toggle="modal" data-bs-target="#staticBackdrop">รายละเอียดคำสั่งซื่อ</a>

                        <!-- Modal -->
                        <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">รายละเอียด</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                            <div class="modal-body">
                                
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            </div> 
                            </div>
                        </div>
                        </div>
                        <!-- Modal -->

                <div class="row">
                  <div class="col-lg-4 col-sm-6">
                    <div class="item">
                      <img src="../stores/img/delivery-man.png"  width="50" height="50" alt="">
                      <br>
                      <h4>กำลังเตรียมของ<br></h4>&ensp;&ensp;
                    </div>
                  </div>
                  <div class="col-lg-4 col-sm-6">
                    <div class="item">
                     <img src="../stores/img/delivery.png" width="50" height="50" alt="">
                     <br>
                     <h4>กำลังจัดส่ง<br></h4>&ensp;&ensp;
                    </div>
                  </div>
                  <div class="col-lg-4 col-sm-6">
                    <div class="item">
                      <img src="../stores/img/delivery (1).png" width="50" height="50"  alt="">
                      <br>
                      <h4>จัดส่งสำเร็จ<br></h4>&ensp;&ensp;
                    </div>
                  </div>
                  </div>
                </div>
              </div>
            </div>
            </div> 
          <!-- ***** Most Popular End ***** -->


        <!-- Footer Start -->
    <section id="Contact">
    <div class="container-fluid bg-dark footer mt-5 pt-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="container py-5">
            <div class="row g-5">
                <div class="col-lg-3 col-md-6">
                    <h1 class="text-danger">Pharmacy</h1>
                    <p>New Experience. Health-Care Delivery All The Time. ร้านที่คุณเลือกได้ทุกที่ทุกเวลา เลือกสิ่งที่คุณต้องการจากร้านขายยาของเราได้ทันที</p>
                    <div class="d-flex pt-2">
                        <a class="btn btn-square btn-outline-light rounded-circle me-1" href=""><i class="fab fa-twitter"></i></a>
                        <a class="btn btn-square btn-outline-light rounded-circle me-1" href=""><i class="fab fa-facebook-f"></i></a>
                        <a class="btn btn-square btn-outline-light rounded-circle me-1" href=""><i class="fab fa-youtube"></i></a>
                        <a class="btn btn-square btn-outline-light rounded-circle me-0" href=""><i class="fab fa-linkedin-in"></i></a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <h4 class="text-light mb-4">Address</h4>
                    <p><i class="fa fa-map-marker-alt me-3"></i>123 ขามเรียง, กันทรวิชัย, มหาสารคาม,</p>
                    <p><i class="fa fa-phone-alt me-3"></i>0966916592</p>
                    <p><i class="fa fa-envelope me-3"></i>pharmacy@gmail.com</p>
                </div>
                <div class="col-lg-3 col-md-6">
                    <h4 class="text-light mb-4">Quick Links</h4>
                    <a class="btn btn-link" href="">About Us</a>
                    <a class="btn btn-link" href="">Contact Us</a>
                    <a class="btn btn-link" href="">Our Services</a>
                    <a class="btn btn-link" href="">Terms & Condition</a>
                    <a class="btn btn-link" href="">Support</a>
                </div>
                <div class="col-lg-3 col-md-6">
                    <h4 class="text-light mb-4">Newsletter</h4>
                    <p>Dolor amet sit justo amet elitr clita ipsum elitr est.</p>
                    <div class="position-relative mx-auto" style="max-width: 400px;">
                        <input class="form-control bg-transparent w-100 py-3 ps-4 pe-5" type="text" placeholder="Your email">
                        <button type="button" class="btn btn-primary py-2 position-absolute top-0 end-0 mt-2 me-2">SignUp</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid copyright">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
                        &copy; <a href="#">Your Site Name</a>, All Right Reserved.
                    </div>
                    <div class="col-md-6 text-center text-md-end">
                        <!--/*** This template is free as long as you keep the footer author’s credit link/attribution link/backlink. If you'd like to use the template without the footer author’s credit link/attribution link/backlink, you can purchase the Credit Removal License from "https://htmlcodex.com/credit-removal". Thank you for your support. ***/-->
                        Designed By <a href="https://htmlcodex.com">HTML Codex</a>
                        <br>Distributed By: <a href="https://themewagon.com" target="_blank">ThemeWagon</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </section>
    <!-- Footer End -->


    <!-- Back to Top -->
    <!-- <a href="#" class="btn btn-lg btn-primary btn-lg-square rounded-circle back-to-top"><i class="bi bi-arrow-up"></i></a>-->


    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="../stores/lib/wow/wow.min.js"></script>
    <script src="../stores/lib/easing/easing.min.js"></script>
    <script src="../stores/lib/waypoints/waypoints.min.js"></script>
    <script src="../stores/lib/owlcarousel/owl.carousel.min.js"></script>

	<script src="../account/vendor/jquery/jquery.min.js"></script>
	<script src="../account/vendor/bootstrap/js/bootstrap.min.js"></script>

	<script src="../account/assets/js/isotope.min.js"></script>
	<script src="../account/assets/js/owl-carousel.js"></script>
	<script src="../account/assets/js/tabs.js"></script>
	<script src="../account/assets/js/popup.js"></script>
	<script src="../account/assets/js/custom.js"></script>

    <!-- Template Javascript -->
    <script src="../stores/js/main.js"></script>
</body>
</html>