<?php include 'includes/session.php'; ?>
<?php include 'includes/header.php'; ?>

<body class="hold-transition layout-top-nav layout-navbar-fixed ">
	<div class="wrapper">
		<?php include 'includes/navbar.php'; ?>
		<br>

		<div style="background-color:#fff;" class="content-wrapper">
			<div class="container">

				<!-- Main content -->
				<section class="content">

					<div class="row">
						<!-- <div class='col-xs-12 col-sm-12 col-md-3 col-lg-3'>
							<p style="font-size:20px; background-color:yellow;">Chicken</p>
							<hr>
							<p style="font-size:20px; background-color:red;">Eggs</p>
							<hr>
							<p style="font-size:20px; background-color:black; color:#fff;">others</p>
							<hr>
					</div> -->
						<div class='col-xs-12 col-sm-12 col-md-12 col-lg-12'>
							<?php
							if (isset($_SESSION['error'])) {
								echo "
								<div class='alert alert-danger'>
								" . $_SESSION['error'] . "
								</div>
								";
								unset($_SESSION['error']);
							}
							?>
							<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
								<ol class="carousel-indicators">
									<li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
									<li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
									<li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
								</ol>
								<div class="carousel-inner">
									<div class="carousel-item active">
										<img class="d-block w-100" src="images/ban.jpg" alt="First slide">
									</div>
									<div class="carousel-item">
										<img class="d-block w-100" src="images/ban.jpg" alt="Second slide">
									</div>
									<div class="carousel-item">
										<img class="d-block w-100" src="images/ban.jpg" alt="Third slide">
									</div>
								</div>
								<a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
									<span class="carousel-control-custom-icon" aria-hidden="true">
										<i class="fas fa-chevron-left"></i>
									</span>
									<span class="sr-only">Previous</span>
								</a>
								<a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
									<span class="carousel-control-custom-icon" aria-hidden="true">
										<i class="fas fa-chevron-right"></i>
									</span>
									<span class="sr-only">Next</span>
								</a>
							</div>

							<!-- carousel end -->
						</div>
					</div>
					<h2 style="text-align: center;" class="dist_list">Products Available for Purchase. Just Click to Add to Cart</h2>
					<div class="row">					
						<?php
						$month = date('m');
						$conn = $pdo->open();

						try {
							$inc = 6;

							$stmt = $conn->prepare("SELECT * FROM product WHERE quantity > 0");
							$stmt->execute([]);

							foreach ($stmt as $row) {
								$image = (!empty($row['photo'])) ? 'images/' . $row['photo'] : 'images/noimage.jpg';
								$inc = ($inc == 6) ? 1 : $inc + 1;
								if ($inc == 1) echo "<div class='row'>";
								echo "
								<div class='col-6 col-xs-6 col-sm-4 col-md-3 col-lg-2'>
								<div class='card'>
								
								<div class='card-body'>																				
								<img src='" . $image . "' width='100%' height='auto'>
								<br>
								<br>
								<p>" . $row['pName'] . "</p>
								<b>UGX." . number_format($row['price'], 0) . "</b>
								
								<br>
								<br>
								<p>" . $row['quantity'] . " items left</p>

								<form class='form-inline productForm'>											
								<input type='hidden' value='" . $row['pId'] . "' name='id'>
								<input type='hidden' value='1' name='quantity'>
								<button type='submit' class='btn bg-warning btn-md btn-flat'>ADD TO CART</button>
								</form>														
								<a style='color:black;' href='product.php?product=" . $row['pId'] . "' class='btn'>VIEW</a>	
								</div>								
								</div>
								
								</div>
								";
								if ($inc == 6) echo "</div>";
							}
							if ($inc == 1) echo "<div class='col-6 col-xs-6 col-sm-4 col-md-3 col-lg-2'></div><div class='col-6 col-xs-6 col-sm-4 col-md-3 col-lg-2'></div><div class='col-6 col-xs-6 col-sm-4 col-md-3 col-lg-2'></div><div class='col-xs-6 col-sm-4 col-md-3 col-lg-2'></div><div class='col-6 col-xs-6 col-sm-4 col-md-3 col-lg-2'></div></div>";
							if ($inc == 2) echo "<div class='col-6 col-xs-6 col-sm-4 col-md-3 col-lg-2'></div><div class='col-6 col-xs-6 col-sm-4 col-md-3 col-lg-2'></div><div class='col-6 col-xs-6 col-sm-4 col-md-3 col-lg-2'></div><div class='col-6 col-xs-6 col-sm-4 col-md-3 col-lg-2'></div></div>";
							if ($inc == 3) echo "<div class='col-xs-6 col-sm-4 col-md-3 col-lg-2'></div><div class='col-6 col-xs-6 col-sm-4 col-md-3 col-lg-2'></div><div class='col-xs-6 col-sm-4 col-md-3 col-lg-2'></div></div>";
							if ($inc == 4) echo "<div class='col-6 col-xs-6 col-sm-4 col-md-3 col-lg-2'></div><div class='col-6 col-xs-6 col-sm-4 col-md-3 col-lg-2'></div></div>";
							if ($inc == 5) echo "<div class='col-6 col-xs-6 col-sm-4 col-md-3 col-lg-2'></div></div>";
						} catch (PDOException $e) {
							echo "There is some problem in connection: " . $e->getMessage();
						}

						$pdo->close();

						?>
					</div>

					<!-- map -->
					<div class="row">
						<div class="col-md-12 ">
							<div class="card-body">
								<iframe src="https://maps.google.com/maps?q=kampala&t=&z=13&ie=UTF8&iwloc=&output=embed" width="100%" height="200" frameborder="0" style="border:0" allowfullscreen></iframe>
							</div>
						</div>
					</div>
					<!-- map ends -->
				</section>

			</div>
		</div>

		<?php include 'includes/footer.php'; ?>
	</div>

	<?php include 'includes/scripts.php'; ?>
</body>

</html>