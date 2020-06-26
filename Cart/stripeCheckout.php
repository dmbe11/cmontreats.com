<!doctype html>
<html>

<head>
	<script src="../dmxAppConnect/dmxAppConnect.js"></script>
	<meta charset="UTF-8">
	<title>Checkout</title>
	<script src="../js/jquery-3.4.1.slim.min.js"></script>
	<link rel="stylesheet" href="../fontawesome4/css/font-awesome.min.css" />
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" href="../bootstrap/4/css/bootstrap.min.css" />
	<script src="../dmxAppConnect/dmxDatastore/dmxDatastore.js" defer=""></script>
	<link rel="stylesheet" href="../dmxAppConnect/dmxBootstrap4TableGenerator/dmxBootstrap4TableGenerator.css" />
</head>

<body is="dmx-app" id="store">
	<?php include '../navbar.php'; ?>
	<dmx-datastore id="cart"></dmx-datastore>
	<section>
		<div class="container">
			<div class="row">
				<div class="col">
					<table class="table">
						<thead>
							<tr>
								<th>$id</th>
								<th>Prd</th>
								<th>Prd name</th>
								<th>Prd price</th>
								<th>Quantity</th>
							</tr>
						</thead>
						<tbody is="dmx-repeat" dmx-generator="bs4table" dmx-bind:repeat="cart.data" id="tableRepeat1">
							<tr>
								<td dmx-text="$id"></td>
								<td dmx-text="prd_id"></td>
								<td dmx-text="prd_name"></td>
								<td dmx-text="prd_price"></td>
								<td dmx-text="quantity"></td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</section>
	<script src="../bootstrap/4/js/popper.min.js"></script>
	<script src="../bootstrap/4/js/bootstrap.min.js"></script>
</body>

</html>