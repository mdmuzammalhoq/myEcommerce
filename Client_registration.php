<?php include_once("inc/header.php"); ?>
<?php include_once("inc/sidebar.php"); ?>
<?php 
	$n = "";
    //$id=$_GET['member_id'];
	if ($_SERVER['REQUEST_METHOD'] == 'POST')  
	{
		
		$member_addresss_1 = mysqli_real_escape_string($db->link, $_POST['member_addresss_1']);
        $member_addresss_2 = mysqli_real_escape_string($db->link, $_POST['member_addresss_2']);
        $member_city = mysqli_real_escape_string($db->link, $_POST['member_city']);
        $member_state = mysqli_real_escape_string($db->link, $_POST['member_state']);
        $member_area_zip = mysqli_real_escape_string($db->link, $_POST['member_area_zip']);
        $member_country = mysqli_real_escape_string($db->link, $_POST['member_country']);
        $member_Security_code = mysqli_real_escape_string($db->link, $_POST['member_Security_code']);

		if($member_addresss_1 == "" || $member_addresss_2 == "" || $member_city == "" || $member_state == "" || $member_area_zip == "" || $member_country == ""  ){

                $n = "<span style='color:red; font-size:16px; font-weight:bold;' >Field Must Not be empty !</span> <hr>" ;
            }elseif ($cstmr_srl_no = '') {
            	$n = "<span style='color:red; font-size:16px; font-weight:bold;' >Serial No. Not be empty !</span> <hr>" ;
            }else{
            	$query = "UPDATE tbl_login_reg 

                    SET 

                    member_addresss_1 = '$member_addresss_1', 
                    member_addresss_2 = '$member_addresss_2', 
                    member_city = '$member_city', 
                    member_state = '$member_state', 
                    member_area_zip = '$member_area_zip', 
                    member_country = '$member_country'

                    ";
    	$registration = $db->update($query);
    	if ($registration) {
    		$n = "<span style='color:Green; font-size:16px; font-weight:bold;' ><b>Thank you</b> ! </span> <hr>" ;
    	}
      }
	}	
?>
<div style="font-size: 20px; color: #272829; padding: 20px; margin-bottom: -102px;">Enter a new shipping address. <br> <div style="text-align: center; font-size: 20px; ">It will take 10 seconds.</div> </div>
 <div id="wrapper" style="height: 750px;"> 
			<div class="login-options"><?php echo $n; ?></div>
    		<div class="forms">
            <form action="" method="post" name="register">

            <input name="member_addresss_1" type="text" placeholder="Address line 1: ..." size="40" onClick="border: 1px solid #30a8da;" id="mail"/>

            <input name="member_addresss_2" type="text" placeholder="Address line 2: ..." size="40" onClick="border: 1px solid #30a8da;" id="mail"/>

            <input name="member_city" type="text" placeholder="Enter your City here..." size="40" onClick="border: 1px solid #30a8da;" id="mail"/>

            <input name="member_state" type="text" placeholder="State/Province/Region:..." size="40" onClick="border: 1px solid #30a8da;" id="mail"/>

            <input name="member_area_zip" type="text" placeholder="Enter your ZIP Code here..." size="40" onClick="border: 1px solid #30a8da;" id="password"/>

            <div id="password" style="width: 400px; margin-bottom: 15px;">
                                
                                <select class="form-control" name="member_country" id="">
                                    <option value="">Select Country</option>
                                    <?php 
                                        $query = "select * from tbl_cntry";
                                        $country = $db->select($query);
                                        while ($result = $country->fetch_assoc()) {
                                        
                                        
                                    ?>
                                    <option> <?php echo $result['cntry_name']; ?></option>
                                    <?php } ?>

                                </select>
                            </div>

            <input name="member_Security_code" type="text" placeholder="Enter your Security access code: here..." size="40" onClick="border: 1px solid #30a8da;" id="password"/>

            <button tye="submit" name="register" class="create-acc">Update Info</button>
            </form>
            </div>
</div>

<?php include_once("inc/footer.php"); ?>