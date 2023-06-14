<?php session_start(); ?>
<?php
	include("../connectdb.php");
    $sql = "SELECT * FROM tb_type_product";
    $result_tb_type_product = mysqli_query($conn, $sql);
	$count = mysqli_num_rows($result_tb_type_product);
	$order = 1;
?>
<?php
	$sql = "SELECT *,tb_type_product.title as type_title FROM tb_product LEFT JOIN tb_type_product ON tb_product.type_product_id = tb_type_product.id";
	$result = mysqli_query($conn, $sql);
	$count = mysqli_num_rows($result);
	$order = 1;
?>

<!DOCTYPE html>
<html lang="en">

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
    <link href="../../stores/lib/animate/animate.min.css" rel="stylesheet">
    <link href="../../stores/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="../../stores/css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="../../stores/css/style.css" rel="stylesheet">

	 <!-- Bootstrap core CSS -->
	 <link href="../../account/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">


	<!-- Additional CSS Files -->
	<link rel="stylesheet" href="../../account/assets/css/fontawesome.css">
	<link rel="stylesheet" href="../../account/assets/css/templatemo-cyborg-gaming.css">
	<link rel="stylesheet" href="../../account/assets/css/owl.css">
	<link rel="stylesheet" href="../../account/assets/css/animate.css">
	<link rel="stylesheet"href="https://unpkg.com/swiper@7/swiper-bundle.min.css"/>
	<!--TemplateMo 579 Cyborg Gaming https://templatemo.com/tm-579-cyborg-gaming-->
</head>
<style>
    body {
	 
	  font-family: Kanit;
	  }
</style>
<body>

<?php
@session_start();
if(empty($_SESSION['user'])){
	echo "<script type='text/javascript'>";
//echo "alert('ออกจากระบบเรียบร้อยแล้ว');";
echo "window.location = '../customer/login.php'; ";
echo "</script>";
}
?>

<?php
$user = $_SESSION['user'];

$sql="SELECT * FROM tb_customer WHERE user= '$user'";
$query=mysqli_query($conn, $sql);
$result=mysqli_fetch_assoc($query);

