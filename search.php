<?php include 'includes/session.php'; ?>
<?php include 'includes/header.php'; ?>

<body class="hold-transition layout-top-nav layout-navbar-fixed">
	<div class="wrapper">

		<?php include 'includes/navbar.php'; ?>

		<div class="content-wrapper">
			<div class="container">

				<!-- Main content -->
				<section class="content">


					<?php

					$conn = $pdo->open();

					$stmt = $conn->prepare("SELECT COUNT(*) AS numrows FROM product WHERE pName LIKE :keyword");
					$stmt->execute(['keyword' => '%' . $_POST['keyword'] . '%']);
					$row = $stmt->fetch();
					if ($row['numrows'] < 1) {
						echo '<h1 class="page-header">No results found for <i>' . $_POST['keyword'] . '</i></h1>';
					} else {
						echo '<h1 class="page-header">Search results for <i>' . $_POST['keyword'] . '</i></h1>';
						try {
							$inc = 6;
							$stmt = $conn->prepare("SELECT * FROM product WHERE pName LIKE :keyword");
							$stmt->execute(['keyword' => '%' . $_POST['keyword'] . '%']);

							foreach ($stmt as $row) {
								$name = (strlen($row['pName']) > 19) ? substr_replace($row['pName'], '..', 19) : $row['pName'];
								$highlighted = preg_filter('/' . preg_quote($_POST['keyword'], '/') . '/i', '<b>$0</b>', $row['productName']);
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
					}

					$pdo->close();

					?>


				</section>

			</div>
		</div>

		<?php include 'includes/footer.php'; ?>
	</div>

	<?php include 'includes/scripts.php'; ?>
</body>

</html>