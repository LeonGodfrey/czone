<?php
include 'includes/session.php';
include 'includes/format.php';
?>
<?php
$today = date('Y-m-d');
$year = date('Y');
if (isset($_GET['year'])) {
  $year = $_GET['year'];
}

$conn = $pdo->open();
?>
<?php include 'includes/header.php'; ?>

<body class="hold-transition sidebar-mini">
  <div class="wrapper">

    <?php include 'includes/navbar.php'; ?>
    <?php include 'includes/menubar.php'; ?>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0"><?php echo $farmer['name']; ?></h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Dashboard</li>
              </ol>
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>
      <!-- /.content-header -->

      <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-6">
            
          <div class="card">
              <div class="card-header border-0">
                <h3 class="card-title">New orders</h3>
                
              </div>
              <div class="card-body table-responsive p-0">
                <table class="table table-striped table-valign-middle">
                  <thead>
                  <tr>
                    <th>OrderNo</th>
                    <th>Product</th>
                    <th>quantity</th>
                    <th>Cost</th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php
                      $conn = $pdo->open();
                      try {

                          $stmt = $conn->prepare("SELECT * from pOrder left join user on pOrder.userIdC = user.userId where pOrder.userIdF= :id AND pOrder.status = :status");
                          $stmt->execute(['id' => $farmer['userId'], 'status' => 'placed']);
                          foreach ($stmt as $row) {

                              echo "
                                <tr>
                                  <td>" . $row['orderNo'] . "</td>                                  
                                  <td>" . $row['pName'] . "</td>
                                  <td>" . $row['quantity'] . "</td>
                                  <td>" . $row['price'] . "</td>                             
                                  
                                  <td>                                 
                                    <a href='placed.php' class='btn bg-warning'>view</a>                   
                                    
                                    
                                  </td>
                                </tr>
                                  
                              ";
                          }
                      } catch (PDOException $e) {
                          echo $e->getMessage();
                      }

                      $pdo->close();
                      ?>
                  </tbody>
                </table>
              </div>
            </div>
    
            <!-- /.card -->

            <div class="card">
              <div class="card-header border-0">
                <h3 class="card-title">Orders in route</h3>                
              </div>
              <div class="card-body table-responsive p-0">
              <table class="table table-striped table-valign-middle">
                  <thead>
                  <tr>
                    <th>OrderNo</th>
                    <th>Product</th>
                    <th>quantity</th>
                    <th>Cost</th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php
                      $conn = $pdo->open();
                      try {

                          $stmt = $conn->prepare("SELECT * from pOrder left join user on pOrder.userIdC = user.userId where pOrder.userIdF= :id AND pOrder.status = :status");
                          $stmt->execute(['id' => $farmer['userId'], 'status' => 'inroute']);
                          foreach ($stmt as $row) {

                              echo "
                                <tr>
                                  <td>" . $row['orderNo'] . "</td>                                  
                                  <td>" . $row['pName'] . "</td>
                                  <td>" . $row['quantity'] . "</td>
                                  <td>" . $row['price'] . "</td>                             
                                  
                                  <td>                                 
                                    <a href='inroute.php' class='btn bg-warning'>view</a>                  
                                    
                                  </td>
                                </tr>
                                  
                              ";
                          }
                      } catch (PDOException $e) {
                          echo $e->getMessage();
                      }

                      $pdo->close();
                      ?>
                  </tbody>
                </table>
              </div>
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col-md-6 -->
          <div class="col-lg-6">
          <div class="card">
              <div class="card-header border-0">
                <h3 class="card-title">Orders delivered</h3>                
              </div>
              <div class="card-body table-responsive p-0">
              <table class="table table-striped table-valign-middle">
                  <thead>
                  <tr>
                    <th>OrderNo</th>
                    <th>Product</th>
                    <th>quantity</th>
                    <th>Cost</th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php
                      $conn = $pdo->open();
                      try {

                          $stmt = $conn->prepare("SELECT * from pOrder left join user on pOrder.userIdC = user.userId where pOrder.userIdF= :id AND pOrder.status = :status");
                          $stmt->execute(['id' => $farmer['userId'], 'status' => 'delivered']);
                          foreach ($stmt as $row) {

                              echo "
                                <tr>
                                  <td>" . $row['orderNo'] . "</td>                                  
                                  <td>" . $row['pName'] . "</td>
                                  <td>" . $row['quantity'] . "</td>
                                  <td>" . $row['price'] . "</td>                             
                                  
                                  <td>                                 
                                    <a href='delivered.php' class='btn bg-warning'>view</a>                  
                                    
                                  </td>
                                </tr>
                                  
                              ";
                          }
                      } catch (PDOException $e) {
                          echo $e->getMessage();
                      }

                      $pdo->close();
                      ?>
                  </tbody>
                </table>
              </div>
            </div>
            <!-- /.card -->

            <div class="card">
              <div class="card-header border-0">
                <h3 class="card-title">New products</h3>                
              </div>
              <div class="card-body table-responsive p-0">
              <table class="table table-striped table-valign-middle">
                  <thead>
                  <tr>
                    <th>Name</th>
                    <th>Price</th>
                    <th>In stock</th>
                    <th>tools</th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php
                      $conn = $pdo->open();
                      try {

                          $stmt = $conn->prepare("SELECT * from product limit 4");
                          $stmt->execute();
                          foreach ($stmt as $row) {

                              echo "
                                <tr>
                                  <td>" . $row['pName'] . "</td>                                  
                                  <td>" . $row['price'] . "</td>
                                  <td>" . $row['quantity'] . "</td>                                                             
                                                                    <td>                                 
                                    <a href='products.php' class='btn bg-warning'>vist</a>                  
                                    
                                  </td>
                                </tr>
                                  
                              ";
                          }
                      } catch (PDOException $e) {
                          echo $e->getMessage();
                      }

                      $pdo->close();
                      ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
          <!-- /.col-md-6 -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </div>
    <!--/. container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->

  <?php include 'includes/footer.php'; ?>
  </div>
  <!-- ./wrapper -->

  <?php include 'includes/scripts.php'; ?>
  
</body>

</html>