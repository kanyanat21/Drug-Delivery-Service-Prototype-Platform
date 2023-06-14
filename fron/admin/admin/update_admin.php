<?php

   include("../connectdb.php");

   //ตรวจสอบถ้าว่างให้เด้งไปหน้าหลักและไม่แก้ไขข้อมูล
if($_POST["id"]==''){
    echo "<script type='text/javascript'>"; 
    echo "alert('Error Contact Admin !!');"; 
    echo "window.location = 'admin.php'; "; 
    echo "</script>";
    }
     
    //สร้างตัวแปรสำหรับรับค่าที่นำมาแก้ไขจากฟอร์ม
        $id = $_POST["id"];
        $name = $_POST["name"];
        $user = $_POST["user"];
        $password = $_POST["password"];	
        $email = $_POST["email"];
        $phone = $_POST["phone"];
     
    //ทำการปรับปรุงข้อมูลที่จะแก้ไขลงใน database 
        
        $sql = "UPDATE tb_admin SET  
                name='$name' , 
                user='$user' ,
                password='$password' ,
                email='$email' ,
                phone='$phone'
                WHERE id='$id' ";
     
    $result = mysqli_query($conn, $sql) or die ("Error in query: $sql " . mysqli_error());
     
    mysqli_close($conn); //ปิดการเชื่อมต่อ database 
     
    //จาวาสคริปแสดงข้อความเมื่อบันทึกเสร็จและกระโดดกลับไปหน้าฟอร์ม
        
        if($result){
        echo "<script type='text/javascript'>";
        //echo "alert('Update Succesfuly');";
        echo "window.location = 'admin.php'; ";
        echo "</script>";
        }
        else{
        echo "<script type='text/javascript'>";
        echo "alert('Error back to Update again');";
        echo "window.location = 'admin.php'; ";
        echo "</script>";
    }
?>