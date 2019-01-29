<?php include_once("inc/header.php"); ?>
<?php include_once("inc/sidebar.php"); ?>
<style>
	.sm_image img{
		        width: 53px;
			    height: 55px;
			    margin-bottom: 34px;
			    margin-top: 6px;
			    border: 1px solid #000;
			    margin-left: 1%;
			    cursor: pointer;
	}
	.sm_image{
		    margin-left: 7%;
	}
</style>

    <link rel="stylesheet" href="css/zoom/xzoom.css" />
<script type="text/javascript" src="js/xzoom.min.js"></script>
<script type="text/javascript" src="js/jquery.elevateZoom-3.0.8.min.js"></script>

<!-- default start -->
    <section id="default" class="padding-top0">
    <div class="row" style="margin-bottom: 10%;">

      <div class="col-md-6 column">
<?php 
	$p_id= $_GET['id'];
	$query = "select * from tbl_product where p_srl_no='$p_id' ";
	$p_details = $db->select($query);
	if ($p_details) {
		while ($result = $p_details->fetch_assoc()) {
?>
        <div class="xzoom-container">
          <img class="xzoom" id="xzoom-default" src="admin/img/images/<?php echo $result['p_image']; ?>" xoriginal="admin/img/images/<?php echo $result['p_image']; ?>" />
          <div class="xzoom-thumbs"> <!--Thumnail Option -->
            
            <a href="admin/img/images/<?php echo $result['p_image']; ?>"><img class="xzoom-gallery" width="60" height="60" src="admin/img/thumb/<?php echo $result['p_image']; ?>"  xpreview="admin/img/images/<?php echo $result['p_image']; ?>" ></a>

            <a href="admin/img/images2/<?php echo $result['p_image_2']; ?>"><img class="xzoom-gallery" width="60" height="60" src="admin/img/images2/<?php echo $result['p_image_2']; ?>"></a>


            <a href="admin/img/images3/<?php echo $result['p_image_3']; ?>"><img class="xzoom-gallery" width="60" height="60" src="admin/img/images3/<?php echo $result['p_image_3']; ?>" ></a>


            <a href="admin/img/images4/<?php echo $result['p_image_4']; ?>"><img class="xzoom-gallery" width="60" height="60" src="admin/img/images4/<?php echo $result['p_image_4']; ?>" ></a>
          </div> <!--Thumnail Option -->
        </div> 
<?php } } ?>               
      </div>
      <div class="col-md-6 column">
 <?php 
	$p_id= $_GET['id'];
	$query = "select * from tbl_product where p_srl_no='$p_id' ";
	$p_details = $db->select($query);
	if ($p_details) {
		while ($result = $p_details->fetch_assoc()) {

?>
			<div class="row details-row">

			<form action="cartinsert.php" method="post">
			<div class="col-md-12 details-div">
				<h2><input type="hidden" name="product_id" id="product_id" value="<?php echo $result['p_srl_no']; ?>"><?php echo $result['p_name']; ?></h2>
				<b>Catagory :</b> <?php echo $result['p_ctgy_name']; ?> <br>
				<b>Brand : </b><?php echo $result['p_brnd_name']; ?> <br>
				<b>Details :</b> <?php echo $result['p_details']; ?> <br>
				<b>Price :</b> &ensp; <?php echo $result['p_price']; ?> Tk<hr>

				<div style="width: 444px;" class="buttn"><a href="#" id="<?php echo $result['p_srl_no']; ?>" onclick="add_cart(this.id)">Add to Cart</a></div>
			</div>
			</form>
			</div>
<?php } } ?>
      </div>
    </div>
    </section>
    <!-- default end -->
<script>
	function add_cart(id){	
		var id=id;
	    $.ajax({
	        type: "post",
	        url: "cartinsert.php",
	        data: {id : id},
	        success: function (data){
	            $("#checkoutTable").html(data);
	            
	        }      

	    }); 
}
</script>
<script src="js/setup.js"></script>
<?php include_once("inc/footer.php"); ?>