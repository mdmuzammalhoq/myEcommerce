<?php 

    include '../Config/Config.php'; 
    include '../Config/Database.php'; 
    include '../Config/Format.php'; 

    $db = new Database();
?>
<?php 

	
		$id = $_POST['id'];
		$delquery = "delete from tbl_slider where slider_id='$id'";
		$delProduct = $db->delete($delquery);


?>

<div id="delete_slider_ajax">
                                <table id="dynamic-table" class="table table-striped table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th width="10%" style="text-align: center;">Slider Image</th>
                                            <th width="15%" style="text-align: center;">Slider Name</th>
                                            <th width="15%" style="text-align: center;">Action</th>
                                        </tr>
                                    </thead>

                                    <tbody>
    <?php 
        $query = "select * from tbl_slider";
        $slt = $db->select($query);
        if ($slt) {
            while ($result = $slt->fetch_assoc()) {
                
    ?>
    
                                    <tr style="text-align: center;">
                                        
                                        <td><img style='width: 30px; height: 30px;' src="<?php echo $result['slider_image']; ?>" alt=""></td>
                                        <td><?php echo $result['slider_name']; ?></td>
                                        
                                        <td><a><button class="btn btn-xs btn-danger" onclick="pdelet(del_Slider = '<?php echo $result['slider_id']; ?>')"><span class="glyphicon glyphicon glyphicon-trash"></button></a></td>
                                    </tr>
    <?php } } ?>

                                    </tbody>
                                </table>
                            </div>