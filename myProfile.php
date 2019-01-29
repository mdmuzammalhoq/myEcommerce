<?php include_once("inc/header.php"); ?>
<?php include_once("inc/db_sidebar.php"); ?>
<style>
	td{
		width: 20%; text-align: center;
	}
	th{
		width: 20%; text-align: center;
	}
</style>
<div style="min-height: 400px;">
    <!-- Main Content -->
<div class="content margin-top60 margin-bottom60">
<div class="container">
<div class="row">
<!-- My Order Table -->
<div class="col-sm-12 col-md-12 col-lg-12">
<div class="my-account">
    <div class="bottom-padding">
    <?php 
        $id = $_SESSION['cstmr_srl_no'] ;
        $query = "select * from tbl_customer_acc where cstmr_srl_no='$id' ";
        $my_profile = $db->select($query);
        if ($my_profile) {
            while ($result = $my_profile->fetch_assoc()) {

    ?>
        <h3 style="font-weight: bold; text-align: center; padding-top: 20px;" class="hello">WelCome <?php echo $result['cstmr_name']; ?></h3>
        <p>From your My Account Dashboard you have the ability to view a snapshot of your recent account activity and update your account information. Select a link below to view or edit information. is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum. is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
    </div>
   


<?php } } ?>
</div>
</div>
<!-- /My Order Table -->

</div>
</div>
</div>
<!-- Main Content -->
</div>


<?php include_once("inc/footer.php"); ?>