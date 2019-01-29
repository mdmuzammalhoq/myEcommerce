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
            $filetype = $_FILES["p_image"]["type"];

            $div = explode('.', $file_name);
            $file_ext = strtolower(end($div));
            $unique_image = substr(sha1(time()), 0, 10).'.'.$file_ext;
            $fileName =$unique_image;
            $filepath = "img/".$unique_image;
            $bigimage = "img/images/".$unique_image;
            $filepath_thumb = "img/thumb/".$unique_image;

            if ($file_name!='') {
                $fileinfo = getimagesize($_FILES["p_image"]["tmp_name"]); 
                $filewidth = $fileinfo[0];
                $fileheight = $fileinfo[1];     
            }

            // image two
            $permited  = array('jpg', 'jpeg', 'png', 'gif');
            $file_name2 = $_FILES['p_image_2']['name'];
            $file_size = $_FILES['p_image_2']['size'];
            $file_temp = $_FILES['p_image_2']['tmp_name'];
            $filetype = $_FILES["p_image_2"]["type"];

            $div = explode('.', $file_name);
            $file_ext = strtolower(end($div));
            $unique_image = substr(sha1(time()), 0, 10).'.'.$file_ext;
            $fileName2 = $unique_image;
            $filepath2 = "img/".$unique_image;
            $bigimage = "img/images2/".$unique_image;
            $filepath_thumb = "img/thumb2/".$unique_image;

            if ($file_name!='') {
                $fileinfo = getimagesize($_FILES["p_image_2"]["tmp_name"]); 
                $filewidth = $fileinfo[0];
                $fileheight = $fileinfo[1];     
            }

        if ($file_name = "" || $file_name2 = ""){
                $n = "<span style='color:red; font-size:16px; font-weight:bold;' >Field must not be empty !</span> <hr>" ;
            }elseif ($file_size >1048567) { //image One
                 echo "<span class='error'>Image Size should be less then 1MB!
                 </span>";
                }elseif (in_array($file_ext, $permited) === false) {
                 echo "<span class='error'>You can upload only:-".implode(', ', $permited)."</span>";
                }else{
                    move_uploaded_file($file_temp, $filepath);
                    move_uploaded_file($file_temp, $filepath2);
                    
                     if($filetype == "image/jpeg")
                        {
                          $imagecreate = "imagecreatefromjpeg";
                          $imageformat = "imagejpeg";
                        }
                        if($filetype == "image/png")
                        {                        
                          $imagecreate = "imagecreatefrompng";
                          $imageformat = "imagepng";
                        }
                        if($filetype == "image/gif")
                        {                        
                          $imagecreate= "imagecreatefromgif";
                          $imageformat = "imagegif";
                        }
                        $new_width = "200";
                        $new_height = "200";
                        $p_width = "600";
                        $p_height = "600"; 

                        $image_p = imagecreatetruecolor($new_width, $new_height);
                        $image_b = imagecreatetruecolor($p_width, $p_height);
                        $image = $imagecreate($filepath); //photo folder

                        imagecopyresampled($image_p, $image, 0, 0, 0, 0, $new_width, $new_height, $filewidth, $fileheight);                     
                        $imageformat($image_p, $filepath_thumb);//thumb folder

                        imagecopyresampled($image_b, $image, 0, 0, 0, 0, $p_width, $p_height, $filewidth, $fileheight);                     
                        $imageformat($image_b, $bigimage);//bigimage folder

                        if($filetype == "image/jpeg") // Image two
                        {
                          $imagecreate = "imagecreatefromjpeg";
                          $imageformat = "imagejpeg";
                        }
                        if($filetype == "image/png")
                        {                        
                          $imagecreate = "imagecreatefrompng";
                          $imageformat = "imagepng";
                        }
                        if($filetype == "image/gif")
                        {                        
                          $imagecreate= "imagecreatefromgif";
                          $imageformat = "imagegif";
                        }
                        $new_width = "200";
                        $new_height = "200";
                        $p_width = "600";
                        $p_height = "600"; 

                        $image_p = imagecreatetruecolor($new_width, $new_height);
                        $image_b = imagecreatetruecolor($p_width, $p_height);
                        $image = $imagecreate($filepath); //photo folder

                        imagecopyresampled($image_p, $image, 0, 0, 0, 0, $new_width, $new_height, $filewidth, $fileheight);                     
                        $imageformat($image_p, $filepath_thumb);//thumb folder

                        imagecopyresampled($image_b, $image, 0, 0, 0, 0, $p_width, $p_height, $filewidth, $fileheight);                     
                        $imageformat($image_b, $bigimage);//bigimage folder
                   

            $query = "INSERT INTO tbl_product (p_id, p_name, p_brnd_name, p_ctgy_name, p_price, p_offer_price, p_is_offer, p_status, p_saved_by_id, p_svd_time, p_image, p_image_2) VALUES('$p_id', '$p_name', '$p_brnd_name', '$p_ctgy_name', '$p_price', '$p_offer_price', '$p_is_offer', '$p_status', '$p_saved_by_id', '$p_svd_time', '$fileName', '$fileName2')";
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
                        <h1> Product Detail Page  </h1>
                    </div>
                </div>
                  <hr />
    
                 



<div class="panel panel-danger">
                            <div class="panel-heading">
                                <i class="icon-bell"></i> Product Detail
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
            <div class="col-sm-6">
                <div class="form-group">
                    <label class="col-sm-4 control-label no-padding-right" for="Ccustomer_name">Product ID</label>

                    <div class="col-sm-8">
                        <input type="text" name="p_id" id="customer_name" placeholder="Product ID" class="form-control"/>
                      
                    </div>
                </div>
               
                <div class="form-group">
                    <label class="col-sm-4 control-label no-padding-right" for="Ccustomer_name">Product Name</label>

                    <div class="col-sm-8">
                        <input type="text" name="p_name" id="customer_name" placeholder="Product Name" class="form-control"/>
                      
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-4 control-label no-padding-right" for="contact_persion">Brand Name</label>

                    <div class="col-sm-8">
                        <input type="text" name="p_brnd_name" id="contact_persion" placeholder="Brand Name" class="form-control" />
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-4 control-label no-padding-right" for="address">Category Name</label>

                    <div class="col-sm-7">
                        <select style="height: 28px;margin-bottom: 1px;width: 241px;border-radius: 0;" name="p_ctgy_name" id="product_id" data-placeholder="Select Product" class="form-control js-example-placeholder-single"> 
                        <option>Select Category</option>
<?php 
    $query = "select * from tbl_category";
    $combo = $db->select($query);
    if ($combo) {
        while ($resul = $combo->fetch_assoc()) {

?>
                        <option value="<?php echo $resul['cat_name']; ?>"><?php echo $resul['cat_name']; ?></option>
<?php } } ?>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-4 control-label no-padding-right" for="phone">Price</label>

                    <div class="col-sm-8">
                        <input type="text" name="p_price" id="phone" placeholder="Price" class="form-control"  />
                    </div>
                </div>
               <div class="form-group">
                    <label class="col-sm-4 control-label no-padding-right" for="address">Offer Price</label>

                    <div class="col-sm-8">

                        <input id="address" name="p_offer_price" placeholder="Offer Price" class="form-control " />
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-4 control-label no-padding-right" for="phone">Is Offer </label>

                    <div class="col-sm-7">
                        <select style="height: 28px;margin-bottom: 1px;width: 241px;border-radius: 0;" name="p_is_offer" id="product_id" data-placeholder="Select Product" class="form-control js-example-placeholder-single"> 
                        
<?php 
    $query = "select * from tbl_is_offer";
    $combo = $db->select($query);
    if ($combo) {
        while ($resul = $combo->fetch_assoc()) {

?>
                        <option value="<?php echo $resul['is_offer_name']; ?>"><?php echo $resul['is_offer_name']; ?></option>
<?php } } ?>
                        </select>
                    </div>
                </div>
               
               
            </div>
            <div class="col-sm-6">
               
                 
                
               
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
                    <label class="col-sm-4 control-label no-padding-right" for="phone">Related Image</label>

                    <div class="col-sm-8">
                        <input type="file" name="p_image_3">
                        
                    </div>
                </div>
                 <div class="form-group">
                    <label class="col-sm-4 control-label no-padding-right" for="phone">Related Image</label>

                    <div class="col-sm-8">
                        <input type="file" name="p_image_4">
                        
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-4 control-label no-padding-right" for="phone">Related Image</label>

                    <div class="col-sm-8">
                        <input type="file" name="p_image_5">
                        
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-4 control-label no-padding-right" for="phone">Related Image</label>

                    <div class="col-sm-8">
                        <input type="file" name="p_image_6">
                        
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