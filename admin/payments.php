<?php include 'includes/session.php'; ?>

<?php include 'includes/header.php'; ?>

<body class="hold-transition sidebar-mini">
  <div class="wrapper">

    <?php include 'includes/navbar.php'; ?>
    <?php include 'includes/menubar.php'; ?>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">

        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1>Current Payments</h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="home.php">Home</a></li>
                <li class="breadcrumb-item active">Payments</li>
              </ol>
            </div>
          </div>
        </div>
      </section>

      <!-- Main content -->
      <section class="content">
        <div class="container-fluid">
          <?php
          if (isset($_SESSION['error'])) {
            echo "
            <div class='alert alert-danger alert-dismissible'>
              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
              <h4><i class='icon dangera fa-warning'></i> Error!</h4>
              " . $_SESSION['error'] . "
            </div>
          ";
            unset($_SESSION['error']);
          }
          if (isset($_SESSION['success'])) {
            echo "
            <div class='alert alert-success alert-dismissible'>
              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
              <h4><i class='icon fa fa-check'></i> Success!</h4>
              " . $_SESSION['success'] . "
            </div>
          ";
            unset($_SESSION['success']);
          }
          ?>
          <!-- hello -->
          <div class="row">

            <!-- hello -->
            <div class="col-12">
              <div class="card">
                <div class="card-header">
                  <h3 class="card-title">Payments</h3>

                  <!-- add a payment button -->
                    <div class="card-tools">
                        <a href="./completedpayments.php"  class="btn btn-primary btn-sm btn-flat"><i class="fa fa-plus"></i> 
                         Check Status
                    </a>
                    </div>


                  <div class="card-tools">
                    <div class="input-group input-group-sm" style="width: 150px;">
                    </div>
                  </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body table-responsive p-0">
                  <table class="table table-hover text-nowrap">
                    <thead>
                      <tr>
                        <th>Name</th>
                        <th>Amount</th>
                        <th>Phone Number</th>
                        <th>Transaction Ref</th>
                        <th>Status</th> 
                                               
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      $conn = $pdo->open();
                      try {

                        $stmt = $conn->prepare("SELECT * from payments ");
                        $stmt->execute();
                        foreach ($stmt as $row) {

                          echo "
                          <tr>
                            <td>" . $row['customer_name'] . "</td>
                            <td>" . $row['amount'] . "</td>
                            <td>" . $row['phone_number'] . "</td>
                            <td>" . $row['transaction_ref'] . "</td>
                            <td>" . $row['status'] . "</td>                            
                            
                            
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
                <!-- /.card-body -->
              </div>
              <!-- /.card -->
            </div>
          </div>
        </div>
      </section>

    </div>
    <?php include 'includes/footer.php'; ?>
    <?php include 'includes/order_modal.php'; ?>


  </div>
  <!-- ./wrapper -->

  <?php include 'includes/scripts.php'; ?>

  <script>
    $(function() {

      $(document).on('click', '.confirm', function(e) {
        e.preventDefault();
        $('#confirm').modal('show');
        var id = $(this).data('id');
        getRow(id);
      });

      $(document).on('click', '.reject', function(e) {
        e.preventDefault();
        $('#reject').modal('show');
        var id = $(this).data('id');
        getRow(id);
      });




    });

    function getRow(id) {
      $.ajax({
        type: 'POST',
        url: 'order_row.php',
        data: {
          id: id
        },
        dataType: 'json',
        success: function(response) {

          $('.name').html(response.orderNo);
          $('.orderId').val(response.orderId);

        }
      });
    }
  </script>
  <!-- table script -->
  <script>
    $(function() {
      $("#example1").DataTable({
        "responsive": true,
        "lengthChange": false,
        "autoWidth": false,
        "buttons": [ /*"copy", "csv", "excel", "pdf", "print", "colvis"*/ ]
      }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
      $('#example2').DataTable({
        "paging": true,
        "lengthChange": false,
        "searching": false,
        "ordering": true,
        "info": true,
        "autoWidth": false,
        "responsive": true,
      });
    });
  </script>
</body>

</html>