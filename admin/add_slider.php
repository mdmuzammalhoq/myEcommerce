<?php include 'inc/a_header.php'; ?>
<?php include 'inc/a_menu.php'; ?>
<div id="content">
	 <div class="inner" style="min-height: 700px;">
                <div class="row">
                    <div class="col-lg-12">
                        <h1> Add Slider </h1>
                    </div>
                </div>
                  <hr />
<div class="panel panel-danger">
                            <div class="panel-heading">
                                <i class="icon-bell"></i> Slider
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
		$slider_name = mysqli_real_escape_string($db->link, $_POST['slider_name']);

		$permited  = array('jpg', 'jpeg', 'png', 'gif');
            $file_name = $_FILES['slider_image']['name'];
            $file_size = $_FILES['slider_image']['size'];
            $file_temp = $_FILES['slider_image']['tmp_name'];

            $div = explode('.', $file_name);
            $file_ext = strtolower(end($div));
            $unique_image = substr(md5(time()), 0, 10).'.'.$file_ext;
            $uploaded_image = "img/Slider/".$unique_image;

            if($slider_name == "" || $file_name == "" ){
                echo "<span class='error'>Field Must Not be empty !</span>";
            }elseif ($file_size >1048567) {
                 echo "<span class='error'>Image Size should be less then 1MB!
                 </span>";
                } elseif (in_array($file_ext, $permited) === false) {
                 echo "<span class='error'>You can upload only:-".implode(', ', $permited)."</span>";
                } else{
                move_uploaded_file($file_temp, $uploaded_image);
                $query = "INSERT INTO tbl_slider(slider_name, slider_image) VALUES('$slider_name', '$uploaded_image')";
                $inserted_rows = $db->insert($query);
                if ($inserted_rows) {
                 $n = "<span class='success'>Slider Inserted Successfully.
                 </span>";
                }else {
                 $n = "<span class='error'>Slider Not Inserted !</span>";
                }

            }
	}
?>

    <div class="row">
                <form action="" method="post" enctype="multipart/form-data">
    <div class="widget-body">
    <div class="widget-main">
<?php echo $n; ?> <hr>
        <div class="row">
       
            <div class="col-sm-5">
                <div class="form-group">
                    <label class="col-sm-5">Slider Name</label>

                    <div class="col-sm-6">
                        <input type="text" style="height: 27px;border-radius: 0;" name="slider_name" placeholder="Slider Name" class="form-control"/>
                      
                    </div>
                </div>
                </div>
                
                <div class="col-sm-3">
                <div class="form-group">
                    <label class="col-sm-3">Image</label>

                    <div class="col-sm-6">
                        <input type="file" name="slider_image" />
                      
                    </div>
                </div>
                </div>
                <div class="col-sm-4">
                <div class="form-group">
                    <label class="col-sm-4 control-label no-padding-right" for="Ccustomer_name"></label>

                    <div class="col-sm-8">
                        <input type="submit" value="Submit" "/>
                      
                    </div>
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
                              
                            Slider List

                            </div>

                            <div id="delete_slider_ajax">
                                <table id="dynamic-table" class="table table-striped table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th width="10%" style="text-align: center;">Slider Image</th>
                                            <th width="15%" style="text-align: center;">Slider Name</th>
                                            <th width="15%" style="text-align: center;">Action</th>
                                        </tr>
                                    </thead>

                                    <tbody>
    <?php 
        $query = "select * from tbl_slider";
        $slt = $db->select($query);
        if ($slt) {
            while ($result = $slt->fetch_assoc()) {
                
    ?>
    
                                    <tr style="text-align: center;">
                                        
                                        <td><img style='width: 30px; height: 30px;' src="<?php echo $result['slider_image']; ?>" alt=""></td>
                                        <td><?php echo $result['slider_name']; ?></td>
                                        
                                        <td><a><button class="btn btn-xs btn-danger" onclick="pdelet(del_Slider = '<?php echo $result['slider_id']; ?>')"><span class="glyphicon glyphicon glyphicon-trash"></button></a></td>
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
    function pdelet(del_Slider){
        var id = del_Slider;
        var dataUrl = 'delSlider.php';
        var dataString = "id="+id;

        $.ajax({
          type: "POST",
          url: dataUrl,
          data: dataString,
          success:function(data){
            
            if (data) {
              $("#delete_slider_ajax").html(data);
            }
            
          }

    });
    }
</script>

<?php include 'inc/a_right_strip.php'; ?>
<?php include 'inc/a_footer.php'; ?>