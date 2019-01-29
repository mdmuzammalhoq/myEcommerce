<?php include_once("inc/header.php"); error_reporting(0);?>
<?php include_once("inc/sidebar.php"); ?>

<?php 
	if (isset($_GET['detail_id'])) {		
		$id = $_GET['detail_id'];

			$qued = "select * from tbl_cart where cart_id='$id'";
        	$Cart_slt = $db->select($qued);

        	if($Cart_slt->num_rows > 0) {
        		$re = $Cart_slt->fetch_assoc();

			$qun = $re['cart_quantity'];
			$n=$qun+1;
			

        		$que = "select * from tbl_product where p_srl_no='$id' ";
				$P_detail = $db->select($que);        
		        $resul = $P_detail->fetch_assoc();
			    $name = $resul['p_name'];
			    $image = $resul['p_image'];
			    $total = $resul['p_price'];
			    $total_sum = $resul['p_price'];


				$query = "UPDATE tbl_cart SET cart_quantity='$n',cart_shipping_cost='' where cart_id='$id'";
		        $cart_dtl = $db->insert($query);
        	}else{
        		$que = "select * from tbl_product where p_srl_no='$id' ";
				$P_detail = $db->select($que);        
		        $resul = $P_detail->fetch_assoc();
			    $name = $resul['p_name'];
			    $image = $resul['p_image'];
			    $total = $resul['p_price'];

				$query = "INSERT INTO tbl_cart SET cart_id='$id', cart_p_name='$name', cart_p_image = '$image',cart_quantity='1',cart_line_total='$total',cart_shipping_cost='',cart_total_amount='' ";
		        $cart_dtl = $db->insert($query);
        	}

		
     }

?>
				<div class="row">
					<div class="col-md-12 product_div">
					
<?php 

	$p_id = $_GET['cat_id'];
		$query55 = "SELECT * FROM tbl_product WHERE p_ctgy_name='$p_id' ";
		$product_cat = $db->select($query55);
		if ($product_cat) {
			$resulttt = $product_cat->fetch_assoc();
?>
						<h5><?php echo $resulttt['p_ctgy_name']; ?></h5>
	<?php } else{ ?>
	<h5><?php echo "All Products";  ?></h5>
<?php 	} ?>
					</div>
	<?php 
		$p_id = $_GET['cat_id'];
		if ($p_id == "") {
			
		
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
	<?php } } ?>
	<?php } else{ 
			$query = "select * from tbl_product where p_ctgy_name='$p_id'";
		$product = $db -> select($query);
		if($product){
			while($result = $product->fetch_assoc()){
	  ?>
	  <form action="" method="post">
	<div class="image" >
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
	<?php } } } ?>


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

<script>
	$(document).ready(function(){
		$("#img_img").attr(function(){
			"title" : "click to view detail"
		});
	});
</script>
<?php include_once("inc/footer.php"); ?>				