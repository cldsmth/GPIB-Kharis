<?php
    include("helpers/require.php");
    $curpage = "pages";
?>
<!doctype html>
<html lang="en">
    <head>
        <title><?=$seo['warta-jemaat-title'];?></title>
        <meta name="keywords" content="<?=$seo['warta-jemaat-keyword'];?>">
        <meta name="description" content="<?=$seo['warta-jemaat-desc'];?>">
        <?php include("parts/part-head.php");?>
    </head>
    <body>
        <!--================Header Area =================-->
        <?php include("parts/part-header.php");?>
        <!--================Header Area =================-->
        
        <!--================Breadcrumb Area =================-->
        <section class="breadcrumb_area br_image">
            <div class="container">
                <div class="page-cover text-center">
                    <h2 class="page-cover-tittle">Warta Jemaat</h2>
                    <ol class="breadcrumb">
                        <li><a href="<?=$path['home'];?>">Home</a></li>
                        <li class="active">Warta Jemaat</li>
                    </ol>
                </div>
            </div>
        </section>
        <!--================Breadcrumb Area =================-->
        
		<!--================Table Area =================-->
		<div class="whole-wrap">
			<div class="container">
				<div class="section-top-border">
					<div class="progress-table-wrap">
						<div class="progress-table">
							<div class="table-head">
								<div class="serial">#</div>
								<div class="country">Tanggal</div>
								<div class="country">Keterangan</div>
								<div class="visit">Downloads</div>
								<div class="percentage">Persentase</div>
							</div>
							<div class="table-row">
								<div class="serial">01</div>
								<div class="country">01-Jan-2019</div>
								<div class="country"> <img src="assets/image/elements/f1.jpg" alt="flag">Canada</div>
								<div class="visit">645032</div>
								<div class="percentage">
									<div class="progress">
										<div class="progress-bar color-1" role="progressbar" style="width: 80%" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
									</div>
								</div>
							</div>
							<div class="table-row">
								<div class="serial">02</div>
								<div class="country">01-Jan-2019</div>
								<div class="country"> <img src="assets/image/elements/f2.jpg" alt="flag">Canada</div>
								<div class="visit">645032</div>
								<div class="percentage">
									<div class="progress">
										<div class="progress-bar color-2" role="progressbar" style="width: 30%" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100"></div>
									</div>
								</div>
							</div>
							<div class="table-row">
								<div class="serial">03</div>
								<div class="country">01-Jan-2019</div>
								<div class="country"> <img src="assets/image/elements/f3.jpg" alt="flag">Canada</div>
								<div class="visit">645032</div>
								<div class="percentage">
									<div class="progress">
										<div class="progress-bar color-3" role="progressbar" style="width: 55%" aria-valuenow="55" aria-valuemin="0" aria-valuemax="100"></div>
									</div>
								</div>
							</div>
							<div class="table-row">
								<div class="serial">04</div>
								<div class="country">01-Jan-2019</div>
								<div class="country"> <img src="assets/image/elements/f4.jpg" alt="flag">Canada</div>
								<div class="visit">645032</div>
								<div class="percentage">
									<div class="progress">
										<div class="progress-bar color-4" role="progressbar" style="width: 60%" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"></div>
									</div>
								</div>
							</div>
							<div class="table-row">
								<div class="serial">05</div>
								<div class="country">01-Jan-2019</div>
								<div class="country"> <img src="assets/image/elements/f5.jpg" alt="flag">Canada</div>
								<div class="visit">645032</div>
								<div class="percentage">
									<div class="progress">
										<div class="progress-bar color-5" role="progressbar" style="width: 40%" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100"></div>
									</div>
								</div>
							</div>
							<div class="table-row">
								<div class="serial">06</div>
								<div class="country">01-Jan-2019</div>
								<div class="country"> <img src="assets/image/elements/f6.jpg" alt="flag">Canada</div>
								<div class="visit">645032</div>
								<div class="percentage">
									<div class="progress">
										<div class="progress-bar color-6" role="progressbar" style="width: 70%" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100"></div>
									</div>
								</div>
							</div>
							<div class="table-row">
								<div class="serial">07</div>
								<div class="country">01-Jan-2019</div>
								<div class="country"> <img src="assets/image/elements/f7.jpg" alt="flag">Canada</div>
								<div class="visit">645032</div>
								<div class="percentage">
									<div class="progress">
										<div class="progress-bar color-7" role="progressbar" style="width: 30%" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100"></div>
									</div>
								</div>
							</div>
							<div class="table-row">
								<div class="serial">08</div>
								<div class="country">01-Jan-2019</div>
								<div class="country"> <img src="assets/image/elements/f8.jpg" alt="flag">Canada</div>
								<div class="visit">645032</div>
								<div class="percentage">
									<div class="progress">
										<div class="progress-bar color-8" role="progressbar" style="width: 60%" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"></div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!--================Table Area =================-->
		                
        <!--================ start footer Area  =================-->    
        <?php include("parts/part-footer.php");?>
        <!--================ End footer Area  =================-->
        
        <?php include("parts/part-footer-js.php");?>
    </body>
</html>