<?php
session_start();
include("../connectdb.php");
if(isset($_POST) && !empty($_POST)){
    $user = $_POST['user'];
    $password = $_POST['password'];
 
    $sql = sprintf("SELECT * FROM tb_customer WHERE user = '$user' AND password = '$password'");
    $query = mysqli_query($conn,$sql);
    $row = mysqli_num_rows($query);
    if($row > 0){
        $result = mysqli_fetch_assoc($query);
        $_SESSION['id'] = $result['id'];
        echo "<script type='text/javascript'>";
        //echo "alert('insert Succesfuly');";
        echo "window.location = '../../page_user/index.php'; ";
        echo "</script>";
        }
        else{
        echo "<script type='text/javascript'>";
        echo "alert('ชื่อผู้ใช้หรือรหัสผ่านผิด!');";
            echo "window.location = 'login.php'; ";
        echo "</script>";
        }      
}
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <!-- Stylesheet -->
        <link href="../customer/css/style.css" rel="stylesheet">
        <link href="../customer/js/main.js" rel="stylesheet">
    </head>
<body>
    <div class="container" id="container">
        <div class="form-container sign-in-container">
            <form  action="" method ="post" class="auth-form login-form">
                <?php if (isset($_SESSION['error'])) : ?>
                    <div class="error">
                        <h3>
                            <?php 
                                echo $_SESSION['error'];
                                unset($_SESSION['error']);
                            ?>
                        </h3>
                    </div>
                <?php endif ?>
                <h1>Login</h1>
                <br>
                <br>
                <!--<div class="social-container">
                    <a href="#" class="social"><i class="fa-brands fa-facebook-f"></i></a>
                    <a href="#" class="social"><i class="fab fa-google-plus-g"></i></a>
                    <a href="#" class="social"><i class="fab fa-linkedin-in"></i></a>
                </div>
                <span>or use your account</span>-->
                <input type="text" placeholder="Username"  name="user" required autofocus/>
                <input type="password" placeholder="Password"  name="password" required />
                <br>
                <div >Login<a href="ad_login.php" style="color:#C70039">admin</a></div>
                <br>
                <div class="text-center">
                    <button type="submit" class="btn app-btn-primary"  >Log In</button>
                </div>
                <br>
                    <button><a href="../index.php" class="ghost">Back</a></button>
            </form>
        </div>
        <div class="overlay-container">
            <div class="overlay">
                <div class="overlay-panel overlay-right">
                    <h1>Hello, Friend!</h1>
                    <p>Enter your personal details and start journey with us</p>
                    <button><a href="signup.php" class="ghost" style="color:#FFFFFF">Sign Up</a></button>
                </div>
            </div>
        </div>
    </div>
</body>
</html>