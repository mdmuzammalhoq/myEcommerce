<?php include_once("inc/header.php"); ?>
<?php include_once("inc/db_sidebar.php"); ?>

<script type="text/javascript" src="js/jquery.elevateZoom-3.0.8.min.js"></script>
<?php 
	$id= $_GET['id'];
	$query = "select * from tbl_all_orders where all_o_id='$id' ";
	$all_o_details = $db->select($query);
	if ($all_o_details) {
		while ($result = $all_o_details->fetch_assoc()) {

?>
<div class="row details-row">
	<div class="col-md-6 imag">
		<img style="width: 300px; height: 300px;" id="zoom_05" src="images/<?php echo $result['all_o_image']; ?>" data-zoom-image="images/<?php echo $result['all_o_image']; ?>"/>
		
	</div>
	<div class="col-md-6 details-div">
		<b>Order No. <?php echo $result['all_o_name']; ?></b> <br>
		<b>Order No. <?php echo $result['all_o_number']; ?></b> <br> <br>
		<p><b>Order Detail : </b> <?php echo $result['all_o_description']; ?> </p><br>
		<b>Total Amount : <?php echo $result['all_o_ttl_amount']; ?> </b><br>
		<p><b>Order Date & Time :</b> <?php echo $result['all_o_date']; ?></p><hr>
		<a href="#">ADD TO CART</a>
	</div>
</div>
<?php  } } ?>
<script type="text/javascript">
	$("#zoom_05").elevateZoom({
	  zoomType				: "inner",
	  cursor: "crosshair"
	});
</script> 
<?php include_once("inc/footer.php"); ?>