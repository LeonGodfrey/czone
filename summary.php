

<?php include 'includes/session.php'; ?>
<?php include 'includes/header.php'; ?>
<body  class="hold-transition layout-top-nav layout-navbar-fixed">
	<div class="wrapper">

		<?php include 'includes/navbar.php'; ?>

		<div style="background-color:#fff;" class="content-wrapper">
			<div class="container">

				<!-- Content Header (Page header) -->
				<section class="content-header">
					<div class="container-fluid">
						<div class="row mb-2">
							<div class="col-sm-6">
								<h1>Your Order.</h1>
							</div>
							<div class="col-sm-6">
								<ol class="breadcrumb float-sm-right">
									<li class="breadcrumb-item"><a href="cart_view.php">cart</a></li>
									<li class="breadcrumb-item"><a href="checkout.php">checkout</a></li>
									
								</ol>
							</div>
						</div>
					</div><!-- /.container-fluid -->
				</section>

				<!-- Main content -->
				<section class="content">

					<div class="container-fluid">
						<div class="row">
							<div class="col-md-12">
								<div class="card card-warning">
									<div class="card-header">
										<h3 class="card-title">
											<i class="fas fa-check"></i>
											YOUR ORDER
										</h3>
									</div>
									<div class="card-body table-responsive p-0">
										<table class="table table-hover text-nowrap">
											<thead>
												<tr>                  
													<th>Name</th>													
													<th>Price</th>
													<th>Quantity</th>
													<th>Subtotal</th>
												</tr>
											</thead>
											<tbody>
												<!-- fech cart -->
												<?php
												$output = ''; 
												try{

													$total = 0;
													$stmt = $conn->prepare("SELECT *, cart.cartId AS cartid, product.photo AS pPhoto, cart.quantity AS count FROM cart LEFT JOIN product ON product.pId=cart.pId WHERE cart.userId=:user");

													$stmt->execute(['user'=>$user['userId']]);
													foreach($stmt as $row){
														
														$subtotal = $row['price']*$row['count'];
														$total += $subtotal;
														$output .= "
														<tr>

														<td>".$row['pName']."</td>
														
														<td>UGX ".number_format($row['price'], 2)."</td>
														<td>".$row['count']."</td>

														<td>UGX ".number_format($subtotal, 2)."</td>
														</tr>
														";
													}
													$output .= "
													<tr>
													<td colspan='3' align='right'>Total</td>
													
													<td><b>UGX ".number_format($total, 2)."</b></td>

													</tr>
													";
													echo $output;

													

												}
												catch(PDOException $e){
													$output .= $e->getMessage();
													echo $output;
												}

												?>
												<!-- end cart -->

											</tbody>
										</table>
									</div>
									<!-- /.card -->
								</div>
								<div class="card card-warning">
									<div class="card-header">
										<h3 class="card-title">
											<i class="fas fa-check"></i>
											YOUR LOCATION
										</h3>
									</div>
									<div class="card-body">
										
										<p>Products will be delivered to <?php echo $user['name'];?></p>
										<p><?php echo $user['location'];?></p>
										<p><?php echo $user['email'];?></p>
										<p><?php echo $user['phone'];?></p>

									</div>
									<!-- /.card -->
								</div>          

								<div class="card s-warning">
									<form action="confirmed.php" method="POST" style="width:100%;">
										
										<center><button type="submit" value="yes" 
										name="placeOrder" class="btn-lg bg-warning" style="width:100%;"><b>CONFIRM ORDER</b></button></center>
										
									</form>
								</div>
							</div>
							<!-- /.card -->
						</section>
						<!-- /.content -->
					</div>
				</div>
			</div>
			<?php include 'includes/scripts.php'; 
			unset($_POST['delivery']);
			?>
		</body>
		</html>
	