<?php session_start() ;  
include("../fron/connectdb.php");         
if(!isset($_SESSION['id'])){             
    $_SESSION['error'] = 'กรุณาเข้าสู่ระบบ';              
    header('location: ../fron/customer/login.php');        
    } ?>

<?php
	$sql = "select * from tb_product where med_id='".@$_GET['id']."' ";
	$rs = mysqli_query($conn, $sql) ;
	$data = mysqli_fetch_array($rs, MYSQLI_BOTH);
	@$id = $_GET['id'] ;

    if(isset($_GET['id'])) {
		$_SESSION['sid'][$id] = $data['med_id'];
		$_SESSION['stitle'][$id] = $data['med_name'];
		$_SESSION['sprice'][$id] = $data['med_cost'];
		$_SESSION['simage'][$id] = $data['image'];
		@$_SESSION['sitem'][$id]++;
	}
?>
<?php
	$sql = "SELECT p.*,tp.title AS title_type_product FROM tb_product p 
			LEFT JOIN tb_type_product tp ON tp.id = p.type_product_id";
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
    <link href="../stores/lib/animate/animate.min.css" rel="stylesheet">
    <link href="../stores/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="../stores/css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="../stores/css/style.css" rel="stylesheet">
</head>
<style>
    body {
	 
	  font-family: Kanit;
   
	  }
</style>
<body>

 <!--<?php
$id = $_SESSION['id'];

$sql="SELECT * FROM tb_customer WHERE id= '$id'";
$query=mysqli_query($conn, $sql);
$row=mysqli_fetch_assoc($query);

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
}
?>-->

    <!-- Spinner Start -->
    <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-border text-primary" role="status"></div>
    </div>
    <!-- Spinner End -->


    <!-- Navbar Start -->
    <div class="container-fluid fixed-top px-0 wow fadeIn" data-wow-delay="0.1s">
        <div class="top-bar row gx-0 align-items-center d-none d-lg-flex">
            <div class="col-lg-6 px-5 text-start">
                <small><i class="fa fa-map-marker-alt me-2"></i>251 หมู่20 ขามเรียง, กันทรวิชัย, มหาสารคาม</small>
                <small class="ms-4"><i class="fa fa-envelope me-2"></i>pharmacy@gmail.com</small>
            </div>
        </div>

        <nav class="navbar navbar-expand-lg navbar-light py-lg-0 px-lg-5 wow fadeIn" data-wow-delay="0.1s">
            <a href="index.php" class="navbar-brand ms-4 ms-lg-0">
                <h1 class="text-gradient">ชำระเงิน</h1>
            </a>
            <button type="button" class="navbar-toggler me-4" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <div class="navbar-nav ms-auto p-4 p-lg-0">
                    <a href="index.php" class="nav-item nav-link">Home</a>
                    <a href="account.php" class="nav-item nav-link">Account</a>
                    <a href="product.php" class="nav-item nav-link">Products</a>
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
                    </div><!--//app-user-dropdown--> 
                </div>
            </div>
        </nav>
    </div>
    <!-- Navbar End -->
