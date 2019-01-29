<?php include 'inc/a_header.php'; ?>
<?php include 'inc/a_menu.php'; ?>
<?php

    $o_id= $_GET['undo_id'];

    if (isset($_GET['undo_id'])) {
      $query = "UPDATE tbl_order 
      SET 
        o_status = 'p'
        WHERE 
        o_srl_no='$o_id'
      ";
      $approve = $db->update($query);
      if ($approve) {
        echo "<span style='color: green; font-weight: bold; font-size: 16px; text-align: center;'>Undo Complete <hr></span>"; 
         
        
      }
    }    
?>


<?php include 'inc/a_right_strip.php'; ?>
<?php include 'inc/a_footer.php'; ?>