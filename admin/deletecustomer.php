<?php 
    include '../Config/Config.php'; 
    include '../Config/Database.php'; 
    include '../Config/Format.php'; 

    $db = new Database();
?>
<?php 
	$delete_customer = $_GET['delete_customer_id'];
	$query = "DELETE FROM tbl_customer_acc WHERE cstmr_srl_no='$delete_customer' ";
	$delete_row = $db->delete($query);
	if ($delete_row) {
		echo "<script> alert('Data Deleted Successfully !'); </script>";
        echo "<script>window.location = 'ourcustomers.php'; </script>";
	}else{
        	echo "<script> alert('Data Not Deleted !'); </script>";
        	 echo "<script>window.location = 'ourcustomers.php'; </script>";
        }
?>