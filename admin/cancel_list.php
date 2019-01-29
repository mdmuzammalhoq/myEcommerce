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
                        <h1> Order Cancelled </h1>
                    </div>
                </div>
                  <hr />
<div class="panel panel-danger">
                            <div class="panel-heading">
                                <i class="icon-bell"></i> Order Cancelled
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
                                            <th width="15%">S/N</th>
                                            <th width="10%">Date</th>
                                            <th width="10%">Customer Name</th>
                                            <th width="15%">Total Amount</th>
                                            <th width="15%">VAT</th>
                                            <th width="15%">Delivery Costs</th>
                                            <th width="10%">Grand-Total</th> 
                                            <th width="10%">Action</th>
                                            
                                        </tr>
                                    </thead>

                                   <tbody>
    <!--Pagination--> 
    <!--Pagination-->  
    <?php 
      $query = "SELECT * FROM tbl_order WHERE o_status='C' order by o_srl_no DESC";
      $approve = $db->select($query);
      if ($approve) {
        while ($result = $approve->fetch_assoc()) {

    ?>   
                                    <tr>
                                        <td><?php echo $result['o_srl_no']; ?></td>
                                        <td><?php echo $result['o_date']; ?></td>
                                        <td><?php echo $result['o_addby']; ?></td>
                                        <td><?php echo $result['o_total_amount']; ?></td>
                                        <td><?php echo $result['o_vat']; ?></td>
                                        <td><?php echo $result['o_delivery_cost']; ?></td>
                                        <td><?php echo $result['o_subtotal']; ?></td>

                                        <td><a href="cancel_order_view.php?view_cancel_id=<?php echo $result['o_srl_no']; ?>"><button class="btn btn-xs btn-danger" id="<?php echo $result['o_srl_no']; ?>" onclick="view(this.id)"><span id="view_id" title="View" class="glyphicon glyphicon-eye-open"></span></button></a> <a href="delete_order_forever.php?delete_forever_id=<?php echo $result['o_srl_no'] ?>"><button class="btn btn-xs btn-danger" id="<?php echo $result['o_srl_no']; ?>" onclick="approve(this.id)"><span class="glyphicon glyphicon-trash"></span></button></a></td>  
                                                                            
                                        
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