<?php include 'inc/a_header.php'; error_reporting(0); ?>
<?php include 'inc/a_menu.php'; ?>
<link rel="stylesheet" href="assets/css/code.css">
<?php 
    if(!isset($_GET['edit_id']) || $_GET['edit_id'] == NULL){
        
    }else{
        $id = $_GET['edit_id'];
    }
?>
<?php 

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $p_id = mysqli_real_escape_string($db->link, $_POST['p_id']);
        $p_name = mysqli_real_escape_string($db->link, $_POST['p_name']);
        $p_brnd_name = mysqli_real_escape_string($db->link, $_POST['p_brnd_name']);
        $p_ctgy_name = mysqli_real_escape_string($db->link, $_POST['p_ctgy_name']);
        $p_details = mysqli_real_escape_string($db->link, $_POST['p_details']);
        $p_price = mysqli_real_escape_string($db->link, $_POST['p_price']);
        $p_offer_price = mysqli_real_escape_string($db->link, $_POST['p_offer_price']);
        $p_is_offer = mysqli_real_escape_string($db->link, $_POST['p_is_offer']);     
          
          // image One
        $permited  = array('jpg', 'jpeg', 'png', 'gif');
            $file_name = $_FILES['p_image']['name'];
            $file_size = $_FILES['p_image']['size'];
            $file_temp = $_FILES['p_image']['tmp_name'];
            $filetype = $_FILES["p_image"]["type"];

            $div = explode('.', $file_name);
            $file_ext = strtolower(end($div));
            $unique_image = substr(time(), 0, 10).'.'.$file_ext;
            $fileName = $unique_image;
            $filepath = "img/".$unique_image;
            $bigimage = "img/images/".$unique_image;
            $filepath_thumb = "img/thumb/".$unique_image;

            if ($file_name!='') {
                $fileinfo = getimagesize($_FILES["p_image"]["tmp_name"]); 
                $filewidth = $fileinfo[0];
                $fileheight = $fileinfo[1];     
            }

            // image two
            $permited2  = array('jpg', 'jpeg', 'png', 'gif');
            $file_name2 = $_FILES['p_image_2']['name'];
            $file_size2 = $_FILES['p_image_2']['size'];
            $file_temp2 = $_FILES['p_image_2']['tmp_name'];
            $filetype2 = $_FILES["p_image_2"]["type"];

            $div2 = explode('.', $file_name2);
            $file_ext2 = strtolower(end($div2));
            $unique_image2 = substr(sha1(time()), 0, 10).'.'.$file_ext2;
            $fileName2 = $unique_image2;
            $filepath2 = "img/".$unique_image2;
            $bigimage2 = "img/images2/".$unique_image2;
            $filepath_thumb2 = "img/thumb2/".$unique_image2;

            if ($file_name2!='') {
                $fileinfo2 = getimagesize($_FILES["p_image_2"]["tmp_name"]); 
                $filewidth2 = $fileinfo2[0];
                $fileheight2 = $fileinfo2[1];     
            }

            // image Three
            $permited3  = array('jpg', 'jpeg', 'png', 'gif');
            $file_name3 = $_FILES['p_image_3']['name'];
            $file_size3 = $_FILES['p_image_3']['size'];
            $file_temp3 = $_FILES['p_image_3']['tmp_name'];
            $filetype3 = $_FILES["p_image_3"]["type"];

            $div3 = explode('.', $file_name3);
            $file_ext3 = strtolower(end($div3));
            $unique_image3 = substr(md5(time()), 0, 10).'.'.$file_ext3;
            $fileName3 = $unique_image3;
            $filepath3 = "img/".$unique_image3;
            $bigimage3 = "img/images3/".$unique_image3;
            $filepath_thumb3 = "img/thumb3/".$unique_image3;

            if ($file_name3!='') {
                $fileinfo3 = getimagesize($_FILES["p_image_3"]["tmp_name"]); 
                $filewidth3 = $fileinfo3[0];
                $fileheight3 = $fileinfo3[1];     
            }

            // image Four
            $permited4  = array('jpg', 'jpeg', 'png', 'gif');
            $file_name4 = $_FILES['p_image_4']['name'];
            $file_size4 = $_FILES['p_image_4']['size'];
            $file_temp4 = $_FILES['p_image_4']['tmp_name'];
            $filetype4 = $_FILES["p_image_4"]["type"];

            $div4 = explode('.', $file_name4);
            $file_ext4 = strtolower(end($div4));
            $unique_image4 = substr(md5(sha1(time())), 0, 10).'.'.$file_ext4;
            $fileName4 = $unique_image4;
            $filepath4 = "img/".$unique_image4;
            $bigimage4 = "img/images4/".$unique_image4;
            $filepath_thumb4 = "img/thumb4/".$unique_image4;

            if ($file_name4!='') {
                $fileinfo4 = getimagesize($_FILES["p_image_4"]["tmp_name"]); 
                $filewidth4 = $fileinfo4[0];
                $fileheight4 = $fileinfo4[1];     
            }

        if ($p_ctgy_name == ""){
                $n = "<span style='color:red; font-size:16px; font-weight:bold;' >Field must not be empty !</span> <hr>" ;
            }else{ 
                 move_uploaded_file($file_temp, $filepath); 
                 move_uploaded_file($file_temp2, $filepath2); 
                 move_uploaded_file($file_temp3, $filepath3);
                 move_uploaded_file($file_temp4, $filepath4);

                 if($filetype == "image/jpeg") //Image One
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

                        if($filetype2 == "image/jpeg") // Image two
                        {
                          $imagecreate2 = "imagecreatefromjpeg";
                          $imageformat2 = "imagejpeg";
                        }
                        if($filetype2 == "image/png")
                        {                        
                          $imagecreate2 = "imagecreatefrompng";
                          $imageformat2 = "imagepng";
                        }
                        if($filetype2 == "image/gif")
                        {                        
                          $imagecreate2 = "imagecreatefromgif";
                          $imageformat2 = "imagegif";
                        }
                        $new_width2 = "200";
                        $new_height2 = "200";
                        $p_width2 = "600";
                        $p_height2 = "600"; 

                        $image_p2 = imagecreatetruecolor($new_width2, $new_height2);
                        $image_b2 = imagecreatetruecolor($p_width2, $p_height2);
                        $image2 = $imagecreate2($filepath2); //photo folder

                        imagecopyresampled($image_p2, $image2, 0, 0, 0, 0, $new_width2, $new_height2, $filewidth2, $fileheight2);                     
                        $imageformat2($image_p2, $filepath_thumb2);//thumb folder

                        imagecopyresampled($image_b2, $image2, 0, 0, 0, 0, $p_width2, $p_height2, $filewidth2, $fileheight2);                     
                        $imageformat2($image_b2, $bigimage2);//bigimage folder

                        if($filetype3 == "image/jpeg") // Image Three
                        {
                          $imagecreate3 = "imagecreatefromjpeg";
                          $imageformat3 = "imagejpeg";
                        }
                        if($filetype3 == "image/png")
                        {                        
                          $imagecreate3 = "imagecreatefrompng";
                          $imageformat3 = "imagepng";
                        }
                        if($filetype3 == "image/gif")
                        {                        
                          $imagecreate3 = "imagecreatefromgif";
                          $imageformat3 = "imagegif";
                        }
                        $new_width3 = "200";
                        $new_height3 = "200";
                        $p_width3 = "600";
                        $p_height3 = "600"; 

                        $image_p3 = imagecreatetruecolor($new_width3, $new_height3);
                        $image_b3 = imagecreatetruecolor($p_width3, $p_height3);
                        $image3 = $imagecreate3($filepath3); //photo folder

                        imagecopyresampled($image_p3, $image3, 0, 0, 0, 0, $new_width3, $new_height3, $filewidth3, $fileheight3);                     
                        $imageformat3($image_p3, $filepath_thumb3);//thumb folder

                        imagecopyresampled($image_b3, $image3, 0, 0, 0, 0, $p_width3, $p_height3, $filewidth3, $fileheight3);                     
                        $imageformat3($image_b3, $bigimage3);//bigimage folder  

                        if($filetype4 == "image/jpeg") // Image Four
                        {
                          $imagecreate4 = "imagecreatefromjpeg";
                          $imageformat4 = "imagejpeg";
                        }
                        if($filetype4 == "image/png")
                        {                        
                          $imagecreate4 = "imagecreatefrompng";
                          $imageformat4 = "imagepng";
                        }
                        if($filetype4 == "image/gif")
                        {                        
                          $imagecreate4 = "imagecreatefromgif";
                          $imageformat4 = "imagegif";
                        }
                        $new_width4 = "200";
                        $new_height4 = "200";
                        $p_width4 = "600";
                        $p_height4 = "600"; 

                        $image_p4 = imagecreatetruecolor($new_width4, $new_height4);
                        $image_b4 = imagecreatetruecolor($p_width4, $p_height4);
                        $image4 = $imagecreate4($filepath4); //photo folder

                        imagecopyresampled($image_p4, $image4, 0, 0, 0, 0, $new_width4, $new_height4, $filewidth4, $fileheight4);                     
                        $imageformat4($image_p4, $filepath_thumb4);//thumb folder

                        imagecopyresampled($image_b4, $image4, 0, 0, 0, 0, $p_width4, $p_height4, $filewidth4, $fileheight4);                     
                        $imageformat4($image_b4, $bigimage4);//bigimage folder   

            $query = "UPDATE tbl_product
                SET 
                p_id        = '$p_id', 
                p_name      = '$p_name', 
                p_brnd_name = '$p_brnd_name', 
                p_ctgy_name = '$p_ctgy_name',
                p_details   = '$p_details', 
                p_price     = '$p_price', 
                p_offer_price = '$p_offer_price',
                p_is_offer  = '$p_is_offer',
                p_image     = '$fileName',
                p_image_2   = '$fileName2',
                p_image_3   = '$fileName3',
                p_image_4   = '$fileName4'
               
                WHERE 
                p_srl_no = '$id'
                ";
            $product = $db->update($query);
            if ($product) {
            $n = "<span style='color:Green; font-size:16px; font-weight:bold;' >Data Updated Successfully.</span> <hr>" ;
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
                                <div style="float: right;"><a style="color: #CB6848;" href="products.php">Back to Products</a></div>
                            </div>

                            <div class="container">
    <br>
    <div class="col-lg-12 well">
    <div class="row">
                <form action="" method="post" enctype="multipart/form-data">
    <div class="widget-body">
    <div class="widget-main">
<?php 
    $query = "select * from tbl_product where p_srl_no='$id' ";
    $sel_product = $db->select($query);
    if ($sel_product) {
        $result = $sel_product->fetch_assoc();
    
?>
        <div class="row">
       <div style="text-align: center; font-weight: normal;"> <?php echo $n; ?> </div>

            <div class="col-sm-6">

                <div class="form-group">
                    <label class="col-sm-4 control-label no-padding-right" for="Ccustomer_name">Product ID</label>

                    <div class="col-sm-8">
                        <input type="text" name="p_id" id="customer_name" value="<?php echo $result['p_id']; ?>" class="form-control"/>
                      
                    </div>
                </div>
               
                <div class="form-group">
                    <label class="col-sm-4 control-label no-padding-right" for="Ccustomer_name">Product Name</label>

                    <div class="col-sm-8">
                        <input type="text" name="p_name" id="customer_name" value="<?php echo $result['p_name']; ?>" class="form-control"/>
                      
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-4 control-label no-padding-right" for="contact_persion">Brand Name</label>

                    <div class="col-sm-8">
                        <input type="text" name="p_brnd_name" id="contact_persion" value="<?php echo $result['p_brnd_name']; ?>" class="form-control" />
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
                    <label class="col-sm-4 control-label no-padding-right" for="contact_persion">Product Detail</label>

                    <div class="col-sm-8">
                        <textarea name="p_details" id="" cols="31" rows="1"><?php echo $result['p_details']; ?></textarea>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-4 control-label no-padding-right" for="phone">Price</label>

                    <div class="col-sm-8">
                        <input type="text" name="p_price" id="phone" value="<?php echo $result['p_price']; ?>" class="form-control"  />
                    </div>
                </div>
               <div class="form-group">
                    <label class="col-sm-4 control-label no-padding-right" for="address">Offer Price</label>

                    <div class="col-sm-8">

                        <input id="address" name="p_offer_price" value="<?php echo $result['p_offer_price']; ?>" class="form-control" />
                    </div>
                </div>
                
            
               
            </div>
            <div class="col-sm-6">
               
                 
                
               <div class="form-group">
                    <label class="col-sm-4 control-label no-padding-right" for="phone">Offer Status </label>

                    <div class="col-sm-7">
                        <select style="height: 28px;margin-bottom: 1px;width: 242px;border-radius: 0;" name="p_is_offer" data-placeholder="Select Product" class="form-control js-example-placeholder-single"> 
                        
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
                <div class="form-group">
                    <label class="col-sm-4 control-label no-padding-right" for="phone">Main Product </label>

                    <div class="col-sm-8">
                        <input class="upload_frame" type="file" name="p_image">
                        
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-4 control-label no-padding-right" for="phone">Main Product </label>

                    <div class="col-sm-8">
                        <input class="upload_frame" type="file" name="p_image_2">
                        
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-4 control-label no-padding-right" for="phone">Sub Product</label>

                    <div class="col-sm-8">
                        <input class="upload_frame" type="file" name="p_image_3">
                        
                    </div>
                </div>
                 <div class="form-group">
                    <label class="col-sm-4 control-label no-padding-right" for="phone">Sub Product</label>

                    <div class="col-sm-8">
                        <input class="upload_frame" type="file" name="p_image_4">
                        
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-sm-3 col-sm-offset-9">
                        <button style="float: right;padding: 3px 34px;font-size: 20px; margin-top: 5px;" type="submit" class="btn btn-info">Update</button>

                    </div>
                </div>
            </div>
        </div>

        <?php } ?>
    </div>
    </div>
    </form>  
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