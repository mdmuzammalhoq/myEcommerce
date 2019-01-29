<div class="float_left" style="width: 930px; margin-bottom: 50px; margin-top: 0px;">
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
	        		//$_SESSION['member_password']= $value['member_password'];					
					header("Location: checkout.php");
					
				}else{
					echo "<span style ='color: red; font-size=18px; '>No Result Found !!</span>";
				} 
				}else{
					echo "<span style ='color: red; font-size=18px; '>Username or Password Not Matched !!</span>";
			}
		}else{
			//return false;
		}
		
	?>
<div class="checkout_left">
	<div class="checkout_nav">
		<ul>
			<li class="active_checkout" style="background-color: #818181; width: 100%;">
				<a href="">Please Login </a>
			</li>
			
		</ul>
		<div class="clear"> </div>
	</div>
	<div class="checkout_content">
	<div class="checkout_login" style="margin-top: 34px;">
	<form action="" method="post">
		<table >
					<tr>
						<td >Username<br /></td>
						<td><input id="member_username" type="text" name="member_username" value=""/></td>
					</tr>
					

					<tr id="password">
						<td>Password</td>
						<td><input id="member_password" type="password" name="member_password" value="" class="password" /><br /> <a href="#">Forgot Password</a></td>
					</tr>
					 
					<tr>
						<td></td>
						<td><input  onclick="login()" style="margin-left: 104px; width: 77px;" type="button" value="Login" /></td>
					</tr>
				</table>
					
			</form>

		</div>
	</div>
</div>

</div>