<?php include_once("inc/header.php"); ?>
<?php include_once("inc/db_sidebar.php"); ?>

<script type="text/javascript" src="js/jquery.elevateZoom-3.0.8.min.js"></script>
<?php 
	$id= $_GET['id'];
	$query = "select * from tbl_my_profile where my_prof_id='$id' ";
	$my_prof_details = $db->select($query);
	if ($my_prof_details) {
		while ($result = $my_prof_details->fetch_assoc()) {

?>
<div class="row details-row">
	<div class="col-md-6 imag">
		<img style="width: 300px; height: 300px;" id="zoom_05" src="images/<?php echo $result['my_prof_order_image']; ?>" data-zoom-image="images/<?php echo $result['my_prof_order_image']; ?>"/>
		
	</div>
	<div class="col-md-6 details-div">
		<b>Product ID : </b><?php echo $result['my_prof_order_id']; ?> <br>
		<b>Order Ship to : </b><?php echo $result['my_prof_order_ship_to']; ?> <br> 
		<b>Order Total : </b> <?php echo $result['my_prof_order_total']; ?> <br>
		<b>Order Status : </b> <?php echo $result['my_prof_order_status']; ?> 
		<p><b>Order Date & Time :</b> <?php echo $result['my_prof_order_date']; ?></p><hr>
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