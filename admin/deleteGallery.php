
<?php 

    include '../Config/Config.php'; 
    include '../Config/Database.php'; 
    include '../Config/Format.php'; 

    $db = new Database();
?>

<?php 
	$id = $_POST['id'];
	$query = "DELETE FROM tbl_gallery WHERE gallery_id='$id' ";
	$delGallery = $db->delete($query);
?>

<div id="delete_gallery_ajax">
                                <table id="dynamic-table" class="table table-striped table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th width="10%" style="text-align: center;">Gallery Image</th>
                                            <th width="15%" style="text-align: center;">Name</th>
                                            <th width="15%" style="text-align: center;">Designation</th>
                                            <th width="15%" style="text-align: center;">Phone</th>
                                            <th width="15%" style="text-align: center;">Email</th>
                                            <th width="15%" style="text-align: center;">Action</th>
                                        </tr>
                                    </thead>

                                    <tbody>
    <?php 
        $query = "select * from tbl_gallery";
        $slt = $db->select($query);
        if ($slt) {
            while ($result = $slt->fetch_assoc()) {
                
    ?>
    
                                    <tr style="text-align: center;">
                                        
                                        <td><img style='width: 30px; height: 30px;' src="<?php echo $result['gallery_image']; ?>" alt=""></td>
                                        <td><?php echo $result['gallery_name']; ?></td>
                                        <td><?php echo $result['gallery_designation']; ?></td>
                                        <td><?php echo $result['gallery_phone']; ?></td>
                                        <td><?php echo $result['gallery_email']; ?></td>
                                        
                                        <td><a><button class="btn btn-xs btn-danger" onclick="pdelet(del_Slider = '<?php echo $result['slider_id']; ?>')"><span class="glyphicon glyphicon  glyphicon-pencil"></button></a> <a><button class="btn btn-xs btn-danger" onclick="pdel(del_gallery = '<?php echo $result['gallery_id']; ?>')"><span class="glyphicon glyphicon glyphicon-trash"></button></a></td>
                                    </tr>
    <?php } } ?>

                                    </tbody>
                                </table>
                            </div>