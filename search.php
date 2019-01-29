<?php include_once("inc/header.php"); ob_start(); error_reporting(0); ?>
<?php include_once("inc/sidebar.php"); ?>

<div class="row">

<?php 
	$select = $_GET['select'];
	$search = $_GET['search'];
	if ($select == "All Products" && $search == ""){
		$query = "SELECT * FROM tbl_product WHERE p_name LIKE '%$search%' OR p_details LIKE '%$search%'";
		$allProduct = $db->select($query);
		if ($allProduct) {
		while ($result = $allProduct->fetch_assoc()) { ?>
			<div class="image">
	<form action="" method="post">
		<div class="image" style="margin-left: 4%; margin-top: 5%;">
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
		</div>
	<?php	} } }elseif ($select != "All Products" && $search == "") {
		$query = "SELECT * FROM tbl_product where p_ctgy_name LIKE '%$select%' ";
		$searchCategory = $db->select($query);
		
		if ($searchCategory) {
			while($result = $searchCategory->fetch_assoc()){  ?>
			<div class="image">
	<form action="" method="post">
		<div class="image" style="margin-left: 4%; margin-top: 5%;">
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
		</div>
		<?php } } }elseif ($select != "All Products" && $search != "") { 
		$query = "SELECT * FROM tbl_product where p_ctgy_name LIKE '%$select%' and p_name LIKE '%$search%' OR p_ctgy_name LIKE '%$select%' and p_details LIKE '%$search%'";
		$searchCategory = $db->select($query);
		if ($searchCategory) {
			while($result = $searchCategory->fetch_assoc()){  ?>
<div class="image">
	<form action="" method="post">
		<div class="image" style="margin-left: 4%; margin-top: 5%;">
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
		</div>
			<?php } } }elseif ($select == "All Products" && $search != ""){
		$query = "SELECT * FROM tbl_product WHERE p_name LIKE '%$search%' OR p_details LIKE '%$search%'";
		$allProduct = $db->select($query);
		if ($allProduct) {
		while ($result = $allProduct->fetch_assoc()) {  ?>
			<div class="image">
	<form action="" method="post">
		<div class="image" style="margin-left: 4%; margin-top: 5%;">
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
		</div>
				
		<?php  } } } else{ ?>
		<h1>No products matches your search</h1>;
<?php	} ?>









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