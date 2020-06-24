<!doctype html>
<html>

<head>
	<script src="../dmxAppConnect/dmxAppConnect.js"></script>
	<meta charset="UTF-8">
	<title>Shopping Cart</title>
	<script src="../js/jquery-3.4.1.slim.min.js"></script>
	<link rel="stylesheet" href="../fontawesome4/css/font-awesome.min.css" />
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" href="../bootstrap/4/css/bootstrap.min.css" />
	<script src="../dmxAppConnect/dmxDatastore/dmxDatastore.js" defer=""></script>
	<link rel="stylesheet" href="../dmxAppConnect/dmxBootstrap4TableGenerator/dmxBootstrap4TableGenerator.css" />
	<link rel="stylesheet" href="../css/style.css" />
	<script src="../dmxAppConnect/dmxFormatter/dmxFormatter.js" defer=""></script>
	<script src="https://js.stripe.com/v3/"></script>
</head>

<body is="dmx-app" id="cmonStore" class="style28">

	<section>

		<div class="container mt-4">
			<div class="row row-cols-10 align-items-center">
				<div class="col pt-3">

				</div>
			</div>
		</div>
	</section>




	<section>
		<form id="checkout" method="post" is="dmx-serverconnect-form" action="../dmxConnect/api/checkout/checkoutSM.php">
			<dmx-datastore id="cart"></dmx-datastore>
			<div class="row">
				<div class="col-md col-12 col-sm">
					<table class="table table-striped table-bordered">
						<thead>
							<tr class="text-light">
								<th>Sku</th>
								<th>Name</th>
								<th class="w-auto">Price</th>
								<th class="text-center w-auto h-auto">Quantity</th>
								<th class="w-25 h-25 text-center">Actions</th>
							</tr>
						</thead>
						<tbody is="dmx-repeat" dmx-generator="bs4table" dmx-bind:repeat="cart.data" id="tableRepeat1">
							<tr class="text-light">
								<td dmx-text="sku"></td>
								<td dmx-text="name"></td>
								<td dmx-text="price"></td>
								<td dmx-text="quantity" class="w-25 h-25"></td>
								<td class="text-center">
									<button id="btn1" class="btn btn-sm btn-outline-danger" dmx-on:click="cart.update({$id: $id},{quantity: quantity-1})" dmx-bind:disabled="quantity==1"><i class="fa fa-minus-circle"></i></button>
									<button id="btn2" class="btn btn-sm btn-outline-success" dmx-on:click="cart.update({$id: $id},{quantity: quantity+1})"><i class="fa fa-plus-circle"></i></button>
									<button id="btn3" class="btn btn-sm btn-outline-warning" dmx-on:click="cart.delete({$id: $id})"><i class="fa fa-trash-o"></i></button>
								</td>
							</tr>
						</tbody>
					</table>
					<p class="text-right text-light" id="total_price">Total Amount: {{cart.data.sum(`price * quantity`)}}</p>
					<div class="row">
						<div class="col">
							<a href="../checkout/index.php" class="btn btn-outline-primary">Continue Shopping</a>
							<a href="#" class="btn btn-outline-success" id="checkoutbutton" dmx-on:click="">Pay for Items</a>
						</div>
					</div>
				</div>
			</div>
		</form>

	</section>

	<script src="../bootstrap/4/js/popper.min.js"></script>
	<script src="../bootstrap/4/js/bootstrap.min.js"></script>
</body>

</html>