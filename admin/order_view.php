<?php include 'inc/a_header.php'; ?>
<?php include 'inc/a_menu.php'; ?>
   <style>
        th{
            text-align: center;
        }
        td{
            text-align: center;
        }
    </style>
<?php 

  $view_id = $_GET['view_id'];
?>


        <!--PAGE CONTENT -->
        <div id="content">      
            <div class="inner" style="min-height: 700px;">
                <div class="row">
                    <div class="col-lg-12">
                        <h1>Pending Order View </h1>
                    </div>
                </div>
                  <hr />
<div class="panel panel-danger">
                            <div class="panel-heading">
                                <i class="icon-bell"></i> Orders
                                <a style="cursor:pointer; float: right;" onclick="window.open('order_view_print.php?view_id=<?php echo $view_id; ?>',  'newwindow', 'width=850, height=800,scrollbars=yes'); return false;"><img src="" alt=""> Print</a>
                                
                            </div>


                            <div class="container">
    <br>
    <div class="well well-small">
<div class="row">
                        <div class="col-xs-12">

                            <div class="clearfix">
                                <div class="pull-right tableTools-container"></div>
                            </div>
                            <div id="after_create">

                            

                                <table id="dynamic-table" class="table table-striped table-bordered table-hover">
                                    <thead>
                                    <tr>
                                      <td colspan="2">
                                        <b>Customer Information</b>
                                      </td>
                                      <td colspan="2">
                                        <b>Delivery Information</b>
                                      </td>
                                    </tr>
                                    <tr>
                                      <td colspan="2">
                                        <table>
<?php 
    $queryy = "SELECT tbl_order.*, tbl_customer_acc.*, tbl_deleivery_address.* FROM tbl_order LEFT JOIN tbl_customer_acc ON tbl_order.o_cstmr_id=tbl_customer_acc.cstmr_srl_no LEFT JOIN tbl_deleivery_address ON tbl_deleivery_address.deliver_serial_no=tbl_order.o_delivery_id WHERE o_srl_no='$view_id' ";
    $customer_info = $db->select($queryy);
    if ($customer_info) {
      $resullt = $customer_info->fetch_assoc();
    
?>
                                          <tr>
                                            <td><span style="font-weight: bold;">Name: </span></td>
                                            <td><?php echo $resullt['cstmr_name']; ?></td>
                                          </tr>
                                          <tr>
                                            <td><span style="font-weight: bold;">Email: </span> </td>
                                            <td><?php echo $resullt['cstmr_mail']; ?></td>
                                          </tr>
                                          <tr>
                                            <td><span style="font-weight: bold;">Mobile: </span> </td>
                                            <td><?php echo $resullt['cstmr_phn_no']; ?></td>
                                          </tr>
                                          <tr>
                                            <td style="font-weight: bold;">Address:</td>
                                            <td><?php echo $resullt['cstmr_delivery_address']; ?></td>
                                          </tr>
                                        </table>
                                      </td>
                                      <td colspan="2">
                                        <table>
                                          <tr>
                                            <td><span style="font-weight: bold;">Name:  </span></td>
                                            <td><?php echo $resullt['deliver_name']; ?></td>
                                          </tr>
                                          <tr>
                                            <td><span style="font-weight: bold;">Mobile: </span> </td>
                                            <td><?php echo $resullt['deliver_mobile']; ?></td>
                                          </tr>
                                          
                                          <tr>
                                            <td><span style="font-weight: bold;">Address: </span> </td>
                                            <td>&ensp; <?php echo $resullt['deliver_house_no']; ?></td>
                                          </tr>
                                        </table>
                                  <?php } ?>      
                                      </td>
                                    </tr>
                                        <tr> 
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
          

          // $totalquantity = $totalquantity+($result['o_d_p_qnty']);
          // $totalcost = $totalcost+($result['o_d_price']*$result['o_d_p_qnty']);

          
    ?>
    <!--Pagination-->     
                                    <tr>

                                        <td><?php echo $i; ?></td>
                                        <td><?php echo $result['p_name']; ?></td>
                                        <td><?php echo $result['o_d_p_qnty']; ?></td> 
                                        
                                        <td><?php echo $total = $ppp_price*$result['o_d_p_qnty']; 
                                        $tot += $total;
                                        ?></td>   
                                    </tr>

    <?php } }  ?>
    <tr>
      <td></td><td></td><td>Total Amount :</td><td><b><?php echo $tot; ?> tk</b></td>

    </tr>
    <tr>
      <td></td><td></td><td>Delivery Charge:</td><td><b> <?php echo $deliveryCharge; ?> tk</b></td>

    </tr>
    <tr>
      <td></td><td></td><td>VAT (15%) : </td><td><b> <?php 

                    $vat = ($totalcost * 15)/100; echo $vat; ?> tk </b></td>
      
    </tr>
    <tr>
      <td></td><td></td><td> Grand Total Amount :</td><td><b>BDT <?php $grandTotal = $totalcost+$vat+$deliveryCharge+$otherCost; echo $grandTotal;
            ?></b></td>

    </tr>
                                    </tbody>
<td></td><td></td><td></td><td><a href="order_delivery.php?o_d_id=<?php echo $view_id; ?>"><button class="btn btn-xs btn-danger" id="<?php echo $result['o_srl_no']; ?>" onclick="approve(this.id)">Deliver</button></a> || <a href="order_cancel.php?cancel_id=<?php echo $view_id; ?>"><button class="btn btn-xs btn-danger" id="<?php echo $result['o_srl_no']; ?>" onclick="pdelivery(this.id)">Cancel</button></a></td>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
    </div>
</div>
    </div>
</div>
        <!--END PAGE CONTENT -->
        
<?php include 'inc/a_right_strip.php'; ?>
<?php include 'inc/a_footer.php'; ?>