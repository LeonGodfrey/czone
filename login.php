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
    <!-- <div class="card card-outline card-warning"> -->
    <!-- <div class="card-header text-center"> -->
    <center>
      <h2 class="text-warning"><b>Login</b></h2>
    </center>
    <div class="card card-dark card-tabs">

      <div class="card-header p-0 pt-0">
        <ul class="nav nav-tabs" id="custom-tabs-two-tab" role="tablist">
          
        </ul>
      </div>
      <div class="card-body">
        <div class="tab-content" id="custom-tabs-two-tabContent">
          <div class="tab-pane fade show active" id="custom-tabs-two-home" role="tabpanel" aria-labelledby="custom-tabs-two-home-tab">

            <form action="verify1.php" method="post">
              <div class="input-group mb-3">
                <input type="email" class="form-control" name="email" placeholder="Email" value="<?php echo (isset($_SESSION['email'])) ? $_SESSION['email'] : '' ?>" required>
                <div class="input-group-append">
                  <div class="input-group-text">
                    <span class="fas fa-envelope"></span>
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
              <div class="row">
                <div class="col-8">

                </div>
                <!-- /.col -->
                <div class="col-4">
                  <button type="submit" class="btn bg-dark btn-block" name="login">login</button>
                </div>
                <!-- /.col -->
              </div>
            </form>
            <div class="social-auth-links text-center">
              <a href="signup.php" class="btn btn-block bg-dark">
                No account? Sign Up.
              </a>
            </div>
            <br>            
            <a href="index.php"><i class="fas fa-home"></i> Back to Home</a>
          </div>
          <div class="tab-pane fade" id="custom-tabs-two-profile" role="tabpanel" aria-labelledby="custom-tabs-two-profile-tab">

          <form action="verify1.php" method="post">
              <div class="input-group mb-3">
                <input type="email" class="form-control" name="email" placeholder="Email" value="<?php echo (isset($_SESSION['email'])) ? $_SESSION['email'] : '' ?>" required>
                <div class="input-group-append">
                  <div class="input-group-text">
                    <span class="fas fa-envelope"></span>
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
              <div class="row">
                <div class="col-8">

                </div>
                <!-- /.col -->
                <div class="col-4">
                  <button type="submit" class="btn bg-dark btn-block" name="login">login</button>
                </div>
                <!-- /.col -->
              </div>
            </form>
            <div class="social-auth-links text-center">
              <a href="signup.php" class="btn btn-block bg-dark">
                No account? Sign Up.
              </a>
            </div>
            <br><br>            
            <a href="index.php"><i class="fas fa-home"></i> Back to Home</a>

          </div>
          <div class="tab-pane fade" id="custom-tabs-two-messages" role="tabpanel" aria-labelledby="custom-tabs-two-messages-tab">
          <form action="verify1.php" method="post">
              <div class="input-group mb-3">
                <input type="email" class="form-control" name="email" placeholder="Email" value="<?php echo (isset($_SESSION['email'])) ? $_SESSION['email'] : '' ?>" required>
                <div class="input-group-append">
                  <div class="input-group-text">
                    <span class="fas fa-envelope"></span>
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
              <div class="row">
                <div class="col-8">

                </div>
                <!-- /.col -->
                <div class="col-4">
                  <button type="submit" class="btn bg-dark btn-block" name="login">login</button>
                </div>
                <!-- /.col -->
              </div>
            </form>
            <div class="social-auth-links text-center">
              <a href="signup.php" class="btn btn-block bg-dark">
                No account? Sign Up.
              </a>
            </div>
            <br>            
            <a href="index.php"><i class="fas fa-home"></i> Back to Home</a>
          </div>
          <div class="tab-pane fade" id="custom-tabs-two-settings" role="tabpanel" aria-labelledby="custom-tabs-two-settings-tab">

          </div>
        </div>
      </div>
      <!-- /.card -->
    </div>
    <!-- </div> -->
    <!-- /.card -->
    <!-- </div> -->

    <?php include 'includes/scripts.php' ?>
</body>

</html>