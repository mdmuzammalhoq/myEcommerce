<?php  ob_start();    
      include_once("inc/header.php");?>
<?php include_once("inc/sidebar.php"); ?>
<?php 
	$n = "";
	if ($_SERVER['REQUEST_METHOD'] == 'POST')  
	{
		$member_name = mysqli_real_escape_string($db->link, $_POST['member_name']);
		$member_email = mysqli_real_escape_string($db->link, $_POST['member_email']);
		$member_phone = mysqli_real_escape_string($db->link, $_POST['member_phone']);
		$member_username = mysqli_real_escape_string($db->link, $_POST['member_username']);
		$member_password = mysqli_real_escape_string($db->link, (md5($_POST['member_password'])));

		if($member_name == "" || $member_email == "" || $member_phone == "" || $member_username == "" || $member_password == "" ){
                $n = "<span style='color:red; font-size:16px; font-weight:bold;' >Field Must Not be empty !</span> <hr>" ;
            }elseif(!empty($member_password)){
                 if (strlen($member_password) <= '4') {
                        $n = "Your Password Must Contain At Least 4 Characters!";
                    }
                    elseif(preg_match("/[A-Za-z0-9]+/", $member_password)) {
                        $n = "Your Password Must Contain At Least 1 Number and 1 letter";
                    }else {
                        $n = "Please Check You've Entered Or Confirmed Your Password!";
                    }
            }else{
            	$query = "INSERT INTO tbl_customer_acc (cstmr_name, cstmr_mail, cstmr_phn_no, cstmr_u_name, cstmr_u_pswd) VALUES('$member_name', '$member_email', '$member_phone', '$member_username', '$member_password')";
				$registration = $db->insert($query);
    	if ($registration) {
            $query = "select * from tbl_customer_acc where cstmr_u_name = '$member_username' and cstmr_u_pswd = '$member_password' ";
            $reg = $db->select($query);
            if($reg != false){
                $value = mysqli_fetch_array($reg);
                $row = mysqli_num_rows($reg);
                if($row > 0){
                    setcookie($value['cstmr_u_name'],"1",time()+365*24*60*60);
                    $_SESSION['cstmr_u_name'] = $value['cstmr_u_name'];       
                    $_SESSION['cstmr_srl_no'] = $value['cstmr_srl_no'];
                    //$_SESSION['member_password']= $value['member_password'];                  
                    header("Location: client_db.php");
                    
                }else{
                    echo "<span style ='color: red; font-size=18px; '>No Result Found !!</span>";
                } 
                }
            }
    	}
      }
		
?>
<div style="font-size: 20px; color: #272829; padding: 20px; margin-bottom: -102px;">Please Create an account to get full access... <br> <div style="text-align: center; font-size: 20px; ">It will take 10 seconds.</div> </div>
 <div id="wrapper"> 
			<div class="login-options"><?php echo $n; ?></div>
    		<div class="forms">
            <form action="" method="post" name="register">
            <input name="member_name" type="text" placeholder="Enter your full name here..." size="25" onClick="border: 1px solid #30a8da;" id="username"/>
            <input name="member_email" type="text" placeholder="Enter your Email here..." size="25" onClick="border: 1px solid #30a8da;" id="mail"/>
            <input name="member_phone" type="text" placeholder="Enter your Phone no. here..." size="25" onClick="border: 1px solid #30a8da;" id="mail"/>
            <input name="member_username" type="text" placeholder="Enter username no. here..." size="25" onClick="border: 1px solid #30a8da;" id="mail"/>
            <input name="member_password" type="password" placeholder="Enter your password here..." size="25" onClick="border: 1px solid #30a8da;" id="password"/> <br>
            
            <button type="submit" class="btn btn-danger" style="cursor: pointer;">Create Account</button>
            </form>
            </div>
</div>

<?php include_once("inc/footer.php"); ?>