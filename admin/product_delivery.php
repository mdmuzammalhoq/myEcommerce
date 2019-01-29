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
    	$delivery_id = $_GET['delivery_id'];
    ?>
<div id="content">      
            <div class="inner" style="min-height: 700px;">
                <div class="row">
                    <div class="col-lg-12">
                        <h1> Product Delivery </h1>
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
<!--Pagination-->
  <?php 
    $per_page = 10;
  if(isset($_GET['page'])){
    $page = $_GET['page'];
  }else{
    $page= 1;
  }
  $start_form = ($page-1) * $per_page;

  ?>
<!--Pagination-->
                                <table id="dynamic-table" class="table table-striped table-bordered table-hover">
                                    <thead>
                                        <tr>
                                           
                                            <th width="15%">Date</th>
                                            <th width="15%">VAT</th>
                                            <th width="15%">Total Amount</th>
                                            <th width="10%">Sub-Total</th> 
                                            <th width="10%">Status</th>
                                            <th width="15%">Action</th>
                                        </tr>
                                    </thead>

                                   <tbody>
    <!--Pagination--> 
    <?php 
      $query = "select * from tbl_order where o_srl_no='$delivery_id' ";
      $post = $db ->select($query);
      if($post){
        
        while($result = $post ->fetch_assoc()){
          
    ?>
    <!--Pagination-->     
                                    <tr>
                                       
                                        <td><?php echo $result['o_date']; ?></td>
                                        <td><?php echo $result['o_vat']; ?></td>
                                        <td><?php echo $result['o_total_amount']; ?></td>
                                        <td><?php echo $result['o_subtotal']; ?></td> 
                                        <td><?php echo $result['o_status']; ?></td>  
                                                                            
                                        <td><a href="order_archive.php?approve_id=<?php echo $result['o_srl_no']; ?>"><button class="btn btn-xs btn-danger" id="<?php echo $result['o_srl_no']; ?>" onclick="approve(this.id)">Approve</button></a> || <a href="product_delivery.php"><button class="btn btn-xs btn-danger" id="<?php echo $result['o_srl_no']; ?>" onclick="pdelivery(this.id)">Cancel</button></a></td>
                                    </tr>

    <?php } }  ?>

                                    </tbody>
                                </table>
<!--Pagination-->
<div style="text-align: center;">
  <ul class="pagination">
  <?php
  $query = "select * from tbl_login_reg ";
  $result = $db->select($query);
  $total_rows = mysqli_num_rows($result);
  $total_pages = ceil($total_rows/$per_page);
 

   // echo "<span class='pagination'><li><a href='new_registraion.php?page=1'>".'&laquo;'."</a></li>";
  
  for($i=1; $i <= $total_pages; $i++){
    echo "<li><a href='all_orders.php?page=".$i."'>".$i."</a></li>";
  }
   echo "<li><a href='all_orders.php?page=$total_pages'>".'&raquo;'."</a></span></li>" 

   ?>
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

<script>
  function approve(id){
    
  }
</script>

<?php include 'inc/a_right_strip.php'; ?>
<?php include 'inc/a_footer.php'; ?>