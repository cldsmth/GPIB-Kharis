<?php
    include("helpers/require.php");
?>
<!doctype html>
<html lang="en">
    <head>
        <title><?=$seo['about-us-title'];?></title>
        <meta name="keywords" content="<?=$seo['about-us-keyword'];?>">
        <meta name="description" content="<?=$seo['about-us-desc'];?>">
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
                    <h2 class="page-cover-tittle">About Us</h2>
                    <ol class="breadcrumb">
                        <li><a href="<?=$path['home'];?>">Home</a></li>
                        <li class="active">About</li>
                    </ol>
                </div>
            </div>
        </section>
        <!--================Breadcrumb Area =================-->
        
        <!--================About Area =================-->
        <section class="about_area section_gap">
            <div class="container">
                <div class="section_title text-center">
                    <h2>Welcome to Faith Church</h2>
                    <p>The French Revolution constituted for the conscience of the dominant aristocratic class a fall from </p>
                </div>
                <div class="row">
                    <div class="col-md-6 d_flex">
                        <div class="about_content flex">
                            <h3 class="title_color">Did not find your Package Feel free to ask us. We‘ll make it for you</h3>
                            <p>inappropriate behavior is often laughed off as “boys will be boys,” women face higher conduct standards especially in the workplace. That’s why it’s crucial that, as women, our behavior on the job is beyond reproach. inappropriate behavior is often laughed.</p>
                            <a href="#" class="about_btn btn_hover">Read Full Story</a>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <img src="assets/image/about.jpg" alt="abou_img">
                    </div>
                </div>
            </div>
        </section>
        <!--================About Area =================-->
        
        <!--================ start footer Area  =================-->	
        <?php include("parts/part-footer.php");?>
		<!--================ End footer Area  =================-->
        
        <?php include("parts/part-footer-js.php");?>
    </body>
</html>