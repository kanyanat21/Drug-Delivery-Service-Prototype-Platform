<?php

   include("../connectdb.php");

   //ตรวจสอบถ้าว่างให้เด้งไปหน้าหลักและไม่แก้ไขข้อมูล
if($_POST["s_id"]==''){
    echo "<script type='text/javascript'>"; 
    echo "alert('Error Contact Admin !!');"; 
    echo "window.location = 'service.php'; "; 
    echo "</script>";
    }
    if(isset($_FILES['image']['name']) && !empty($_FILES['image']['name'])){
        $extension = array("jpeg","jpg","png");
        $target = 'upload/';
        $filename = $_FILES['image']['name'];
        $filetmp =$_FILES['image']['tmp_name'];
        $ext = pathinfo($filename,PATHINFO_EXTENSION);
        $strFile = ",image = '".$filename."'";
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
            $strFile = '';
    }
   
     
    //สร้างตัวแปรสำหรับรับค่าที่นำมาแก้ไขจากฟอร์ม
        $s_id = $_POST["s_id"];
        $s_name = $_POST["s_name"];
        $s_detail = $_POST["s_detail"];
        $s_price= $_POST["s_price"];	
       // $image = $_POST["image"];
        
       
    //ทำการปรับปรุงข้อมูลที่จะแก้ไขลงใน database 
        
        $sql = "UPDATE service1 SET  
               
                s_name='$s_name' , 
                s_detail='$s_detail' ,
                s_price='$s_price' 
                $strFile
                 WHERE s_id='$s_id' ";
     
    $result = mysqli_query($conn, $sql) or die ("Error in query: $sql " . mysqli_error());
     
    mysqli_close($conn); //ปิดการเชื่อมต่อ database 
     
    //จาวาสคริปแสดงข้อความเมื่อบันทึกเสร็จและกระโดดกลับไปหน้าฟอร์ม
        
        if($result){
       
       echo "<script type='text/javascript'>";
        //echo "alert('Update Succesfuly');";
        echo "window.location = 'service.php'; ";
        echo "</script>";
        }
        else{
        echo "<script type='text/javascript'>";
        echo "alert('Error back to Update again');";
            echo "window.location = 'service.php'; ";
        echo "</script>";
    }
?>