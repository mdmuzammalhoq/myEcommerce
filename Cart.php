<?php include_once("inc/header.php"); error_reporting(0); ?>
<?php include_once("inc/db_sidebar.php"); ?>
<style>
  .name{
    text-align: center;
  }
</style>

<div class="name">
<?php 

  $id = $_SESSION['cstmr_srl_no'];
  $query = "select * from tbl_customer_acc where cstmr_srl_no='$id'";
  $user = $db->select($query);
  if ($user) {
    $result= $user->fetch_assoc();
 
?>
  Hello : <b><?php echo $result['cstmr_name']; ?></b>
  <?php } ?>
</div>


<div style="margin-bottom: 60px;">
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
          $totalquantity = $totalquantity+$result['quantity'];
          
          
?>          
          <tr class="">
            <!-- http://www.inkydeals.com/deal/ginormous-bundle/ -->
            <td><img src="admin/img/<?php echo $result['p_image']; ?>" class="thumb"></td>
            <td>

            <input type="number" id="quantity<?php echo $result['id']; ?>" value="<?php echo $result['quantity']; ?>" min="0" max="99" class="qtyinput" onchange="edit_cart(<?php echo $result['id']; ?>)" >

            </td>
            <td><?php echo $result['p_name']; ?></td>
            <td><?php echo $ppp_price ; ?> Tk</td>
            <td><?php echo $ppp_price * $result['quantity']; ?> Tk</td>
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
</div>
<script>
  function del_data(id){
    var id= id;
    var dataUrl = "deletecart.php";
    var datastring = "id="+id;
    $.ajax({
      type: "POST",
      url: dataUrl,
      data: datastring,
      success:function(data){
        if (data) {
          $("#checkoutarea").html(data);
        }
        
      }

    });
  }

  function edit_cart(id){
    var id =id;
    var qid = '#quantity'+id;
    var quantity = $(qid).val();
    var dataUrl = "cart_ajax.php";
    var datastring = "id="+id+"&quantity="+quantity;

    $.ajax({
      type: "POST",
      url: dataUrl,
      data: datastring,
      success:function(data){
        if (data) {
          $("#checkoutarea").html(data);
        }
        
      }

    });
  }

</script>


<?php include_once("inc/footer.php"); ?>