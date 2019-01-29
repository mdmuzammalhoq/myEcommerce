<?php 
include_once("inc/header.php"); //error_reporting(0); ?>
<?php include_once("inc/db_sidebar.php"); ?>
<link rel="stylesheet" href="css/checkout.css">

<div class="container">
		<div class="row">
			<div class="col-md-6 column">
				<div class="cart">
						<div class="checkout">
<div class="float_left" style="width: 420px; margin-bottom: 50px; margin-top: 60px;">
<div class="checkout_left">
	<div class="checkout_nav">
		<ul>
			<li class="active_checkout" style="background-color: #818181; width: 100%;">
				<a href=""> Billing Address </a>
			</li>
			
		</ul>
		<div class="clear"> </div>
	</div>
	<div class="checkout_content">
	<div class="checkout_login" style="margin-top: 34px;">


	<form method="post">
	<?php 
	$id = $_SESSION['cstmr_srl_no'];
		$query = "select * from tbl_customer_acc where cstmr_srl_no='$id' ";
		$update = $db->select($query);
		$result = $update->fetch_assoc();
	?>
		<table style="vertical-align: top;">
		<?php if(isset($n)){echo $n;} ?>
					
					<tr>
						<td >Name<br /></td>
						<td>
						<input type="hidden" id="customer_id" value="<?php echo $_SESSION['cstmr_srl_no']; ?>">
						<input type="text" id="customer_name" name="name" value="<?php echo $result['cstmr_name']; ?>"/>
						</td>
					</tr>
					<tr>
						<td >Delivery Address <br /></td>
						<td><input type="text" id="cstmr_delivery_address" name="cstmr_delivery_address" value="<?php echo $result['cstmr_delivery_address']; ?>"/></td>
					</tr>
					<tr>
						<td >Permanent Address <br /></td>
						<td><input type="text" id="permanent_address" name="permanent_address" value="<?php echo $result['cstmr_per_address']; ?>"/></td>
					</tr>
					<tr>
						<td >Phone<br /></td>
						<td><input type="text" id="phone_two" name="phone_2" value="<?php echo $result['cstmr_phn_no']; ?>"/></td>
					</tr>
					<tr>
						<td > District <br /></td>
						<td>
						<select id="district" name="distric" >
						   <option value="0">Select District</option>
						   <?php 
						   	$query = "select * from tbl_district ";
						   	$district = $db->select($query);
						   	if ($district) {
						   		while ($result = $district->fetch_assoc()) {
						   ?>
						   <option value="<?php echo $result['district_name']; ?>"><?php echo $result['district_name']; ?></option>
						   <?php }} ?>
						</select>
						</td>
					</tr>
					
					
					<tr>
						<td></td>
						<td><input onclick="update_data()" style="margin-left: 80px; width: 77px; cursor: pointer;" type="button" value="Update" /></td>
					</tr>
				</table>
				
			</form>

		</div>
	</div>
</div>
 </div> </div> </div> </div> 

<div class="col-md-6 column"> 
				<div class="cart" >
						<div class="checkout"> 
<div class="float_left" style="width: 420px; margin-bottom: 50px; margin-top: 60px;">
<div class="checkout_left">
	<div class="checkout_nav">
		<ul>
			<li class="active_checkout" style="background-color: #818181; width: 100%;">
				<a href=""> Delivery Address </a>
			</li>
			
		</ul>
		<div class="clear"> </div>
	</div>
	<div class="checkout_content">
	<div class="check">
		<div class="checkbox checkbox-primary">
	<label for="checkbox">
       &ensp; Same as Billing Address
    </label>
    <input id="checkbox" type="checkbox"  style="float: left; width: 16px;" onchange="check_function()">
    <input type="hidden" id="customer_checkbox" value="<?php echo $id; ?>">
    
</div>
	</div>
	<div class="checkout_login" style="margin-top: 5px;">
	<form method="post">
	<span id="show_ajax_data">
		<table  style="vertical-align: top;">
					<tr>
						<td >Name<br /></td>
						<td><input type="text" id="f_name" name="name" value=""/></td>
					</tr>
					<tr>
						<td >Mobile<br /></td>
						<td><input type="text" id="f_phone" name="phone_2" value=""/></td>
					</tr>
					<tr>
						<td >Present Address <br /></td>
						<td><input type="text" id="f_house" name="house" placeholder="house & road no" /></td>
					</tr>
					<tr>
						<td >Permanent Address <br /></td>
						<td><input type="text" id="f_road" name="road" value=""/></td>
					</tr>
					<tr>
						<td >Post Code <br /></td>
						<td><input type="text" id="f_zip" name="zip" value=""/></td>
					</tr>
					<tr>
						<td >District <br /></td>
						<td><input type="text" id="f_district" name="distric" value=""/></td>
					</tr>
					
					<tr>
						<td >Country<br /></td>
						<td><select id="f_country" name="f_country" >
						<?php 
							$query = "select * from tbl_cntry";
							$country = $db->select($query);
							if ($country) {
								while ($resultt = $country->fetch_assoc()) {
						?>
   <option value="<?php echo $resultt['cntry_name']; ?>"><?php echo $resultt['cntry_name']; ?></option>
   <?php }} ?>

</select></td>
					</tr>
						
<tr>
						<td></td>
						<td><input style="margin-left: 80px; width: 77px; cursor: pointer;" type="button" id="button" onclick="submit_order()" value="Order" />
						</td>
					</tr>
				</table>
				</span>		
			</form>

		</div>
	</div>
</div>
 </div> </div> </div> </div> 





  </div> </div>




<script>
	function submit_order(){
		var customer_id = $('#customer_id').val();
		var f_name = $('#f_name').val();
		var f_house = $('#f_house').val();
		var f_road = $('#f_road').val();
		var f_sector = $('#f_sector').val();
		var f_zip = $('#f_zip').val();
		var f_district = $('#f_district').val();
		var f_phone = $('#f_phone').val();
		var f_country = $('#f_country').val();

		var dataUrl = 'success_message.php';
		var datastring = 'customer_id='+customer_id+'&f_name='+f_name+'&f_house='+f_house+'&f_road='+f_road+'&f_sector='+f_sector+'&f_zip='+f_zip+'&f_district='+f_district+'&f_phone='+f_phone+'&f_country='+f_country;

		$.ajax({
			type: "post",
			url: dataUrl,
			data : datastring,
			success: function(data){
					alert(data);
			}
		});
	}
</script>

<script>
	function update_data(){
		var customer_name = $('#customer_name').val();
		var cstmr_delivery_address = $('#cstmr_delivery_address').val();
		var permanent_address = $('#permanent_address').val();
		var phone_two = $('#phone_two').val();
		var district = $('#district').val();

		
		var data_url = 'update_info.php';
		var data_string = 'customer_name='+customer_name+'&cstmr_delivery_address='+cstmr_delivery_address+'&permanent_address='+permanent_address+'&phone_two='+phone_two+'&district='+district;

		$.ajax({
			type: "post",
			url: data_url,
			data: data_string,
			success: function(data){
				alert('Data Updated Successfully...');
			}
		});
	}
</script>

<script>
	function check_function(){
		var customer_checkbox = $('customer_checkbox').val();
		 var data_string = 'customer_checkbox='+customer_checkbox;
		$.ajax({
			type: "post",
			url: 'ajax_checkbox.php',
			data: data_string,
			success: function(data){
				$('#show_ajax_data').html(data);
			}
		});
	}
</script>

<?php include "inc/footer.php"; ?>