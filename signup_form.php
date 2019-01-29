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
	$n = "";
	if ($_SERVER['REQUEST_METHOD'] == 'POST')  
	{
		$member_name = mysqli_real_escape_string($db->link, $_POST['user_name']);
		$member_email = mysqli_real_escape_string($db->link, $_POST['user_email']);
		$member_phone = mysqli_real_escape_string($db->link, $_POST['user_phone']);
		$member_username = mysqli_real_escape_string($db->link, $_POST['username']);
		$member_password = mysqli_real_escape_string($db->link, (md5($_POST['user_password'])));
		if($member_name == "" || $member_email == "" || $member_phone == "" || $member_username == "" || $member_password == "" ){
                $n = "<span style='color:red; font-size:16px; font-weight:bold;' >Field Must Not be empty !</span> <hr>" ;
            }else{
            	$query = "INSERT INTO tbl_customer_acc (cstmr_name, cstmr_mail, cstmr_phn_no, cstmr_u_name, cstmr_u_pswd) VALUES('$member_name', '$member_email', '$member_phone', '$member_username', '$member_password')";
				$registration = $db->insert($query);
    	if ($registration) {
            $query = "select * from tbl_customer_acc where cstmr_u_name = '$member_username' and cstmr_u_pswd = '$member_password' ";
            $reg = $db->select($query);
            if($reg){
                $value = mysqli_fetch_array($reg);
                $row = mysqli_num_rows($reg);
                if($row){
                    //setcookie($value['cstmr_u_name'],"1");
                    $_SESSION['cstmr_u_name'] = $value['cstmr_u_name'];       
                    $_SESSION['cstmr_srl_no'] = $value['cstmr_srl_no'];
                 
                    echo "Success"; 
                    
                }else{
                    //echo "<span style ='color: red; font-size=18px; '>No Result Found !!</span>";
                    echo 'false';
                } 
                }
            }
    	}
      }
		
?>
