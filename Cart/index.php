<!doctype html>
<html>

<head>
	<script src="../dmxAppConnect/dmxAppConnect.js"></script>
	<meta charset="UTF-8">
	<title>Products</title>
	<script src="../js/jquery-3.4.1.slim.min.js"></script>
	<link rel="stylesheet" href="../fontawesome4/css/font-awesome.min.css" />
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" href="../bootstrap/4/css/bootstrap.min.css" />
	<script src="../dmxAppConnect/dmxDatastore/dmxDatastore.js" defer=""></script>
	<script src="../dmxAppConnect/dmxBootstrap4Modal/dmxBootstrap4Modal.js" defer=""></script>
</head>

<body is="dmx-app" id="index">
	<div class="modal" id="modal1" is="dmx-bs4-modal" tabindex="-1" role="dialog">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h2 class="modal-title">Shopping Cart</h2>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<p>Modal body text goes here.</p>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Continue Shopping</button>
					<a href="stripeCheckout.php" class="btn btn-primary">Checkout</a>
				</div>
			</div>
		</div>
	</div>
	<dmx-datastore id="cart"></dmx-datastore>
	<dmx-serverconnect id="products" url="../dmxConnect/api/cart/scProducts.php"></dmx-serverconnect>
	<?php include '../navbar.php'; ?><section>

		<div class="row">
			<div class="col" id="myCards" dmx-repeat:cardrepeat="products.data.productQuery">
				<div class="card">
					<img class="card-img-top" alt="Card image cap" dmx-bind:src="pictureURL">
					<div class="card-body text-center">
						<h4 class="card-title text-left">{{name}}</h4>
						<p class="card-text text-left">
							{{Description}}</p>
						<button id="addCart" class="btn btn-outline-dark" dmx-on:click="cart.upsert({prd_id: id},{prd_id: id, prd_name: name, prd_price: price, quantity: quantity+'+1'});modal1.show()">Add to Cart</button>
					</div>
				</div>
			</div>
		</div>
		</div>
	</section>
	<div class="container-lg mt-3 border rounded border-dark bg-primary"><?php include '../likeFacebook.php'; ?></div>

	<script src="../bootstrap/4/js/popper.min.js"></script>
	<script src="../bootstrap/4/js/bootstrap.min.js"></script>
</body>

</html>