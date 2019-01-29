<?php include 'Config/Config.php'; ?>
<?php include 'Config/Database.php'; ?>
<?php include 'Config/Format.php'; ?>
<?php 
	$db = new Database();
	session_start();
?>
<?php 

	if (!isset($_POST['id']) || $_POST['id'] == NULL) {
		return false;
	}else{
		$id = $_POST['id'];
		$quantity = $_POST['quantity'];
		if ($quantity == 0) {
			$delquery = "DELETE FROM tbl_addtocart WHERE id = '$id'";
			$deldata = $db->delete($delquery);
		}else{
		$query = "UPDATE tbl_addtocart SET quantity = '$quantity' WHERE id = '$id' ";
		$update_cart = $db->update($query);
		}
	}

?>
<div id="checkoutarea">

    <div id="page">
      <table id="cart">
        <thead style="background: #CFDAE8;">
          <tr>
            <th style="width: 20%; text-align: center;">Image</th>
            <th style="width: 20%; text-align: center;">Quantity</th>
            <th style="width: 20%; text-align: center;">Product</th>
            <th style="width: 20%; text-align: center;">Unit price</th>
            <th style="width: 20%; text-align: center;">Line Total</th>
            <th style="width: 20%; text-align: center;">&nbsp;</th>
          </tr>
        </thead>
        <tbody>
          <!-- shopping cart contents -->
<?php 
      $session_id = session_id();
      $totalcost=0;
          $qued = "SELECT tbl_product.*, tbl_addtocart.* FROM tbl_product LEFT JOIN  tbl_addtocart ON tbl_addtocart.product_id=tbl_product.p_srl_no WHERE tbl_addtocart.session_id='$session_id'";
          $Cart_slt = $db->select($qued);
          if ($Cart_slt) {
          while ($result = $Cart_slt->fetch_assoc()) {
            if ($result['p_is_offer' ] == 'OFFER GOING') {
            $ppp_price = $result['p_offer_price'];
          }else{
            $ppp_price = $result['p_price'];
          }
          $totalcost = $totalcost+($ppp_price * $result['quantity']);
          
?>          
          <tr class="productitm">
            <!-- http://www.inkydeals.com/deal/ginormous-bundle/ -->
            <td><img src="admin/img/<?php echo $result['p_image']; ?>" class="thumb"></td>
            
            <td>
            <input type="number" id="quantity<?php echo $result['id']; ?>" value="<?php echo $result['quantity']; ?>" min="0" max="99" class="qtyinput" onchange="edit_cart(<?php echo $result['id']; ?>)" >
            </td>

            <td><?php echo $result['p_name']; ?></td>
            <td><?php echo $result['p_price']; ?> Tk</td>
            <td><?php echo $ppp_price*$result['quantity']; ?> Tk</td>
            <td><span class="remove"><a onclick="del_data(<?php echo $result['id']; ?>)" >x</a></span></td>
          </tr>
<?php } } ?>
          
          
          <tr class="totalprice">
            <td class="light">Total:</td>
            <td colspan="3">&nbsp;</td>
            
            <td ><span class="thick"><?php echo $totalcost;?> Tk</span></td>
            <td >&nbsp;</td>
          </tr>
          <!-- checkout btn -->
          <tr class="checkoutrow">
            <td colspan="6" class="checkout"><a style="color: #fff;" href="registration_more.php"><button id="submitbtn">Checkout Now!</button></a></td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>

