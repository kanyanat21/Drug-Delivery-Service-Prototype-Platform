<?php session_start(); ?>
<?php 
	include("connectdb.php");
    $sql2 = "SELECT * FROM tb_type_product";
    $result_tb_type_product = mysqli_query($conn, $sql2);


    //if(isstet($_GET['page'])){

    //}else{
        $page = 1;
    //}
    $record_show = 3;
    $offset = ($page - 1) * $record_show;

    $sql_total = "SELECT * FROM tb_product";
    $result_total = mysqli_query($conn, $sql_total);
    $count_total = mysqli_num_rows($result_total);

    $page_total = ceil($count_total/$record_show);

	$sql = "SELECT *,tb_type_product.title as type_title FROM tb_product LEFT JOIN tb_type_product ON tb_product.type_product_id = tb_type_product.id";
    if(isset($_GET['type_product_id']) && !empty($_GET['type_product_id'])){
        $sql .= " WHERE type_product_id = '".$_GET['type_product_id']."'";
    }
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
                <small><i class="fa fa-map-marker-alt me-2"></i>123 ขามเรียง, กันทรวิชัย, มหาสารคาม</small>
                <small class="ms-4"><i class="fa fa-envelope me-2"></i>pharmacy@gmail.com</small>
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
                    <a href="product.php" class="nav-item nav-link active">Products</a>
                    <li class="scroll-to-section"><a href="#Contact" class="nav-item nav-link">Contact Us</a></li>
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
                        <h1 class="display-5 mb-3">สินค้า</h1>
                        <p>ชุดยาที่ใช้รักษา บรรเทา หรือป้องกันอาการบาดเจ็บหรือความเจ็บป่วยในเบื้องต้น.</p>
                    </div>
                </div>

                <div class="col-lg-6 text-lg-end">
                    <ul class="nav nav-pills d-inline-flex justify-content-end mb-5">
                        <form class="docs-search-form row gx-1 align-items-center">
							<div class="col-auto">
								<input type="text" id="search-docs" name="searchdocs" class="form-control search-docs" placeholder="Search">
							</div>
							<div class="col-auto">
								<button type="submit" class="btn btn-outline-primary border-2">Search</button>
							</div>
						</form>
                    </ul>
                    <ul class="nav nav-pills d-inline-flex justify-content-end mb-5">
                        <li class="nav-item me-2">
                            <a href="product.php" class="btn btn-outline-primary
                            <?= !isset($_GET['type_product_id']) ? 'active' : ''?>">ทั้งหมด</a>
                        </li>
                        <?php foreach($result_tb_type_product as $data):?>
                            <li class="nav-item me-2">
                                <a href="?type_product_id=<?=$data['id']?>" class="btn btn-outline-primary 
                                <?=isset($_GET['type_product_id']) && $_GET['type_product_id'] == $data['id'] ? 'active' : ''?>"><?=$data['title']?></a>
                            </li>
                        <?php endforeach;?>
                    </ul>
                </div>
            </div>

            <div class="tab-content">
                <div id="tab-1" class="tab-pane fade show p-0 active">
                    <div class="row g-4">
                    
                    <?php foreach($result as $data):?>
                        
                        <div class="col-xl-3 col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                            <div class="product-item"> 
                                <div class="position-relative bg-light overflow-hidden">
                                    <img class="rounded mx-auto d-block w-50" src="admin/product/upload_product/<?=$data['image'];?>">
                                </div>
                                <div class="text-center p-4">
                                    <a class="d-block h5 mb-2"><?=$data['med_name'];?></a>
                                    <p class="text-dark mb-2">ประเภท : <?=$data['type_title'];?></p>
                                    <span class="text-primary me-1">ราคา : <?=$data['med_cost'];?> บาท</span>
                                    </div>
                                <div class="d-flex border-top">
                                <small class="w-50 text-center border-end py-2">
                                         <a class="text-body" href=""><i class="fa fa-eye text-primary me-2"></i>View detail</a> 
                                    </small>
                                    
                                    <small class="w-50 text-center py-2">
                                        <!-- <a class="text-body" href=""><i class="fa fa-shopping-bag text-primary me-2"></i>Add to cart</a>
                                        Button trigger modal -->
                                        <a class="text-body" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                        <i class="fa fa-shopping-bag text-primary me-2"></i>Add to cart</a>

                                        <!-- Modal -->
                                        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">แจ้งเตือน</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                กรุณาเข้าสู่ระบบ
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                <a type="button" class="btn btn-primary" href="../fron/customer/signup.php">เข้าสู่ระบบ</a>
                                            </div>
                                            </div>
                                        </div>
                                        </div>
                                    </small>
                                </div>
                            </div>
                        </div>
                    <?php endforeach;?>
                    </div>
                </div>
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