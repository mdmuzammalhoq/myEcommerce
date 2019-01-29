<?php include 'inc/a_header.php'; ?>
<?php include 'inc/a_menu.php'; ?>


<div id="content">
<div class="inner" style="min-height: 700px;">
<div class="row">
                    <div class="col-lg-12">
                        <h1> Information From Clients </h1>
                    </div>
                </div>
                  <hr />


<div class="container">
	<div class="row">
		<div class="box-body no-padding">
        <div class="mailbox-controls">
          <!-- Check all button -->
          <button class="btn btn-default btn-sm checkbox-toggle"><i class="glyphicon glyphicon glyphicon-ok"></i></button>
          <div class="btn-group">
            <button class="btn btn-default btn-sm"><a href="viewReg.php?editId=<?php echo $result['member_id']; ?>"><i class="glyphicon glyphicon glyphicon-pencil" ></i></a></button>
            <button class="btn btn-default btn-sm"><i class="glyphicon glyphicon-arrow-left"></i></button>
            <button class="btn btn-default btn-sm"><i class="glyphicon glyphicon-share-alt"></i></button>
          </div><!-- /.btn-group -->
          <button class="btn btn-default btn-sm"><i class="glyphicon glyphicon-refresh"></i></button>
          <div class="pull-right">
            1-50/200
            <div class="btn-group">
              <a href="#"><button class="btn btn-default btn-sm"><i class="glyphicon glyphicon-arrow-left"></i></button></a>
              <a href="#"><button class="btn btn-default btn-sm"><i class="glyphicon glyphicon-arrow-right"></i></button></a>
            </div><!-- /.btn-group -->
          </div><!-- /.pull-right -->
        </div>
        <hr>
        <div class="table-responsive mailbox-messages">
                    
<!--Pagination-->
  <?php 
    $per_page = 15;
  if(isset($_GET['page'])){
    $page = $_GET['page'];
  }else{
    $page= 1;
  }
  $start_form = ($page-1) * $per_page;

  ?>
<!--Pagination-->
    <table class="table table-hover table-striped">
    <tbody>
    <?php 
      $query = "select * from tbl_login_reg order by member_id desc  limit $start_form, $per_page";
      $post = $db ->select($query);
      if($post){
        while($result = $post ->fetch_assoc()){
    ?>  
        <tr>
          <td><input type="checkbox"></td>
          <td class="mailbox-star"><a href="#"><i class="fa fa-star text-yellow"></i></a></td>
          <td class="mailbox-name"><?php echo $result['member_id']; ?></td>
          <td class="mailbox-subject"><a href="viewReg.php?editId=<?php echo $result['member_id']; ?>"><b><?php echo $result['member_name']; ?></b></a> - <?php echo $result['member_email']; ?> - <?php echo $result['member_phone']; ?> - <?php echo $result['member_username']; ?></td>
          <td class="mailbox-attachment"></td>
          <td class="mailbox-date"><?php echo $result['member_reg_time']; ?></td>
        </tr>
<?php } ?><!--End While Loop-->
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
    echo "<li><a href='new_registraion.php?page=".$i."'>".$i."</a></li>";
  }
   echo "<li><a href='new_registraion.php?page=$total_pages'>".'&raquo;'."</a></span></li>" ?>
</ul>
</div>
<!--Pagination-->
<?php } ?>
      </div><!-- /.mail-box-messages -->
    </div><!-- /.box-body -->
    <hr>  
  </div><!-- /. box -->
</div>
</div>
</div>
<?php include 'inc/a_right_strip.php'; ?>
<?php include 'inc/a_footer.php'; ?>