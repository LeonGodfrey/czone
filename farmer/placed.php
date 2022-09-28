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
            <h1>Placed Orders</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="home.php">Home</a></li>              
              <li class="breadcrumb-item active">orders placed</li>
            </ol>
          </div>
        </div>
      </div>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
      <?php
        if(isset($_SESSION['error'])){
          echo "
            <div class='alert alert-danger alert-dismissible'>
              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
              <h4><i class='icon dangera fa-warning'></i> Error!</h4>
              ".$_SESSION['error']."
            </div>
          ";
          unset($_SESSION['error']);
        }
        if(isset($_SESSION['success'])){
          echo "
            <div class='alert alert-success alert-dismissible'>
              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
              <h4><i class='icon fa fa-check'></i> Success!</h4>
              ".$_SESSION['success']."
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
                                    <h3 class="card-title">Orders placed</h3>

                                    <div class="card-tools">
                                        <div class="input-group input-group-sm" style="width: 150px;">
                                            <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

                                            <div class="input-group-append">
                                                <button type="submit" class="btn btn-default">
                                                    <i class="fas fa-search"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body table-responsive p-0">
                                    <table class="table table-hover text-nowrap">
                                        <thead>
                                            <tr>
                                                <th>Order No.</th>
                                                <th>Client</th>
                                                <th>Product</th>
                                                <th>Quantity</th>
                                                <th>Location</th>
                                                <th>date</th>
                                                <th>Time</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $conn = $pdo->open();
                                            try {

                                                $stmt = $conn->prepare("SELECT * from pOrder left join user on pOrder.userIdC = user.userId where pOrder.userIdF= :id AND pOrder.status = :status AND pOrder.userIdD IS NULL");
                                                $stmt->execute(['id' => $farmer['userId'], 'status' => 'placed']);
                                                foreach ($stmt as $row) {

                                                    echo "
                          <tr>
                            <td>" . $row['orderNo'] . "</td>
                            <td>" . $row['name'] . "</td>
                            <td>" . $row['pName'] . "</td>
                            <td>" . $row['quantity'] . "</td>
                            <td>" . $row['location'] . "</td>
                            <td>" . $row['order_date'] . "</td>
                            <td>" . $row['order_time'] . "</td>
                            <td>                                 
                              <form  action='agent.php' method ='post'>											
                              <input type='hidden' value='" . $row['orderId'] . "' name='id'>                              
                              <button type='submit' name='save' class='btn bg-warning btn-md btn-flat'>Assign agent</button>
                              </form> 
                            </td>
                            
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
$(function(){
 
  $(document).on('click', '.confirm', function(e){
    e.preventDefault();
    $('#confirm').modal('show');
    var id = $(this).data('id');  
    getRow(id);  
  });

   $(document).on('click', '.reject', function(e){
    e.preventDefault();
    $('#reject').modal('show');
    var id = $(this).data('id');  
    getRow(id);  
  });


 

});

function getRow(id){
  $.ajax({
    type: 'POST',
    url: 'order_row.php',
    data: {id:id},
    dataType: 'json',
    success: function(response){
     
      $('.name').html(response.orderNo);
      $('.orderId').val(response.orderId);
      
    }
  });
}

</script>
<!-- table script -->
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": [/*"copy", "csv", "excel", "pdf", "print", "colvis"*/]
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