if(isset($_POST) && !empty($_POST)){
	if(isset($_POST['profile'])){
		//echo '<pre>';
		//	print_r($_POST);
			//echo '</pre>';
		$name = $_POST["name"];
        $user = $_POST["user"];
        $phone = $_POST["phone"];
        $address = $_POST["address"];

		$sql = "UPDATE tb_customer SET  
               
			name='$name' , 
			user='$user' ,
			username='$username' ,
			phone='$phone' ,
			address='$address'
			WHERE user= '$user' ";

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
			$sql_check = "SELECT * FROM tb_customer WHERE user= '$user' AND pass = '$oldpass'";
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
					$sql = "UPDATE tb_customer SET pass = '$newpass' WHERE user= '$user'";
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
                <small class="ms-4"><i class="fa fa-envelope me-2"></i>info@gmail.com</small>
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
                    <li class="scroll-to-section"><a href="../index.php" class="nav-item nav-link">Home</a></li>
                    <li class="scroll-to-section"><a href="account.php" class="nav-item nav-link active">Account</a></li>
                    <li class="scroll-to-section"><a href="../product.php" class="nav-item nav-link">Products</a></li>
                    <li class="scroll-to-section"><a href="#" class="nav-item nav-link">Contact Us</a></li>
                    <?php if(isset($_SESSION['user']) && !empty($_SESSION['user'])):?>
                        <div class="d-none d-lg-flex ms-1">
                            <a class="btn-sm-square bg-danger rounded-circle ms-3 mt-3" href="../basket.php">
                                <small class="bi bi-cart-fill text-body"></small> 
                            </a>
                        <div class="app-utility-item app-user-dropdown dropdown"> 
                            <a class="btn-sm-square bg-danger rounded-circle ms-3 mt-3" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false"><small class="fa fa-user text-body"></small></a>
                            
                            <ul class="dropdown-menu" aria-labelledby="user-dropdown-toggle">
                                <li><a class="dropdown-item" href="javascript:void(0)"> <?= $_SESSION['user']?></a></li>
                                <li><a class="dropdown-item" href="account.php">Account</a></li>
                                <li><hr class="dropdown-divider"></li>
                                <li><a class="dropdown-item" href="customer/logout.php">Log Out</a></li>
                            </ul>
                    <?php else:?>
                    <a href="customer/signup.php" class="nav-item nav-link">SIGNUP</a>
                    <a href="customer/login.php" class="nav-item nav-link">LOGIN</a>
                    <?php endif?>
                </div>
                    </div><!--//app-user-dropdown--> 
                </div>
            </div>
        </nav>
    </div>
    <!-- Navbar End -->


<!-- ***** Header Area End ***** -->

<div class="container">
    <div class="row">
      <div class="col-lg-12">
        <div class="page-content">

          <!-- ***** Banner Start ***** -->
          <div class="main-banner">
            <div class="row">
              <div class="col-lg-7">
                <div class="header-text">
                  <div {text-align: left;} >
                    <style>
                      img {
                        width: 200px;
                        height: 200;
                        border-radius: 50%;
                        padding: 5  0px;
                        
                      }
                    </style>
                    <img src="../admin/customer/upload_customer/<?php echo $result["image"]; ?>">
					<div class="input-group mb-3">
						<label class="input-group-text" for="inputGroupFile01">Upload</label>
						<input type="file" class="form-control" id="inputGroupFile01">
					</div>

					  <h3><em>Profile</em></h3><br>
					  <div class="app-card-body px-4 w-100">
							<form action="" method="POST">
							    <div class="item border-bottom py-3">
								    <div class="row justify-content-between align-items-center">
									    <div class="">
										    <div class="item-label"><strong>Username</strong></div>
									        <div class="item-data">
											<input type="text" class="form-control" name="user" value="<?php echo $result["user"]; ?>" >
											</div>
									    </div><!--//col-->
									    
								    </div><!--//row-->
							    </div><!--//item-->
							    <div class="item border-bottom py-3"> 
								    <div class="row justify-content-between align-items-center">
									    <div class="">
										    <div class="item-label"><strong>ชื่อ-นามสกุล</strong></div>
									        <div class="item-data">
											<input type="text" class="form-control" name="name" value="<?php echo $result["name"]; ?>">
											</div>
									    </div><!--//col-->
									    
								    </div><!--//row-->
							    </div><!--//item-->
								<div class="item border-bottom py-3">
								    <div class="row justify-content-between align-items-center">
									    <div class="">
										    <div class="item-label"><strong>เบอร์โทร</strong></div>
									        <div class="item-data">
											<input type="text" class="form-control" name="phone" value="<?php echo $result["phone"]; ?>">
									        </div>
									    </div><!--//col-->
									    
								    </div><!--//row-->
							    </div><!--//item-->
							    <div class="item border-bottom py-3">
								    <div class="row justify-content-between align-items-center">
									    <div class="">
										    <div class="item-label"><strong>ที่อยู่</strong></div>
									        <div class="item-data">
											<input type="text" class="form-control" name="address" value="<?php echo $result["address"]; ?>">
									        </div>
									    </div><!--//col-->
									    
								    </div><!--//row-->
								<div class="main-button">
									<input type="hidden" name="profile">
									<br>
									<input type="submit" class="btn btn-light rounded-pill py-sm-2 px-sm-3" value="อัปเดตข้อมูล"></input>
								</div>
								</form>
						    </div><!--//app-card-body-->
						</div><!--//app-card-->
	                </div><!--//col-->
				</div><!--//app-wrapper--> 
                    


          <!-- ***** Most Popular Start ***** -->
          <div class="most-popular">
            <div class="row">
              <div class="col-lg-12">
                <div class="heading-section">           
                  <h3><em>สถานะการจัดส่ง</em></h3>
                </div>
                <div class="row">
                  <div class="col-lg-3 col-sm-6">
                    <div class="item">
                      <img src="https://www.kindpng.com/picc/m/145-1452108_transparent-scooter-clipart-motorcycle-delivery-icon-png-png.png"  width="200" height="200" alt="">
                      <h4>กำลังเตรียมของ<br></h4>&ensp;&ensp;
                    </div>
                  </div>
                  <div class="col-lg-3 col-sm-6">
                    <div class="item">
                     <img src="https://www.citypng.com/public/uploads/preview/png-vector-scooter-delivery-cartoon-illustration-11635937995pwnhh1fdq5.png" width="200" height="200" alt="">
                     <h4>กำลังจัดส่ง<br></h4>&ensp;&ensp;
                    </div>
                  </div>
                  <div class="col-lg-3 col-sm-6">
                    <div class="item">
                      <img src="https://png.pngtree.com/png-vector/20190115/ourlarge/pngtree-vector-verified-cart-items-icon-png-image_319798.jpg" width="200" height="200"  alt="">
                      <h4>จัดส่งสำเร็จ<br></h4>&ensp;&ensp;
                    </div>
                  </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- ***** Most Popular End ***** -->

        </div>
      </div>
    </div>
  </div>


    <!-- Footer Start -->
    <div class="container-fluid bg-dark footer mt-5 pt-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="container-fluid copyright">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
                        <h1 class="text-danger">Pharmacy</h1>
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
    <!-- Footer End -->


    <!-- Back to Top -->
    <!-- <a href="#" class="btn btn-lg btn-primary btn-lg-square rounded-circle back-to-top"><i class="bi bi-arrow-up"></i></a>-->


    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="../../stores/lib/wow/wow.min.js"></script>
    <script src="../../stores/lib/easing/easing.min.js"></script>
    <script src="../../stores/lib/waypoints/waypoints.min.js"></script>
    <script src="../../stores/lib/owlcarousel/owl.carousel.min.js"></script>

	<script src="../../account/vendor/jquery/jquery.min.js"></script>
	<script src="../../account/vendor/bootstrap/js/bootstrap.min.js"></script>

	<script src="../../account/assets/js/isotope.min.js"></script>
	<script src="../../account/assets/js/owl-carousel.js"></script>
	<script src="../../account/assets/js/tabs.js"></script>
	<script src="../../account/assets/js/popup.js"></script>
	<script src="../../account/assets/js/custom.js"></script>

    <!-- Template Javascript -->
    <script src="../../stores/js/main.js"></script>
</body>
</html>