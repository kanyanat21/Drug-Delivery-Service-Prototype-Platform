<?php
include("../connectdb.php");
    if(isset($_POST['Submit']) && !empty($_POST)){
    //echo '<pre>';
    //print_r($_FILES);
    //echo '</pre>';
    // exit();
    $name = $_POST['name'];
    $user = $_POST['user'];
    $password = $_POST['password'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    $phone = $_POST['phone'];
    if(isset($_FILES['image']['name']) && !empty($_FILES['image']['name'])){
        $extension = array("jpeg","jpg","png");
        $target = 'upload_customer/';
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
    $sql = "INSERT INTO tb_customer (name,user,password,email,address,phone,image) VALUES('$name','$user','$password','$email','$address','$phone','$filename')";
    $result = mysqli_query($conn, $sql) or die ("Error in query: $sql " . mysqli_error());
     
    mysqli_close($conn); //ปิดการเชื่อมต่อ database 
     
    //จาวาสคริปแสดงข้อความเมื่อบันทึกเสร็จและกระโดดกลับไปหน้าฟอร์ม
        
        if($result){
        echo "<script type='text/javascript'>";
        //echo "alert('insert Succesfuly');";
        echo "window.location = 'customer.php'; ";
        echo "</script>";
        }
        else{
        echo "<script type='text/javascript'>";
        echo "alert('Error back to Update again');";
            echo "window.location = 'customer.php'; ";
        echo "</script>";
    }
}
?>
