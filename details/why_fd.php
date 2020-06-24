<!doctype html>
<html>

<head>
	<script src="../dmxAppConnect/dmxAppConnect.js"></script>
	<meta charset="UTF-8">
	<title>Benefits</title>
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous" />
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<script src="../dmxAppConnect/dmxBootstrap4Navigation/dmxBootstrap4Navigation.js" defer=""></script>
	<link rel="stylesheet" href="css/style.css" />
	<script src="../dmxAppConnect/dmxBackgroundVideo/dmxBackgroundVideo.js" defer=""></script>
	<link rel="stylesheet" href="../bootstrap/4/css/bootstrap.min.css" />
	<link rel="stylesheet" href="../dmxAppConnect/dmxAnimateCSS/animate.min.css" />
	<script src="../dmxAppConnect/dmxAnimateCSS/dmxAnimateCSS.js" defer=""></script>
	<script src="../dmxAppConnect/dmxCharts/Chart.min.js" defer=""></script>
	<script src="../dmxAppConnect/dmxCharts/dmxCharts.js" defer=""></script>
</head>

<body id="cmonTemplate" is="dmx-app">
	<dmx-serverconnect id="serverconnect1" url="../dmxConnect/api/ChartData_storagetimes.php"></dmx-serverconnect>
	<header class="text-primary">
		<div class="container-sm bg-transparent text-primary">
			<div class="row bg-transparent">
				<div class="bg-transparent col-xl">
					<?php include '../navbar.php'; ?>
				</div>
			</div>
		</div>
	</header>
	<main class="bg-transparent container">

		<section class="bg-transparent w-100">
			<div class="row bg-transparent">
				<div class="col bg-transparent">
					<section>
						<div class="container text-primary">
							<div class="row">
								<div class="col">
									<h1 class="text-primary text-center">Benefits of C'MoN Gourmet Treats</h1>
									<p class="text-light">All C'MoN Gourmet Treats are single ingredient and freeze dried with a remarkably long shelf life and can be stored for 25 or more years. Once opened the contents can last up to 12 months
										when stored in the original container, in a cool location.</p>
								</div>
							</div>
						</div>
					</section>
					<dmx-chart id="chart1" width="400" height="300" responsive point-size="" type="horizontalBar" multicolor thickness="6" dmx-bind:data="serverconnect1.data.dataStorageQuery" labels="storageProcess" dataset-1:value="years"
						colors="colors3" dataset-1:label="Years" legend="left">
					</dmx-chart>
				</div>
			</div>
			</div>
		</section>
	</main>
	<section class="mt-1">
		<div class="container">
			<div class="row">
				<div class="col">
					<h3 class="text-primary">REASONS TO SWITCH TO C'MoN FREEZE-DRIED RAW TREATS</h3>
					<ul class="list-group list-group-flush">
						<li class="list-group-item bg-light">C'MoN treats are preserved without the use of chemicals and is a result of the freeze drying process.</li>
						<li class="list-group-item bg-dark">C'MoN treats contain single ingredients, eliminating many of the allergies many dogs experience. With each additional ingredient the change of an allergy doubles.</li>
						<li class="list-group-item bg-light">With C'MoN treats you are not paying for water weight.&nbsp; Our treats contain a maximum of 3% water.</li>
						<li class="list-group-item bg-dark">While many freeze-dried treats are expensive, C'MoN Does everything possible to keep out prices low while still using the best possible ingredients.</li>
						<li class="list-group-item bg-light">C'MoN treats a safe version of raw for your Dog, because the freeze-drying process eliminates potential food pathogens.</li>
						<li class="list-group-item bg-dark">C'MoN treats are portable, lightweight, and easy to store, without refrigeration.</li>
					</ul>
					<p></p>
					<?php require '../likeFacebook.php'; ?>
				</div>
			</div>
		</div>
	</section>
	<section class="bg-transparent mt-3">
		<div class="container bg-transparent">
			<div class="row bg-transparent">
				<div class="col bg-transparent">
					<footer class="bg-transparent">
						<?php include '../navbarFoot.php'; ?>
					</footer>
				</div>
			</div>
		</div>
	</section>
	<script src="../bootstrap/4/js/popper.min.js"></script>
	<script src="../bootstrap/4/js/bootstrap.min.js"></script>
</body>

</html>