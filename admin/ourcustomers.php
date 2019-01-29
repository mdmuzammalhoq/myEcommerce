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
                        <h1> Our All Registered Customers </h1>
                    </div>
                </div>
                  <hr />
<div class="panel panel-danger">
                            <div class="panel-heading">
                                <i class="icon-bell"></i> Customer Detail
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
    $per_page = 30;
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
                                            <th width="10%">No.</th>
                                            <th width="10%">Image</th>
                                            <th width="15%">Name</th>
                                            <th width="15%">Phone</th>
                                            <th width="15%">Email </th>
                                            <th width="15%">Address</th>
                                            
                                            <th width="15%">Action</th>
                                        </tr>
                                    </thead>

                                   <tbody>
    <!--Pagination--> 
    <?php 
      $query = "select * from tbl_customer_acc order by cstmr_srl_no desc  limit $start_form, $per_page";
      $post = $db ->select($query);
      if($post){
        
        while($result = $post ->fetch_assoc()){
          
    ?>
    <!--Pagination-->     
                                    <tr>
                                        <td><?php echo $result['cstmr_srl_no']; ?></td>
                                        <td>
                                        <?php

                                          if (file_exists($result['cstmr_img'])) {
                                            echo "No Image";
                                          }else{
                                             echo "<img style='width: 40px; height: 40px;' src='../images/people1.jpg'>";
                                          }
                                        ?>

                                        </td>
                                        <td><?php echo $result['cstmr_name']; ?></td>
                                        <td><?php echo $result['cstmr_phn_no']; ?></td>
                                        <td><?php echo $result['cstmr_mail']; ?></td>
                                        <td><?php echo $result['cstmr_delivery_address']; ?></td>
                                        
                                        <td><button class="btn btn-xs btn-primary"><a style="color: #fff;" href="editcustomers.php?customer_edit_id=<?php echo $result['cstmr_srl_no']; ?>"><span class="glyphicon glyphicon glyphicon glyphicon-pencil"></span></a></button> 
                                        <button class="btn btn-xs btn-danger" id="<?php echo $row['cat_SlNo']; ?>" onclick="pdelete(this.id)"><a style="color: #fff;" href="deletecustomer.php?delete_customer_id=<?php echo $result['cstmr_srl_no']; ?>">
                                          <span class="glyphicon glyphicon glyphicon-trash"></span></a>
                                      </button></td>
                                    </tr>

    <?php } }  ?>

                                    </tbody>
                                </table>
<!--Pagination-->
<div style="text-align: center;">
  <ul class="pagination">
  <?php
  $query = "select * from tbl_customer_acc ";
  $result = $db->select($query);
  $total_rows = mysqli_num_rows($result);
  $total_pages = ceil($total_rows/$per_page);
 

   // echo "<span class='pagination'><li><a href='new_registraion.php?page=1'>".'&laquo;'."</a></li>";
  
  for($i=1; $i <= $total_pages; $i++){
    echo "<li><a href='ourcustomers.php?page=".$i."'>".$i."</a></li>";
  }
   echo "<li><a href='ourcustomers.php?page=$total_pages'>".'&raquo;'."</a></span></li>" 

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


<?php include 'inc/a_right_strip.php'; ?>
<?php include 'inc/a_footer.php'; ?>