<?php
include 'includes/session.php';
include 'includes/format.php';
include 'includes/DbAccess.php';

$db = new DbAcess();
?>
<?php
$today = date('Y-m-d');
$year = date('Y');
if (isset($_GET['year'])) {
  $year = $_GET['year'];
}

$conn = $pdo->open();
?>
<?php
 include 'includes/header.php'; 

 $totalusers  = $db->selectQuery("SELECT COUNT(userId) AS total FROM user")[0]['total'];
 $totalorders  = $db->selectQuery("SELECT COUNT(orderId) AS total FROM porder")[0]['total'];
 $totalproducts  = $db->selectQuery("SELECT COUNT(pId) AS total FROM product")[0]['total'];
 $totalpayments  = $db->selectQuery("SELECT COUNT(id) AS total FROM payments")[0]['total'];
?>

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
							<h1 class="m-0">Dashboard</h1>
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
			<section class="content home__content">
				<div class="container-fluid">

					<!--dummy--content-->
					<!-- Info boxes -->
					<div class="row">
						<div class="col-12 col-sm-6 col-md-3">
							<div class="info-box">
								<span class="info-box-icon bg-info elevation-1"><i class="fas fa-cog"></i></span>

								<div class="info-box-content">
									<span class="info-box-text">Total Users</span>
									<span class="info-box-number">
										<?= $totalusers ?>

									</span>
								</div>
								<!-- /.info-box-content -->
							</div>
							<!-- /.info-box -->
						</div>
						<!-- /.col -->
						<div class="col-12 col-sm-6 col-md-3">
							<div class="info-box mb-3">
								<span class="info-box-icon bg-danger elevation-1"><i class="fas fa-sort-amount-up-alt"></i></span>

								<div class="info-box-content">
									<span class="info-box-text">Total Products</span>
									<span class="info-box-number"><?=$totalproducts ?></span>
								</div>
								<!-- /.info-box-content -->
							</div>
							<!-- /.info-box -->
						</div>
						<!-- /.col -->

						<!-- fix for small devices only -->
						<div class="clearfix hidden-md-up"></div>

						<div class="col-12 col-sm-6 col-md-3">
							<div class="info-box mb-3">
								<span class="info-box-icon bg-success elevation-1"><i class="fas fa-handshake"></i></span>

								<div class="info-box-content">
									<span class="info-box-text">Total Orders</span>
									<span class="info-box-number"><?=$totalorders ?></span>
								</div>
								<!-- /.info-box-content -->
							</div>
							<!-- /.info-box -->
						</div>
						<!-- /.col -->
						<div class="col-12 col-sm-6 col-md-3">
							<div class="info-box mb-3">
								<span class="info-box-icon bg-danger elevation-1"><i class="fas fa-money-check"></i></span>

								<div class="info-box-content">
									<span class="info-box-text">Total Payments</span>
									<span class="info-box-number"><?=$totalpayments ?></span>
								</div>
								<!-- /.info-box-content -->
							</div>
							<!-- /.info-box -->
						</div>
						<!-- /.col -->
					</div>
					<!-- /.row -->

					<div class="row">
						<div class="col-md-12">
							<div class="card">
								<div class="card-header">
									<h5 class="card-title">Daily  Report</h5>

									<div class="card-tools">
										<button type="button" class="btn btn-tool" data-card-widget="collapse">
											<i class="fas fa-minus"></i>
										</button>
										<div class="btn-group">
											<button type="button" class="btn btn-tool dropdown-toggle" data-toggle="dropdown">
												<i class="fas fa-wrench"></i>
											</button>
											<div class="dropdown-menu dropdown-menu-right" role="menu">
											</div>
										</div>
									</div>
								</div>
								<!-- /.card-header -->
								<div class="card-body">
									<div class="row">
										<div class="col-md-6">
											<!-- <p class="text-center">
												<strong>Boda Details: <?php echo date("D/M/Y"); ?></strong>
											</p> -->

											<div class="chart">
												<!-- Sales Chart Canvas -->
												<canvas id="userId" height="180" style="height: 180px;"></canvas>
											</div>
											<!-- /.chart-responsive -->
										</div>
										<!-- /.col -->
										<div class="col-md-6">
											<p class="text-center">
												<strong>Payment Statuses</strong>
											</p>

											<canvas id="paymentId" height="150" style="height: 150px;"></canvas>

											<!-- <div class="progress-group">
												Expected fuel Consumption Today
												<span class="float-right"><b>160</b>/200</span>
												<div class="progress progress-sm">
													<div class="progress-bar bg-primary" style="width: 80%"></div>
												</div>
											</div> -->
											<!-- /.progress-group -->
											<!-- 
											<div class="progress-group">
												Complete Purchase
												<span class="float-right"><b>400</b>/400</span>
												<div class="progress progress-sm">
													<div class="progress-bar bg-danger" style="width: 75%"></div>
												</div>
											</div> -->

											<!-- /.progress-group -->
											<!-- <div class="progress-group">
												<span class="progress-text">Visit Premium Page</span>
												<span class="float-right"><b>480</b>/800</span>
												<div class="progress progress-sm">
													<div class="progress-bar bg-success" style="width: 60%"></div>
												</div>
											</div> -->

											<!-- /.progress-group -->
											<div class="progress-group">
												<!-- Send Inquiries
												<span class="float-right"><b>250</b>/500</span>
												<div class="progress progress-sm">
													<div class="progress-bar bg-warning" style="width: 50%"></div>
												</div> -->
											</div>
											<!-- /.progress-group -->
										</div>
										<!-- /.col -->
									</div>
									<!-- /.row -->
								</div>

							</div>
							<!-- /.card -->
						</div>
						<!-- /.col -->

						<!--stages-->
						<div class="col-md-12">
							<div class="card">
								<div class="card-header">
									<h5 class="card-title">Daily Order Report</h5>

									<div class="card-tools">
										<button type="button" class="btn btn-tool" data-card-widget="collapse">
											<i class="fas fa-minus"></i>
										</button>
										<div class="btn-group">
											<button type="button" class="btn btn-tool dropdown-toggle" data-toggle="dropdown">
												<i class="fas fa-wrench"></i>
											</button>
											<div class="dropdown-menu dropdown-menu-right" role="menu">



											</div>
										</div>
									</div>
								</div>
								<!-- /.card-header -->
								<div class="card-body">
									<div class="row">
										<div class="col-md-6">
											<!-- <p class="text-center">
												<strong>Boda Details: <?php echo date("D/M/Y"); ?></strong>
											</p> -->

											<div class="chart">
												<!-- Sales Chart Canvas -->
												<canvas id="orderId" height="180" style="height: 180px;"></canvas>
											</div>
											<!-- /.chart-responsive -->
										</div>
										<!-- /.col -->
										<div class="col-md-6">
											<!-- <p class="text-center">
												<strong>Expected fuel Consumption</strong>
											</p> -->

											<canvas id="fuelconsumption" height="150" style="height: 150px;"></canvas>

											<!-- <div class="progress-group">
												Expected fuel Consumption Today
												<span class="float-right"><b>160</b>/200</span>
												<div class="progress progress-sm">
													<div class="progress-bar bg-primary" style="width: 80%"></div>
												</div>
											</div> -->
											<!-- /.progress-group -->
											<!-- 
											<div class="progress-group">
												Complete Purchase
												<span class="float-right"><b>400</b>/400</span>
												<div class="progress progress-sm">
													<div class="progress-bar bg-danger" style="width: 75%"></div>
												</div>
											</div> -->

											<!-- /.progress-group -->
											<!-- <div class="progress-group">
												<span class="progress-text">Visit Premium Page</span>
												<span class="float-right"><b>480</b>/800</span>
												<div class="progress progress-sm">
													<div class="progress-bar bg-success" style="width: 60%"></div>
												</div>
											</div> -->

											<!-- /.progress-group -->
											<div class="progress-group">
												<!-- Send Inquiries
												<span class="float-right"><b>250</b>/500</span>
												<div class="progress progress-sm">
													<div class="progress-bar bg-warning" style="width: 50%"></div>
												</div> -->
											</div>
											<!-- /.progress-group -->
										</div>
										<!-- /.col -->
									</div>
									<!-- /.row -->
								</div>

							</div>
							<!-- /.card -->
						</div>
						<!--stages-->
					</div>
					<!-- /.row -->


					<!-- Main row -->

				</div>
				<!-- /.card -->
		</div>
		<!-- /.col -->
	</div>
	<!-- /.row -->

	</section>
	<!-- /.content -->
	</div>
	<!-- /.content-wrapper -->

  
  <?php include 'includes/footer.php'; ?>
  </div>
  <!-- ./wrapper -->
  <!-- Control Sidebar -->
	<aside class="control-sidebar control-sidebar-dark">
		<!-- Control sidebar content goes here -->
	</aside>
	<!-- /.control-sidebar -->
	</div>
	<!-- ./wrapper -->

  <?php include 'includes/scripts.php'; ?>
  
