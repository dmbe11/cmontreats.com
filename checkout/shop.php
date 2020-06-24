<!doctype html>
<html>

<head>
	<script src="../dmxAppConnect/dmxAppConnect.js"></script>
	<meta charset="UTF-8">
	<title>Shop</title>
	<script src="../js/jquery-3.4.1.slim.min.js"></script>
	<link rel="stylesheet" href="../fontawesome4/css/font-awesome.min.css" />
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" href="../bootstrap/4/css/bootstrap.min.css" />
</head>

<body is="dmx-app" id="shopProducts">
	<dmx-serverconnect id="shopProducts" url="../dmxConnect/api/shop/shop_products.php"></dmx-serverconnect>
	<section>
		<div class="container-fluid">
			<div class="row">
				<div class="col">
					<?php include '../navbar.php'; ?>
				</div>
			</div>
		</div>
	</section>
	<section>
		<div class="container ml-xl-auto mr-xl-auto">
			<div class="row ml-xl-auto mr-xl-auto justify-content-xl-center justify-content-center row-cols-12" is="dmx-repeat" id="repeat1" dmx-bind:repeat="shopProducts.data.shopQ">
				<div class="align-self-xl-center col-md-6 col-lg-6 col-xl-6 col-12">
					<div class="card">
						<img class="card-img-top" alt="Card image cap" dmx-bind:src="pictureURL">
						<div class="card-body">
							<h4 class="card-title text-xl-center">{{name}}</h4>
							<p class="card-text text-xl-justify">
								{{Description}}</p>
							<button id="btn2" class="btn btn-outline-info text-xl-center align-self-xl-center"><a href="#" dmx-bind:href="buyurl">Select</a></button>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<script src="../bootstrap/4/js/popper.min.js"></script>
	<script src="../bootstrap/4/js/bootstrap.min.js"></script>
</body>

</html>