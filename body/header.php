
<?php

if (!isset($_SESSION['admin_id'])) {

  $errormsg  = base64_encode("Please Login first");
  header("Location:index.php?errormsg=$errormsg");
  exit;
}
?>
<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      
    </ul>



    <ul class="navbar-nav ml-auto">
    <!-- Messages Dropdown Menu -->
    <li class="nav-item dropdown">
        <div class="btn-group">
            <button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown">
                Profile
            </button>
            <div class="dropdown-menu">
              <a href="profile_page.php" class="dropdown-item" style="color:black;">View profile</a>
              <a href="logout.php" class="dropdown-item" style="color:black;">Logout</a>

            </div>
            
            
        </div>
    </li>
</ul>
  </nav>

   <!-- Main Sidebar Container -->
   <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <!-- Brand Logo -->
      <a href="dashboard.php" class="brand-link text-center">
        <!-- <img src="Logo/logo.jpeg" width="10%" alt=""> -->
        <span class="brand-text font-weight-light" >Nadir Welfare Foundation</span>
      </a>

      <!-- Sidebar -->
      <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
      

        <!-- Sidebar Menu -->
        <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->

            <li class="nav-item has-treeview">
              <a href="dashboard.php" class="nav-link ">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>
                  Dashboard
                </p>
              </a>
            </li>

            <li class="nav-item has-treeview">
              <a href="items_entry.php" class="nav-link ">
              <i class="fa-solid fa-hand-holding-dollar"> </i> 
                <p>
                  &nbsp;&nbsp; Donation Entry
                </p>
              </a>
            </li>
            <li class="nav-item has-treeview">
              <a href="donors.php" class="nav-link ">
              <i class="fa-solid fa-rectangle-list"></i>
                <p>
                &nbsp;&nbsp;  Donation Details
                </p>
              </a>
            </li>
            <li class="nav-item has-treeview">
              <a href="donate_items.php" class="nav-link ">
              <i class="fa-solid fa-rectangle-list"></i>
                <p>
                &nbsp;&nbsp;  Donated By Us
                </p>
              </a>
            </li>
            <li class="nav-item has-treeview">
              <a href="recipient_details.php" class="nav-link ">
              <i class="fa-solid fa-rectangle-list"></i>
                <p>
                &nbsp;&nbsp;  Recipients Details
                </p>
              </a>
            </li>
            <li class="nav-item has-treeview">
              <a href="donated_to_us_reports.php" class="nav-link ">
              <i class="fa-solid fa-file"></i>
                <p>
                &nbsp;&nbsp;  Donated To Us Reports
                </p>
              </a>
            </li>
            <li class="nav-item has-treeview">
              <a href="donated_by_us_reports.php" class="nav-link ">
              <i class="fa-solid fa-file"></i>
                <p>
                &nbsp;&nbsp;  Donated By Us Reports
                </p>
              </a>
            </li>
         
            
             
            
          </ul>
        </nav>
        <!-- /.sidebar-menu -->
      </div>
      <!-- /.sidebar -->
    </aside>



    <script src="https://kit.fontawesome.com/20db2967c4.js" crossorigin="anonymous"></script>


<script>

 const activePage = window.location;
 const navlinks   = document.querySelectorAll('nav a').forEach(link => {
  if(link.href.includes(`${activePage}`))
  {
    link.classList.add('active');
  }
 });




</script>