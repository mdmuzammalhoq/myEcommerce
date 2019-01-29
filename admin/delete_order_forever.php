<?php 
    session_start();
    include '../Config/Config.php'; 
    include '../Config/Database.php'; 
    include '../Config/Format.php';
    include_once("../lib/user.php");
    //include_once("lib/Session.php");
     

    $db = new Database();
    $fm = new Format();
?>
<?php 
    $del_forever_id = $_GET['delete_forever_id'];

        $delquery = "delete from tbl_order where o_srl_no='$del_forever_id' ";
        $delData = $db->delete($delquery);
        if($delData){
        	echo "<script> alert('Order Delete Permanently !'); </script>";
        	 echo "<script>window.location = 'cancel_list.php'; </script>";
        }else{
        	echo "<script> alert('Order Not Deleted !'); </script>";
        	 echo "<script>window.location = 'cancel_list.php'; </script>";
        }

?>