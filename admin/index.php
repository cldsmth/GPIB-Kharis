<?php
	require("packages/require.php");
	include("controller_index.php");
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<title><?=$seo['company-name'];?> - Administrator</title>
		<?php include ("packages/head.php");?>
	</head>
	<body class="simple-page">
		<div class="simple-page-wrap">
			<div class="simple-page-logo animated swing">
				<a href="index.html">
					<span><i class="fa fa-gg"></i></span>
					<span><?=$seo['company-name'];?></span>
				</a>
			</div><!-- logo -->
			<div class="simple-page-form animated flipInY" id="login-form">
				<h4 class="form-title m-b-xl text-center">Sign In With Your Account</h4>
				<form action="#">
					<div class="form-group">
						<input id="sign-in-email" type="email" class="form-control" placeholder="E-mail">
					</div>
					<div class="form-group">
						<input id="sign-in-password" type="password" class="form-control" placeholder="Password">
					</div>
					<div class="form-group m-b-xl">
						<div class="checkbox checkbox-primary">
							<input type="checkbox" id="keep_me_logged_in"/>
							<label for="keep_me_logged_in">Keep me signed in</label>
						</div>
					</div>
					<input type="submit" class="btn btn-primary" value="SIGN IN">
				</form>
			</div><!-- #login-form -->
			<div class="simple-page-footer">
				<p><a href="#">FORGOT YOUR PASSWORD ?</a></p>
			</div><!-- .simple-page-footer -->
		</div><!-- .simple-page-wrap -->
	</body>
</html>