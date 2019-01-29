<?php include_once("inc/header.php"); error_reporting(0); ?>
<?php include_once("inc/db_sidebar.php"); ?>
<style>
  .name{
    text-align: center;
  }
</style>

  <div id="view_my_order" style="margin-bottom: 60px;">

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
      $view_my_order = $_GET['my_order_view'];
      $totalquantity = 0;
      $totalcost = 0;
      $deliveryCharge = 50;
      $otherCost = 0;
      $query = "SELECT tbl_order_detail.*, tbl_order.*, tbl_product.* FROM tbl_order_detail LEFT JOIN tbl_order ON tbl_order_detail.o_d_srl_no=tbl_order.o_srl_no LEFT JOIN tbl_product ON tbl_product.p_srl_no=tbl_order_detail.o_d_product_id WHERE tbl_order_detail.o_d_id='$view_my_order'";
      $post = $db ->select($query);
      if($post){
        $i=0;
         $tot = 0;
         $date = Date('Y-m-d'); 
        while($result = $post ->fetch_assoc()){
           $i++;
          if ($result['p_is_offer' ] == 'OFFER GOING') {
            $ppp_price = $result['p_offer_price'];
          }else{
            $ppp_price = $result['p_price'];
          }
          $totalcost = $totalcost+($ppp_price * $result['o_d_p_qnty']);
          $totalquantity = $totalquantity+$result['o_d_p_qnty'];
         

          // $totalquantity = $totalquantity+($result['o_d_p_qnty']);
          // $totalcost = $totalcost+($result['o_d_price']*$result['o_d_p_qnty']);
?>          
          <tr class="productitm">
            <!-- http://www.inkydeals.com/deal/ginormous-bundle/ -->
            <td><img src="admin/img/<?php echo $result['p_image']; ?>" class="thumb"></td>
            <td><?php echo $result['p_name']; ?></td>
            <td><input type="number" value="<?php echo $result['o_d_p_qnty']; ?>" min="0" max="99" class="qtyinput"></td>
            <td><?php echo $ppp_price; ?> Tk</td>
            <td><?php echo $ppp_price*$result['o_d_p_qnty']; ?> Tk</td>
            <td><span class="remove"><a onclick="del_data(order_details_id='<?php echo $result['o_d_srl_no']; ?>', order_id='<?php echo $view_my_order; ?>')" >x</a></span></td>
          </tr>
<?php } }  ?>
          
          
          <tr class="totalprice">
            <td class="light">Total:</td>
            <td colspan="3">&nbsp;</td>
            
            <td ><span class="thick"><?php echo $totalcost; ?> Tk</span></td>
            <td >&nbsp;</td>
          </tr>
          <!-- checkout btn -->
          <tr class="checkoutrow">
            
          </tr>
        </tbody>
      </table>
    </div>
  </div>
<script>
  function del_data(order_details_id, order_id){
    var id= order_details_id;
    var order_id = order_id;
    var dataUrl = "delete_my_order.php";
    var datastring = "id="+id+"&order_id="+order_id;

    $.ajax({
      type: "POST",
      url: dataUrl,
      data: datastring,
      success:function(data){
        if (data) {
          $("#view_my_order").html(data);
        }
        
      }

    });
  }
</script>

<?php include_once("inc/footer.php"); ?>