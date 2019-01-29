<?php include_once("inc/header.php"); error_reporting(0); ?>
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
<div style="min-height: 600px;" id="order_delete_ajax" >
    <div class="block">        
        <table class="table table-hover table-bordered" id="example">
		<thead>
			<tr>

				<th width="10%">S/N</th>
                <th width="15%">Order Time</th>
                <th width="10%">Phone</th>
                <th width="15%">Name</th>
                <th width="15%">Area</th>
                <th width="15%">Sub-Total</th>                    
                <th width="10%">Action</th>
			</tr>
		</thead>
	<tbody>
		<?php
			$customer = $_SESSION['cstmr_srl_no'];
			 
			$query = "SELECT tbl_order.*, tbl_customer_acc.* FROM tbl_order LEFT JOIN tbl_customer_acc on tbl_customer_acc.cstmr_srl_no=tbl_order.o_cstmr_id where tbl_order.o_status='p' and tbl_order.o_cstmr_id='$customer' order by tbl_order.o_srl_no desc";
      		$pending_order = $db ->select($query);
			if($pending_order){
				$i = 0;
				while($result= $pending_order-> fetch_assoc()){
					$i++;
					
			
		?>
			<tr class="odd gradeX">
				<td><?php echo $i; ?></td>
                <td><?php echo $result['o_adtime']; ?></td>
                <td><?php echo $result['cstmr_phn_no']; ?></td>
                <td><?php echo $result['cstmr_name']; ?></td>
                <td><?php echo $result['cstmr_delivery_address']; ?></td>
                <td><?php echo $result['o_subtotal']; ?></td>
				
				<td>
				<a href="view_my_order.php?my_order_view=<?php echo $result['o_srl_no']; ?>"><span style="font-size: 22px; color: #0093C4; " title="Edit"><i class="fa fa-pencil-square" aria-hidden="true"></i></span></a>
				<span style="cursor: pointer;"><a onclick="delete_pending_order_table(order_view_delete = '<?php echo $result['o_srl_no']; ?>')"><span style="font-size: 22px; color: #F20039;" title="Delete"><i class="fa fa-trash" aria-hidden="true"></i></span></a></span>
				 </td>
			</tr>

		    <?php } } ?>
		</tbody>
	</table>
   </div>
</div>
<script>
  $(document).ready(function(){
    $("#edit_id").attr(function(){
      "title" : "Edit"
    });

  });
</script>
<script>
  function delete_pending_order_table(order_view_delete){
    var id= order_view_delete;
    var dataUrl = "delete_order.php";
    var datastring = "id="+id;

    $.ajax({
      type: "POST",
      url: dataUrl,
      data: datastring,
      success:function(data){
        if (data) {
          $("#order_delete_ajax").html(data);
        }
        
      }

    });
  }
</script>

<?php include_once("inc/footer.php"); ?>

