<div class="row" id="slider_images">
					<div id="slider">
<?php 
	$query = "select * from tbl_slider";
	$slider = $db->select($query);
	if ($slider) {
		while ($result = $slider->fetch_assoc()) {
?>
<img src="admin/<?php echo $result['slider_image']; ?>" alt="<?php echo $result['slider_name']; ?>" />
<?php } } ?>

				        
    				</div>
				</div>