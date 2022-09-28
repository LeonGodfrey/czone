<?php include 'includes/session.php'; ?>
<?php
if (isset($_SESSION['user'])) {
  header('location: cart_view.php');
}

?>
<?php include 'includes/header.php'; ?>

<!-- start form -->

<body class="hold-transition register-page bg-img">
  <div class="register-box">
    <?php
    if (isset($_SESSION['error'])) {
      echo "
          <div class='callout callout-danger text-center s-danger'>
            <p>" . $_SESSION['error'] . "</p> 
          </div>
        ";
      unset($_SESSION['error']);
    }

    if (isset($_SESSION['success'])) {
      echo "
          <div class='callout callout-success text-center s-success'>
            <p>" . $_SESSION['success'] . "</p> 
          </div>
        ";
      unset($_SESSION['success']);
    }
    ?>


    <!-- form -->
    <center>
      <h2 class=""><b>Register As</b></h2>
    </center>
    <div class="card card-dark card-tabs">

      <div class="card-header p-0 pt-1">
        <ul class="nav nav-tabs" id="custom-tabs-two-tab" role="tablist">
          <li class="nav-item">
            <a class="nav-link active" id="custom-tabs-two-home-tab" data-toggle="pill" href="#custom-tabs-two-home" role="tab" aria-controls="custom-tabs-two-home" aria-selected="true">Customer </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" id="custom-tabs-two-profile-tab" data-toggle="pill" href="#custom-tabs-two-profile" role="tab" aria-controls="custom-tabs-two-profile" aria-selected="false">Farmer</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" id="custom-tabs-two-messages-tab" data-toggle="pill" href="#custom-tabs-two-messages" role="tab" aria-controls="custom-tabs-two-messages" aria-selected="false">Delivery Agent</a>
          </li>
        </ul>
      </div>
      <div class="card-body">
        <div class="tab-content" id="custom-tabs-two-tabContent">
          <div class="tab-pane fade show active" id="custom-tabs-two-home" role="tabpanel" aria-labelledby="custom-tabs-two-home-tab">

            <form action="register1.php" method="post">
              <div class="input-group mb-3">
                <input type="text" class="form-control" name="name" placeholder="Name" value="<?php echo (isset($_SESSION['name'])) ? $_SESSION['name'] : '' ?>" required>
                <div class="input-group-append">
                  <div class="input-group-text">
                    <span class="fas fa-user"></span>
                  </div>
                </div>
              </div>

              <div class="input-group mb-3">
                <input type="email" class="form-control" name="email" placeholder="Email" value="<?php echo (isset($_SESSION['email'])) ? $_SESSION['email'] : '' ?>" required>
                <div class="input-group-append">
                  <div class="input-group-text">
                    <span class="fas fa-envelope"></span>
                  </div>
                </div>
              </div>
              <div class="input-group mb-3">
                <input type="telephone" class="form-control" name="phone" placeholder="Contact" value="<?php echo (isset($_SESSION['phone'])) ? $_SESSION['phone'] : '' ?>" required>
                <div class="input-group-append">
                  <div class="input-group-text">
                    <span class="fas fa-phone"></span>
                  </div>
                </div>
              </div>
              <div class="input-group mb-3">
                <input type="text" class="form-control" name="location" placeholder="Farm location" value="<?php echo (isset($_SESSION['location'])) ? $_SESSION['location'] : '' ?>" required>
                <div class="input-group-append">
                  <div class="input-group-text">
                    <span class="fas fa-map-marker"></span>
                  </div>
                </div>
              </div>
              <div class="input-group mb-3">
                <input type="password" class="form-control" name="password" placeholder="Password" required>
                <div class="input-group-append">
                  <div class="input-group-text">
                    <span class="fas fa-lock"></span>
                  </div>
                </div>
              </div>
              <div class="input-group mb-3">
                <input type="password" class="form-control" name="repassword" placeholder="Retype password" required>
                <div class="input-group-append">
                  <div class="input-group-text">
                    <span class="fas fa-lock"></span>
                  </div>
                </div>
              </div>
              <div class="input-group mb-3">
                <textarea class="form-control" name="description" placeholder="Farm description" value="<?php echo (isset($_SESSION['description'])) ? $_SESSION['description'] : '' ?>" required></textarea>

              </div>

              <div class="row">
                
                <!-- /.col -->
                <div class="col-4">
                  <button type="submit" class="btn bg-primary btn-block" name="signup">Register</button>
                </div>
                <!-- /.col -->
              </div>
            </form>
            <a href="index.php"><i class="fas fa-home"></i> Back to Home</a>
          </div>
          <div class="tab-pane fade" id="custom-tabs-two-profile" role="tabpanel" aria-labelledby="custom-tabs-two-profile-tab">

          <form action="register.php" method="post">
              <div class="input-group mb-3">
                <input type="text" class="form-control" name="name" placeholder="Name" value="<?php echo (isset($_SESSION['name'])) ? $_SESSION['name'] : '' ?>" required>
                <div class="input-group-append">
                  <div class="input-group-text">
                    <span class="fas fa-user"></span>
                  </div>
                </div>
              </div>

              <div class="input-group mb-3">
                <input type="email" class="form-control" name="email" placeholder="Email" value="<?php echo (isset($_SESSION['email'])) ? $_SESSION['email'] : '' ?>" required>
                <div class="input-group-append">
                  <div class="input-group-text">
                    <span class="fas fa-envelope"></span>
                  </div>
                </div>
              </div>
              <div class="input-group mb-3">
                <input type="telephone" class="form-control" name="phone" placeholder="Contact" value="<?php echo (isset($_SESSION['phone'])) ? $_SESSION['phone'] : '' ?>" required>
                <div class="input-group-append">
                  <div class="input-group-text">
                    <span class="fas fa-phone"></span>
                  </div>
                </div>
              </div>
              <div class="input-group mb-3">
                <input type="text" class="form-control" name="location" placeholder="Location" value="<?php echo (isset($_SESSION['location'])) ? $_SESSION['location'] : '' ?>" required>
                <div class="input-group-append">
                  <div class="input-group-text">
                    <span class="fas fa-map-marker"></span>
                  </div>
                </div>
              </div>
              <div class="input-group mb-3">
                <input type="password" class="form-control" name="password" placeholder="Password" required>
                <div class="input-group-append">
                  <div class="input-group-text">
                    <span class="fas fa-lock"></span>
                  </div>
                </div>
              </div>
              <div class="input-group mb-3">
                <input type="password" class="form-control" name="repassword" placeholder="Retype password" required>
                <div class="input-group-append">
                  <div class="input-group-text">
                    <span class="fas fa-lock"></span>
                  </div>
                </div>
              </div>
              <div class="input-group mb-3">
                <textarea class="form-control" name="description" placeholder="Farm description" value="<?php echo (isset($_SESSION['description'])) ? $_SESSION['description'] : '' ?>" required></textarea>

              </div>

              <div class="row">
                
                <div class="col-4">
                  <button type="submit" class="btn bg-primary btn-block" name="signup">Register</button>
                </div>
                <!-- /.col -->
              </div>
            </form>
            <a href="index.php"><i class="fas fa-home"></i> Back to Home</a>

          </div>
          <div class="tab-pane fade" id="custom-tabs-two-messages" role="tabpanel" aria-labelledby="custom-tabs-two-messages-tab">
            
          <form action="register2.php" method="post">
              <div class="input-group mb-3">
                <input type="text" class="form-control" name="name" placeholder="Name" value="<?php echo (isset($_SESSION['name'])) ? $_SESSION['name'] : '' ?>" required>
                <div class="input-group-append">
                  <div class="input-group-text">
                    <span class="fas fa-user"></span>
                  </div>
                </div>
              </div>

              <div class="input-group mb-3">
                <input type="email" class="form-control" name="email" placeholder="Email" value="<?php echo (isset($_SESSION['email'])) ? $_SESSION['email'] : '' ?>" required>
                <div class="input-group-append">
                  <div class="input-group-text">
                    <span class="fas fa-envelope"></span>
                  </div>
                </div>
              </div>
              <div class="input-group mb-3">
                <input type="telephone" class="form-control" name="phone" placeholder="Contact" value="<?php echo (isset($_SESSION['phone'])) ? $_SESSION['phone'] : '' ?>" required>
                <div class="input-group-append">
                  <div class="input-group-text">
                    <span class="fas fa-phone"></span>
                  </div>
                </div>
              </div>
              <div class="input-group mb-3">
                <input type="text" class="form-control" name="location" placeholder="location" value="<?php echo (isset($_SESSION['location'])) ? $_SESSION['location'] : '' ?>" required>
                <div class="input-group-append">
                  <div class="input-group-text">
                    <span class="fas fa-map-marker"></span>
                  </div>
                </div>
              </div>
              <div class="input-group mb-3">
                <input type="text" class="form-control" name="nin" placeholder="NIN" value="<?php echo (isset($_SESSION['nin'])) ? $_SESSION['nin'] : '' ?>" required>
                <div class="input-group-append">
                  <div class="input-group-text">
                    <span class="fas fa-user"></span>
                  </div>
                </div>
              </div>
              <div class="input-group mb-3">
                <input type="text" class="form-control" name="tpMeans" placeholder="Transport means" value="<?php echo (isset($_SESSION['tpMeans'])) ? $_SESSION['tpMeans'] : '' ?>" required>
                <div class="input-group-append">
                  <div class="input-group-text">
                    <span class="fas fa-user"></span>
                  </div>
                </div>                
              </div>
              
              <div class="input-group mb-3">
                <input type="password" class="form-control" name="password" placeholder="Password" required>
                <div class="input-group-append">
                  <div class="input-group-text">
                    <span class="fas fa-lock"></span>
                  </div>
                </div>
              </div>
              <div class="input-group mb-3">
                <input type="password" class="form-control" name="repassword" placeholder="Retype password" required>
                <div class="input-group-append">
                  <div class="input-group-text">
                    <span class="fas fa-lock"></span>
                  </div>
                </div>
              </div>
              <div class="input-group mb-3">
                <textarea class="form-control" name="description" placeholder="Agent description" value="<?php echo (isset($_SESSION['description'])) ? $_SESSION['description'] : '' ?>" required></textarea>

              </div>

              <div class="row">
                
                <!-- /.col -->
                <div class="col-4">
                  <button type="submit" class="btn bg-primary btn-block" name="signup">Register</button>
                </div>
                <!-- /.col -->
              </div>
            </form>
            <a href="index.php"><i class="fas fa-home"></i> Back to Home</a>

          </div>
          <div class="tab-pane fade" id="custom-tabs-two-settings" role="tabpanel" aria-labelledby="custom-tabs-two-settings-tab">

          </div>
        </div>
      </div>
      <!-- /.card -->

    </div>

    <?php include 'includes/scripts.php' ?>
</body>

</html>