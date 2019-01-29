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

<?php 
		if ($_SERVER['REQUEST_METHOD'] == 'POST') {
			$customer_id = $_POST['customer_id'];
			$f_name = mysqli_real_escape_string($db->link, $_POST['f_name']);
			$f_house = mysqli_real_escape_string($db->link, $_POST['f_house']);
			$f_road = mysqli_real_escape_string($db->link, $_POST['f_road']);
			$f_sector = mysqli_real_escape_string($db->link, $_POST['f_sector']);
			$f_zip = mysqli_real_escape_string($db->link, $_POST['f_zip']);
			$f_district = mysqli_real_escape_string($db->link, $_POST['f_district']);
			$f_phone = mysqli_real_escape_string($db->link, $_POST['f_phone']);
			$f_country = mysqli_real_escape_string($db->link, $_POST['f_country']);
			
			$date = date("Y-m-d");


		$query = "INSERT INTO tbl_deleivery_address(delivery_customer_id, deliver_name, deliver_house_no, deliver_road_no, deliver_sector, deliver_zip_code, deliver_district, deliver_mobile, deliver_country) VALUES('$customer_id', '$f_name', '$f_house', '$f_road', '$f_sector', '$f_zip', '$f_district', '$f_phone', '$f_country')";
		$insert_return_id = $db->insert_return_id($query);

		$session_id = session_id();

		$totalcost=0;
		$totalquantity = 0;
		$deliveryCharge = 50;
		$otherCost = 0;

    	$qued = "SELECT tbl_product.*, tbl_addtocart.* FROM tbl_product LEFT JOIN  tbl_addtocart ON tbl_addtocart.product_id=tbl_product.p_srl_no WHERE tbl_addtocart.session_id='$session_id'";
    	$Cart_slt = $db->select($qued);
    	while ($result = $Cart_slt->fetch_assoc()) {
    		if ($result['p_is_offer' ] == 'OFFER GOING') {
    				$ppp_price = $result['p_offer_price'];
    			}else{
    				$ppp_price = $result['p_price'];
    			}
    			$totalcost = $totalcost+($ppp_price * $result['quantity']);
    			$totalquantity = $totalquantity+$result['quantity'];
 }

    	$customer_id = $_SESSION['cstmr_srl_no'];
		$deliveryCost = 50;
		$vat 		   = ($totalcost * 15)/100;
		$grandtotal    = $grandTotal = $totalcost+$vat+$deliveryCharge+$otherCost;
		$otherCost     =  0;
		$o_addby 	   = $_SESSION['cstmr_u_name'];
		$status = 'p';
		$adtime = date('Y-m-d h:i:s');


		$query2 = "INSERT INTO tbl_order(o_cstmr_id, o_delivery_id, o_total_amount, o_delivery_cost, o_vat, o_other_cost, o_subtotal, o_addby, o_adtime, o_status, o_date)VALUES('$customer_id','$insert_return_id', '$totalcost', '$deliveryCost', '$vat', '$otherCost', '$grandtotal', '$o_addby', '$adtime', '$status', '$date')";
		$Order_id = $db->insert_return_id($query2);


		$totalcost=0;
		$totalquantity = 0;
		$deliveryCharge = 50;
		$otherCost = 0;

    	$qued = "SELECT tbl_product.*, tbl_addtocart.* FROM tbl_product LEFT JOIN  tbl_addtocart ON tbl_addtocart.product_id=tbl_product.p_srl_no WHERE tbl_addtocart.session_id='$session_id'";
    	$Cart_slt = $db->select($qued);
    	while ($result = $Cart_slt->fetch_assoc()) {
    	$price = $result['p_price'];
    	$quantity = $result['quantity']; 
    	$product_id = $result['product_id'];
    	$order_id = $Order_id;


    	$query3 = "INSERT INTO tbl_order_detail(o_d_id, o_d_product_id, o_d_p_qnty, o_d_price) VALUES('$order_id', '$product_id', '$quantity', '$price')";
    	$order_detail_insert = $db->insert($query3);

    }

    	$qued = "SELECT tbl_product.*, tbl_addtocart.* FROM tbl_product LEFT JOIN  tbl_addtocart ON tbl_addtocart.product_id=tbl_product.p_srl_no WHERE tbl_addtocart.session_id='$session_id'";
    	$Cart_slt = $db->select($qued);
    	while ($result = $Cart_slt->fetch_assoc()) {
    		$id = $result['id'];


    	$query4 = "DELETE FROM tbl_addtocart WHERE id = '$id' ";
    	$del_data = $db->delete($query4);
}
    


    echo "Order Successfull...";	



}
	?>

	


			