</body>

<script>
		//alert("here");
		//var chartArray = [];

		//bodadetails
		let bodaLabels = ['Farmers', 'Agents', 'Admin', 'Customers'];
		var bodaUrl = "userchart.php";
		var chartBodaArray = [];
		var bodaId = "userId";
		var backgroundColors = ['green', 'blue', 'yellow', 'orange'];
		var borderColors = ['green', 'blue', 'yellow', 'orange'];
		//bodadetails
		//fetchconsumption
		let fuelLabels = ['Pending Payments', 'Completed Payments', 'Failed Payments'];
		let fuelUrl = "paymentschart.php";
		let fuelId = "paymentId";
		let fuelBackGroundColors = ['orange', 'green', 'red'];
		let fuelBorderColors = ['orange', 'green', 'red'];
		let fuelArray = [];
		//fetchconsumption

		//fetchstages
		let stageLabels = ['Placed Orders', 'Assigned Orders'];
		let stageUrl = "orderchart.php";
		let stageId = "orderId";
		let stageBackGroundColors = ['green', 'blue'];
		let stageBorderColors = ['green', 'blue', ];
		let stageArray = [];
		//fetchstages

		$(document).ready(function() {
			fetchChartData(bodaLabels, bodaUrl, chartBodaArray, bodaId, backgroundColors, borderColors);
			fetchChartData(fuelLabels, fuelUrl, fuelArray, fuelId, fuelBackGroundColors, fuelBorderColors);
			fetchChartData(stageLabels, stageUrl, stageArray, stageId, stageBackGroundColors, stageBorderColors);

			function fetchChartData(labels, url, chartArray, id, backGroundColors, borderColors) {
				$.ajax({
					url: url,
					method: "POST",
					data: {
						action: "fetch"
					},
					dataType: "json",
					success: function(data) {
						//alert(data[0])
						//alert(data);
						//alert(data)
						//console.log(data);
						for (let index = 0; index < data.length; index++) {
							chartArray.push(data[index].data)
							//alert(data[index]);


						}
						const ctx = document.getElementById(id).getContext('2d');
						const myChart = new Chart(ctx, {
							type: 'pie',
							data: {
								labels: labels,
								datasets: [{
									label: '# of Votes',
									data: chartArray,
									backgroundColor: backGroundColors,
									borderColor: borderColors,
									borderWidth: 1
								}]
							},
							options: {
								scales: {
									y: {
										beginAtZero: true
									}
								}
							}
						});

					}
				})

			}




		});
	</script>

	<script>
		// var fuelArray = [];

		// $(document).ready(function() {
		// 	$.ajax({
		// 		url: "fuelconsumption.php",
		// 		method: "POST",
		// 		data: {
		// 			action: "fetch"
		// 		},
		// 		dataType: "json",
		// 		success: function(data) {
		// 			//alert("here")
		// 			//console.log(data);

		// 			// console.log(data);
		// 			for (let index = 0; index < data.length; index++) {
		// 				fuelArray.push(data[index].amount)
		// 				//alert(data[index]);


		// 			}
		// 			//fuelconsumption
		// 			const ctx1 = document.getElementById('fuelconsumption').getContext('2d');
		// 			const myChart1 = new Chart(ctx1, {
		// 				type: 'pie',
		// 				data: {
		// 					labels: ['Expected Fuel Consumption', 'Consumed Fuel', ],
		// 					datasets: [{
		// 						label: '# of Votes',
		// 						data: fuelArray,
		// 						backgroundColor: [
		// 							'green',
		// 							'red',

		// 						],
		// 						borderColor: [
		// 							'green',

		// 							'red',

		// 						],
		// 						borderWidth: 1
		// 					}]
		// 				},
		// 				options: {
		// 					scales: {
		// 						y: {
		// 							beginAtZero: true
		// 						}
		// 					}
		// 				}
		// 			});



		// 		}
		// 	})

		// })
	</script>


</html>