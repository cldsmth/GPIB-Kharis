<?php
  include("../../packages/require.php");
  include("../../packages/check_login.php");
  $curpage = "admin";
  $navpage = "Master";
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title><?=$title['admin'];?></title>
    <?php include("../../packages/module-head.php");?>
  </head>
  <body class="menubar-left menubar-unfold menubar-light theme-primary">

    <!-- APP NAVBAR !-->
    <?php include("../../parts/part-navbar.php");?>

    <!-- APP ASIDE !-->
    <?php include("../../parts/part-aside.php");?>

    <!-- APP MAIN -->
    <main id="app-main" class="app-main">
      <div class="wrap">
      	<section class="app-content">
      		<div class="row">
            <!-- Breadcrumb !-->
      			<div class="col-md-12">
              <ol class="breadcrumb" style="background: none;">
                <li><a href="<?=$path['home'];?>">Home</a></li>
                <li class="active">Admin Management</li>
              </ol>
      			</div>

            <!-- start: PAGE CONTENT -->
      			<div class="col-md-12">
      				<div class="widget p-lg">
      					<h1 class="m-b-lg">Admin Page</h1>
      				</div>
      			</div>
            <!-- end: PAGE CONTENT-->
      		</div><!-- .row -->
      	</section><!-- #dash-content -->
      </div><!-- .wrap -->

      <!-- APP FOOTER !-->
      <?php include("../../parts/part-footer.php");?>

    </main>
  	<?php include("../../packages/footer-js.php");?>
  </body>
</html>