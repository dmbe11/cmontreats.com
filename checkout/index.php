<!doctype html>
<html>

<head>
	<script src="../dmxAppConnect/dmxAppConnect.js"></script>
	<meta charset="UTF-8">
	<title>Catalog</title>
	<script src="../js/jquery-3.4.1.slim.min.js"></script>
	<link rel="stylesheet" href="../fontawesome4/css/font-awesome.min.css" />
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" href="../bootstrap/4/css/bootstrap.min.css" />
	<script src="../dmxAppConnect/dmxDatastore/dmxDatastore.js" defer=""></script>
	<script src="../dmxAppConnect/dmxBootstrap4Modal/dmxBootstrap4Modal.js" defer=""></script>
	<link rel="stylesheet" href="../dmxAppConnect/dmxBootstrap4TableGenerator/dmxBootstrap4TableGenerator.css" />
	<script src="../dmxAppConnect/dmxFormatter/dmxFormatter.js" defer=""></script>
	<script src="../dmxAppConnect/dmxTyped/dmxTyped.js" defer=""></script>
	<script src="../dmxAppConnect/dmxTyped/typed.min.js" defer=""></script>

	<link rel="stylesheet" href="../css/style.css" />
</head>

<body is="dmx-app" id="mystore">
	<dmx-serverconnect id="scProducts" url="../dmxConnect/api/cart/scProducts.php"></dmx-serverconnect><?php include '../navbar.php'; ?><dmx-datastore id="cart"></dmx-datastore>
	<div class="modal" id="modal1" is="dmx-bs4-modal" tabindex="-1" role="dialog">
		<div class="modal-dialog modal-xl" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h1 class="modal-title text-primary">Shopping Cart&nbsp;<i class="fa fa-shopping-cart"></i></h1>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<table class="table table-striped table-bordered table-dark">
						<thead>
							<tr>
								<th>Product Name</th>
								<th>Product Price</th>
								<th>Quantity</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody is="dmx-repeat" dmx-generator="bs4table" dmx-bind:repeat="cart.data" id="tableRepeat1">
							<tr class="text-center">
								<td dmx-text="prd_name"></td>
								<td dmx-text="prd_price"></td>
								<td dmx-text="quantity"></td>
								<td>
									<button id="btn1" class="btn text-warning bg-dark btn-sm" dmx-on:click="cart.update({$id: $id},{quantity: quantity-1})" dmx-bind:disabled="quantity+'==1'"><i class="fa fa-minus-square-o"></i></button>
									<button id="btn2" class="btn text-success bg-dark btn-sm" dmx-on:click="cart.update({$id: $id},{quantity: quantity+1})"><i class="fa fa-plus-square-o"></i></button>
									<button id="btn3" class="btn text-danger btn-sm bg-dark" dmx-on:click="cart.delete({$id: $id})"><i class="fa fa-trash-o"></i></button>
								</td>
							</tr>
						</tbody>
					</table>
					<p class="text-lg-right">Total Amount: {{cart.data.sum(`prd_price*quantity`)}}</p>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Continue Shopping</button>
					<a href="checkout.php" class="btn btn-primary">Checkout</a>
				</div>
			</div>
		</div>
	</div>



	<section class="mb-2">
		<div class="container-fluid">
			<div class="row">
				<div class="col">
					<button id="btn4" class="btn btn-lg btn-outline-primary" dmx-on:click="modal1.show()">Shopping Cart:{{cart.data.sum(`quantity`)}}</button>
				</div>
			</div>
		</div>
	</section>
	<section>

		<div class="row ml-xl-auto mr-xl-auto justify-content-xl-center row-cols-12 text-left no-gutters" is="dmx-repeat" id="Repeat1" dmx-bind:repeat="scProducts.data.productQuery">
			<div class="col-sm-12 col-md-6 col-lg-6 align-self-xl-center col-xl-6 w-auto col-12">
				<div class="card border border-dark text-center">

					<img class="card-img-top" dmx-bind:src="pictureURL">
					<div class="card-body text-center bg-info">
						<h1 class="card-title font-weight-bolder" dmx-text="name">Salmon Freeze Dried Dog Treat</h1>
						<p dmx-text="Description" class="text-md-left">{{Description}}</p>
						<button id="add_to_cart" class="btn btn-outline-primary btn-block" dmx-on:click="cart.upsert({prd_id: id},{prd_id: id, prd_name: name, prd_price: price, prd_sku: sku, quantity: quantity+1});modal1.show()">Add to
							Cart</button>
					</div>
				</div>
			</div>
		</div>


	</section>

	<script src="../bootstrap/4/js/popper.min.js"></script>
	<script src="../bootstrap/4/js/bootstrap.min.js"></script>
</body>

</html>