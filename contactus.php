<?php include_once("inc/header.php"); ?>
<?php include_once("inc/sidebar.php"); ?>
<?php 
		$n = "";
	if ($_SERVER['REQUEST_METHOD'] == 'POST') {

			//echo $_POST['name']; 
			$name = $_POST['name'];
			$email = $_POST['email'];
			$phone = $_POST['contactno'];
			$subject = $_POST['subject'];
			$message = $_POST['message'];

			$name = filter_var($name);
			$email = filter_var($email);

			if ($name == "" ) {
				$n = "name must not be empty !";
			}elseif ($email == "") {
				$n = "Email must not be empty !";
			}elseif(!filter_var($email, FILTER_VALIDATE_EMAIL) ){
						$n = "Invalid Email Address !!";
			}elseif ($phone == "") {
				$n = "phone must not be empty !";
			}elseif ($message == "") {
				$n = "message must not be empty !";
			}else{
				$query = "INSERT INTO tbl_contact(name, email, phone, subject, description) VALUES('$name', '$email', '$phone', '$subject', '$message')";
				$message = $db->insert($query);
				if ($message) {
					$n = "Your message sent successfully.";
				}else{
					$n = "Your message not sent !";
				}
			}
		}
?>
<!=======================[ Contactus Containts ]=====================>
					<table border="0px" width="100%" margin-left="1%">
						<tr>
							<td width="50%" style="border:1px solid lightgray;font-family:tahoma;font-size:13px;" align="center">
								<h1 style="font-size:20px;">Link-Up Technology</h1>
								Office-1<br>
								Plot:16(5th Floor)<br>Road:01 (Behind Shah Ali Market)<br>Mirpur-10<br>Dhaka-1216, Bangladesh.<br><br>
			
								Office-2<br>187-East Kazi Para<br>Mirpur, Dhaka-1216<br><br>
								Phone No. +8801911-978897<br>Email: mail@linktechbd.com<br>Skype : linktechbd<br>FaceBook : facebook.com/linktechbd<br>Website : www.linktechbd.com
							</td>
							<td width="10px"></td>
							<td width="50%" style="border:1px solid lightgray">
								<!-------------------FeedBack Form------------------>
									<form action="" method="post">
										<table border="0px" width="350px" style="border-collapse:collapse;font-family:tahoma;font-size:13px">
											<tr height="30px" align="center">
												<td colspan="3" align="left" style="font-size:15px;font-weight:bold">Send Your FeedBack</td>
												
											</tr>
											<tr height="5px"><td colspan="3" ><?php echo $n; ?></td></tr>
											<tr height="5px"><td colspan="3"></td></tr>
											<tr>
												<td align="right" valign="middle">Name<span class="required">*</span></td>
												<td width="5px"></td>
												<td>
												<input type="text" class="desired" id="name" name="name" style="width:250px;height:25px;"></td>
											</tr>
											
											<tr height="5px"><td colspan="3"></td></tr>
											<tr>
												<td align="right" valign="middle">Email<span class="required">*</span></td>
												<td></td>
												<td><input type="text" class="desired" id="email" name="email" style="width:250px;height:25px;"></td>
											</tr>
											<tr height="5px"><td colspan="3"></td></tr>
											<tr>
												<td align="right" valign="middle">Phone no<span class="required">*</span></td>
												<td></td>
												<td><input type="text" class="desired" id="contactno" name="contactno" style="width:250px;height:25px;"></td>
											</tr>
											<tr height="5px"><td colspan="3"></td></tr>
											<tr>
												<td align="right" valign="middle">Subject</td>
												<td></td>
												<td><input type="text" class="desired" id="subject" name="subject" style="width:250px;height:25px;"></td>
											</tr>
											<tr height="5px"><td colspan="3"></td></tr>
											<tr>
												<td align="right" valign="top">Message<span class="required">*</span></td>
												<td></td>
												<td><textarea name="message" id="message" class="desired" style="width:250px;height:100px;font-family:tahoma;font-size:13px"></textarea></td>
											</tr>
											<tr height="5px"><td colspan="3"></td></tr>
											<tr>
												<td></td>
												<td></td>
												<td align="left" valign="middle"><input type="submit" id="submit" name="submit" value="Send Message" onClick="Sendfeedbackus()" style="font-size:16px;font-weight:bold; width:250px;height:40px"></td>
											</tr>
										</table>
									</form>
								<!-------------------FeedBack Form Ends ------------>
							</td>
						</tr>
						<tr >
							<td colspan="3">
								<table width="100%">
									<tr height="30px" style="border:1px solid lightgray;">
										<td td colspan="3" style="border:1px solid lightgray; font-family:tahoma;font-size:14px;font-weight:bold">Our Branch Offices</td>
									</tr>
									<tr>
										<td class="three_address" >
										<div style="align:center">
											<b>Japan Office:</b>
											<br />
											Sheik Arick Hasan<br />
											Country Manager<br />
						
											Ayukawacho-6-10-3,<br /> Hitachi Shi, Ibaraki Ken, <br />Japan 〒 316-0036 <br /><br />
											Phone No.(+81) 080-9448-1133<br>Email: arick@linktechbd.com<br>Skype : sahturjo786<br>FaceBook : facebook.com/linktechbd
										</div>
										</td>
										<td class="three_address" >
										<div style="align:center">
											<b>United Kingdom Office: </b>
											<br />
											Nazmul Hasan<br />
											Country Manager<br />
						
											43 Rings Road, Brentwood<br />Essex, CM14 4DJ,<br />United Kingdom<br /><br />
											Phone No.+447453287484<br>Email: nazmul@linktechbd.com<br>Skype : mnhasan3<br>FaceBook : facebook.com/linktechbd
										</div>

										</td>
										<td class="three_address" >
										<div style="align:center">
											<b>Australia Office:</b>
											<br />
											Yasir Arafat Opu<br />
											Country Manager<br />
						
											19, 97/99, the boulevard,<br />Wiley Park, New - 2195. <br /><br /><br />
											Phone- 0415582560<br>Email: yasir@linktechbd.com<br>Skype : linktechbd<br>FaceBook : facebook.com/linktechbd
										</div>
										</td>
									</tr>
								</table>
							</td>
						</tr>
						<tr height="30px"><td colspan="3" style="font-family:tahoma;font-size:14px;font-weight:bold">Location Map</td></tr>
						<tr>
							<td colspan="3">
								<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3650.332181949827!2d90.36958599999997!3d23.806784!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755c72d1a5bf2a9%3A0x25a0f9a592e96ad8!2sLink-Up+Technology!5e0!3m2!1sen!2sbd!4v1423910967291" width="770" height="425" frameborder="0" style="border:0; width: 100% ; padding-bottom: 20px;"></iframe>
							</td>
						</tr>
					</table>
				<!=======================X Contactus Containts X=====================>
<?php include_once("inc/footer.php"); ?>