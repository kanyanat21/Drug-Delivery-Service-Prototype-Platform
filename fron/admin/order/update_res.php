<?php

   include("../connectdb.php");

   //ตรวจสอบถ้าว่างให้เด้งไปหน้าหลักและไม่แก้ไขข้อมูล
if($_POST["res_id"]==''){
    echo "<script type='text/javascript'>"; 
    echo "alert('Error Contact Admin !!');"; 
    echo "window.location = 'reser_list.php'; "; 
    echo "</script>";
    }
     
    //สร้างตัวแปรสำหรับรับค่าที่นำมาแก้ไขจากฟอร์ม
        $res_id = $_POST["res_id"];
        $member_id = $_POST["member_id"];
        $date = $_POST["date"];
        $time = $_POST["time"];	
        $date_record = $_POST["date_record"];
        $total = $_POST["total"];
       
    //ทำการปรับปรุงข้อมูลที่จะแก้ไขลงใน database 
        
        $sql = "UPDATE reserve SET  
               
                member_id='$member_id' , 
                date='$date' ,
                time='$time' ,
                date_record='$date_record' ,
                total='$total'
                WHERE res_id='$res_id' ";
     
    $result = mysqli_query($conn, $sql) or die ("Error in query: $sql " . mysqli_error());
     
    mysqli_close($conn); //ปิดการเชื่อมต่อ database 
     
    //จาวาสคริปแสดงข้อความเมื่อบันทึกเสร็จและกระโดดกลับไปหน้าฟอร์ม
        
        if($result){
        echo "<script type='text/javascript'>";
        //echo "alert('Update Succesfuly');";
        echo "window.location = 'reser_list.php'; ";
        echo "</script>";
        }
        else{
        echo "<script type='text/javascript'>";
        echo "alert('Error back to Update again');";
            echo "window.location = 'reser_list.php'; ";
        echo "</script>";
    }
?>