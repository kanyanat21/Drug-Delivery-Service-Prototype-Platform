<?php

   include("../connectdb.php");

   //ตรวจสอบถ้าว่างให้เด้งไปหน้าหลักและไม่แก้ไขข้อมูล
    if($_POST["med_id"]==''){ 
        echo "<script type='text/javascript'>"; 
        echo "alert('Error Contact Admin !!');"; 
        echo "window.location = 'product.php'; "; 
        echo "</script>";
        }
    
      if(isset($_FILES['image']['name']) && !empty($_FILES['image']['name'])){
          $extension = array("jpeg","jpg","png");
          $target = 'upload_product/';
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
      //echo $filename;
      //exit();

       //สร้างตัวแปรสำหรับรับค่าที่นำมาแก้ไขจากฟอร์ม
       $med_id = $_POST["med_id"];
       $type_product_id = $_POST["type_product_id"];
       $med_name = $_POST["med_name"];
       $med_detail = $_POST["med_detail"];	
       $med_price = $_POST["med_price"];
       $med_cost = $_POST["med_cost"];
    
   //ทำการปรับปรุงข้อมูลที่จะแก้ไขลงใน database 

      $sql = "UPDATE tb_product SET  
        type_product_id='$type_product_id' , 
        med_name='$med_name' ,
        med_detail='$med_detail' ,
        med_price='$med_price' ,
        med_cost='$med_cost'
        $strFile
        WHERE med_id='$med_id' ";

    $result = mysqli_query($conn, $sql) or die ("Error in query: $sql " . mysqli_error());

    mysqli_close($conn); //ปิดการเชื่อมต่อ database 
     
    //จาวาสคริปแสดงข้อความเมื่อบันทึกเสร็จและกระโดดกลับไปหน้าฟอร์ม
        
        if($result){
       
       echo "<script type='text/javascript'>";
        //echo "alert('Update Succesfuly');";
        echo "window.location = 'product.php'; ";
        echo "</script>";
        }
        else{
        echo "<script type='text/javascript'>";
        echo "alert('Error back to Update again');";
            echo "window.location = 'product.php'; ";
        echo "</script>";
    }
    include("../connectdb.php");
    $sql = "SELECT * FROM tb_type_product";
    $result = mysqli_query($conn, $sql);
?>