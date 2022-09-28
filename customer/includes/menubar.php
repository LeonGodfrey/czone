<!-- Special Styling for the Profiling Image -->
<style>
  img {
    border-radius: 60%;
  }
</style>
<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
  <a href="../index.php" class="brand-link">
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
          <a href="placed.php" class="nav-link">
            <i class="nav-icon far fa-circle"></i>
            <p>
             Placed Orders
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="inroute.php" class="nav-link">
            <i class="nav-icon far fa-circle"></i>
            <p>
             Orders In route
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="delivered.php" class="nav-link">
            <i class="nav-icon far fa-circle"></i>
            <p>
             Delivered Orders
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
        <br>
        <br>
        <li class="nav-item">
          <a>
            <div class="user-photo m-b-30"> <img class="img-fluid" src = "../images/<?php echo $user['photo']; ?>" widith= "150px" height="200px" alt="Avatar"/></div>
            <div class="col-sm-6">
              <h4 class="m-0"><?php echo $user['name']; ?></h4>
            </div>
          </a>
        </li>

      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>