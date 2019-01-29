<?php 
    include '../Config/Config.php'; 
    include '../Config/Database.php'; 
    include '../Config/Format.php'; 

    $db = new Database();
?>
<?php 
	$delete_product = $_GET['del_product_id'];
	$query = "DELETE FROM tbl_product WHERE p_srl_no='$delete_product' ";
	$delete_row = $db->delete($query);
	if ($delete_row) {
		echo "<script> alert('Data Deleted Successfully !'); </script>";
        echo "<script>window.location = 'products.php'; </script>";
	}else{
        	echo "<script> alert('Data Not Deleted !'); </script>";
        	 echo "<script>window.location = 'products.php'; </script>";
        }
?>