<?php include_once("inc/header.php"); ?>
<?php include_once("inc/db_sidebar.php"); ?>
<?php 
 $fm = new Format();
?>
<style type="text/css">
	th{
		background: #FCFCFC;
		color: #000;
		text-align: center;
	}
	td{
		text-align: center;
	}
</style>
<div style="height: 600px;">
    <div class="block">        
        <table class="table table-hover table-bordered" id="example">
		<thead>
			<tr>

				<th width="10%">S/N</th>
				<th>Name : </th>
				<th>Items Number</th>
				<th>Description</th>
				<th>Total Amount</th>
				<th>Date</th>
				<th>Action</th>
			</tr>
		</thead>
	<tbody>
		<?php 
			$query = "select * from tbl_all_orders";
			$all_order = $db->select($query);
			if($all_order){
				$i = 0; 
				while($result= $all_order-> fetch_assoc()){
					$i++;
			
		?>
		<tr class="odd gradeX">
			<td><?php echo $result['all_o_id'];?></td>
			<td><?php echo $result['all_o_name'];?></td>
			<td><?php echo $result['all_o_number'];?></td>
			<td><?php echo $fm->textShorten($result['all_o_description'], 30); ?></td>
			<td>BDT <?php echo $result['all_o_ttl_amount'];?></td>
			<td><?php echo $result['all_o_date'];?></td>
			
			<td>
			<a href="view_all_order.php?id=<?php echo $result['all_o_id']; ?>">View</a>
			 </td>
			</tr>
		    <?php } } ?>
		</tbody>
	</table>
   </div>
</div>
<?php include_once("inc/footer.php"); ?>

