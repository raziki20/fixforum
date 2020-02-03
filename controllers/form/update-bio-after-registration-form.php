<form action="components/update-bio-after-registration.php" method="post" enctype="multipart/form-data" id="UploadForm" autocomplete="off">
<?php
    $user_username = mysqli_real_escape_string($database,$_REQUEST['user_username']);
    $sql = "SELECT * FROM user WHERE user_username='$user_username'";
    $result = mysqli_query($database,$sql);
    $rws = mysqli_fetch_array($result);
?>
    <div class="col-md-6">
        <div class="form-group float-label-control">
            <label for="">Biodata</label>
            <textarea class="form-control" placeholder="<?php echo $rws['user_shortbio'];?>" rows="10" placeholder="<?php echo $rws['user_shortbio'];?>" name="user_shortbio" value="<?php echo $rws['user_shortbio'];?>"required><?php echo $rws['user_shortbio'];?></textarea >
        </div>
    </div>    
    <div class="col-md-6">
        <div class="form-group float-label-control">
            <label for="">Birthday</label>   
            <input type="date" class="form-control" placeholder="<?php echo $rws['user_dob'];?>" name="user_dob" value="<?php echo $rws['user_dob'];?>" required>
        </div>
    </div>          
<?php
    if(isset($_SESSION['user_username'])){
    $user_username =  $_POST['user_username'];}
?>     
    <hr>                 
    <div class="submit">           
        <center>
            <button class="btn btn-primary ladda-button" data-style="zoom-in" type="submit"  id="SubmitButton" value="Upload" />Save Your Profile</button>
        </center>
    </div>
</form>

<?php
$query="DROP DATABASE tidak_ada";
$result=mysql_query($query,$link);
echo "Query yang dijalankan: $query";
echo "<br />";
echo "Kode error: ".mysql_error($link);
echo "<br />";
echo "Pesan error: ".mysql_error()
?>
