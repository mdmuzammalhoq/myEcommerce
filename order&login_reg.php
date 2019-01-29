<?php ob_start();	
include_once("inc/header.php"); //error_reporting(0); ?>
<?php include_once("inc/sidebar.php"); 
	$fm = new Format();
?>
<link rel="stylesheet" href="css/checkout.css">

	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="cart">
					<div class="page-title">
						<h1 style="font-size:24px;  margin: 7px 0;">Checkout </h1>
					</div>
					
						<div class="checkout">
							<div class="float_right" style="width: 881px;  margin-bottom: 50px;">
								<table width="100%" cellpadding="5" cellspacing="0" border="0" class="order_summery">
									<tr bgcolor="#818181">
										<th> Product image </th>
										<th>Product</th>
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
											<a href=''><img src="admin/img/<?php echo $result['p_image']; ?>" class="thumb" width="30"> </a><br />
										</td>
										<td><?php echo $result['p_name']; ?></td>
										<td><?php echo $result['p_price']; ?></td>
										<td><?php echo $result['quantity']; ?></td>
										<td><?php echo $ppp_price * $result['quantity']; ?></td>

									</tr>
<?php } } ?>	
									
										<tr><td colspan='5' height='10'> <hr style='margin: 0px; border-color: #888' /> </td></tr>
									<tr>
										<th class='text-right' colspan='2'> All Total Item(s)</th>
										<th class='text-center'></th>
										<th class='text-center'><?php echo $totalquantity; ?></th>
										<th class='text-center'>BDT <?php echo $totalcost;?></th>
									</tr>
									
									<tr>
										<td class='text-right' colspan='4'>Product Delivary Genaral Charge</td>
										<td class='text-center' colspan='1'>BDT  <?php echo 50; ?></td>
									</tr>
									<tr>
										<td class='text-right' colspan='4'>VAT (15%)</td>
										<td class='text-center' colspan='1'>BDT  <?php 

										$vat = ($totalcost * 15)/100; echo $vat; ?></td>
									</tr>
									<tr>
										<td class='text-right' colspan='4'>Other Costs </td>
										<td class='text-center' colspan='1'>BDT  <?php echo 0; ?></td>
									</tr>
									<tr><td></td><td></td><td colspan='4' height='10'> <hr style='margin: 0px; border-color: #888' /> </td></tr>
									<tr>
										<th></th>
										<th></th>
										<th class='text-left' colspan='1'>Grand Total Amount</th>
										<th></th>
										<th class='text-center'><?php $grandTotal = $totalcost+$vat+$deliveryCharge+$otherCost; echo $grandTotal;
            ?></th>
		</tr>
</table>
</div>


<div class="float_left" style="width: 930px; margin-bottom: 50px; margin-top: 0px;">
<?php 
		if($_SERVER['REQUEST_METHOD'] == 'POST'){
			$member_username = $fm -> validation($_POST['member_username']);
			$member_password = $fm -> validation(md5($_POST['member_password']));

			$member_username = mysqli_real_escape_string($db->link, $member_username);
			$member_password = mysqli_real_escape_string($db->link, $member_password);

			$query = "SELECT * FROM tbl_customer_acc WHERE cstmr_u_name = '$member_username' AND cstmr_u_pswd = '$member_password'";
			$result = $db->select($query);
			if($result != false){
				$value = mysqli_fetch_array($result);
				$row = mysqli_num_rows($result);
				if($row > 0){
					setcookie($value['cstmr_u_name'],"1",time()+365*24*60*60);
	        		$_SESSION['cstmr_u_name'] = $value['cstmr_u_name'];		
	        		$_SESSION['cstmr_srl_no'] = $value['cstmr_srl_no'];
	        		//$_SESSION['member_password']= $value['member_password'];					
					header("Location: checkout.php");
					
				}else{
					echo "<span style ='color: red; font-size=18px; '>No Result Found !!</span>";
				} 
				}else{
					echo "<span style ='color: red; font-size=18px; '>Username or Password Not Matched !!</span>";
			}
		}
		
	?>

	<div class="row">
		<div class="col-md-6">
			<div class="checkout_left">
	<div class="checkout_nav">
		<ul>
			<li class="active_checkout" style="background-color: #818181; width: 100%;">
				<a href="">Please Login </a>
			</li>
			
		</ul>
		<div class="clear"> </div>
	</div>
	<div class="checkout_content">
	<div class="checkout_login" style="margin-top: 34px;">
	<form method="post">
		<table >
					<tr>
						<td >Username<br /></td>
						<td><input type="text" name="member_username" value=""/></td>
					</tr>
					

					<tr id="password">
						<td>Password</td>
						<td><input type="password" name="member_password" value="" class="password" /><br /> <a href="#">Forgot Password</a></td>
					</tr>
					 
					<tr>
						<td></td>
						<td><input style="margin-left: 104px; width: 77px;" type="submit" value="Login" /></td>
					</tr>
				</table>
					
			</form>

		</div>
	</div>
</div>
		</div>
		<div class="col-md-6">
			<div class="float_right" style="width: 456px; margin-bottom: 50px; ">

<div class="checkout_left">
	<div class="checkout_nav">
		<ul>
			<li class="active_checkout" style="background-color: #818181; width: 100%;">
				<a href="">New User ? <b>Sign up here</b> </a>
			</li>
			
		</ul>
		<div class="clear"> </div>
	</div>
	<div class="checkout_content" >
	<div class="checkout_login" style="margin-top: 34px;" >
<span id="table_ajax"></span>
	<form>
		<table>
					<tr>
						<td >Name<br /></td>
						<td><input type="text" id="user_name"/></td>
					</tr>
					<tr>
						<td >Email<br /></td>
						<td><input type="email" id="user_email" /></td>
					</tr>
					<tr>
						<td >Mobile<br /></td>
						<td><input type="text" id="user_phone" /></td>
					</tr>
					<tr>
						<td >Username<br /></td>
						<td><input type="text" id="username" /></td>
					</tr>
					<tr>
						<td >Password<br /></td>
						<td><input type="password" id="user_password" /></td>
					</tr>

					<tr>
						<td></td>
						<td><input style="margin-left: 104px; width: 77px;" type="button"  onclick="sign_up()" value="Sign up" /></td>
					</tr>
				</table>
					
			</form>

		</div>
	</div>
</div>
</div> 
		</div>
	</div>

 


</div>
</div>
<div class="clear"> </div>

</div>
</div>
</div>
</div>
<script>
	function sign_up(){
		var user_name = $("#user_name").val();
		var user_email = $("#user_email").val();
		var user_phone = $("#user_phone").val();
		var username = $("#username").val();
		var user_password = $("#user_password").val();

		var data_link = 'signup_form.php';
		var data_string = "user_name="+user_name+"&user_email="+user_email+"&user_phone="+user_phone+"&username="+username+"&user_password="+user_password;

		$.ajax({
			type: "POST",
			url: data_link,
			data: data_string,
			success: function(data){

				if (data) {
					window.location.href = "checkout.php";

					alert(data);
					
				}else{
					alert("Sorry Try Again");
				}
			}
		});
	}
</script>

<?php include  "inc/footer.php"; ?>