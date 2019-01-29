<?php include 'inc/a_header.php'; ?>
<?php include 'inc/a_menu.php'; ?>
<div id="content">
     <div class="inner" style="min-height: 700px;">
                <div class="row">
                    <div class="col-lg-12">
                        <h1> Gallery Update</h1>
                    </div>
                </div>
                  <hr />
<div class="panel panel-danger">
                            <div class="panel-heading">
                                <i class="icon-bell"></i> Gallery Update
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
    $n = "";
    $gallery_id = $_GET['gallery_edit'];
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $gallery_name = mysqli_real_escape_string($db->link, $_POST['gallery_name']);
        $gallery_designation = mysqli_real_escape_string($db->link, $_POST['gallery_designation']);
        $gallery_phone = mysqli_real_escape_string($db->link, $_POST['gallery_phone']);
        $gallery_email = mysqli_real_escape_string($db->link, $_POST['gallery_mail']);

        $permited  = array('jpg', 'jpeg', 'png', 'gif');
            $file_name = $_FILES['gallery_image']['name'];
            $file_size = $_FILES['gallery_image']['size'];
            $file_temp = $_FILES['gallery_image']['tmp_name'];

            $div = explode('.', $file_name);
            $file_ext = strtolower(end($div));
            $unique_image = substr(md5(time()), 0, 10).'.'.$file_ext;
            $uploaded_image = "img/Gallery/".$unique_image;

            if($gallery_name == "" || $file_name == "" ){
                echo "<span class='error'>Field Must Not be empty !</span>";
            }elseif ($file_size >1048567) {
                 echo "<span class='error'>Image Size should be less then 1MB!
                 </span>";
                } elseif (in_array($file_ext, $permited) === false) {
                 echo "<span class='error'>You can upload only:-".implode(', ', $permited)."</span>";
                } else{
                move_uploaded_file($file_temp, $uploaded_image);
                $query = "UPDATE tbl_gallery 
                    SET
                    gallery_name = '$gallery_name', 
                    gallery_designation = '$gallery_designation',
                    gallery_phone = '$gallery_phone', 
                    gallery_email = '$gallery_email', 
                    gallery_image = '$uploaded_image'
                    WHERE 
                    gallery_id = '$gallery_id'

                    ";
                $update_rows = $db->update($query);
                if ($update_rows) {
                 $n = "<span class='success'>Gallery Informatin Updated Successfully.
                 </span>";
                }else {
                 $n = "<span class='error'>Gallery Informatin Not Updated !</span>";
                }

            }
    }
?>

    <div class="row">
                <form action="" method="post" enctype="multipart/form-data">
    <div class="widget-body">
    <div class="widget-main">
<div style="text-align: center;"><?php echo $n; ?> <hr></div>
<div class="col-sm-6">
<?php 
    $query = "select * from tbl_gallery where gallery_id = '$gallery_id'";
    $gallery_edit = $db->select($query);
    if ($gallery_edit) {
        $result = $gallery_edit->fetch_assoc();
?>
                <div class="form-group">
                    <label class="col-sm-4 control-label no-padding-right" for="Ccustomer_name">Gallery Name</label>

                    <div class="col-sm-8">
                        <input type="text" name="gallery_name" value="<?php echo $result['gallery_name']; ?>" class="form-control"/>
                      
                    </div>
                </div> 
                <div class="form-group">
                    <label class="col-sm-4 control-label no-padding-right" for="Ccustomer_name">Designations</label>

                    <div class="col-sm-8">
                        <input type="text" name="gallery_designation" value="<?php echo $result['gallery_designation']; ?>" class="form-control"/>
                      
                    </div>
                </div>
                <div class="form-group" style="">
                    <label class="col-sm-4 control-label no-padding-right" for="Ccustomer_name">Image</label>

                    <div class="col-sm-8">
                        <input class="image_text" type="file" name="gallery_image"/>
                      
                    </div>
                </div>
        </div>
<div class="col-sm-6">
                <div class="form-group">
                    <label class="col-sm-4 control-label no-padding-right" for="Ccustomer_name">Phone</label>

                    <div class="col-sm-8">
                        <input type="text" name="gallery_phone" value="<?php echo $result['gallery_phone']; ?>" class="form-control"/>
                      
                    </div>
                </div> 
                <div class="form-group">
                    <label class="col-sm-4 control-label no-padding-right" for="Ccustomer_name">Email</label>

                    <div class="col-sm-8">
                        <input type="text" name="gallery_mail" value="<?php echo $result['gallery_email']; ?>" class="form-control"/>
                      
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-4">
                      
                    </div>
                    <div class="col-sm-8">
                        <input type="submit" value="submit" />
                      
                    </div>
                </div>
        </div>
<?php } ?>        
    </div>
</div>
</form>
</div> <br><br>
           
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