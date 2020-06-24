<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8" />
	<title>Stripe Checkout Sample</title>
	<meta name="description" content=" Stripe Payment Intents" />

	<link rel="icon" href="favicon.ico" type="image/x-icon" />
	<link rel="stylesheet" href="css/normalize.css" />
	<link rel="stylesheet" href="css/global.css" />
	<script src="../js/jquery-3.4.1.slim.min.js"></script>
	<script src="https://js.stripe.com/v3/"></script>
	<link rel="stylesheet" href="../css/style.css" />

	<link rel="stylesheet" href="../fontawesome4/css/font-awesome.min.css" />
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" href="../bootstrap/4/css/bootstrap.min.css" />
	<script src="../dmxAppConnect/dmxBootstrap4Navigation/dmxBootstrap4Navigation.js"></script>
</head>

<body>
	<div id="fb-root"></div>
	<script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v7.0" nonce="waqliTlp"></script>
	<?php include '../navbar.php'; ?>


	<div class="sr-root">
		<div class="sr-main">
			<div class="sr-payment-summary completed-view">
				<h1>Your payment succeeded</h1>
				<h4 class="text-primary">Checkout Session ID: <span id="session"></span></h4>
				<p class="text-success">You will recieve an email with additional information regarding your purchase. If you do not receive am email within a few hours please email daniel.bell@cmonttreats.com or use the <a
						href="../contact.html">contact</a> form.</p>
				<h1 class="text-center font-weight-bold">Please take a moment to like us on facebook</h1>
				<section>
					<div class="container border-0">
						<div class="row">
							<div class="col align-self-xl-center text-xl-center lead bg-primary">
								<div class="fb-like" data-href="https://www.facebook.com/cmontreats/" data-width="" data-layout="standard" data-action="recommend" data-size="large" data-share="true"></div>
							</div>
						</div>
					</div>
				</section>
			</div>
			<div class="sr-content">
				<div class="pasha-image-stack">
				</div>
			</div>
		</div>
		<script>
			// Replace with your own publishable key: https://dashboard.stripe.com/test/apikeys
      var PUBLISHABLE_KEY = "pk_test_XsQBmSGhyLQ1vU4iEpL2J5X200Ae1B8FGI";
      
      if (PUBLISHABLE_KEY === "pk_test_XsQBmSGhyLQ1vU4iEpL2J5X200Ae1B8FGI") {
        console.log(
          "Replace the hardcoded publishable key with your own publishable key: https://dashboard.stripe.com/test/apikeys"
        );
      }

      var stripe = Stripe(PUBLISHABLE_KEY);
      var urlParams = new URLSearchParams(window.location.search);

      if (urlParams.has("session_id")) {
        document.getElementById("session").textContent = urlParams.get(
          "session_id"
        );
      }
		</script>
		<script src="../bootstrap/4/js/popper.min.js"></script>
		<script src="../bootstrap/4/js/bootstrap.min.js"></script>
	</div>
	<script src="../bootstrap/4/js/popper.min.js"></script>
	<script src="../bootstrap/4/js/bootstrap.min.js"></script>
</body>

</html>