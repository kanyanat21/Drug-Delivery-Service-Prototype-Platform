<?php session_start() ;   
include("../fron/connectdb.php");        
if(!isset($_SESSION['id'])){             
    $_SESSION['error'] = 'กรุณาเข้าสู่ระบบ';             
    header('location: ../fron/customer/login.php');  
    }
?>

<?php
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
                <h1 class="text-danger" >Pharmacy</h1>
            </a>
            <button type="button" class="navbar-toggler me-4" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <div class="navbar-nav ms-auto p-4 p-lg-0">
                    <li class="scroll-to-section"><a href="index.php" class="nav-item nav-link active">Home</a></li>
                    <li class="scroll-to-section"><a href="account.php" class="nav-item nav-link">Account</a></li>
                    <li class="scroll-to-section"><a href="product.php" class="nav-item nav-link">Products</a></li>
                    <li class="scroll-to-section"><a href="#Contact" class="nav-item nav-link">Contact Us</a></li>
                        <div class="d-none d-lg-flex ms-1">
                            <a class="btn-sm-square bg-danger rounded-circle ms-3 mt-3" href="basket.php">
                                <small class="bi bi-cart-fill text-body"></small> 
                            </a>
                        <div class="dropdown"> 
                            <a class="btn-sm-square bg-danger rounded-circle ms-3 mt-3" data-bs-toggle="dropdown"><small class="fa fa-user text-body"></small></a>
                            
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

<br>
<br>
<br>
<br>
<br>

    <!-- Carousel Start -->
    <div class="container-fluid p-0 mb-5 wow fadeIn" data-wow-delay="0.1s">
        <div id="header-carousel" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="../stores/img/pharmacy.png" class="rounded float-end" alt="Image">
                    <div class="carousel-caption">
                        <div class="container">
                            <div class="row justify-content-start">
                                <div class="col-lg-7">
                                    <h1 class="text-gray-700 display-2 mb-5 animated slideInDown">ร้านขายยาใกล้บ้าน</h1>
                                    <h1 class="fs-4 animated slideInDown">New Experience. Health-Care Delivery All The Time.</h1>
                                    <h1  class="fs-6">ร้านที่คุณเลือกได้ทุกที่ทุกเวลา เลือกสิ่งที่คุณต้องการจากร้านขายยาของเราได้ทันที</h1>
                                    <a href="#Product" class="btn btn-danger rounded-pill py-sm-3 px-sm-5">View more</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Carousel End -->


    <!-- Product Start -->
    <section id="Product">
    <div class="container-xxl py-6">
        <div class="container">
            <div class="row g-0 gx-5 align-items-end">
                <div class="col-lg-6">
                    <div class="section-header text-start mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 500px;">
                        <h1 class="display-5 mb-3">Our Popular Categories</h1>
                        <p>ชุดยาที่ใช้รักษา บรรเทา หรือป้องกันอาการบาดเจ็บหรือความเจ็บป่วยในเบื้องต้น.</p>
                    </div>
                </div>
                
                <div class="col-lg-6 text-start text-lg-end wow slideInRight" data-wow-delay="0.1s">
                    <ul class="nav nav-pills d-inline-flex justify-content-end mb-5">
                        
                    <?php foreach($result_tb_type_product as $data):?>
                        <li class="nav-item me-2">
                            <a class="btn btn-outline-primary" href="product.php?type_product_id=<?=$data['id']?>"><?=$data['title'];?></a>
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
                                    <img class="rounded mx-auto d-block w-50" src="../fron/admin/product/upload_product/<?=$data['image'];?>">
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
                                        <a class="text-body" href=""><i class="fa fa-shopping-bag text-primary me-2"></i>Add to cart</a>
                                    </small>
                                </div>
                            </div>
                        </div>
                       
                    <?php endforeach;?>
                    
                    </div>
                </div>
            </div>
            <br>
            <br>
                        <div class="col-12 text-center">
                            <a href="product.php" class="btn btn-danger rounded-pill py-sm-3 px-sm-5">Browse More Products</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


    <!-- Product End -->


    <!-- Firm Visit Start -->
    <div class="container-fluid bg-danger bg-icon mt-5 py-6">
        <div class="container">
        <img src="../stores/img/pills.png" class="rounded float-start" alt="Image">
            <div class="row g-5 align-items-center">
                <div class="col-md-7 wow fadeIn" data-wow-delay="0.1s">
                    <h1 class="display-5 text-white mb-3">Don't miss out on your promotion.</h1>
                    <p class="text-white mb-0">ลงทะเบียนตอนนี้เพื่อรับส่วนลดของคุณทุกที่ทุกเวลา ง่าย รวดเร็ว และเข้าถึงได้สำหรับทุกคนทุกวัย.</p>
                </div>
            </div>
        </div>
    </div>
    <!-- Firm Visit End -->

<br>
<br>
<br>
<br>
<br><img src="../stores/img/dy1.png" class="rounded float-start" alt="Image">
<br>
<br>

    <!-- Testimonial Start -->
    <div class="container-fluid bg-light py-6 mb-5">
        <div class="container">
            <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 500px;">
                <h1 class="display-5 mb-3">Delivery<span class="text-danger">within 45 minutes</span></h1>
                <p>หากสินค้าของคุณใช้เวลามากกว่า 45 นาที เรารับผิดชอบเอง เราภูมิใจที่จะบอกว่าเราดำเนินการจัดส่งอย่างจริงจัง เพื่อให้คุณไม่ต้องกังวลว่าอาหารจะมาถึงคุณอย่างไรหรือเมื่อไหร่</p>
            </div>
        </div> 
    </div>
    <!-- Testimonial End -->


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