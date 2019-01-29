<?php include_once("inc/header.php"); //error_reporting(0); ?>
<?php include_once("inc/db_sidebar.php"); ?>
<link rel="stylesheet" href="css/checkout.css">

	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="cart">
					<div class="page-title">
						<h1 style="font-size:24px;  margin: 7px 0;">My Cart </h1>
					</div>
					
						<div class="checkout">
							<div class="float_right" style="width: 881px;  margin-bottom: 50px;">
							<form action="" method="post">
								<table width="100%" cellpadding="5" cellspacing="0" border="0" class="order_summery">
									<tr bgcolor="#818181">
										<th>Product Image </th>
										<th>Product Name</th>
										<th class="text-center">Unit price</th>
										
										<th class="text-center">Quantity</th>
										<th class="text-center">Line Total</th>
										
									</tr>
<?php 
  $session_id = session_id();
		$totalcost=0;
		$totalquantity = 0;
		$deliveryCharge = 50;
		$otherCost = 0;

    	$qued = "SELECT tbl_product.*, tbl_addtocart.* FROM tbl_product LEFT JOIN  tbl_addtocart ON tbl_addtocart.product_id=tbl_product.p_srl_no WHERE tbl_addtocart.session_id='$session_id'";
    	$Cart_slt = $db->select($qued);
    	if ($Cart_slt) {	
    	while ($result = $Cart_slt->fetch_assoc()) {
    		if ($result['p_is_offer' ] == 'OFFER GOING') {
    				$ppp_price = $result['p_offer_price'];
    			}else{
    				$ppp_price = $result['p_price'];
    			}
    			$totalcost = $totalcost+($ppp_price * $result['quantity']);
    			$totalquantity = $totalquantity+$result['quantity'];
    	

?>								
				
								<tr>
										<td>
											<a href='details.php?id=<?php echo $result['p_srl_no']; ?>'><img src="admin/img/<?php echo $result['p_image']; ?>" class="thumb" width="30"> </a><br />
										</td>
										<td><?php echo $result['p_name']; ?></td>
										<td id="unit_price"><?php echo $ppp_price; ?></td>
										<td id="product_quantity"><?php echo $result['quantity']; ?></td>
										<td id="product_line_total"><?php echo $ppp_price * $result['quantity']; ?></td>

									</tr>
<?php } } ?>	
					
										<tr><td colspan='5' height='10'> <hr style='margin: 0px; border-color: #888' /> </td></tr>
									<tr>
										<th class='text-right' colspan='2'> All Total Item(s) </th>
										<th class='text-center'></th>
										<th id="total_quantity" class='text-center'><?php echo $totalquantity; ?></th>
										<th id="sub_total" class='text-center'>BDT <?php echo $totalcost;?></th>
									</tr>
									
									<tr>
										<td class='text-right' colspan='4'>Product Delivary Genaral Charge</td>
										<td id="deleivery_charge" class='text-center' colspan='1'>BDT  <?php echo 50; ?></td>
									</tr>
									<tr>
										<td class='text-right' colspan='4'>VAT (15%)</td>
										<td id="vat" class='text-center' colspan='1'>BDT  <?php 

										$vat = ($totalcost * 15)/100; echo $vat; ?></td>
									</tr>
									<tr>
										<td class='text-right' colspan='4'>Other Costs </td>
										<td id="other_cost" class='text-center' colspan='1'>BDT  <?php echo 0; ?></td>
									</tr>
									<tr><td></td><td></td><td colspan='4' height='10'> <hr style='margin: 0px; border-color: #888' /> </td></tr>
									<tr>
										<th></th>
										<th></th>
										<th class='text-left' colspan='1'>Grand Total Amount</th>
										<th></th>
										<th id="grand_total" class='text-center'><?php $grandTotal = $totalcost+$vat+$deliveryCharge+$otherCost; echo $grandTotal;
            ?></th>
		</tr>

</table>
</div>
<div id="submitToUser" onclick="submitTouser()" class="on" style="float: right;background: #000;padding: 5px 20px;"><a style="color: #fff;" href="addr_confirm.php">Order Now</a></div>
</form>	

</div>
<div class="clear"> </div>

</div>
</div>
</div>
</div>
<div style="height: 50px;"></div>


<?php include "inc/footer.php"; ?>