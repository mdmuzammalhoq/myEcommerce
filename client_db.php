<?php include_once("inc/header.php"); ?>
<?php include_once("inc/db_sidebar.php"); ?>

<style>
	.cp{
		    float: right;
		    margin-top: 203px;
		    
		    cursor: pointer;
		    border: 1px solid #000;
		    border-radius: 5px;
		    padding: 0 46px;
	}
	.cp:hover{
		background: #FFF199;

	}
</style>
<br>

	
<div class="col-md-6">

</div>
<div id="right">
<?php 
	$id = $_SESSION['cstmr_srl_no'];
	$query = "select * from tbl_customer_acc where cstmr_srl_no='$id'";
	$client_db = $db->select($query);
	if ($client_db){
	    $result = $client_db->fetch_assoc();

?>
<div style="min-height: 500px; margin-top: 150px;">
	<div class="row" >
<div class="col-md-6">
	<div style="text-align: center;">
<p><strong>Welcome</strong> <?php echo $result['cstmr_name']; ?></p>
	<p><b>Thank you for being with us ...</b> <br><br> <span style="font-size: 13px;">For shopping please <a href="products.php" target="_blank">click here</a></span>  </p>
</div>
</div>
<div class="col-md-6">
<div class="col-sm-3">

	<img  style="border: 1px solid #000;margin-bottom: 8px;" src="images/<?php 
		if ($result['cstmr_img'] == true) {
			echo $result['cstmr_img'];
		}else{
			echo "people1.jpg";
		}
	 ?>" alt="">
<script>
	$(":file").filestyle({badge: false});
</script>
</div>
</div>


</div>
</div>




<?php } ?>

<?php include_once("inc/footer.php"); ?>