<?php include 'inc/a_header.php'; ?>
<?php include 'inc/a_menu.php'; ?>
<div id="content">
	 <div class="inner" style="min-height: 700px;">
                <div class="row">
                    <div class="col-lg-12">
                        <h1> Image Gallery </h1>
                    </div>
                </div>
                  <hr />
<div class="panel panel-danger">
                            <div class="panel-heading">
                                <i class="icon-bell"></i> Gallery
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
                $query = "INSERT INTO tbl_gallery(gallery_name, gallery_designation, gallery_phone, gallery_email, gallery_image) VALUES('$gallery_name', '$gallery_designation', '$gallery_phone','$gallery_email', '$uploaded_image')";
                $inserted_rows = $db->insert($query);
                if ($inserted_rows) {
                 $n = "<span class='success'>Gallery Informatin Inserted Successfully.
                 </span>";
                }else {
                 $n = "<span class='error'>Gallery Informatin Not Inserted !</span>";
                }

            }
	}
?>

    <div class="row">
                <form action="" method="post" enctype="multipart/form-data">
    <div class="widget-body">
    <div class="widget-main">
<?php echo $n; ?> <hr>
<div class="col-sm-6">
                <div class="form-group">
                    <label class="col-sm-4 control-label no-padding-right" for="Ccustomer_name">Gallery Name</label>

                    <div class="col-sm-8">
                        <input type="text" name="gallery_name" placeholder="Gallery Name" class="form-control"/>
                      
                    </div>
                </div> 
                <div class="form-group">
                    <label class="col-sm-4 control-label no-padding-right" for="Ccustomer_name">Designations</label>

                    <div class="col-sm-8">
                        <input type="text" name="gallery_designation" placeholder="Designations" class="form-control"/>
                      
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
                        <input type="text" name="gallery_phone" placeholder="Phone no." class="form-control"/>
                      
                    </div>
                </div> 
                <div class="form-group">
                    <label class="col-sm-4 control-label no-padding-right" for="Ccustomer_name">Email</label>

                    <div class="col-sm-8">
                        <input type="text" name="gallery_mail" placeholder="Email Address" class="form-control"/>
                      
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
 <div class="well well-small">
<div class="row">
                        <div class="col-xs-12">

                            <div class="clearfix">
                                <div class="pull-right tableTools-container"></div>
                            </div>
                            <div class="table-header btn-custom" id="slider_id">
                              
                            Gallery List

                            </div>

                            <div id="delete_gallery_ajax">
                                <table id="dynamic-table" class="table table-striped table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th width="10%" style="text-align: center;">Gallery Image</th>
                                            <th width="15%" style="text-align: center;">Name</th>
                                            <th width="15%" style="text-align: center;">Designation</th>
                                            <th width="15%" style="text-align: center;">Phone</th>
                                            <th width="15%" style="text-align: center;">Email</th>
                                            <th width="15%" style="text-align: center;">Action</th>
                                        </tr>
                                    </thead>

                                    <tbody>
    <?php 
        $query = "select * from tbl_gallery";
        $slt = $db->select($query);
        if ($slt) {
            while ($result = $slt->fetch_assoc()) {
                
    ?>
    
                                    <tr style="text-align: center;">
                                        
                                        <td><img style='width: 30px; height: 30px;' src="<?php echo $result['gallery_image']; ?>" alt=""></td>
                                        <td><?php echo $result['gallery_name']; ?></td>
                                        <td><?php echo $result['gallery_designation']; ?></td>
                                        <td><?php echo $result['gallery_phone']; ?></td>
                                        <td><?php echo $result['gallery_email']; ?></td>
                                        
                                        <td>

                                        <a href="editGallery.php?gallery_edit=<?php echo $result['gallery_id']; ?>"><button class="btn btn-xs btn-danger"><span class="glyphicon glyphicon  glyphicon-pencil"></button></a>

                                        <a><button class="btn btn-xs btn-danger" onclick="pdel(del_gallery = '<?php echo $result['gallery_id']; ?>')"><span class="glyphicon glyphicon glyphicon-trash"></button></a>

                                        </td>
                                    </tr>
    <?php } } ?>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
</div>
</div>

<script>
    function pdel(del_Slider){
        var id = del_gallery;
        var dataUrl = 'deleteGallery.php';
        var dataString = "id="+id;

        $.ajax({
          type: "POST",
          url: dataUrl,
          data: dataString,
          success:function(data){
            
           if (data) {
              $("#delete_gallery_ajax").html(data);
            }
            
          }

    });
    }
</script>

<?php include 'inc/a_right_strip.php'; ?>
<?php include 'inc/a_footer.php'; ?>