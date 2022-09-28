

<!-- Close 2 divs -->

<!-- Navbar -->
<header class="main-header">
  <nav class="main-header navbar navbar-expand-md navbar-light navbar-red">
    <div class="container">
      <a href="index.php" class="navbar-brand">
        <img src="images/new3.png" alt="chicken zone" width="150px">
      </a>

      <button class="navbar-toggler order-1" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse order-3" id="navbarCollapse">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
          <li class="nav-item">
            <a href="index.php" class="nav-link" style='color:yellow;'>Home</a>
          </li>          
               
          
          <?php
          if(isset($_SESSION['user'])){
            echo '
            <li class="nav-item">
            <a href="customer/home.php" class="nav-link" style="color:yellow;"> </i> Dashboard</a>
            </li>';
          } ?>
        </ul>

        <!-- SEARCH FORM -->
        
        
        <form method="POST" class="navbar-form navbar-left" action="search.php" class="form-inline ml-0 ml-md-3">
          <div class="input-group input-group-sm">
            <input  style='color:yellow;' type="text" class="form-control form-control-navbar" id="navbar-search-input" name="keyword" placeholder="Search for Product" required>
            <div class="input-group-append">
              <button type="submit" class="btn btn-default btn-flat"><i class="fas fa-search"></i> </button>
            </div>
          </div>
        </form>
      </div>

      <!-- Right navbar links -->
      <ul class="order-1 order-md-3 navbar-nav navbar-no-expand ml-auto">
        <!-- Messages Dropdown Menu -->
        <li class="dropdown messages-menu">
          <!-- Menu toggle button -->
          <div>
          <a href="cart_view.php" class="nav-link navbar-brand">
            <img src="images/cart.png" alt="Cart" height="50px">
            <!-- <i class="fa fa-shopping-cart"></i> -->
            <span class="badge badge-warning navbar-badge cart_count"></span>
          </a>
          </div>
          
        </li>

        <!-- end user menu -->
        <?php
        if(isset($_SESSION['user'])){
          echo "
          <li><a class='nav-link' style='color:yellow;' href='customer/profile.php'><b>".$user['name']."</b></a></li> 
          <li><a class='nav-link' style='color:yellow;' href='logout.php'><b>LOGOUT</b></a></li> 
          ";
        }
        else{
          echo "
          <li><a class='nav-link' style='color:yellow;' href='login.php'><b>LOGIN</b></a></li> 
          <li><a class='nav-link' style='color:yellow;' href='signup.php'><b>SIGNUP</b></a></li>  
                 
          ";
        }
        ?>
        
        
      </ul>
      
    </div>
    <div class="callout bg-warning" id="callout" style="display:none;">
							<button type="button" class="close"><span aria-hidden="true">&times;</span></button>
							<span class="message"></span>
						</div>
    
  </nav>
  
  
</header>

  <!-- /.navbar -->