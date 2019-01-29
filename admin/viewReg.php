<?php include 'inc/a_header.php'; ?>
<?php include 'inc/a_menu.php'; ?>

<?php 
    $n = $_GET['editId'];
    $m = "";
     if($_SERVER['REQUEST_METHOD'] == 'POST'){
     	$member_name= $_POST['member_name'];
     	$member_name = mysqli_real_escape_string($db->link, $member_name);

     	$query ="UPDATE tbl_login_reg 
                SET 
                member_name = '$member_name'
				where
				member_id='$n'
                ";
     	$inserted_rows = $db->update($query);
        if ($inserted_rows) {
             $m = "<span class='success'>Name Updated Successfully.
             </span>";
            }else {
             $m = "<span class='error'>Name not Updated !</span>";
            }
	}
?>
	<div id="content">
<div class="inner" style="min-height: 700px;">
<div class="row">
                    <div class="col-lg-12">
                        <h1> View and Edit Registration </h1>
                    </div>
                </div>
                  <hr />
<div class="table" style="color:green; text-align: center; "><?php echo $m; '<hr>' ?></div>
<div class="row">
 <form class="form-horizontal" method="POST">
<fieldset>
   <?php 
        $query = "select * from tbl_login_reg where member_id='$n'";
        $registraion = $db->select($query);
	if($registraion){ 
		while($result= $registraion-> fetch_assoc()){
        
    ?>                      
  <div class="form-group">
  <label class="col-md-4 control-label" for="fn">Name : </label>  
  <div class="col-md-4">
  <input id="fn" name="member_name" type="text" value="<?php echo $result['member_name']; ?>" class="form-control input-md" required="">
    
  </div>
</div>
        <div class="form-group">
  <label class="col-md-4 control-label" for="submit"></label>
  <div class="col-md-4">
    <button id="submit" name="submit" class="btn btn-primary">Update</button>
  </div>
</div>
                
<?php } } ?>
</fieldset> 
</form>    
 </div>
    </div>
    </div>
<?php include 'inc/a_right_strip.php'; ?>
<?php include 'inc/a_footer.php'; ?>