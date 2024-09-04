<?php

session_start();

if(!isset($_SESSION['id']))
{
  ?>


<?php
  header("location:{$hostname}/suryraj&shivang/newspost/Admin-pannel/");
  
}
?>
<nav class="navbar navbar-expand sticky-top px-4 py-2 header">
    <a href="#" class="sidebar-toggler flex-shrink-0">
        <i class="fa fa-bars"></i>
    </a>
    <div class="navbar-nav align-items-center ms-auto">
        <div class="nav-item dropdown">
            <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown" style="margin-bottom: 0px;">
                <img class="rounded-circle me-lg-2" src="usericon.png" alt="" style="width: 40px; height: 40px;">
                <span class="d-none d-lg-inline-flex">
                  <?php
                        echo $_SESSION['name']
                  ?>
                  

                </span>
            </a>
            <div class="dropdown-menu bg-transparent border-0 mt-2 ">
                <a href="logout.php" class="dropdown-item link">Log Out</a>
            </div>
        </div>
    </div>
</nav>