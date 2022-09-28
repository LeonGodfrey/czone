<?php include 'includes/session.php'; ?>
<?php
//check if order is comfirmed
if (!(isset($_POST['placeOrder']))) {

	header('location: summary.php');
} else {
	$output1 = "hello";
	$order_date = date("Y-m-d");
	$order_time = date("h:i:s A");

	try {
		$total = 0;
		$stmt = $conn->prepare("SELECT *, cart.cartId AS cartid, cart.quantity AS qty, product.userId AS userIdF FROM cart LEFT JOIN product ON product.pId=cart.pId WHERE cart.userId=:user");
		$stmt->execute(['user' => $user['userId']]);		
		
		foreach ($stmt as $row) {
			//send individual orders
			try {
				$amount = $row['price'] * $row['qty'];
				//generate order number
				$orderNo = "cz" .rand(2001,9001);
				//insert into order

				$stmt = $conn->prepare("INSERT INTO pOrder (amount, orderNo, userIdC, userIdF, status, pName, price, quantity,order_date, order_time) VALUES (:amount, :orderNo, :userIdC, :userIdF, :status, :productName, :price, :quantity, :order_date, :order_time)");

				$stmt->execute(['amount' => $amount, 'orderNo' => $orderNo, 'userIdC' => $user['userId'], 'userIdF' => $row['userIdF'], 'status' => 'placed', 'productName' => $row['pName'], 'price' => $row['price'], 'quantity' => $row['qty'], 'order_date' => $order_date, 'order_time' => $order_time]);

				//subtract quantity from products
				$stmt1 = $conn->prepare("UPDATE product SET quantity = quantity - :quantity WHERE pId = :pId");
				$stmt1->execute(['quantity' => $row['qty'], 'pId' => $row['pId']]);
			} catch (PDOException $e) {
				$output1 .= $e->getMessage();
				//echo $output1;
				//exit();
			}

			//delete item from cart
			try {
				$stmt = $conn->prepare("DELETE FROM cart WHERE cartId=:id");
				$stmt->execute(['id' => $row['cartId']]);
			} catch (PDOException $e) {
				$output1 .= $e->getMessage();
				//echo $output1;
				//exit();
			}
		}
	} catch (PDOException $e) {
		$output1 .= $e->getMessage();
		//echo $output1;
		//exit();
	}
	

}

?>


<?php include 'includes/header.php'; ?>

<body class="hold-transition skin-blue layout-top-nav">
	<div class="wrapper">

		<?php include 'includes/navbar.php'; ?>

		<div style="background-color:#fff;" class="content-wrapper">
			<div class="container">

				<!-- Content Header (Page header) -->
				<section class="content-header">
					<div class="container-fluid">
						<div class="row mb-2">
							<div class="col-sm-6">
								<h1>Success</h1>
							</div>
							<div class="col-sm-6">
								<ol class="breadcrumb float-sm-right">

									<li class="breadcrumb-item active">Order Information</li>
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
											Info...
										</h3>
									</div>
									<div class="card-body">

										<p style="font-size:20px;"> <h3>Your order has been placed </h3></p>
										<p>Wait for delivery.</p>
										<h2>Continue <a href="index.php" class="info">Shopping</a> or to <a href="customer/home.php" class="info">Dashboard</a>!</h2>
									</div>
									<!-- /.card -->
								</div>
							</div>
							<!-- /.card -->
				</section>
				<!-- /.content -->
			</div>
		</div>
	</div>

	<?php include 'includes/scripts.php'; ?>
</body>
<?php include 'includes/footer.php'; ?>

</html>