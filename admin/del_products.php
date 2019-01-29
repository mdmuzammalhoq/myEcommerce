<?php 
    include '../Config/Config.php'; 
    include '../Config/Database.php'; 
    include '../Config/Format.php'; 

    $db = new Database();
?>

<?php 
	$id = $_POST['id'];

		$delquery = "DELETE FROM tbl_product WHERE p_srl_no='$id'";
		$delProduct = $db->delete($delquery);
		if ($delProduct ) { ?>
			
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
                                        <td><img style='width: 50px; height: 50px;' src="img/<?php echo $result['p_image']; ?>" alt=""></td>
                                        <td><a href="editproducts.php?edit_id=<?php echo $result['p_srl_no']; ?>"><button class="btn btn-xs btn-primary" id="<?php echo $row['cat_SlNo']; ?>" ><span class="glyphicon glyphicon glyphicon glyphicon-pencil"></span></button></a>

                                         <a ><button class="btn btn-xs btn-danger" id="<?php echo $result['p_srl_no']; ?>" onclick="pdelete(delProducts='<?php echo $result['p_srl_no']; ?>')"><span class="glyphicon glyphicon glyphicon-trash"></button></a></td>
                                    </tr>
    <?php } } ?>

                                    </tbody>
                                </table>
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
                          

	<?php
		}else{
				echo "NO";
			}


?>

