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
<?php 

   $edit_customer = $_GET['customer_edit_id'];
   $n = "";

  if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $customername = mysqli_real_escape_string($db->link, $_POST['customer_name']);
    $customerphone = mysqli_real_escape_string($db->link, $_POST['customer_phone_no']);
    $customerAddress= mysqli_real_escape_string($db->link, $_POST['customer_address']);
    
    if ($customername == "" ) {
      $n = "<span style='color:red; font-size:16px; font-weight:bold;' >Field must not be empty !</span> <hr>" ;
    }else{
      $query = "UPDATE tbl_customer_acc
        SET 
        cstmr_name = '$customername',
        cstmr_phn_no = '$customerphone', 
        cstmr_delivery_address = '$customerAddress'

        WHERE 

        cstmr_srl_no = '$edit_customer'
      ";
      $editcustomer = $db->update($query);
      if ($editcustomer) {
        $n = "<span style='color:Green; font-size:16px; font-weight:bold;' >Data Updated Successfully.</span> <hr>" ;
      }
    }

  }
?>

    <div class="row">
    <form action="" method="POST" enctype="multipart/form-data">
      <div class="col-sm-6">
<?php 
    $query = "select * from tbl_customer_acc where cstmr_srl_no='$edit_customer' ";
    $Customer_edit = $db->select($query);
    if ($Customer_edit) {
        $result = $Customer_edit->fetch_assoc();
    
?>
    <?php echo $n; ?>            
    <div class="form-group">
                    <label class="col-sm-4 control-label no-padding-right" for="customer_name">Name</label>

                    <div class="col-sm-8">
                        <input type="text" name="customer_name" id="customer_name" value="<?php echo $result['cstmr_name']; ?>" class="form-control"/>
                      
                    </div>
                </div>
               
                <div class="form-group">
                    <label class="col-sm-4 control-label no-padding-right" for="Ccustomer_name">Phone : </label>

                    <div class="col-sm-8">
                        <input type="text" name="customer_phone_no" id="customer_name" value="<?php echo $result['cstmr_phn_no']; ?>" class="form-control"/>
                      
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-4 control-label no-padding-right" for="contact_persion">Address:  </label>

                    <div class="col-sm-8">
                        <input type="text" name="customer_address" id="contact_person" value="<?php echo $result['cstmr_delivery_address']; ?>" class="form-control" />
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-3 col-sm-offset-9">
                        <button style="float: right;padding: 3px 34px;font-size: 20px; margin-top: 5px;" type="submit" class="btn btn-info">Update</button>

                    </div>
                </div>
                
<?php } ?>
            </div>
            </form>
    </div>
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