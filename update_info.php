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
		$id = $_SESSION['cstmr_srl_no'];
	if ($_SERVER['REQUEST_METHOD'] == 'POST') {
		$customer_name = mysqli_real_escape_string($db->link, $_POST['customer_name']);
		$cstmr_delivery_address = mysqli_real_escape_string($db->link, $_POST['cstmr_delivery_address']);
		$permanent_address = mysqli_real_escape_string($db->link, $_POST['permanent_address']);
		$phone_two = mysqli_real_escape_string($db->link, $_POST['phone_two']);
		$district = mysqli_real_escape_string($db->link, $_POST['district']);
		
		
		if($customer_name == "" || $cstmr_delivery_address == "" ){
                echo "<span class='error'>Field Must Not be empty !</span>";
            }else{

				$query = "UPDATE tbl_customer_acc 
					SET  
						cstmr_name    		  = '$customer_name',
						cstmr_delivery_address   = '$cstmr_delivery_address',
						cstmr_per_address     = '$permanent_address',
						cstmr_phn_no  		  = '$phone_two',
						cstmr_dstct 	      = '$district'
						

					WHERE 	
					cstmr_srl_no='$id' ";

				$update = $db->update($query);
				if ($update) {
					$n = "Information Updated Successfully.";
				}else{
					$n = "Error occured ! Please try again...";
				}
            }
		
	}
?>
