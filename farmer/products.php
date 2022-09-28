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
            <h1>Products Available In Stock</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">products</li>
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
              <h4><i class='icon fa fa-warning'></i> Error!</h4>
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
      <div class="row">
        <div class="col-12">
          <div class="card">
              <div class="card-header">
              <a href="products_ad.php" class="btn btn-primary btn-sm btn-flat" ><i class="fas fa-plus"></i> New</a>
              
            </div>
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                  <th>Name</th>
                  <th>Photo</th>
                  <th>Description</th>
                  <th>Price</th>
                  <th>Remaining</th>                  
                  <th>Action</th>
                </thead>
                <tbody>
                  <?php
                    $conn = $pdo->open();

                    try{
                      
                      $stmt = $conn->prepare("SELECT * FROM product where userId= :id");
                      $stmt->execute(['id'=>$farmer['userId']]);
                      foreach($stmt as $row){
                        $image = (!empty($row['photo'])) ? '../images/'.$row['photo'] : '../images/noimage.jpg';
                        
                        echo "
                          <tr>
                            <td>".$row['pName']."</td>
                            <td>
                              <img src='".$image."' alt='photo' height='30px' width='30px'>                              
                            </td>
                            <td>".$row['pDesc']."</td>
                            <td>UGX ".number_format($row['price'], 2)."</td>
                            <td>".$row['quantity']."</td>
                            
                            <td>
                              <button class='btn btn-success btn-sm edit btn-flat' data-id='".$row['pId']."'><i class='fa fa-edit'></i> Edit</button>
                              <button class='btn btn-danger btn-sm delete btn-flat' data-id='".$row['pId']."'><i class='fa fa-trash'></i> Delete</button>
                            </td>
                          </tr>
                        ";
                      }
                    }
                    catch(PDOException $e){
                      echo $e->getMessage();
                    }

                    $pdo->close();
                  ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div> 
    </section>
     
  </div>
  	<?php include 'includes/footer.php'; ?>
    <?php include 'includes/products_modal2.php'; ?>
   

</div>
<!-- ./wrapper -->

<?php include 'includes/scripts.php'; ?>

<script>
$(function(){
  $(document).on('click', '.edit', function(e){
    e.preventDefault();
    $('#edit').modal('show');
    var id = $(this).data('id');
    getRow(id);
  });

  $(document).on('click', '.delete', function(e){
    e.preventDefault();
    $('#delete').modal('show');
    var id = $(this).data('id');
    getRow(id);
  });

 
});

function getRow(id){
  $.ajax({
    type: 'POST',
    url: 'products_row.php',
    data: {id:id},
    dataType: 'json',
    success: function(response){      
      $('.prodid').val(response.prodid);    
      $('#edit_quantity').val(response.quantity);
      $('#edit_name').val(response.prodname);      
      $('#edit_price').val(response.price);
      $('#desc1').val(response.pDesc);  
    }
  });
}

</script>

<!-- table script -->
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": [/*"copy", "csv", "excel", "pdf", "print", "colvis" */]
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
