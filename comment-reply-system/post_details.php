<?php include 'functions.php'; ?>
<!DOCTYPE html>
<html lang="en">

<head>
	<script src="../dmxAppConnect/dmxAppConnect.js"></script>
	<meta charset="UTF-8">
	<title>Comment System</title>
	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="main.css">
	<script src="../js/jquery-3.4.1.slim.min.js"></script>
	<link rel="stylesheet" href="../fontawesome4/css/font-awesome.min.css" />
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" href="../bootstrap/4/css/bootstrap.min.css" />
	<link rel="stylesheet" href="../css/style.css" />
</head>

<body is="dmx-app" id="post_details">

	<div class="container">
		<div class="row">
			<div class="col-md-6 offset-3 post">
				<h2><?php echo $post['title'] ?></h2>
				<p><?php echo $post['body']; ?></p>
			</div>
			<div class="col-md-6 offset-3 comments-section">
				<!-- if user is not signed in, tell them to sign in. If signed in, present them with comment form -->
				<?php if (isset($user_id)): ?>
				<form class="clearfix" action="post_details.php" method="post" id="comment_form">
					<textarea name="comment_text" id="comment_text" class="form-control" cols="30" rows="3"></textarea>
					<button class="btn btn-primary btn-sm float-right" id="submit_comment">Submit comment</button>
				</form>
				<?php else: ?>
				<div class="card card-body" style="margin-top: 20px;">
					<h4 class="text-center"><a href="#">Sign in</a> to post a comment</h4>
				</div>
				<?php endif ?>
				<!-- Display total number of comments on this post  -->
				<h2><span id="comments_count"><?php echo count($comments) ?></span> Comment(s)</h2>
				<hr>
				<!-- comments wrapper -->
				<div id="comments-wrapper">
					<?php if (isset($comments)): ?>
					<!-- Display comments -->
					<?php foreach ($comments as $comment): ?>
					<!-- comment -->
					<div class="comment clearfix">
						<img src="profile.png" alt="" class="profile_pic">
						<div class="comment-details">
							<span class="comment-name"><?php echo getUsernameById($comment['user_id']) ?></span>
							<span class="comment-date"><?php echo date("F j, Y ", strtotime($comment["created_at"])); ?></span>
							<p><?php echo $comment['body']; ?></p>
							<a class="reply-btn" href="#" data-id="<?php echo $comment['id']; ?>">reply</a>
						</div>
						<!-- reply form -->
						<form action="post_details.php" class="reply_form clearfix" id="comment_reply_form_<?php echo $comment['id'] ?>" data-id="<?php echo $comment['id']; ?>">
							<textarea class="form-control" name="reply_text" id="reply_text" cols="30" rows="2"></textarea>
							<button class="btn btn-primary btn-xs float-right submit-reply">Submit reply</button>
						</form>

						<!-- GET ALL REPLIES -->
						<?php $replies = getRepliesByCommentId($comment['id']) ?>
						<div class="replies_wrapper_<?php echo $comment['id']; ?>">
							<?php if (isset($replies)): ?>
							<?php foreach ($replies as $reply): ?>
							<!-- reply -->
							<div class="comment reply clearfix">
								<img src="profile.png" alt="" class="profile_pic">
								<div class="comment-details">
									<span class="comment-name"><?php echo getUsernameById($reply['user_id']) ?></span>
									<span class="comment-date"><?php echo date("F j, Y ", strtotime($reply["created_at"])); ?></span>
									<p><?php echo $reply['body']; ?></p>
									<a class="reply-btn" href="#">reply</a>
								</div>
							</div>
							<?php endforeach ?>
							<?php endif ?>
						</div>
					</div>
					<!-- // comment -->
					<?php endforeach ?>
					<?php else: ?>
					<h2>Be the first to comment on this post</h2>
					<?php endif ?>
				</div><!-- comments wrapper -->
			</div><!-- // all comments -->
		</div>
	</div>
	<!-- Javascripts -->
	<!-- Bootstrap Javascript -->

	<script src="scripts.js"></script>
	<script src="../bootstrap/4/js/popper.min.js"></script>
	<script src="../bootstrap/4/js/bootstrap.min.js"></script>
</body>

</html>