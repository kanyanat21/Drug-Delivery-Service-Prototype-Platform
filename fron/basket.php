<?php session_start(); ?>
<?php
	include("connectdb.php");
	$sql2 = "select * from tb_product where med_id='".@$_GET['id']."' ";
	$result_tb_type_product = mysqli_query($conn, $sql2) ;
	$data = mysqli_fetch_array($result_tb_type_product, MYSQLI_BOTH);
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
	include("connectdb.php");
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
                <small class="ms-4"><i class="fa fa-envelope me-2"></i>info@gmail.com</small>
            </div>
            
        </div>

        <nav class="navbar navbar-expand-lg navbar-light py-lg-0 px-lg-5 wow fadeIn" data-wow-delay="0.1s">
            <a href="index.php" class="navbar-brand ms-4 ms-lg-0">
                <h1 class="text-danger">Pharmacy</h1>
            </a>
            <button type="button" class="navbar-toggler me-4" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <div class="navbar-nav ms-auto p-4 p-lg-0">
                    <a href="index.php" class="nav-item nav-link">Home</a>
                    <a href="customer/account.php" class="nav-item nav-link">Account</a>
                    <a href="product.php" class="nav-item nav-link">Products</a>
                    <li class="scroll-to-section"><a href="#" class="nav-item nav-link">Contact Us</a></li>
                    <?php if(isset($_SESSION['user']) && !empty($_SESSION['user'])):?>
                        <div class="d-none d-lg-flex ms-1">
                            <a class="btn-sm-square bg-danger rounded-circle ms-3 mt-3" href="basket.php">
                                <small class="bi bi-cart-fill text-body"></small> 
                            </a>
                        <div class="app-utility-item app-user-dropdown dropdown"> 
                            <a class="btn-sm-square bg-danger rounded-circle ms-3 mt-3" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false"><small class="fa fa-user text-body"></small></a>
                            
                            <ul class="dropdown-menu" aria-labelledby="user-dropdown-toggle">
                                <li><a class="dropdown-item" href="javascript:void(0)"> <?= $_SESSION['user']?></a></li>
                                <li><a class="dropdown-item" href="customer/account.php">Account</a></li>
                                <li><hr class="dropdown-divider"></li>
                                <li><a class="dropdown-item" href="customer/logout.php">Log Out</a></li>
                            </ul>
                    <?php else:?>
                        <a href="customer/signup.php" class="nav-item nav-link">SIGNUP</a>
                        <a href="customer/login.php" class="nav-item nav-link">LOGIN</a>
                    <?php endif?>
                    </div><!--//app-user-dropdown--> 
                </div>
            </div>
        </nav>
    </div>
    <!-- Navbar End -->
<br>
<br>
<br>
<br>
<br>
    <!-- Product Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="row g-0 gx-5 align-items-end">
                <div class="col-lg-6">
                    <div class="section-header text-start mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 500px;">
                        <h1 class="display-5 mb-3">ตะกร้าสินค้า</h1>
                    </div>
                </div>
            </div>
<div class="tab-content" id="orders-table-tab-content">
<div class="tab-pane fade show active" id="orders-all" role="tabpanel" aria-labelledby="orders-all-tab">
	<div class="app-card app-card-orders-table shadow-sm mb-5">
	<div class="app-card-body">
		<div class="table-responsive">
			<table class="table app-table-hover mb-0 text-left">
				<thead> 
					<tr>
						<th class="cell">ลำดับ</th>
						<th class="cell">รูปภาพ</th>
						<th class="cell">ชื่อ</th>
						<th class="cell">ราคา/ชิ้น</th>
                        <th class="cell">จำนวน</th>
						<th class="cell">รวม</th>
                        <th class="cell">&nbsp;</th>
					</tr>
                    <?php
                        if(!empty($_SESSION['sid'])) {
                            foreach($_SESSION['sid'] as $tid) {
                                @$i++;
                                $sum[$tid] = $_SESSION['sprice'][$tid] * $_SESSION['sitem'][$tid] ;
                                @$total += $sum[$tid] ;
                    ?>
                    <tr>
                        <td><?=$i;?></td>
                        <td><img src="admin/product/upload_product/<?=$_SESSION['simage'][$tid];?>" width="100" height="100"></td>
                        <td><?=$_SESSION['stitle'][$tid];?></td>
                        <td><?=number_format($_SESSION['sprice'][$tid],0);?></td>
                        <td> <?=$_SESSION['sitem'][$tid];?></td>
                        <td><?=number_format($sum[$tid],0);?></td>
                        <td><a href="clear2.php?id=<?=$tid;?>" class="btn btn-danger rounded-pill py-sm-2 px-sm-3">ลบ</a></td>
                    </tr>
                <?php } // end foreach ?>
                    <tr>
                        <td colspan="5" align="right"><strong>รวมทั้งสิ้น</strong> &nbsp; </td>
                        <td><strong><?=number_format($total,0);?></strong></td>
                        <td><strong>บาท</strong></td>
                    </tr>
                <?php 
                } else {
                ?>
                    <tr>
                        <td colspan="7" height="50" align="center">ไม่มีสินค้าในตะกร้า</td>
                    </tr>
                <?php } // end if ?>
				</thead>
                 
				<tbody>
			</table>
		</div><!--//table-responsive-->
        <br>
        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
            <a href="record.php" class="btn btn-success rounded-pill ms-12 mt-2 py-sm-3 px-sm-3 me-md-2">สั่งซื้อสินค้า</a>
        </div>
	</div><!--//app-card-body-->		
</div><!--//app-card-->
</div><!--//tab-pane-->
</div><!--//container-fluid-->
</div><!--//app-content-->
</div><!--//app-wrapper-->    

        </div>
    </div>
    <!-- Product End -->
<br>
<br>
<br>
<br>
<br>

    <!-- Footer Start -->
    <div class="container-fluid bg-dark footer mt-5 pt-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="container py-5">
            <div class="row g-5">
                <div class="col-lg-3 col-md-6">
                    <h1 class="text-danger">Pharmacy</h1>
                    <p>Diam dolor diam ipsum sit. Aliqu diam amet diam et eos. Clita erat ipsum et lorem et sit, sed stet lorem sit clita</p>
                    <div class="d-flex pt-2">
                        <a class="btn btn-square btn-outline-light rounded-circle me-1" href=""><i class="fab fa-twitter"></i></a>
                        <a class="btn btn-square btn-outline-light rounded-circle me-1" href=""><i class="fab fa-facebook-f"></i></a>
                        <a class="btn btn-square btn-outline-light rounded-circle me-1" href=""><i class="fab fa-youtube"></i></a>
                        <a class="btn btn-square btn-outline-light rounded-circle me-0" href=""><i class="fab fa-linkedin-in"></i></a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <h4 class="text-light mb-4">Address</h4>
                    <p><i class="fa fa-map-marker-alt me-3"></i>251 หมู่20 ขามเรียง, กันทรวิชัย, มหาสารคาม</p>
                    <p><i class="fa fa-phone-alt me-3"></i>+012 345 67890</p>
                    <p><i class="fa fa-envelope me-3"></i>info@example.com</p>
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
    <!-- Footer End -->


<!-- Back to Top -->
<a href="#" class="btn btn-lg btn-primary btn-lg-square rounded-circle back-to-top"><i class="bi bi-arrow-up"></i></a>


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