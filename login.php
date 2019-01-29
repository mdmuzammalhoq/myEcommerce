<?php 
		ob_start();		
		include_once("inc/header.php");
 		include_once("inc/sidebar.php"); 
 		
 		 $fm = new Format();
 ?>
<?php 
		if($_SERVER['REQUEST_METHOD'] == 'POST'){
			$member_username = $fm -> validation($_POST['member_username']);
			$member_password = $fm -> validation(md5($_POST['member_password']));

			$member_username = mysqli_real_escape_string($db->link, $member_username);
			$member_password = mysqli_real_escape_string($db->link, $member_password);

			$query = "SELECT * FROM tbl_customer_acc WHERE cstmr_u_name = '$member_username' AND cstmr_u_pswd = '$member_password'";
			$result = $db->select($query);
			if($result != false){
				$value = mysqli_fetch_array($result);
				$row = mysqli_num_rows($result);
				if($row > 0){
					setcookie($value['cstmr_u_name'],"1",time()+365*24*60*60);
	        		$_SESSION['cstmr_u_name'] = $value['cstmr_u_name'];		
	        		$_SESSION['cstmr_srl_no'] = $value['cstmr_srl_no'];
	        						
					header("Location: myProfile.php");
					
				}else{
					echo "<span style ='color: red; font-size=18px; '>No Result Found !!</span>";
				} 
				}else{
					echo "<span style ='color: red; font-size=18px; '>Username or Password Not Matched !!</span>";
			}
		}
		
	?>

<div style="font-size: 16px; color: #272829; padding: 20px; margin-bottom: -30px;"></div>
 <div id="wrapper">
    	    	
             <div class="login-options">Please login to continue...</div>       		
    		<div class="forms">
            <form action="" method="post" name="register">
            <input name="member_username" type="text" placeholder="Enter username no. here..." size="25" onClick="border: 1px solid #30a8da;" id="mail"/> <br>
            <input name="member_password" type="password" placeholder="Enter your password here..." size="25" onClick="border: 1px solid #30a8da;" id="password"/> <br>
            
            <button class="btn btn-primary" style="cursor: pointer;"> Login </button>
            <p style="font-size: 10px;">New User? <a href="signup.php">Sign up</a> now</p>
            </form>
            </div>
</div>

<?php include_once("inc/footer.php"); ?>