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

<body is="dmx-app" id="mystore" class="style28">

	<dmx-datastore id="cart"></dmx-datastore><?php include '../navbar.php'; ?>
	<section>
		<div class=" row">
			<div class="col-12 text-right col-sm-12 col-md-12">
				<table class="table table-bordered table-dark table-striped">
					<thead>
						<tr>
							<th class="lead text-center"><b>Product Name</b></th>
							<th class="lead text-center">Price</th>
							<th class="lead text-center">Quantity</th>
						</tr>
					</thead>
					<tbody is="dmx-repeat" dmx-generator="bs4table" dmx-bind:repeat="cart.data" id="tableRepeat2">
						<tr>
							<td dmx-text="prd_name"></td>
							<td dmx-text="prd_price"></td>
							<td dmx-text="quantity"></td>
						</tr>
					</tbody>
				</table>
				<p class="text-right text-light" id="total_price">
					Total Amount: {{cart.data.sum(`prd_price*quantity`)}}</p>



				<script src="../bootstrap/4/js/popper.min.js"></script>
				<script src="../bootstrap/4/js/bootstrap.min.js"></script>
			</div>
		</div>
	</section>

	<form id="cartForm" method="post" is="dmx-serverconnect-form" action="../dmxConnect/api/testData/stripe_test.php" dmx-on:success="run({runJS:{function:'runStripe'}})">
		<div>
			<div class="form-row"><button id="pay" class="btn btn-primary ml-auto" type="submit" dmx-on:click="cart.clear()"><i class="fa fa-cc-mastercard">&nbsp;Pay : $</i>{{cart.data.sum(`prd_price*quantity`)}}</button></div>

			<div id="row" is="dmx-repeat" id="rCart" dmx-bind:repeat="cart.data">
			</div>
			<div class="col-4">
				<input id="prductID" name="productID" type="hidden" class="form-control" dmx-bind:value="product_ID" dmx-bind:name="record[{{$index}}][productID]">
			</div>

			<div class="col-4">
				<input id="lineQty" name="lineQty" type="hidden" class="form-control" dmx-bind:value="qty" dmx-bind:name="record[{{$index}}][lineQty]">
			</div>

			<div class="col-4">
				<input id="linePrice" name="linePrice" type="hidden" class="form-control" dmx-bind:value="(price.toNumber() * qty)" dmx-bind:name="record[{{$index}}][linePrice]">
			</div>

			<div class="col-1">
				<p dmx-on:click="cart.delete({$id: $id})"><i class="far fa-trash-alt"></i></p>
			</div>

		</div>
	</form>

	*/<script>
		var stripe = Stripe('pk_test_XsQBmSGhyLQ1vU4iEpL2J5X200Ae1B8FGI');
					function runStripe() {
						stripe.redirectToCheckout({
  			  				sessionId: dmx.parse('cartForm.data.stripe.data.id')
		  });
		}*/
	</script>
	<script src="../bootstrap/4/js/popper.min.js"></script>
	<script src="../bootstrap/4/js/bootstrap.min.js"></script>
</body>

</html>