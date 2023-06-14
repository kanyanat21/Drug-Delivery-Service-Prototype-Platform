<?php
   include("../connectdb.php");
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <!-- Stylesheet -->
        <link href="../customer/css/style.css" rel="stylesheet">
        <link href="../customer/js/main.js" rel="stylesheet">
    </head>

<body>
    <div class="container" id="container" style="width: 60%; height: 650px;">
        <div class="form-container sign-in-container">

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
                $target = '../admin/customer/upload_customer/';
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
        $sql = "INSERT INTO tb_customer (name,user,password,email,address,phone,image)
        values('$name','$user','$password','$email','$address','$phone','$filename')";
        if(mysqli_query($conn,$sql)){
            $alert .= '<script type="text/javascript">';
            $alert .= 'alert("เพิ่มข้อมูลสำเร็จ");';
            $alert .= 'window.location = "login.php";';
            $alert .= '</script>';
            echo $alert;
            exit();
        
        }else{
        echo "error:" .$sql. "<br>". mysqli_error($conn); 
    }
        mysqli_close($conn);
    }
?>
            <form action="" method ="post"  enctype= multipart/form-data>
                <h1>SIGNUP</h1>
                <br>
                <input type="text" placeholder="Name" name="name" required autofocus/>
                <input type="text" placeholder="Username" name="user" required/>
                <input type="password" placeholder="Password" name="password" required/>
                <input type="email" placeholder="Email" name="email" required/>
                <input type="text" placeholder="Address" name="address" required/>
                <input type="text" placeholder="Phone" name="phone" required/>
                <input type="file" name="image" required/>
                <div >ฉันมีบัญชีแล้ว <a href="login.php" style="color:#C70039">เข้าสู่ระบบ</a></div>
                <br>
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