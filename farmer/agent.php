<?php include 'includes/session.php'; ?>

<?php include 'includes/header.php'; 
?>

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
                            <h1>Profile</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Agent</li>
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
              <h4><i class='icon fa fa-warning'></i> Error!</h4>
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
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                   <p>Assign delivery agent.</p>

                                </div>
                                
                                <div class="card-body">
                                    <form class="form-horizontal" method="POST" action="agent1.php" enctype="multipart/form-data">
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <!-- text input -->
                                                <div class="form-group">                                                
                                                    <input type="hidden" value="<?php echo $_POST['id'];?>" name="id">
                                                    <label>Select agent</label>                                                  
                                                    <select name="agent" class="form-control">  
                                                        <option>Select agent</option>
                                                        <?php
                                                        $stmt = $conn->prepare("SELECT * from user where type = :type");
                                                        $stmt->execute(['type'=>'agent']);
                                                        foreach($stmt as $row){
                                                          echo '<option value="'.$row['userId'].'"  >'.$row['name'].' located at '.$row['location'].'</option>';
                                                        }
                                                        ?>            
                                                        
                                                       
                                                    </select>                                             
                                                    
                                                </div>
                                            </div>
                                            
                                
                            <!-- end form body -->

                        </div>

                        <button type="submit" class="btn btn-dark btn-flat" name="save"><i class="fa fa-check"></i> Assign</button>
                        </form>


                    </div>
                </div>
        </div>
    </div>
    </div>
    </section>

    </div>
    <?php include 'includes/footer.php'; ?>
    </div>
    <!-- ./wrapper -->

    <?php include 'includes/scripts.php'; ?>
</body>

</html>