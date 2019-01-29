<?php  
session_start();
if ($_SESSION['cstmr_srl_no'] == true) {
	header("Location: myProfile.php");
}else{
	header("Location: login.php");

}

?>
