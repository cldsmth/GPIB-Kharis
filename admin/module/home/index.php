<?php
  include("../../packages/require.php");
  $curpage = "home";
  $navpage = "Home";
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title><?=$title['home'];?></title>
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
                <li class="active">Home</li>
              </ol>
      			</div>

            <!-- start: PAGE CONTENT -->
      			<div class="col-md-12">
      				<div class="widget p-lg">
      					<h1 class="m-b-lg">Halo, John Doe</h1>
      					<p class="m-b-lg docs" style="font-size: 17px;">
      						Selamat datang di halaman administrator <?=$seo['company-name'];?>.
      					</p>
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