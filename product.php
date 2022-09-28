<?php include 'includes/session.php'; ?>
<?php
$conn = $pdo->open();

$id = $_GET['product'];

try {

	$stmt = $conn->prepare("SELECT *, product.pName AS prodname, product.pId AS prodid FROM product WHERE pId = :id");
	$stmt->execute(['id' => $id]);
	$product = $stmt->fetch();
} catch (PDOException $e) {
	echo "There is some problem in connection: " . $e->getMessage();
}


?>
<?php include 'includes/header.php'; ?>

<body class="hold-transition skin-blue layout-top-nav">

	<div class="wrapper">

		<?php include 'includes/navbar.php'; ?>

		<div class="content-wrapper">
			<div class="container">

				<!-- Main content -->
				<section class="content">

					<!-- Default box -->
					<div class="card card-solid">
						<div class="card-header">
							<h2 class="d-inline-block">Product details</h2>
						</div>
						<div class="card-body">
							<div class="callout s-warning" id="callout" style="display:none">
								<button type="button" class="close"><span aria-hidden="true">&times;</span></button>
								<span class="message"></span>
							</div>


							<div class="row">


								<div class="col-12 col-sm-6">

									<div class="col-12">
										<!-- <img src="../../dist/img/prod-1.jpg" class="product-image" alt="Product Image"> -->
										<img src="<?php echo (!empty($product['photo'])) ? 'images/' . $product['photo'] : 'images/noimage.jpg'; ?>" class="product-image" alt="Product Image">
									</div>

								</div>
								<div class="col-12 col-sm-6">

									<h2 class="my-3"><b>Name</b></h2>
									<h3><?php echo $product['prodname']; ?></h3>
									<h3 class="my-3"><b>Description</b></h3>
									<h5><?php echo $product['pDesc']; ?></h5>

									<hr>
									<div class="bg-warning py-2 px-3 mt-4">
										<h3 class="mb-0">
											<b>UGX <?php echo number_format($product['price'], 1); ?></b>
										</h3>

									</div>

								</div>
							</div>

						</div>
					</div>
					<!-- /.card-body -->
			</div>
			<!-- /.card -->
			<!-- <?php include 'includes/scroll_btn.php'; ?> -->
			</section>

		</div>
	</div>
	<?php $pdo->close(); ?>
	<?php include 'includes/footer.php'; ?>
	</div>

	<?php include 'includes/scripts.php'; ?>
	
</body>

</html>