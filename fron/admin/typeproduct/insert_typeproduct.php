
<?php

   include("../connectdb.php");

   //ตรวจสอบถ้าว่างให้เด้งไปหน้าหลักและไม่แก้ไขข้อมูล
   if(isset($_POST['Submit'])){

    include_once("../connectdb.php");

    $sql = "insert into tb_type_product (title) 
    values( '{$_POST['title']}')";
     
    if (mysqli_query($conn, $sql)) {
        //echo "เพิ่มข้อมูลสำเร็จ";
        $alert .= '<script type="text/javascript">';
        $alert .= 'alert("เพิ่มข้อมูลสำเร็จ");';
        $alert .= 'window.location = "typeproduct.php";';
        $alert .= '</script>';
        echo $alert;
        exit();
    } else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }

    mysqli_close($conn);
}
?>

