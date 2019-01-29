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
<!Doctype html>
<html>
<head>
  <title>Home | MyEcommerce</title>
  <link rel="icon" href="images/favicon.ico">
  
  <meta name="language" content="en-us" />
  	<meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="description" content="All Kinds of Electric goods, L.E.D Light, Metal Set Sodium Light, Profesional Shooting Light Fency Light Whole Sale & Retailor." />
    <meta name="keywords" content="All Kinds of Electric goods, L.E.D Light, Metal Set Sodium Light, Profesional Shooting Light Fency Light Whole Sale & Retailor."/>
    <meta name="classification" content="Electric goods, L.E.D Light, Metal Set Sodium Light, Profesional Shooting Light Fency Light Whole Sale & Retailor" />
    <meta name="distribution" content="Global" />
    <meta name="rating" content="General" />
    <meta name="robots" content="index, follow" />

  <link href='http://fonts.googleapis.com/css?family=PT+Sans:400,700' rel='stylesheet' type='text/css'>
  <link rel="stylesheet" type="text/css" media="all" href="css/css/fonts/styles.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">

  <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
  <link rel="stylesheet" href="css/responsive/header.css">
  <link rel="stylesheet" href="css/responsive/responsive.css">
  <link rel="stylesheet" href="css/responsive/dropdown.css">
  

 
  <link rel="stylesheet" type="text/css" href="css/menu.css">
  <link rel="stylesheet" type="text/css" href="css/slide.css">
  <link rel="stylesheet" type="text/css" href="css/style.css"> 
  <link rel="stylesheet" href="css/responsive/log_in.css">

  <script type="text/javascript" src="js/responsive/log_in.js"></script> 
  <script type="text/javascript" src="js/jquery.min.js"></script>
  <script type="text/javascript" src="js/bootstrap.min.js"></script>
  <script type="text/javascript" src="js/menu.js"></script>
  <script type="text/javascript" src="js/slide.js"></script>
  <script type="text/javascript" src="js/core.js"></script>

</head>
<body>

<section id="Top">
 <div class="container header">
 	<div class="row">
 		<div class="col-md-9 col-sm-9">
 			<div id="menu_tab">
	          <ul class="menu nav">
	             <li class=""><a href="secured_shopping.php" class="nav"> Secured Shopping </a></li>
	             <li><a href="delivery_caharge.php" class="nav">Lowest Delivery Charge</a></li>
	             <li><a href="cashDelivery.php" class="nav">Cash on Delivery</a></li>
	             <li><a href="customer_support.php" class="nav">Customar Support(24*7)</a></li>
	             
	          </ul>
	        </div>
 		</div>
 		<div class="col-md-3 col-sm-3">
 			<div id="menu_tab">
		          <ul class="menu nav" style="float: right;">
<?php 
	
 	if (isset($_SESSION['cstmr_u_name']) && isset($_SESSION['cstmr_srl_no']) == true) { ?>
 		<li><a href="" class="nav" ><?php echo $_SESSION['cstmr_u_name']; ?></a></li>
 	<?php } else{ ?> 
		<!-- <li><a href="login.php" class="nav">Sign In</a></li> -->
		<button onclick="document.getElementById('id01').style.display='block'">Login</button>
<!-- The Login Part -->
<div id="id01" class="modal0">
  <span onclick="document.getElementById('id01').style.display='none'" 
class="close" title="Close Modal">&times;</span>

  <!-- Modal Content -->
  <form class="modal-content0 animate0" action="">
    <div class="imgcontainer0">
      <img src="img_avatar2.png" alt="Avatar" class="avatar0">
    </div>

    <div class="container0">
      <label><b>Username</b></label>
      <input class="input_id" type="text" placeholder="Enter Username" name="uname" required>

      <label><b>Password</b></label>
      <input class="input_id" type="password" placeholder="Enter Password" name="psw" required>

      <button type="submit" class="login_btn">Login</button> <br>
      <input type="checkbox" checked=""> Remember me
    </div>

    <div class="container0" style="background-color:#f1f1f1">
      <button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn0" >Cancel</button>
      <span class="psw0">Forgot <a href="#">password?</a></span>
    </div>
  </form>
</div>
<!-- The Login Part -->

 	<?php } ?>
		             <li><div class="dropdown">
						  <button class="dropbtn" class="nav">My Account</button>
						  <div class="dropdown-content">
						    <a href="login_or_my_profile.php">My Profile</a>
						    <a href="cart&login.php">My Cart</a>
						    <a href="Cart.php">My Shopping</a>
						    <a href="logout.php">Log Out</a>
						  </div>
						</div></li>
		          </ul>
		        </div>
 		</div>
 	</div>
 </div>
</section>
<section id="header">
	<div class="container all_container head">
		<div class="row">
			<div class="col-md-3 col-sm-6 logo"><a href="index.php"><img src="images/logo.png"></a></div>
			<div class="col-md-6 col-sm-6">
				<div class="s"><form action="search.php" method="get">
					<select class="select_batton no_border" name="select">
					
						<option>All Products</option>
