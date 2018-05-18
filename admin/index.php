<?php
	require("packages/require.php");
	include("controller_index.php");
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<title><?=$title['login'];?></title>
		<?php include ("packages/head.php");?>
	</head>
	<body class="simple-page">
		<div class="simple-page-wrap">
			<div class="simple-page-logo animated swing">
				<a href="#">
					<span><i class="fa fa-gg"></i></span>
					<span><?=$seo['company-name'];?></span>
				</a>
			</div><!-- logo -->
			<div class="simple-page-form animated flipInY" id="login-form">
				<h4 class="form-title m-b-xl text-center">Sign In With Your Account</h4>
				<form action="index.php?action=login" method="post" onsubmit="return validateForm();">
					<div class="form-group">
						<input id="input-email" type="text" name="email" class="form-control" placeholder="E-mail">
						<div id="error-email" class="is-error"></div>
					</div>
					<div class="form-group">
						<input id="input-password" type="password" name="password" class="form-control" placeholder="Password">
						<div id="error-password" class="is-error"></div>
					</div>
					<div class="form-group m-b-xl">
						<div class="checkbox checkbox-primary">
							<input id="cb-remember" type="checkbox" name="remember_me" value="yes">
							<label for="cb-remember">Keep me signed in</label>
						</div>
					</div>
					<input type="submit" class="btn btn-primary" value="SIGN IN">
				</form>
			</div><!-- #login-form -->
			<div class="simple-page-footer">
				<p><a href="#">FORGOT YOUR PASSWORD ?</a></p>
			</div><!-- .simple-page-footer -->
		</div><!-- .simple-page-wrap -->
		<script type="text/javascript" src="http://code.jquery.com/jquery-1.7.1.min.js"></script>
		<script type="text/javascript">
			function validateForm(){
				var email = $("#input-email").val();
				var password = $("#input-password").val();
				var mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;

				if(email != ""){
					if(email.match(mailformat)){
						$("#error-email").html("");
						$("#error-email").hide();
						$("#input-email").removeClass("input-error");
					} else {
						$("#error-email").show();
						$("#error-email").html("<i class='fa fa-warning'></i> Invalid e-mail format.");
						$("#input-email").addClass("input-error");
						$("#input-email").focus();
						return false;
					}
				} else {
					$("#error-email").show();
					$("#error-email").html("<i class='fa fa-warning'></i> This field is required.");
					$("#input-email").addClass("input-error");
					$("#input-email").focus();
					return false;
				}
				if(password != ""){
					$("#error-password").html("");
					$("#error-password").hide();
					$("#input-password").removeClass("input-error");
				} else {
					$("#error-password").show();
					$("#error-password").html("<i class='fa fa-warning'></i> This field is required.");
					$("#input-password").addClass("input-error");
					$("#input-password").focus();
					return false;
				}
				return true;
			}
		</script>
	</body>
</html>