<br>
<br>
<br>
<!-- Product Start -->
<div class="container bg-light mt-5 py-4">
    <div class="row"> 
        <div class="col-6">
        <?php 
              if(isset($_SESSION['id'])){
                $id = $_SESSION['id'];
                $rs = $conn->query("SELECT * FROM tb_customer WHERE id= '$id'");
                $data = mysqli_fetch_array($rs);
              }
            ?>

            <?php
                include("../fron/connectdb.php");    
                    if(isset($_POST['Submit']) && !empty($_POST)){
                    //echo '<pre>';
                    //print_r($_FILES);
                    //echo '</pre>';
                    // exit();
                    $name = $_POST['name'];
                    $phone = $_POST['phone'];
                    $address = $_POST['address'];
                    if(isset($_FILES['image']['name']) && !empty($_FILES['image']['name'])){
                        $extension = array("jpeg","jpg","png");
                        $target = '../fron/admin/order/upload_order/';
                        $filename = $_FILES['image']['name'];
                        $filetmp =$_FILES['image']['tmp_name'];
                        $ext = pathinfo($filename,PATHINFO_EXTENSION);
                        if(in_array($ext,$extension)){
                            if(!file_exists($target.$filename)){
                                if(move_uploaded_file($filetmp,$target.$filename)){
                                    $filename = $filename;
                                }else{
                                    echo 'เพิ่มไฟล์เข้า folder ไม่สำเร็จ';
                                }
                            }else{
                                $newfilename = time().$filename;
                                if(move_uploaded_file($filetmp,$target.$newfilename)){
                                    $filename = $newfilename;
                                }else{
                                    echo 'เพิ่มไฟล์เข้า folder ไม่สำเร็จ';
                                }
                            }
                            }else{
                                echo 'ประเภทไฟล์ไม่ถูกต้อง';
                        }
                        }else{
                            $filename = '';
                    }
                    //echo $filename;
                    //exit();
                    $sql = "INSERT INTO tb_address (name,phone,address,image) VALUES('$name','$phone','$address','$filename')";
                    if(mysqli_query($conn,$sql)){
                        $alert .= '<script type="text/javascript">';
                        $alert .= 'alert("สั่งซื้อสินค้าสำเร็จ กรุณารอสักครู่");';
                        $alert .= 'window.location = "index.php";';
                        $alert .= '</script>';
                        echo $alert;
                        exit();
                    
                    }else{
                    echo "error:" .$sql. "<br>". mysqli_error($conn); 
                }
                    mysqli_close($conn);
                }
            ?>
        <form method="post" action="" enctype="multipart/form-data" novalidate>		
            <div style="background-color:#F72D57; width: 1300; height: auto; border-radius: 24px; border: 3px solid #900C3F;" class="card">
                <div class="card-body">
                <h3 style="color: white; font-size: 30px; margin-bottom: 20px;" >ที่อยู่ในการจัดส่ง</h3>
                <div class="d-flex p-2 bd-highlight">
                    <div class=" col-md-6 ">
                        <label class="form-label" style="color: white; font-size: 17px;  margin-bottom: 13px;" required>ชื่อ-นามสกุล</label>
                        <input type="text" class="form-control" style="border: 2px solid #900C3F; width: 500px" name="name" value="<?=$data['name'];?>">
                    </div>
                    <div class="col-mb-3 ">
                        <label class="form-label" style="color: white; font-size: 17px;  margin-bottom: 13px;" required>เบอร์โทรศัพท์</label>
                        <input type="text" class="form-control" style="border: 2px solid #900C3F; width: 300px" name="phone" value="<?=$data['phone'];?>">
                    </div>
                </div>
                <div class="d-flex p-2 bd-highlight">
                    <div class="col-mb-8">
                        <div class="mb-3">
                            <label class="form-label" for="exampleFormControlTextarea1" style="color: white; font-size: 17px; margin-bottom: 13px;">ที่อยู่</label>
                            <input type="text" class="form-control" style="border: 2px solid #900C3F; width: 1250" rows="3" name="address" value="<?=$data['address'];?>"></input>
                        </div>
                        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                            <a class="btn btn-light rounded-pill py-sm-2 px-sm-3" href="edit_cus.php?id=<?php echo $data["id"] ?>">แก้ไข</a>
                        </div> 
                    </div>
                </div>
            </div>	
        </div>	
            <div style="background-color:#F72D57; width: 1300; height: auto; border-radius: 24px; border: 3px solid #900C3F;" class="card">
                <div class="card-body">
                <div class="d-flex p-2 bd-highlight">
                    <div class=" col-md-3 ">
                        <img src="https://promptpay.io/0966916592.png" class="card-img-top" alt="..." style="width: 300; height: auto;">
                    </div>
                </div>
                    <div class="col-md-3">
                        <label class="form-label" style="color: white; font-size: 17px;  margin-bottom: 13px; " required>แนบสลิปการชำระเงิน</label>
                        <input type="file" class="form-control" name="image" required style="border: 2px solid #900C3F; width: 250px">
                    </div>
                    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                        <button type="submit" class="btn btn-light rounded-pill py-sm-2 px-sm-3" name="Submit">สั่งซื้อ</button>
                        <a href="basket.php" class="btn btn-light rounded-pill py-sm-2 px-sm-3">ย้อนกลับ</a>
                    </div>
                    </div>
                </div>
            </div>	
        </div>
        </form>

        </div>
    </div>
</div>
<!-- Product End --> 

<br>
<br> 
<br>
<br>
<br>
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
<!-- JavaScript Libraries -->
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="../stores/lib/wow/wow.min.js"></script>
<script src="../stores/lib/easing/easing.min.js"></script>
<script src="../stores/lib/waypoints/waypoints.min.js"></script>
<script src="../stores/lib/owlcarousel/owl.carousel.min.js"></script>

<!-- Template Javascript -->
<script src="../stores/js/main.js"></script>
</body>

</html>