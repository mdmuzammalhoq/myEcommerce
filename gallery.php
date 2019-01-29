<?php include_once("inc/header.php"); ?>
<?php include_once("inc/sidebar.php"); ?>

<link rel="stylesheet" href="css/responsive/gallery.css">
<script type="text/javascript" src="js/responsive/gallery.js"></script>

 <div dir="ltr" style="text-align: left;" trbidi="on">



<div class="gallery cf">
<?php 
  $query = "SELECT * FROM tbl_gallery";
  $gallery = $db->select($query);
  if ($gallery) {
    while ($result =  $gallery->fetch_assoc()) {

?>
  <div>
    <img class="img-responsive" src="admin/<?php echo $result['gallery_image']; ?>" />
    <div style="text-align: center;">
      <p><?php echo $result['gallery_name']; ?> <br>
<strong><?php echo $result['gallery_designation']; ?></strong> <br>
<?php echo $result['gallery_phone']; ?> <br>
<?php echo $result['gallery_email']; ?>
</p> 
    </div>
  </div>
  <?php } } ?>
</div>

<br /></div>





<?php include_once("inc/footer.php"); ?>