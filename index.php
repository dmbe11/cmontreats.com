<!doctype html>
<html>


<head>
	<script src="dmxAppConnect/dmxAppConnect.js"></script>
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://js.stripe.com/v3/"></script>
	<link rel="apple-touch-icon" sizes="180x180" href="apple-touch-icon.png">
	<link rel="icon" type="image/png" sizes="32x32" href="favicon-32x32.png">
	<link rel="icon" type="image/png" sizes="16x16" href="favicon-16x16.png">
	<link rel="manifest" href="site.webmanifest">

	<meta charset="UTF-8">
	<title>C'MoN Gourmet Treats</title>

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous" />
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<script src="dmxAppConnect/dmxBootstrap4Navigation/dmxBootstrap4Navigation.js" defer=""></script>
	<script src="dmxAppConnect/dmxVideo/dmxVideo.js" defer=""></script>
	<link rel="stylesheet" href="css/style.css" />
	<script src="dmxAppConnect/dmxBackgroundVideo/dmxBackgroundVideo.js" defer=""></script>
	<script src="dmxAppConnect/dmxRouting/dmxRouting.js" defer=""></script>
	<link rel="stylesheet" href="bootstrap/4/css/bootstrap.min.css" />
	<link rel="stylesheet" href="dmxAppConnect/dmxLightbox/dmxLightbox.css" />
	<script src="dmxAppConnect/dmxLightbox/dmxLightbox.js" defer=""></script>
</head>

<body id="index" is="dmx-app">
	<header class="container-fluid">
		<div class="container">
			<div class="row">
				<div class="col align-self-start h-auto">
					<?php include 'navbar.php'; ?>
				</div>
			</div>
		</div>

		<div class="container">
			<div class="row">
				<div class="col">
					<p class="text-justify text-white">CMoN Gourmet Treats is family owned and operated created to provide high quality treats for people who love their pets. C'MoN started small with our dogs as our initial clients. Over the years we
						have owned several dogs and today we share our
						home with a Weimaraner and two Great Danes. CMoN’s name came from the first initial of three of our dogs, Charley, Molly, and Natalia.&nbsp;</p>
				</div>
			</div>
		</div>
		<div class="container-sm">
			<video is="dmx-video" id="video1" src="assets/vid/covervid.mov" autoplay playinview autopause loop muted width="100%" poster="assets/img/vidStart.jpg" preload="auto"></video>
		</div>
		<div class="container bg-transparent">
			<div class="row bg-transparent">
				<div class="col text-secondary bg-transparent">
					<div class="row text-secondary bg-transparent">
						iv class="col bg-transparent">

						<p class="text-justify text-white">Molly has always been a healthy Weimaraner, but when she was still a puppy, we determined that processed treats made her sick. After doing research, we learned that feeding her treats
							with a single-ingredient stopped the health issues and she liked them better. The best single-ingredient treats, that do not require processing, are freeze-dried.&nbsp;</p>
						<p class="text-justify text-white">One day we wondered if we could make treats on our own to better control the protein source and quality. So, we started making out own treats from high-quality protein like wild-caught
							Sockeye salmon, not chum, and chicken breast tenderloin fillets. We purchase our meat from the highest quality local sources, keeping records of where we purchased every batch. Try a package or two, your pets will love
							you for it.</p>

						<?php include 'likeFacebook.php'; ?>
						<?php include 'navbarFoot.php'; ?>
					</div>
				</div>
			</div>
		</div>
		</div>
	</header>
	<script src="bootstrap/4/js/popper.min.js"></script>
	<script src="bootstrap/4/js/bootstrap.min.js"></script>
</body>

</html>