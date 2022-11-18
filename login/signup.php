<?php

   include("../connectdb.php");

   //ตรวจสอบถ้าว่างให้เด้งไปหน้าหลักและไม่แก้ไขข้อมูล
   if(isset($_POST['Submit'])){
    include_once("../connectdb.php");
  
        
    $sql = "insert into tb_customer (name,user,password,email,address,phone) values('{$_POST['name']}','{$_POST['user']}','{$_POST['password']}','{$_POST['email']}','{$_POST['address']}','{$_POST['phone']}')";
     
    $result = mysqli_query($conn, $sql) or die ("Error in query: $sql " . mysqli_error());
     
    mysqli_close($conn); //ปิดการเชื่อมต่อ database 
     
    //จาวาสคริปแสดงข้อความเมื่อบันทึกเสร็จและกระโดดกลับไปหน้าฟอร์ม
        
        if($result){
        echo "<script type='text/javascript'>";
        //echo "alert('insert Succesfuly');";
        echo "window.location = '../index.php'; ";
        echo "</script>";
        }
        else{
        echo "<script type='text/javascript'>";
        echo "alert('Error back to Update again');";
            echo "window.location = 'signup.php'; ";
        echo "</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <!-- Stylesheet -->
        <link href="../login/css/style.css" rel="stylesheet">
        <link href="../login/js/main.js" rel="stylesheet">
    </head>

<body>
    <div class="container" id="container">
        <div class="form-container sign-in-container">
            <form action="" method ="post">
                <h1>Create Account</h1>
                <input type="text" placeholder="Name" name="name"/>
                <input type="user" placeholder="Username" name="user"/>
                <input type="password" placeholder="Password" name="password"/>
                <input type="email" placeholder="Email" name="email"/>
                <input type="address" placeholder="Address" name="address"/>
                <input type="phone" placeholder="Phone" name="phone"/>
                <button type="submit" name="Submit">Sign Up</button>
                <br>
                <button><a href="../index.php" class="ghost">Back</a></button>
            </form> 
        </div>
        <div class="overlay-container">
            <div class="overlay">
                <div class="overlay-panel overlay-right">
                    <h1>Welcome Back!</h1>
                    <p>To keep connected with us please login with your personal info</p>
                </div>
            </div>
        </div>
    </div>
</body>
</html>

