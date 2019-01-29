<?php include 'Config/Config.php'; ?>
<?php include 'Config/Database.php'; ?>
<?php include 'Config/Format.php'; ?>
<?php 
  $db = new Database();
?>
<?php 
      $id = $_POST['id'];
      $order_id = $_POST['order_id'];

      $query = "SELECT * FROM tbl_order_detail WHERE o_d_srl_no='$id' ";
      $order_detail = $db->select($query);
      if ($order_detail) {
        $result = $order_detail->fetch_assoc();
        $item_total = $result['o_d_p_qnty']*$result['o_d_price'];

        $query2 = "SELECT * FROM tbl_order WHERE o_srl_no='$order_id' ";
        $order = $db->select($query2);
        if ($order) {
          $resultt = $order->fetch_assoc();

          $totalcost = $resultt['o_total_amount'];
          $delivery_cost = $resultt['o_delivery_cost'];
          $othercost = $resultt['o_other_cost'];

        $new_totalCost = $totalcost - $item_total;
        $vat = ($new_totalCost * 15)/100;

        $subtotal = $new_totalCost + $vat + $othercost + $delivery_cost;

        $query = "UPDATE tbl_order
              SET 
              o_total_amount = '$new_totalCost',
              o_vat = '$vat',
              o_subtotal = '$subtotal'

              WHERE 
              o_srl_no = '$order_id'

        ";

        

        $query4 = "SELECT * FROM tbl_order_detail WHERE o_d_id='$order_id' ";
        $O_S = $db->select($query4);

         $row = mysqli_num_rows($O_S);

        if ($row > 1 ) {
          $query3 = "DELETE FROM tbl_order_detail WHERE o_d_srl_no='$id' ";
          $delrow = $db->delete($query3);
        }else{
          $query3 = "DELETE FROM tbl_order_detail WHERE o_d_srl_no='$id' ";
          $delrow = $db->delete($query3);

          $query5 = "DELETE FROM tbl_order WHERE o_srl_no='$order_id' ";
          $deleteData = $db->delete($query5);
        }
      }
    }

?>
<div id="page">
      <table id="cart">
        <thead style="background: #CFDAE8;">
          <tr>
            <th style="width: 20%; text-align: center;">Image</th>
            <th style="width: 20%; text-align: center;">Product Name</th>
            <th style="width: 20%; text-align: center;">Quantity</th>
            <th style="width: 20%; text-align: center;">Unit price</th>
            <th style="width: 20%; text-align: center;">Line Total</th>
            <th style="width: 20%; text-align: center;">&nbsp;</th>
          </tr>
        </thead>
        <tbody>
          <!-- shopping cart contents -->
<?php 

      $totalquantity = 0;
      $totalcost = 0;
      $deliveryCharge = 50;
      $otherCost = 0;
      $query = "SELECT tbl_order_detail.*, tbl_order.*, tbl_product.* FROM tbl_order_detail LEFT JOIN tbl_order ON tbl_order_detail.o_d_srl_no=tbl_order.o_srl_no LEFT JOIN tbl_product ON tbl_product.p_srl_no=tbl_order_detail.o_d_product_id WHERE tbl_order_detail.o_d_id='$order_id'";
      $post = $db ->select($query);
      if($post){
        $i=0;
         $tot = 0;
         $date = Date('Y-m-d'); 
        while($result = $post ->fetch_assoc()){
          $i++;

          $totalquantity = $totalquantity+($result['o_d_p_qnty']);
          $totalcost = $totalcost+($result['o_d_price']*$result['o_d_p_qnty']);
?>          
          <tr class="productitm">
            <!-- http://www.inkydeals.com/deal/ginormous-bundle/ -->
            <td><img src="admin/img/<?php echo $result['p_image']; ?>" class="thumb"></td>
            <td><?php echo $result['p_name']; ?></td>
            <td><input type="number" value="<?php echo $result['o_d_p_qnty']; ?>" min="0" max="99" class="qtyinput"></td>
            <td><?php echo $result['o_d_price']; ?> Tk</td>
            <td><?php echo $result['o_d_price']*$result['o_d_p_qnty']; ?> Tk</td>
            <td><span class="remove"><a onclick="del_data(order_details_id='<?php echo $result['o_d_srl_no']; ?>', order_id='<?php echo $order_id; ?>')" >x</a></span></td>
          </tr>
<?php } }  ?>
          
          
          <tr class="totalprice">
            <td class="light">Total:</td>
            <td colspan="3">&nbsp;</td>
            
            <td><span class="thick"><?php echo $totalcost; ?> Tk</span></td>
            <td>&nbsp;</td>
          </tr>
        </tbody>
      </table>
    </div>