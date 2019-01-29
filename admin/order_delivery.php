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

<div id="content">      
            <div class="inner" style="min-height: 700px;">
                <div class="row">
                    <div class="col-lg-12">
                        <h1> Order Delivery </h1>
                    </div>
                </div>
                  <hr />
<div class="panel panel-danger">
                            <div class="panel-heading">
                                <i class="icon-bell"></i> Orders
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
                                            <th width="15%">Serial</th>
                                            <th width="15%">Product Name</th>
                                            <th width="15%">Quantity</th>
                                            <th width="15%">Unit price</th>  
                                        </tr>
                                    </thead>

                                   <tbody>
    <!--Pagination--> 
    <?php

    $o_d_id= $_GET['o_d_id'];

    if (isset($_GET['o_d_id'])) {
      $query = "UPDATE tbl_order 
      SET 
        o_status = 'A'
        WHERE 
        o_srl_no='$o_d_id'
      ";
      $approve = $db->update($query);
      if ($approve) {
        echo "<span style='color: green; font-weight: bold; font-size: 16px; text-align: center;'>Order Delivered. <hr></span>"; 
         
        
      }
    }    
    ?>
    <!--Pagination-->  
    <?php 
      $query = "SELECT tbl_order_detail.*, tbl_order.*, tbl_product.* FROM tbl_order_detail LEFT JOIN tbl_order ON tbl_order_detail.o_d_srl_no=tbl_order.o_srl_no LEFT JOIN tbl_product ON tbl_product.p_srl_no=tbl_order_detail.o_d_product_id WHERE tbl_order_detail.o_d_id='$o_d_id'";
      $post = $db ->select($query);
      if($post){
        $i=0;
         $tot = 0;
         $date = Date('Y-m-d'); 
        while($result = $post ->fetch_assoc()){
          $i++;

    ?>   
                                    <tr>

                                        <td><?php echo $i; ?></td>
                                        <td><?php echo $result['p_name']; ?></td>
                                        <td><?php echo $result['o_d_p_qnty']; ?></td> 
                                        
                                        <td><?php echo $total = $result['o_d_price']*$result['o_d_p_qnty']; 
                                        $tot += $total;
                                        ?></td>   
                                    </tr>

    <?php } }  ?>

                                    </tbody>
                                </table>
<!--Pagination-->
<div style="text-align: center;">
  <ul class="pagination">

</ul>
</div>
<?php //} ?>

<!--Pagination-->
                            </div>
                        </div>
                    </div>
                </div>
    </div>
</div>
    </div>
</div>
<?php include 'inc/a_right_strip.php'; ?>
<?php include 'inc/a_footer.php'; ?>