<?php

   include("../connectdb.php");

   //ตรวจสอบถ้าว่างให้เด้งไปหน้าหลักและไม่แก้ไขข้อมูล
if($_POST["id"]==''){ 
    echo "<script type='text/javascript'>"; 
    echo "alert('Error Contact Admin !!');"; 
    echo "window.location = 'typeproduct.php'; "; 
    echo "</script>";
    }
     
    //สร้างตัวแปรสำหรับรับค่าที่นำมาแก้ไขจากฟอร์ม
        $id = $_POST["id"];
        $title = $_POST["title"];
     
    //ทำการปรับปรุงข้อมูลที่จะแก้ไขลงใน database 
        
        $sql = "UPDATE tb_type_product SET  
                title='$title'
                WHERE id='$id' ";
     
    $result = mysqli_query($conn, $sql) or die ("Error in query: $sql " . mysqli_error());
     
    mysqli_close($conn); //ปิดการเชื่อมต่อ database 
     
    //จาวาสคริปแสดงข้อความเมื่อบันทึกเสร็จและกระโดดกลับไปหน้าฟอร์ม
        
        if($result){
        echo "<script type='text/javascript'>";
        echo "alert('Update Succesfuly');";
        echo "window.location = 'typeproduct.php'; ";
        echo "</script>";
        }
        else{
        echo "<script type='text/javascript'>";
        echo "alert('Error back to Update again');";
        echo "window.location = 'typeproduct.php'; ";
        echo "</script>";
    }
?>