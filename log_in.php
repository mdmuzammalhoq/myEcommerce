<link rel="stylesheet" href="css/responsive/log_in.css">
<script type="text/javascript" src="js/responsive/log_in.js"></script>

<!-- Button to open the modal login form -->


<!-- The Modal -->
<div id="id01" class="modal0">
  <span onclick="document.getElementById('id01').style.display='none'" 
class="close" title="Close Modal">&times;</span>

  <!-- Modal Content -->
  <form class="modal-content0 animate0" action="/action_page.php">
    <div class="imgcontainer0">
      <img src="img_avatar2.png" alt="Avatar" class="avatar0">
    </div>

    <div class="container0">
      <label><b>Username</b></label>
      <input type="text" placeholder="Enter Username" name="uname" required>

      <label><b>Password</b></label>
      <input type="password" placeholder="Enter Password" name="psw" required>

      <button type="submit">Login</button>
      <input type="checkbox0" checked=""> Remember me
    </div>

    <div class="container0" style="background-color:#f1f1f1">
      <button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn0">Cancel</button>
      <span class="psw0">Forgot <a href="#">password?</a></span>
    </div>
  </form>
</div>