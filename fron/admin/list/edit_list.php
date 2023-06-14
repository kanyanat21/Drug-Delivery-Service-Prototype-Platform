<?php
include("../connectdb.php");
?>

<!DOCTYPE html>
<html lang="en"> 
<head>
<title>Portal - Bootstrap 5 Admin Dashboard Template For Developers</title>

<!-- Meta -->
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<meta name="description" content="Portal - Bootstrap 5 Admin Dashboard Template For Developers">
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
    <a class="dropdown-toggle" id="user-dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false"><img src="../assets/assets/images/user.png" alt="user profile"></a>
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
<a class="app-logo" href="../index.php"><img class="logo-icon me-2" src="../assets/assets/images/12.png" alt="logo"><span class="logo-text">NAIL ROOM</span></a>

</div><!--//app-branding-->  

<nav id="app-nav-main" class="app-nav app-nav-main flex-grow-1">
<ul class="app-menu list-unstyled accordion" id="menu-accordion">
<li class="nav-item">
    <!--//Bootstrap Icons: https://icons.getbootstrap.com/ -->
    <a class="nav-link " href="../index.php">
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
    <a class="nav-link" href="../ccalendar/index.php">
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
    <a class="nav-link active" href="../customer/customer.php">
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
    <a class="nav-link" href="../admin/admin.php">
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

<div class="app-content pt-3 p-md-3 p-lg-4">
<div class="container-xl">			    

<hr class="mb-4">
<div class="row g-4 settings-section">
<div class="col-12 col-md-4">
<h3 class="section-title">แก้ไขข้อมูลบริการ</h3>
<br>
<a href="service.php" class="btn app-btn-primary">รายการข้อมูล</a>
</div>
<div class="col-12 col-md-8">
<div class="app-card app-card-settings shadow-sm p-4">
    
    <div class="app-card-body">
        <?php
            if(isset($_POST) && !empty($_POST)){
            //echo '<pre>';
            //print_r($_FILES);
            //echo '</pre>';
            // exit();
            $s_name = $_POST['s_name'];
            $s_detail = $_POST['s_detail'];
            $s_price = $_POST['s_price'];
            if(isset($_FILES['image']['name']) && !empty($_FILES['image']['name'])){
                $extension = array("jpeg","jpg","png");
                $target = 'upload/';
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
            $sql = "INSERT INTO service1 (s_name,s_detail,s_price,image) VALUES('$s_name','$s_detail','$s_price','$filename')";
            if(mysqli_query($conn,$sql)){
                echo "แก้ไขข้อมูลสำเร็จ";
            }else{
            echo "error:" .$sql. "<br>". mysqli_error($conn); 
            }
            mysqli_close($conn);
            }
        if(isset($_GET['s_id']) && !empty($_GET['s_id'])){
            $s_id = $_GET['s_id'];
            $sql = "SELECT * FROM service1 WHERE s_id = '$s_id'";
            $query = mysqli_query($conn, $sql);
            $result = mysqli_fetch_assoc($query);
        }
        ?>
        <form action="update_serv.php" method="post" enctype= multipart/form-data>
        <div class="mb-3">
                <label  class="form-label">รูปภาพ</label>
                <image src="upload/<?php echo $result['image']?>" width="100px">
                <input type="file" class="form-control"  name="image" value="<?php echo $result['image']?>">
            </div>
            <div class="mb-3">
                <label  class="form-label">ชื่อบริการ</label>
                <input type="text" class="form-control" name="s_name"  required value="<?php echo $result["s_name"]; ?>">
            </div>
            <div class="mb-3">
                <label  class="form-label">รายละเอียด</label>
                <input type="text" class="form-control" name="s_detail" value="<?php echo $result["s_detail"]; ?>">
            </div>
            <div class="mb-3"> 
                <label  class="form-label">ราคา</label>
                <input type="text" class="form-control" name="s_price"  value="<?php echo $result["s_price"]; ?>">
            </div>
            
            <input type="hidden" name="s_id" value="<?php echo $s_id?>">
            <button type="submit" class="btn btn-outline-primary" name="Submit">บันทึก</button>
            <a href="service.php" class="btn btn-outline-warning" >กลับหน้าแรก</a>
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

