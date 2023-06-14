<h4 >ร้านทำเล็บเจล NailRoom</h4>
<div class="card" style="width: 15rem;">
<?php
@session_start();
include("../connectdb.php");
if(isset($_GET['s_id']) && !empty($_GET['s_id'])){
    $s_id = $_GET['s_id'];
    $sql = "SELECT * FROM service1 WHERE s_id = '$s_id'";
    $query = mysqli_query($conn, $sql);
    $data = mysqli_fetch_assoc($query);
}
?>
<img src="../../admin/upload/<?=$data['img'];?>" class="card-img-top" alt="...">
<div class="card-body">
<div class="mb-3">
<div class="form-grop">
    <label for="">ส่งสลิปการชำระเงิน</label>
    <input required type="file"  name="image" class="form-control" required>
    
</div>
            </div>
            
</div>

</div>
<br><br>
<input type="hidden" name="cus_id" value="<?= $_SESSION['user_id']?>">
<input type="hidden" name="s_id" value="<?=$data['s_id'];?>">
<input type="submit" class="w3-button w3-pink" name="submit" value="ยืนยัน">
</div>
</center>