<?php 
	
	$query = "select * from tbl_category";
	$cat = $db->select($query);
	if ($cat) {
		while ($result = $cat->fetch_assoc()) {

?>
						<option value="<?php echo $result['cat_name']; ?>"><?php echo $result['cat_name']; ?></option>

<?php } } ?>
					</select>
					<input type="text" name="search"  class="input_text no_border" placeholder="Search Products...">
					<input type="submit" value="Search" class="input_submit">
				</form>
				</div>
			</div>


			<div class="col-md-3 col-sm-8 col-sm-offset-2 cart_div" id="checkoutTable">

			<?php 
			    $session_id = session_id();
				$totalcost=0;
				$totalquantity = 0;
	        	$qued = "SELECT tbl_addtocart.*, tbl_product.* FROM tbl_addtocart LEFT JOIN  tbl_product ON tbl_product.p_srl_no=tbl_addtocart.product_id WHERE tbl_addtocart.session_id='$session_id'";

	        	$Cart_slt = $db->select($qued);
	        	if ($Cart_slt) {
	        		while ( $result = $Cart_slt->fetch_assoc()) {
	        			if ($result['p_is_offer' ] == 'OFFER GOING') {
	        				$ppp_price = $result['p_offer_price'];
	        			}else{
	        				$ppp_price = $result['p_price'];
	        			}
	        			$totalcost = $totalcost+($ppp_price * $result['quantity']);
	        			$totalquantity = $totalquantity+$result['quantity'];
	        		}
	        	}
			?>
				
				<div class="col-md-12" id="cart_id_tk">
				<div class="row" id="cart_row">
				<div class="col-md-4">
				<a href="Cart.php"><img id="img_id" title="Click to see your cart" class="cart_image" src="images/dzfsd.PNG" alt=""></a>
				</div> 
				<div class="col-md-8" id="cart_8">
				Total Item : <?php echo $totalquantity; ?> <br>
				Amount : <?php echo $totalcost; ?>
				</div>
				<div  id="total_cart_cost"></div>
				</div>
				
				<div id="menu_tab">
		          <ul class="menu nav" style="float: left; ">  
		             <!-- <li><a href="signup.php" class="nav">Sign Up</a></li> -->
		             <li><div class="con"><a href="Cart.php">Check Out</a></div>
						
						<ul class="ss" id="cart_id">
							<li>
								<table style="width: 100%;">
				 <?php 
				   $session_id = session_id();

				    
			      $totalcost=0;
			      $qued = "SELECT tbl_product.*, tbl_addtocart.* FROM tbl_product LEFT JOIN  tbl_addtocart ON tbl_addtocart.product_id=tbl_product.p_srl_no WHERE tbl_addtocart.session_id='$session_id'";
			      $Cart_slt = $db->select($qued);
			     if ($Cart_slt ) {
            ?>

    <thead style="background: #CFDAE8;">
          <tr>
            <th class="cart_thead" >Image</th>
            <th class="cart_thead" >Name</th>
            <th class="cart_thead" >Quantity</th>
            <th class="cart_thead" >Total</th>
          </tr>
        </thead> 
<tbody>
            <?php
          while ($result = $Cart_slt->fetch_assoc()) {
          	if ($result['p_is_offer' ] == 'OFFER GOING') {
    				$ppp_price = $result['p_offer_price'];
    			}else{
    				$ppp_price = $result['p_price'];
    			}
    			$totalcost = $totalcost+($ppp_price * $result['quantity']);
    			$totalquantity = $totalquantity+$result['quantity'];
          
?>          
            <tr style="border-bottom: 1px solid #d7dbe0">
           
            <td class="cart_td" ><img class="cart_td_img" src="admin/img/<?php echo $result['p_image']; ?>" class="thumb"></td>
            <td class="cart_td" ><?php echo $result['p_name']; ?></td>
            <td class="cart_td" ><?php echo $result['quantity']; ?></td>
            <td class="cart_td" ><?php echo $ppp_price*$result['quantity']; ?> Tk</td>
          </tr>
            

<?php } } ?>
          
    </tbody>

        </table>
        <a href="Cart.php"><input style="width: 100%; cursor: pointer;" type="button" name="button" value="Check Out Now!"></a>
			</li>
				
		</ul>
     </li>
  </ul>
</div>
</div>

</div>

</div>
</div>
</section>
<section id="menu">
	<div class="container menu_div padd">
		
			<div id='cssmenu'>
				<ul>
				   <li class='active'><a href='index.php'>Home</a></li>
				   
				   <li class='has-sub'><a href='products.php'><span>Product</span></a>
				   	  <!-- <ul>
				         <li><a href='products.php'><span>T-Shirts</span></a></li>
				         <li><a href='ladies_item.php'><span>Ladies Dress</span></a></li>
				         
				      </ul> -->
				   </li>
				   <li class=''><a href='exclusive_collection.php'>Exclusive</a></li>
				   <li class=''><a href='new_arival.php'><span>New Arrival</span></a></li>
				   <li class=''><a href='offers.php'><span>Offers</span></a></li>
				   
				   <li class=''><a href='gallery.php'><span>Gallery</span></a></li>
				   
				   <li style="border-right: 0;" class='last_menu_item'><a href='contactus.php'><span>Contact Us</span></a></li>
				</ul>
			</div>
		
	</div>
</section>
<section id="hotline">
	<div class="container all_container">
		<div id="hotline" class="row hotline">
			<marquee behavior="scroll" scrollamount="3" direction="left" width="100%"><span style="font-weight: normal;">Hotline : 01846899039, 01818927715</span></marquee>
		</div>
	</div>
</section>
<section id="MainBody">
