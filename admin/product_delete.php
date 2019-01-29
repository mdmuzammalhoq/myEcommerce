<?php 
    session_start();
    include '../Config/Config.php'; 
    include '../Config/Database.php'; 
    include '../Config/Format.php';
    include_once("../lib/user.php");
     
    $db = new Database();
    $fm = new Format();
?>
<?php 
echo $_POST['id'];
    // if(!isset($_POST['del_id']) || $_POST['del_id'] == NULL){
    //     echo "<script>window.location = 'products.php'; </script>";
    // }else{
    //     $del_id = $_POST['del_id'];

    //     $query = "select * from tbl_product where p_srl_no='$del_id' ";
    //     $getdata = $db->select($query);
    //     if($getdata){
    //     	while($delimg = $getdata->fetch_assoc()){
    //     		// $dellink = $delimg['image'];
    //     		// unlink($dellink);
    //     	}
    //     }

    //     $delquery = "delete from tbl_product where p_srl_no='$del_id' ";
    //     $delData = $db->delete($delquery);
    //     if($delData){
    //     	echo "<script> alert('Data Deleted Successfully !'); </script>";
    //     	 echo "<script>window.location = 'products.php'; </script>";
    //     }else{
    //     	echo "<script> alert('Data Not Deleted !'); </script>";
    //     	 echo "<script>window.location = 'products.php'; </script>";
    //     }

    // }
?>