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
        <!--PAGE CONTENT -->
        <div id="content">      
            <div class="inner" style="min-height: 700px;">
                <div class="row">
                    <div class="col-lg-12">
                        <h1> All Orders </h1>
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
                                            <th width="15%">S/N</th>
                                            <th width="15%">Date</th>
                                            <th width="15%">Order Time</th>
                                            <th width="15%">Phone</th>
                                            <th width="15%">Cutormer Name</th>
                                            <th width="15%">Customer Area</th>
                                            <th width="10%">Sub-Total</th>                    
                                            <th width="15%">Action</th>
                                        </tr>
                                    </thead>

                                   <tbody>
    <!--Pagination--> 
    <?php 
      $query = "select tbl_order.*, tbl_customer_acc.* from tbl_order left join tbl_customer_acc on tbl_customer_acc.cstmr_srl_no=tbl_order.o_cstmr_id where tbl_order.o_status='p' order by tbl_order.o_date desc limit $start_form, $per_page";
      $post = $db ->select($query);
      if($post){
        $i = 0;

        while($result = $post ->fetch_assoc()){
          $i++; 
    ?>
    <!--Pagination-->     
                                    <tr>
                                        <td><?php echo $i; ?></td>
                                        <td><?php echo $result['o_date']; ?></td>
                                        <td><?php echo $result['o_adtime']; ?></td>
                                        <td><?php echo $result['cstmr_phn_no']; ?></td>
                                        <td><?php echo $result['cstmr_name']; ?></td>
                                        <td><?php echo $result['cstmr_prsnt_address']; ?></td>
                                        <td><?php echo $result['o_subtotal']; ?></td> 
                                                                            
                                        <td><a href="order_view.php?view_id=<?php echo $result['o_srl_no']; ?>"><button class="btn btn-xs btn-danger" id="<?php echo $result['o_srl_no']; ?>" onclick="view(this.id)">view</button></a> </td>
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
        <!--END PAGE CONTENT -->

<script>
  function pdelivery(){
    var delivery = 'delivery',
    var dataUrl = 'delivery_function.php',
  }
</script>

<?php include 'inc/a_right_strip.php'; ?>
<?php include 'inc/a_footer.php'; ?>