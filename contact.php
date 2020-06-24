<!doctype html>
<html>


<head>
	<script src="dmxAppConnect/dmxAppConnect.js"></script>
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://js.stripe.com/v3"></script>
	<meta charset="UTF-8">
	<title>The CMoN Familey</title>

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous" />
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<script src="dmxAppConnect/dmxBootstrap4Navigation/dmxBootstrap4Navigation.js" defer=""></script>
	<link rel="stylesheet" href="css/style.css" />
	<link rel="stylesheet" href="bootstrap/4/css/bootstrap.min.css" />
	<script src="dmxAppConnect/dmxBackgroundVideo/dmxBackgroundVideo.js" defer=""></script>
	<link rel="stylesheet" href="dmxAppConnect/dmxMediumEditor/medium-editor.css" />
	<script src="dmxAppConnect/dmxMediumEditor/medium-editor.js" defer=""></script>
	<link rel="stylesheet" href="dmxAppConnect/dmxMediumEditor/dmxMediumEditor.css" />
	<script src="dmxAppConnect/dmxMediumEditor/dmxMediumEditor.js" defer=""></script>
	<link rel="stylesheet" href="dmxAppConnect/dmxMediumEditor/themes/default.css" />
	<link rel="stylesheet" href="dmxAppConnect/dmxValidator/dmxValidator.css" />
	<script src="dmxAppConnect/dmxValidator/dmxValidator.js" defer=""></script>
	<link rel="stylesheet" href="dmxAppConnect/dmxMediumEditorImageUpload/dmxMediumEditorImageUpload.css" />
	<script src="dmxAppConnect/dmxMediumEditorImageUpload/dmxMediumEditorImageUpload.js" defer=""></script>
	<script src="dmxAppConnect/dmxTyped/dmxTyped.js" defer=""></script>
	<script src="dmxAppConnect/dmxTyped/typed.min.js" defer=""></script>
</head>

<body id="cmonContact02" is="dmx-app" class="style23">
	<div id="fb-root"></div>
	<script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v7.0" nonce="Jqvs1Xaa"></script>
	<header>
		<div class="container-sm bg-transparent">
			<div class="row bg-transparent">
				<div class="bg-transparent col-xl">
					<?php include 'navbar.php'; ?>
				</div>
			</div>
		</div>
	</header>
	<main class="bg-transparent container">

		<section class="bg-transparent w-100">
			<div class="container bg-transparent" is="dmx-background-video" id="bgvideo1" src="assets/vid/DogBGVDmp4.mp4">
				<main>
					<h3 class="align-self-start style23 font-weight-bold text-body">If you would like to signup to receive our coupons and specials please enter your name and email address here. We dont sell them and will only email when we have
						something to offer.</h3>
					<section>
						<form is="dmx-serverconnect-form" id="serverconnectform1" method="post" action="dmxConnect/api/formtoemail.php" dmx-generator="bootstrap4" dmx-form-type="vertical" dmx-on:success="bgvideo1.serverconnectform1.reset()">
							<div class="form-group">
								<label for="inp_name" class="col-form-label col-form-label-lg style17">Name</label>
								<input type="text" class="form-control" id="inp_name" name="name" aria-describedby="inp_name_help" placeholder="Enter Name">
							</div>
							<div class="form-group">
								<label for="inp_email" class="col-form-label col-form-label-lg style18">Email</label>
								<input type="email" class="form-control" id="inp_email" name="email" aria-describedby="inp_email_help" placeholder="Enter Email">
							</div>
							<div class="form-group">
								<label for="inp_message" class="col-form-label-lg col-form-label style19">Message</label>
								<textarea id="inp_message" name="message" class="form-control"></textarea>
							</div>
							<div class="form-group text-center col">
								<button type="submit" class="btn btn-primary mr-3 btn-lg">Save
									<button type="reset" class="btn btn-outline-dark bg-info ml-3 btn-lg">Cancel</button><span class="spinner-border" role="status" dmx-show="state.executing"></span>
								</button>
							</div>
						</form>
					</section>
				</main>
			</div>
		</section>
	</main>
	<link rel="wappler-include" type="content-page" href="">
	<section class="bg-transparent">
		<div class="container bg-transparent">
			<div class="row bg-transparent">
				<div class="bg-transparent col-12 col-xl-12">
					<footer class="bg-transparent">
						<div class="rounded-sm h-auto mw-100 text-left container-fluid">
							<div class="row">
								<div class="text-xl-center col-12 col-xl col-sm-12 w-auto bg-primary mt-2">
									<?php include 'likeFacebook.php'; ?>
								</div>
							</div>
						</div>
					</footer>
				</div>
			</div>
		</div>
	</section>
	<script src="bootstrap/4/js/popper.min.js"></script>
	<script src="bootstrap/4/js/bootstrap.min.js"></script>
</body>

</html>