<!DOCTYPE html>
<html lang="en">

<head>
	<script src="../dmxAppConnect/dmxAppConnect.js"></script>
	<meta charset="utf-8" />
	<title>Stripe Checkout</title>
	<meta name="description" content="Stripe Payment Intents" />

	<link rel="icon" href="../favicon.ico" type="image/x-icon" />
	<link rel="stylesheet" href="css/normalize.css" />
	<link rel="stylesheet" href="css/global.css" />
	<!-- Load Stripe.js on your website. -->
	<script src="../js/jquery-3.4.1.slim.min.js"></script>
	<script src="https://js.stripe.com/v3/"></script>

	<link rel="stylesheet" href="../fontawesome4/css/font-awesome.min.css" />
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" href="../bootstrap/4/css/bootstrap.min.css" />
	<script src="../dmxAppConnect/dmxBootstrap4Navigation/dmxBootstrap4Navigation.js" defer=""></script>
	<link rel="stylesheet" href="../css/style.css" />
</head>

<body class="style10" id="chickenBreast" is="dmx-app">

	<body class="style10">
		<?php include '../navbar.php'; ?>

		<div class="border-0 h-auto container-xl">
			<section class="border-0 text-center text-xl-center">
				<div class="container-lg">
					<div class="row row-cols-12">
						<div class="col-sm col align-self-center">
							<section class="container style8">
								<h1>3 oz Chicken Breasts</h1>
								<div>

									<h4 class="text-info">Purchase Freeze Dried Chicken Breasts</h4>
									<div class="CMoN-purchase">
										<img src="../assets/img/1Serving%20Chicken.png" width="140" height="160">
									</div>
								</div>
								<div class="quantity-setter">
									<button class="increment-btn" id="subtract" disabled="">
										-
									</button>
									<input type="number" id="quantity-input" min="1" value="1">
									<button class="increment-btn" id="add">+</button>
								</div>
								<p class="sr-legal-text text-light">Number of Bags(max 10)</p>
								<button id="checkoutbutton">Buy for $<span id="total">12.00</span></button>
							</section>
							<div id="error-message"></div>
						</div>

					</div>
				</div>
			</section>
		</div>
		<script>
			// Replace with your own publishable key: https://dashboard.stripe.com/test/apikeys
      var PUBLISHABLE_KEY = "pk_live_6AO50ic1DaRLhYQS9yCvHC2Q000NB7q9OL";
      // Replace with the domain you want your users to be redirected back to after payment
      var DOMAIN = "https://cmontreats.com/checkout/";
      // Replace with a SKU for your own product (created either in the Stripe Dashboard or with the API)
      var SKU_ID = "sku_HOYE6dRuuAaMur";

      if (PUBLISHABLE_KEY === "pk_live_6AO50ic1DaRLhYQS9yCvHC2Q000NB7q9OL") {
        console.log(
          "Replace the hardcoded publishable key with your own publishable key: https://dashboard.stripe.com/test/apikeys"
        );
      }

      if (SKU_ID === "sku_HOYE6dRuuAaMur") {
        console.log(
          "Replace the hardcoded SKU ID with your own SKU: https://stripe.com/docs/api/skus"
        );
      }

      var MIN_QUANTITY = 1;
      var MAX_QUANTITY = 10;

      var stripe = Stripe(PUBLISHABLE_KEY);

      var checkoutbutton1 = document.getElementById("checkoutbutton");
      document
        .getElementById("quantity-input")
        .addEventListener("change", function(evt) {
          // Ensure customers only buy between 1 and 10 Bags
          if (evt.target.value < MIN_QUANTITY) {
            evt.target.value = MIN_QUANTITY;
          }
          if (evt.target.value > MAX_QUANTITY) {
            evt.target.value = MAX_QUANTITY;
          }
        });

      var updateQuantity = function(evt) {
        if (evt && evt.type === "keypress" && evt.keyCode !== 13) {
          return;
        }

        var isAdding = evt.target.id === "add";
        var inputEl = document.getElementById("quantity-input");
        var currentQuantity = parseInt(inputEl.value);

        document.getElementById("add").disabled = false;
        document.getElementById("subtract").disabled = false;

        var quantity = isAdding ? currentQuantity + 1 : currentQuantity - 1;

        inputEl.value = quantity;
        document.getElementById("total").textContent = quantity * 12.00;

        // Disable the button if the customers hits the max or min
        if (quantity === MIN_QUANTITY) {
          document.getElementById("subtract").disabled = true;
        }
        if (quantity === MAX_QUANTITY) {
          document.getElementById("add").disabled = true;
        }
      };

      Array.from(document.getElementsByClassName("increment-btn")).forEach(
        element => {
          element.addEventListener("click", updateQuantity);
        }
      );

      // Handle any errors from Checkout
      var handleResult = function(result) {
        if (result.error) {
          var displayError = document.getElementById("error-message");
          displayError.textContent = result.error.message;
        }
      };

      checkoutbutton.addEventListener("click", function() {
        var quantity = parseInt(
          document.getElementById("quantity-input").value
        );

        // Make the call to Stripe.js to redirect to the checkout page
        // with the current quantity
        stripe
          .redirectToCheckout({
            items: [{ sku: SKU_ID, quantity: quantity }],
            successUrl:
              DOMAIN + "/success.php?session_id={CHECKOUT_SESSION_ID}",
            cancelUrl: DOMAIN + "/canceled.php",
            billingAddressCollection: 'required',
            shippingAddressCollection: {
              allowedCountries: ['US','CA'],
            }
          }).then(handleResult);
      });
		</script>

		<script src="../bootstrap/4/js/popper.min.js"></script>
		<script src="../bootstrap/4/js/bootstrap.min.js"></script>
	</body>

</html>