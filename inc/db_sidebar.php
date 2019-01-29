
	<div  class="container all_container">
		<div class="row">
			<div class="col-md-2 col-sm-2 side_menu padd">
				<ul>
	<?php 
 	if (isset($_SESSION['member_username']) && isset($_SESSION['member_id']) == true) { ?>
 		<li class='' ><a href='client_db.php'><span>Client DB</span></a></li>

 	<?php } ?>
 					
 					<!-- <li><a href="Cart.php">My Shopping</a></li>
					<li><a href="previous_order.php">Previous Orders</a></li>
					<li><a href="all_orders.php">All Orders</a></li> -->
					<a href="client_db.php"><li>Dashboard</li></a>
					<a href="myProfile.php"><li>My Profile</li></a>
					<a href="pending_order.php"><li>My Orders</li></a>
<!-- 					<li><a href="message.php">Message to Authority</a></li>
					<li><a href="products.php">Back to Shopping</a></li>
					<li><a href="">Send Referance</a></li> -->
					<a href=""><li>Download App</li></a>
					
				</ul>
			</div>
			<div class="col-md-10 col-sm-10 right_div">