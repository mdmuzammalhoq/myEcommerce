<?php include 'inc/a_header.php'; error_reporting(0); ?>
<?php include 'inc/a_menu.php'; ?>

<?php 
        $n = "";
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $p_id = mysqli_real_escape_string($db->link, $_POST['p_id']);
        $p_name = mysqli_real_escape_string($db->link, $_POST['p_name']);
        $p_brnd_name = mysqli_real_escape_string($db->link, $_POST['p_brnd_name']);
        $p_ctgy_name = mysqli_real_escape_string($db->link, $_POST['p_ctgy_name']);
        $p_details = mysqli_real_escape_string($db->link, $_POST['p_details']);
        $p_price = mysqli_real_escape_string($db->link, $_POST['p_price']);
        $p_offer_price = mysqli_real_escape_string($db->link, $_POST['p_offer_price']);
        $p_is_offer = mysqli_real_escape_string($db->link, $_POST['p_is_offer']);
        $p_status = mysqli_real_escape_string($db->link, $_POST['p_status']);
        $p_saved_by_id = mysqli_real_escape_string($db->link, $_POST['p_saved_by_id']);
        $p_svd_time = mysqli_real_escape_string($db->link, $_POST['p_svd_time']);
        
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

        if ($p_id == "" || $p_name == "" || $p_brnd_name == "" || $p_ctgy_name == "" || $p_price == "" || $p_offer_price == "" || $p_is_offer == "" || $file_name = "" || $file_name2 = "" || $file_name3 = "" || $file_name4 = ""){
                $n = "<span style='color:red; font-size:16px; font-weight:bold;' >Field must not be empty !</span> <hr>" ;
            }elseif ($file_size >1048567) { //image One
                 echo "<span class='error'>Image Size should be less then 1MB!
                 </span>";
                }elseif (in_array($file_ext, $permited) === false) {
                 echo "<span class='error'>You can upload only:-".implode(', ', $permited)."</span>";
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

            $query = "INSERT INTO tbl_product (p_id, p_name, p_brnd_name, p_ctgy_name, p_details, p_price, p_offer_price, p_is_offer, p_status, p_saved_by_id, p_svd_time, p_image, p_image_2, p_image_3, p_image_4) 

                VALUES('$p_id', '$p_name', '$p_brnd_name', '$p_ctgy_name', '$p_details', 
                '$p_price', '$p_offer_price', '$p_is_offer', '$p_status', '$p_saved_by_id', 
                '$p_svd_time', '$fileName', '$fileName2', '$fileName3', 
                '$fileName4')";
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
                        <select style="height: 28px;margin-bottom: 1px;width: 242px;border-radius: 0;" name="p_ctgy_name" id="product_id" data-placeholder="Select Product" class="form-control js-example-placeholder-single"> 
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
                        <textarea style="margin-bottom: 1px;width: 242px;" name="p_details" id="" cols="31" rows="1"></textarea>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-4 control-label no-padding-right" for="phone">Main Price</label>

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
                    <label class="col-sm-4 control-label no-padding-right" for="phone">Sub Product</label>

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
                            <div id="delete_ajax">
                                <table id="dynamic-table" class="table table-striped table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th width="10%">Product Name</th>
                                            <th width="10%">Category</th>
                                            <th width="15%">Brand Name</th>
                                            <th width="15%">Price </th>
                                            <th width="15%">Product Status</th>
                                            <th width="15%">Image</th>
                                            <th width="15%">Action</th>
                                        </tr>
                                    </thead>

                                    <tbody>
   
    <!--Pagination--> 
    <?php 
      $query = "select * from tbl_product order by p_srl_no desc  limit $start_form, $per_page";
      $product_pagin = $db ->select($query);
      if($product_pagin){
        
        while($result = $product_pagin ->fetch_assoc()){
          
    ?>
    <!--Pagination-->
                                    <tr>
                                        <td><?php echo $result['p_name']; ?></td>
                                        <td><?php echo $result['p_ctgy_name']; ?></td>
                                        <td><?php echo $result['p_brnd_name']; ?></td>
                                        <td><?php echo $result['p_price']; ?></td>
                                        <td><?php echo $result['p_is_offer']; ?></td>
                                        <td><img style='width: 50px; height: 50px;' src="img/<?php echo $result['p_image']; ?>" alt=""></td>
                                        <td><a href="editproducts.php?edit_id=<?php echo $result['p_srl_no']; ?>"><button class="btn btn-xs btn-primary" id="<?php echo $row['cat_SlNo']; ?>" ><span class="glyphicon glyphicon glyphicon glyphicon-pencil"></span></button></a>

                                         <a ><button class="btn btn-xs btn-danger" id="<?php echo $result['p_srl_no']; ?>" onclick="pdelete(delProducts='<?php echo $result['p_srl_no']; ?>')"><span class="glyphicon glyphicon glyphicon-trash"></button></a></td>
                                    </tr>
    <?php } } ?>

                                    </tbody>
                                </table>
                            </div>
<!--Pagination-->
<div style="text-align: center;">
  <ul class="pagination">
  <?php
  $query = "select * from tbl_product ";
  $result = $db->select($query);
  $total_rows = mysqli_num_rows($result);
  $total_pages = ceil($total_rows/$per_page);
 

   // echo "<span class='pagination'><li><a href='new_registraion.php?page=1'>".'&laquo;'."</a></li>";
  
  for($i=1; $i <= $total_pages; $i++){
    echo "<li><a href='products.php?page=".$i."'>".$i."</a></li>";
  }
   echo "<li><a href='products.php?page=$total_pages'>".'&raquo;'."</a></span></li>" 

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
        <!--END PAGE CONTENT -->

<script>
    function pdelete(delProducts){
        var id = delProducts;
        var data_Link = 'del_products.php';
        var data_string = 'id='+id;

        $.ajax({
            type : 'POST',
            url : data_Link,
            data : data_string,
            success:function(data){
                 $("#delete_ajax").html(data);
                 //alert(data);
            }
        });

    }
</script>

<?php include 'inc/a_right_strip.php'; ?>
<?php include 'inc/a_footer.php'; ?>