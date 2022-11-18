<!--<?php
include("../connectdb.php");
if(isset($_POST['Submit']) && !empty($_POST['Submit'])){
    $user = $_POST['user'];
    $password = $_POST['password'];
    $sql = sprintf("SELECT * FROM tb_admin WHERE user = '$user' AND password = '$password'");
    $query = mysqli_query($conn,$sql);
    $row = mysqli_num_rows($query);
    if($row > 0){
        $result = mysqli_fetch_assoc($query);
        $_SESSION['user_login'] = $result['user'];
        $_SESSION['user_pass'] = $result['password'];
        echo "<script type='text/javascript'>";
        echo "alert('Succesfuly');";
        echo "window.location = '../admin/index.php'; ";
        echo "</script>";
        }
        else{
        echo "<script type='text/javascript'>";
        echo "alert('Error back to Update again');";
            echo "window.location = 'loginadmin.php'; ";
        echo "</script>";
        }
}
?>-->

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
            <form action="#">
                <h1>Login admin</h1>
                <!--<div class="social-container">
                    <a href="#" class="social"><i class="fa-brands fa-facebook-f"></i></a>
                    <a href="#" class="social"><i class="fab fa-google-plus-g"></i></a>
                    <a href="#" class="social"><i class="fab fa-linkedin-in"></i></a>
                </div>
                <span>or use your account</span>-->
                <input type="user" placeholder="Username"  name="user" />
                <input type="password" placeholder="Password"  name="password" />
                <button type="submit" name="Submit">Log In</button>
                <br>
                <button><a href="../admin/index.php" class="ghost">Back</a></button>
            </form>
        </div>
        <div class="overlay-container">
            <div class="overlay">
                <div class="overlay-panel overlay-right">
                    <h1>Hello, Admin!</h1>
                    <p>Enter your personal details and start journey with us</p>
                    
                </div>
            </div>
        </div>
    </div>
</body>
</html>

