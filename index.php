<?php include_once("inc/header.php"); error_reporting(0); ?>
<?php include_once("inc/sidebar.php"); ?>
<?php include_once("inc/slider_&_welcome.php"); ?>

				<div class="row welcome-txt">
					<div class="col-md-12">
						<h4>Welcome to MyEcommerce Company</h4>
					</div>
					<div class="col-md-12">
						<p>must explain to you how all this mistaken idea of denouncing of a pleasure and praising pain was born and I will give you a complete account of the system, and expound the actual teachings of the great explorer of the truth, the master-builder of human happiness. </p>
					</div>
				</div>
				
				<div class="row">
					<div class="col-md-12 product_div">
						<h5>Featured Collection</h5>
					</div>
					
	<?php 
		$query = "select * from tbl_product";
		$product = $db->select($query);
		if ($product) {
			while ($result = $product->fetch_assoc()) {
				

	?>
					
	<form action="" method="post">
	<div class="image" >
						<div class=" product padd" class="item">
							<div><input type="hidden" name="product_id" id="product_id" value="<?php echo $result['p_srl_no']; ?>">
								<a target="_blank" href="details.php?id=<?php echo $result['p_srl_no']; ?>"><img id="img_img" title="click to view detail" src="admin/img/<?php echo $result['p_image']; ?>"; /></a>
							</div>						
							<div class="overflowhidden"><?php echo $result['p_name']; ?></div>
							<div style="font-size: 11px;font-weight: normal;"><?php echo $result['p_ctgy_name']; ?></div>
							
							<div class="price">
							<?php 
								if ($result['p_is_offer'] == 'OFFER GOING' ) { ?>
									<del><img id="price_img" src="images/tk.png" alt=""><?php echo $result['p_price']; ?></del><br><?php echo $result['p_offer_price']; ?>
								<?php }else{ ?>
									<span>&nbsp; </span><br>
									<img id="price_img" src="images/tk.png" alt=""><?php echo $result['p_price']; ?>
								<?php }
							?>
							
							<div class="mm"><a id="<?php echo $result['p_srl_no']; ?>" onclick="add_cart(this.id)"><span ><img id="ad_c<?php echo $result['p_srl_no']; ?>" style="cursor: pointer; width: 70px; height: 21px;" src="images/123.png" alt="" ></span></a></div>
							</div>
							<div class="details">
								<a target="_blank" href="details.php?id=<?php echo $result['p_srl_no']; ?>">View Details</a>
							</div>
						</div>
		</div>
			</form>
					
		<?php }} ?>				

				</div>
				<div class="row">
					<div class="col-md-12 product_div">
						<h5>Ladies Ware</h5>
					</div>
					<?php 
		$query = "select * from tbl_product";
		$product = $db->select($query);
		if ($product) {
			while ($result = $product->fetch_assoc()) {
				

	?>
					
	<form action="" method="post">
		<div class="image">
						<div class=" product padd" class="item">
							<div><input type="hidden" name="product_id" id="product_id" value="<?php echo $result['p_srl_no']; ?>">
								<a target="_blank" href="details.php?id=<?php echo $result['p_srl_no']; ?>"><img id="img_img" title="click to view detail" src="admin/img/<?php echo $result['p_image']; ?>"; /></a>
							</div>						
							<div class="overflowhidden"><?php echo $result['p_name']; ?></div>
							<div style="font-size: 9px;font-weight: normal;"><?php echo $result['p_ctgy_name']; ?></div>
							
							<div class="price">
							<?php 
								if ($result['p_is_offer'] == 'OFFER GOING' ) { ?>
									<del><img id="price_img" src="images/tk.png" alt=""><?php echo $result['p_price']; ?></del><br><?php echo $result['p_offer_price']; ?>
								<?php }else{ ?>
									<span>&nbsp; </span><br>
									<img id="price_img" src="images/tk.png" alt=""><?php echo $result['p_price']; ?>
								<?php }
							?>
							
							<div class="mm"><a id="<?php echo $result['p_srl_no']; ?>" onclick="add_cart(this.id)"><span ><img id="ad_c<?php echo $result['p_srl_no']; ?>" style="cursor: pointer; width: 70px; height: 21px;" src="images/123.png" alt="" ></span></a></div>
							</div>
							<div class="details">
								<a target="_blank" href="details.php?id=<?php echo $result['p_srl_no']; ?>">View Details</a>
							</div>
						</div>
		</div>
			</form>
					
		<?php }} ?>

				</div>


<script type="text/javascript">

	function add_cart(id){	
		var id=id;
	    $.ajax({
	        type: "post",
	        url: "cartinsert.php",
	        data: {id : id},
	        success: function (data){
	            $("#checkoutTable").html(data);
	            $("#ad_c"+id).attr('src', 'images/1234.png');
	        }      

	    }); 
}
	function add_cart2(id){	
		var id=id;
	    $.ajax({
	        type: "post",
	        url: "cartinsert.php",
	        data: {id : id},
	        success: function (data){
	            $("#checkoutTable").html(data);
	            $("#ad_c2"+id).attr('src', 'images/1234.png');
	        }      

	    }); 
}
</script>
<?php include_once("inc/footer.php"); ?>