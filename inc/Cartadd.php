<?php 
    session_start();
    include 'Config/Config.php'; 
    include 'Config/Database.php'; 
    include 'Config/Format.php';
    include_once("lib/user.php");
    //include_once("lib/Session.php");
     

    $db = new Database();
    $fm = new Format();
?>
<ul class="products">
    <li>
        <a href="#" class="item">
            <img src="images/shirt1.gif"/>
            <div>
                <p>Balloon</p>
                <p>Price:$25</p>
            </div>
        </a>
    </li>
    <li>
        <a href="#" class="item">
            <img src="images/shirt2.gif"/>
            <div>
                <p>Feeling</p>
                <p>Price:$25</p>
            </div>
        </a>
    </li>
    <!-- other products -->
</ul>