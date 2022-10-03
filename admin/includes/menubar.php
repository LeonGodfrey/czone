<style>
  img {
    border-radius: 60%;
  }
</style>
<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
  <a href="../index.html" class="brand-link">
  <h2>Chicken Zone</h2>   
  </a>

  <!-- Sidebar -->
  <div class="sidebar">
   
    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->

        <li class="nav-item">
          <a href="home.php" class="nav-link">
            <i class="nav-icon far fa-square"></i>
            <p>
              Dashboard
            </p>
          </a>
        </li>        
        <li class="nav-item">
          <a href="users.php" class="nav-link">
            <i class="nav-icon far fa-circle"></i>
            <p>
             Users
            </p>
          </a>
        </li>

        <li class="nav-item">
          <a href="payments.php" class="nav-link">
            <i class="nav-icon far fa-circle"></i>
            <p>
              Payments
            </p>
          </a>
        </li>
        
        <li class="nav-item">
          <a href="profile.php" class="nav-link">
            <i class="nav-icon far fa-user"></i>
            <p>
             Profile
            </p>
          </a>
        </li>

        
        <li class="nav-item">
          <a href="../logout.php" class="nav-link">
            <i class="nav-icon fas fa-sign-out-alt"></i>
            <p>
              logout
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a>
            <div class="user-photo m-b-30"> <img class="img-fluid" src = "../images/<?php echo $agent['photo']; ?>" widith= "150px" height="200px" alt="Avatar"/></div>
            <div class="col-sm-6">
              <h4 class="m-0"><?php echo $agent['name']; ?></h4>
            </div>
          </a>
        </li>

      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>