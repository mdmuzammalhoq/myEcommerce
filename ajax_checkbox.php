<?php 
	session_start();
    include 'Config/Config.php'; 
    include 'Config/Database.php'; 
    include 'Config/Format.php';
    include_once("lib/user.php");
    //include_once("lib/Session.php");
     

    $db = new Database();
    $fm = new Format();
?>
<table  style="vertical-align: top;">
    <?php 
    	$id = $_SESSION['cstmr_srl_no'];
    	$query = "select * from tbl_customer_acc where cstmr_srl_no='$id' ";
    	$customer_ajax = $db->select($query);
    	if ($customer_ajax) {
    		$result = $customer_ajax->fetch_assoc();
    	
    ?>
					<tr>
						<td >Name<br /></td>
						<td><input type="text" id="f_name" name="name" value="<?php echo $result['cstmr_name']; ?>"/></td>
					</tr>
					<tr>
						<td >Mobile<br /></td>
						<td><input type="text" id="f_phone" name="phone_2" value="<?php echo $result['cstmr_phn_no']; ?>"/></td>
					</tr>
					<tr>
						<td >Delivery Address <br /></td>
						<td><input type="text" id="f_house" name="house" value="<?php echo $result['cstmr_delivery_address']; ?>"/></td>
					</tr>
					<tr>
						<td >Permanent Address <br /></td>
						<td><input type="text" id="f_road" name="road" value="<?php echo $result['cstmr_per_address']; ?>"/></td>
					</tr>
					<tr>
						<td >Post Code <br /></td>
						<td><input type="text" id="f_zip" name="zip" value=""/></td>
					</tr>
					<tr>
						<td >District <br /></td>
						<td><input type="text" id="f_district" name="distric" value="<?php echo $result['cstmr_dstct']; ?>"/></td>
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
						<td><input style="margin-left: 104px; width: 77px; cursor: pointer;" type="submit" id="button" onclick="submit_order()" value="Order" />
						</td>
					</tr>
			<?php } ?>		
				</table>