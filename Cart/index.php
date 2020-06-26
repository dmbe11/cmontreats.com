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
	<link rel="stylesheet" href="../dmxAppConnect/dmxBootstrap4TableGenerator/dmxBootstrap4TableGenerator.css" />
	<script src="../dmxAppConnect/dmxFormatter/dmxFormatter.js" defer=""></script>
</head>

<body is="dmx-app" id="store">
	<dmx-datastore id="cart"></dmx-datastore>
	<dmx-serverconnect id="products" url="../dmxConnect/api/cart/scProducts.php"></dmx-serverconnect>
	<div class="modal text-primary" id="modal1" is="dmx-bs4-modal" tabindex="-1" role="dialog">
		<div class="modal-dialog modal-lg" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h1 class="modal-title">Shopping Cart</h1>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<table class="table table-bordered table-dark">
						<thead>
							<tr class="text-center">
								<th>Product</th>
								<th>Price</th>
								<th class="w-25 h-25">Quantity</th>
								<th class="text-right w-25">Action</th>
							</tr>
						</thead>
						<tbody is="dmx-repeat" dmx-generator="bs4table" dmx-bind:repeat="cart.data" id="tableRepeat2" class="table-dark">
							<tr class="text-center text-white">
								<td dmx-text="cart.data[0].prd_name"></td>
								<td dmx-text="cart.data[0].prd_price"></td>
								<td dmx-text="cart.data[0].quantity" class="w-auto table-dark"></td>
								<td class="text-right h-25">
									<button id="btn1" class="btn bg-warning"><i class="fa fa-minus-square-o"></i></button>
									<button id="btn2" class="btn bg-success"><i class="fa fa-plus-square-o"></i></button>
									<button id="btn3" class="btn bg-danger"><i class="fa fa-trash-o"></i></button>
								</td>
							</tr>
						</tbody>
					</table>
					<p class="text-right">Total Amount: {{cart.data.sum(`prd_price*quantity`)}}</p>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Continue Shopping</button>
					<a href="stripeCheckout.php" class="btn btn-primary">Checkout</a>
				</div>
			</div>
		</div>
	</div>


	<?php include '../navbar.php'; ?><section>
		<div class="container">
			<button id="btn4" class="btn btn-outline-primary mb-1" dmx-on:click="modal1.show()">Shopping Cart: {{cart.data.sum(`quantity`)}}</button>
		</div>

		<div class="row">
			<div class="col" id="myCards" dmx-repeat:cardrepeat="products.data.productQuery">
				<div class="card">
					<img class="card-img-top" alt="Card image cap" dmx-bind:src="pictureURL">
					<div class="card-body text-center">
						<h4 class="card-title text-left">{{name}}</h4>
						<p class="card-text text-left">
							{{Description}}</p>
						<button id="addCart" class="btn btn-outline-dark" dmx-on:click="cart.upsert({prd_id: cart.data[0].prd_id},{prd_id: prod_id, prd_name: name, prd_price: name, quantity: (quantity + 1)});modal1.show()">Add to
							Cart</button>
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