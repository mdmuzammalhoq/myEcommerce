<?php  
session_start();
if ($_SESSION['cstmr_srl_no'] == true) {
	header("Location: checkout.php");
}else{
	header("Location: login.php");

}

?>