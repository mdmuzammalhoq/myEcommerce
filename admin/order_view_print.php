<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title></title>
  <script type="text/javascript">
function printpage() {
document.getElementById('printButton').style.visibility="hidden";
window.print();
document.getElementById('printButton').style.visibility="visible";  
} </script>
</head>

<body>
<input name="print" type="button" value="Print" id="printButton" onClick="printpage()">
<?php 
    include '../Config/Config.php';
    include '../Config/Database.php'; 
    include '../Config/Format.php';

    $db = new Database();
    $fm = new Format();
    $view_id = $_GET['view_id'];

?>
<div style="width: 100%;">      
<div style="text-align: center;">
    <h2 style="text-align: center; margin-bottom: 0px; ">Link-Up Ecommerce </h2>
    <p style="margin-top: 0px; margin-bottom: 0;">Address: adcvugvdakuvkuvk</p> 
    <p style="margin-top: 0px; margin-bottom: 0;">Email: linktechbd@gmail.com</p>
    <p style="margin-top: 0px; margin-bottom: 0;">Mobile: 01832361628</p>
    <p style="margin-top: 0px; margin-bottom: 5px;">Website: linktechbd.com</p>
</div>

    <table style="width: 100%;margin-bottom: 20%; background: #F2F1F0;  " border="0" cellpadding="0" cellspacing="0">
        <thead style="">
        <tr>
          <td colspan="4"><h1 style="text-align: center; margin: 0; ">Sales Invoice</h1> <hr style="margin: 0;"><hr style="margin: 0;"></td>
        </tr>
        <tr style="text-align: center; font-weight: normal;">
          <td colspan="2">
            <b>Customer Information</b>
          </td>
          <td colspan="2">
            <b>Delivery Information</b>
          </td>
        </tr>
        <tr style=" ">
          <td colspan="2" style="border-bottom: 1px solid #000;">
            <table >
<?php 
    $queryy = "SELECT tbl_order.*, tbl_customer_acc.*, tbl_deleivery_address.* FROM tbl_order LEFT JOIN tbl_customer_acc ON tbl_order.o_cstmr_id=tbl_customer_acc.cstmr_srl_no LEFT JOIN tbl_deleivery_address ON tbl_deleivery_address.deliver_serial_no=tbl_order.o_delivery_id WHERE o_srl_no='$view_id' ";
    $customer_info = $db->select($queryy);
    if ($customer_info) {
      $resullt = $customer_info->fetch_assoc();
    
?>
                                          <tr style="text-align: center;">
                                            <td><span style="font-weight: bold;">Name: </span></td>
                                            <td><?php echo $resullt['cstmr_name']; ?></td>
                                          </tr>
                                          <tr style="text-align: center;">
                                            <td><span style="font-weight: bold;">Email: </span> </td>
                                            <td><?php echo $resullt['cstmr_mail']; ?></td>
                                          </tr>
                                          <tr style="text-align: center;">
                                            <td><span style="font-weight: bold;">Mobile: </span> </td>
                                            <td><?php echo $resullt['cstmr_phn_no']; ?></td>
                                          </tr>
                                          <tr style="text-align: center;">
                                            <td><span style="font-weight: bold;">Address: </span> </td>
                                            <td><?php echo $resullt['cstmr_delivery_address']; ?></td>
                                          </tr>
                                        </table>
                                      </td>
                                      <td colspan="2" style="border-bottom: 1px solid #000; margin-top: 5px;">
                                        <table>
                                          <tr style="text-align: center;">
                                            <td><span style="font-weight: bold;">Name:  </span></td>
                                            <td><?php echo $resullt['deliver_name']; ?></td>
                                          </tr>
                                          <tr style="text-align: center;">
                                            <td><span style="font-weight: bold;">Mobile: </span> </td>
                                            <td><?php echo $resullt['deliver_mobile']; ?></td>
                                          </tr>
                                          
                                          <tr style="text-align: center;">
                                            <td><span style="font-weight: bold;">Address: </span> </td>
                                            <td>&ensp; <?php echo $resullt['deliver_house_no']; ?></td>
                                          </tr>
                                        </table>
                                  <?php } ?>

                                      </td>

                                    </tr>
                                        <tr style="border: 1px solid #000;"> 
                                            <th width="15%">Serial</th>
                                            <th width="15%">Product Name</th>
                                            <th width="15%">Quantity</th>
                                            <th width="15%">Unit price</th>  
                                        </tr>
                                    </thead>
                                   <tbody>
    <!--Pagination--> 
    <?php 
      $totalquantity = 0;
      $totalcost = 0;
      $deliveryCharge = 50;
      $otherCost = 0;
      $query = "SELECT tbl_order_detail.*, tbl_order.*, tbl_product.* FROM tbl_order_detail LEFT JOIN tbl_order ON tbl_order_detail.o_d_srl_no=tbl_order.o_srl_no LEFT JOIN tbl_product ON tbl_product.p_srl_no=tbl_order_detail.o_d_product_id WHERE tbl_order_detail.o_d_id='$view_id'";
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
    
    ?>
    <!--Pagination-->     
                                    <tr>

                                        <td style="text-align: center;"><?php echo $i; ?></td>
                                        <td style="text-align: center;"><?php echo $result['p_name']; ?></td>
                                        <td style="text-align: center;"><?php echo $result['o_d_p_qnty']; ?></td> 
                                        
                                        <td style="text-align: center;"><?php echo $total = $ppp_price*$result['o_d_p_qnty']; 
                                        $tot += $total;
                                        ?> </td> 

                                    </tr>

    <?php } } ?>

    <tr style="background: #fff; border-top: 1px solid #000;" >
      <td ></td><td style="background: #fff;"></td><td style="text-align: center;">Total Amount :</td><td style="text-align: center;"><b><?php echo $tot; ?> tk</b></td>
    </tr>
    <tr >
      <td></td><td></td><td style="text-align: center;">Delivery Charge:</td><td style="text-align: center;"><b> <?php echo $deliveryCharge; ?> tk</b></td>

    </tr>
    <tr style="background: #fff;">
      <td ></td><td></td><td style="text-align: center;">VAT (15%) : </td><td style="text-align: center;"><b> <?php 

                    $vat = ($totalcost * 15)/100; echo $vat; ?> tk </b></td>
      
    </tr>

    <tr >
      <td></td><td></td><td style="text-align: center;">Grand Total Amount :</td><td style="text-align: center;"><b>BDT <?php $grandTotal = $totalcost+$vat+$deliveryCharge+$otherCost; echo $grandTotal;
            ?></b></td>

    </tr>
                                    </tbody>

                                </table>
                        
</div>

<table  >
 <div class="row">
   <div class="col-md-6">
     <div class="form-group" style="float: left; position: absolute; left: 50px; bottom: 50px;">
        <label class="col-sm-4 control-label no-padding-right" for="Ccustomer_name">Cusomers Signature</label>

    </div>
   </div>
  <div class="col-md-6">
    <div class="form-group" style="float: right; position: absolute; right: 50px; bottom: 50px;">
        <label class="col-sm-4 control-label no-padding-right" for="Ccustomer_name">Authority Signature</label>

    </div>
  </div>
 </div>
</table>
<div class=""><b></b></div>
        <!--END PAGE CONTENT -->
</body>

</html>
