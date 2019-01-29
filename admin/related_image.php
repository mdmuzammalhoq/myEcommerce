<?php include 'inc/a_header.php'; error_reporting(0); ?>
<?php include 'inc/a_menu.php'; ?>
<link rel="stylesheet" href="assets/css/code.css">
<?php 
        $n = "";
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        
            // image One
            $permited  = array('jpg', 'jpeg', 'png', 'gif');
            $file_name = $_FILES['p_image']['name'];
            $file_size = $_FILES['p_image']['size'];
            $file_temp = $_FILES['p_image']['tmp_name'];

            $div = explode('.', $file_name);
            $file_ext = strtolower(end($div));
            $unique_image = substr(sha1(time()), 0, 10).'.'.$file_ext;
            $uploaded_image = "img/".$unique_image;


            // image Two
            $prmtd  = array('jpg', 'jpeg', 'png', 'gif');
            $f_name2 = $_FILES['p_image_2']['name'];
            $f_size = $_FILES['p_image_2']['size'];
            $f_temp = $_FILES['p_image_2']['tmp_name'];

            $div = explode('.', $f_name2);
            $fil_ext = strtolower(end($div));
            $uni_image = substr(md5(time()), 0, 10).'.'.$fil_ext;
            $upld_image = "img/".$uni_image;

        if ($f_name2 == "" || $file_name = ""){
                $n = "<span style='color:red; font-size:16px; font-weight:bold;' >Field must not be empty !</span> <hr>" ;
            }elseif ($file_size >1048567) { //image One
                 echo "<span class='error'>Image Size should be less then 1MB!
                 </span>";
                }elseif (in_array($fil_ext, $prmtd) === false) {
                 echo "<span class='error'>You can upload only:-".implode(', ', $prmtd)."</span>";
                }elseif ($f_size >1048567) { //image Two
                 echo "<span class='error'>Image Size should be less then 1MB!
                 </span>";
                }elseif (in_array($file_ext, $permited) === false) {
                 echo "<span class='error'>You can upload only:-".implode(', ', $permited)."</span>";
                }else{
                    move_uploaded_file($f_temp, $upld_image);
                    move_uploaded_file($file_temp, $uploaded_image);
                    

            $query = "INSERT INTO tbl_related_images (rltd_image_thumb, rltd_image_img) VALUES('$uploaded_image', '$upld_image' )";
            $product = $db->insert($query);
            if ($product) {
            $n = "<span style='color:Green; font-size:16px; font-weight:bold;' >Data Inserted Successfully.</span> <hr>" ;
        }

         }
    
}
?>
        <!--PAGE CONTENT -->
        <div id="content">      
            <div class="inner" style="min-height: 700px;">
                <div class="row">
                    <div class="col-lg-12">
                        <h1> Related Products Upload  </h1>
                    </div>
                </div>
                  <hr />
	
                 



<div class="panel panel-danger">
                            <div class="panel-heading">
                                <i class="icon-bell"></i> Related Products Upload
                            </div>

                            <div class="container">
    <br>
    <div class="col-lg-12 well">
    <div class="row">
                <form action="" method="post" enctype="multipart/form-data">
    <div class="widget-body">
    <div class="widget-main">

        <div class="row">
       <div style="text-align: center; font-weight: normal;"> <?php echo $n; ?> </div>
            
            <div class="col-sm-12">
               
                 
                
               
                <div class="form-group">
                    <label class="col-sm-4 control-label no-padding-right" for="phone">Product Image</label>

                    <div class="col-sm-8">
                        <input type="file" name="p_image">
                        
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-4 control-label no-padding-right" for="phone">Thumbnail</label>

                    <div class="col-sm-8">
                        <input type="file" name="p_image_2">
                        
                    </div>
                </div>
              
                
                <div class="form-group">
                    <div class="col-sm-3 col-sm-offset-9">
                        <button style="float: right;padding: 3px 34px;font-size: 20px; margin-top: 5px;" type="submit" class="btn btn-info">Save</button>

                    </div>
                </div>
            </div>
        </div>


    </div>
    </div>

    
                        
    
    </form>  
                </div>
    </div>
   <style>
        th{
            text-align: center;
        }
        td{
            text-align: center;
        }
    </style>
            <div class="well well-small">
<div class="row">
                        <div class="col-xs-12">

                            <div class="clearfix">
                                <div class="pull-right tableTools-container"></div>
                            </div>
                            <div class="table-header btn-custom" id="mv">
                              
                            last uploaded 

                            </div>

                            <div id="after_create">
                                <table id="dynamic-table" class="table table-striped table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th width="10%">Product Name</th>
                                            <th width="15%">Brand Name</th>
                                            <th width="15%">Price </th>
                                            <th width="15%">Is Offer</th>
                                            <th width="15%">Image</th>
                                            <th width="15%">Action</th>
                                        </tr>
                                    </thead>

                                    <tbody>
    <?php 
        $query = "select * from tbl_product order by p_srl_no desc limit 10";
        $slt = $db->select($query);
        if ($slt) {
            while ($result = $slt->fetch_assoc()) {
                
    ?>
    
                                    <tr>
                                        <td><?php echo $result['p_name']; ?></td>
                                        <td><?php echo $result['p_brnd_name']; ?></td>
                                        <td><?php echo $result['p_price']; ?></td>
                                        <td><?php echo $result['p_is_offer']; ?></td>
                                        <td><img style='width: 50px; height: 50px;' src="<?php echo $result['p_image']; ?>" alt=""></td>
                                        <td><a href="edit.php?edit_id=<?php echo $result['p_srl_no']; ?>">Edit</a> || <button class="btn btn-xs btn-danger" id="<?php echo $row['cat_SlNo']; ?>" onclick="pdelete(this.id)">Delete</button></td>
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
    </div>

 </div> 
        <!--END PAGE CONTENT -->
<script>
    function pdelete(id){
        var x = confirm("Confirm To Delete ?");
        var id=id;
        if (x) {
            $.ajax({
                type:'POST',
                data:{id:id},
                url:'delete.php',
                
                success:function(result){
                    alert(result);
                    // if (result) {
                    //     $("#ajaxshowdata").html(result);
                    // }else{
                    //     alert("Unsuccess");
                    // }
            }
        });
    }
</script>
<?php include 'inc/a_right_strip.php'; ?>
<?php include 'inc/a_footer.php'; ?>