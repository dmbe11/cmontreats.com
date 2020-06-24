<!doctype html>
<html>

<head>
	<script src="../dmxAppConnect/dmxAppConnect.js"></script>
	<meta charset="UTF-8">
	<title>C'MoN Catalog</title>
	<script src="../js/jquery-3.4.1.slim.min.js"></script>
	<link rel="stylesheet" href="../fontawesome4/css/font-awesome.min.css" />
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" href="../bootstrap/4/css/bootstrap.min.css" />
	<script src="../dmxAppConnect/dmxBootstrap4Navigation/dmxBootstrap4Navigation.js" defer=""></script>
	<script src="../dmxAppConnect/dmxDatastore/dmxDatastore.js" defer=""></script>
	<script src="../dmxAppConnect/dmxBootstrap4Modal/dmxBootstrap4Modal.js" defer=""></script>
	<link rel="stylesheet" href="../dmxAppConnect/dmxBootstrap4TableGenerator/dmxBootstrap4TableGenerator.css" />
	<script src="../dmxAppConnect/dmxTyped/dmxTyped.js" defer=""></script>
	<script src="../dmxAppConnect/dmxTyped/typed.min.js" defer=""></script>
	<script src="../dmxAppConnect/dmxFormatter/dmxFormatter.js" defer=""></script>
</head>



<body is="dmx-app" id="cmonStore">
	<?php include '../navbar.php'; ?>
	<section>
		<dmx-serverconnect id="serverconnectscProducts" url="../dmxConnect/api/checkout/checkoutSM.php"></dmx-serverconnect>
		<div class="container">
			<div class="row">
				<div class="col mt-lg-3 mb-lg-3">
					<button id="btn4" class="btn btn-outline-info" dmx-on:click="modal1.show()">Shopping Cart: {{cart.data.sum(`quantity`)}}</button>
				</div>
			</div>
			<div class="row" is="dmx-repeat" id="repeat1" dmx-bind:repeat="serverconnectscProducts.data.query1">
				<div class="col">
					<div class="card">
						<div class="card-body">
							b<img class="card-img-top" alt="Card image cap" dmx-bind:src="pictureURL">
							<h4 class="card-title text-primary font-weight-bolder" dmx-text="name">{{name}}</h4>
							<p class="card-text" dmx-text="Description">{{Description}}</p>
						</div>

					</div>
				</div>
			</div>
			<button id="btn1" class="btn">Add to Cart</button>
		</div>
	</section>


	<script src="../bootstrap/4/js/popper.min.js"></script>
	<script src="../bootstrap/4/js/bootstrap.min.js"></script>
</body>

</html>