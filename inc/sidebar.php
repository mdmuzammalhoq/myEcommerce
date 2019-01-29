	<div class="container all_container">
		<div class="row">
			<div class="col-md-2 col-sm-2 side_menu padd">
				<ul>
<?php
	$query = "select * from tbl_category";
	$menu = $db->select($query);
	if ($menu) {
		while ($result = $menu->fetch_assoc()) {
?>
					<a href="products.php?cat_id=<?php echo $result['cat_name']; ?>"><li><?php echo $result['cat_name']; ?></li></a>
<?php } } ?>
				</ul>

			</div>
			<div class="col-md-10 col-sm-10 right_div">