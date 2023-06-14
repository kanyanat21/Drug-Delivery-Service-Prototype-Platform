
<?php

   include("../connectdb.php");

   //ตรวจสอบถ้าว่างให้เด้งไปหน้าหลักและไม่แก้ไขข้อมูล 
   if(isset($_POST['Submit'])){
    include_once("../connectdb.php");
  
        
    $sql = "insert into tb_admin (name,user,password,email,phone) 
    values( '{$_POST['name']}', '{$_POST['user']}','{$_POST['password']}', '{$_POST['email']}', '{$_POST['phone']}')";
     
    $result = mysqli_query($conn, $sql) or die ("Error in query: $sql " . mysqli_error());
     
    mysqli_close($conn); //ปิดการเชื่อมต่อ database 
     
    //จาวาสคริปแสดงข้อความเมื่อบันทึกเสร็จและกระโดดกลับไปหน้าฟอร์ม
        
        if($result){
        echo "<script type='text/javascript'>";
        //echo "alert('insert Succesfuly');";
        echo "window.location = 'admin.php'; ";
        echo "</script>";
        }
        else{
        echo "<script type='text/javascript'>";
        echo "alert('Error back to Update again');";
            echo "window.location = 'admin.php'; ";
        echo "</script>";
    }
}
?>

