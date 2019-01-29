<?php 
	session_start();
    include 'Config/Config.php'; 
    include 'Config/Database.php'; 
    include 'Config/Format.php';
    include_once("lib/user.php");
    //include_once("lib/Session.php");
     

    $db = new Database();
?>

<?php 
	$id = $_POST['id'];	
	$session_id = session_id();
 	$quantity = 1;
 	$date = date('Y-m-d');

 	$query = "select * from tbl_addtocart where product_id='$id' and session_id='$session_id' ";
 	$addtocart = $db->select($query);
 	if ($addtocart) {
	 	$result= mysqli_fetch_array($addtocart);
	 	$num = mysqli_num_rows($addtocart);
	 }
 	if (isset($num)) {
 		$pquantity = $result['quantity'];
 		$qty = $pquantity+$quantity;

 		$query = "update tbl_addtocart set quantity='$qty' where product_id='$id' and session_id='$session_id' ";
 		$qtty = $db->update($query);
 	}else{
 		$query = "INSERT INTO tbl_addtocart (product_id, session_id, quantity, date) VALUE('$id', '$session_id', '$quantity', '$date') ";
 		$insert = $db->insert($query); 
 }

?>

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
        
        <div class="col-md-12" style="width:175px;">
        <div class="row" style="border: 1px solid #000;">
        <div class="col-md-4">
        <a href="Cart.php"><img id="img_id" title="Click to see your cart" style="width: 30px;height: 35px;" src="images/dzfsd.PNG" alt=""></a>
        </div> 
        <div class="col-md-8">
        Total Item : <?php echo $totalquantity; ?> <br>
        Amount : <?php echo $totalcost; ?>
        </div>
        <div  id="total_cart_cost"></div>
        </div>
        
        <div id="menu_tab">
              <ul class="menu nav" style="float: left; ">  
                 <!-- <li><a href="signup.php" class="nav">Sign Up</a></li> -->
                 <li><div class="con"><a href="">Check Out</a></div>
            <ul class="ss" style="width: 175px; height: auto; background: #fff; border-radius: 0 0 5px 5px; z-index: 999; padding-left: 0;    margin-top: 29px;margin-left: -14px; ">
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
            <th style="width: 25%; font-weight: normal;font-size: 12px; text-align: center;">Image</th>
            <th style="width: 25%; text-align: center; font-weight: normal;font-size: 12px; text-align: center;">Name</th>
            <th style="width: 25%; text-align: center; font-weight: normal;font-size: 12px; text-align: center;">Quantity</th>
            <th style="width: 25%; text-align: center; font-weight: normal;font-size: 12px; text-align: center;">Total</th>
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
            <tr id="" style="border-bottom: 1px solid #d7dbe0">
            <!-- http://www.inkydeals.com/deal/ginormous-bundle/ -->
            <td style="width: 25%; text-align: center; font-weight: normal;font-size: 10px; text-align: center;"><img style="width: 20px; height: 20px;" src="admin/img/<?php echo $result['p_image']; ?>" class="thumb"></td>
            <td style="width: 25%; text-align: center; font-weight: normal;font-size: 10px; text-align: center;"><?php echo $result['p_name']; ?></td>
            <td style="width: 25%; text-align: center; font-weight: normal;font-size: 10px; text-align: center;"><?php echo $result['quantity']; ?></td>
            <td style="width: 25%; text-align: center; font-weight: normal;font-size: 10px; text-align: center;"><?php echo $ppp_price*$result['quantity']; ?> Tk</td>
          </tr>
            

<?php } } ?>
          
    </tbody>

        </table>
        <a href="Cart.php"><input style="width: 100%;" type="button" name="button" value="Check Out Now!"></a>
      </li>
        
    </ul>
     </li>
  </ul>
</div>
</div>