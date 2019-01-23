<?php
    include("helpers/require.php");
    $curpage = "pages";
?>
<!doctype html>
<html lang="en">
    <head>
        <title><?=$seo['gallery-title'];?></title>
        <meta name="keywords" content="<?=$seo['gallery-keyword'];?>">
        <meta name="description" content="<?=$seo['gallery-desc'];?>">
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
                    <h2 class="page-cover-tittle">Gallery Title</h2>
                    <ol class="breadcrumb">
                        <li><a href="<?=$path['home'];?>">Home</a></li>
                        <li><a href="<?=$path['gallery'];?>">Gallery</a></li>
                        <li class="active">Gallery Title</li>
                    </ol>
                </div>
            </div>
        </section>
        <!--================Breadcrumb Area =================-->
       
        <!--================Gallery Area =================-->
        <section class="gallery_area section_gap">
            <div class="container">
                <div class="row imageGallery1" id="gallery">
                    <div class="col-md-4 gallery_item">
                        <div class="gallery_img">
                            <img src="assets/image/gallery/01.jpg" alt="">
                            <div class="hover">
                            	<a class="light" href="assets/image/gallery/01.jpg"><i class="fa fa-expand"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 gallery_item">
                        <div class="gallery_img">
                            <img src="assets/image/gallery/02.jpg" alt="">
                            <div class="hover">
                            	<a class="light" href="assets/image/gallery/02.jpg"><i class="fa fa-expand"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 gallery_item">
                        <div class="gallery_img">
                            <img src="assets/image/gallery/03.jpg" alt="">
                            <div class="hover">
                            	<a class="light" href="assets/image/gallery/03.jpg"><i class="fa fa-expand"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 gallery_item">
                        <div class="gallery_img">
                            <img src="assets/image/gallery/04.jpg" alt="">
                            <div class="hover">
                            	<a class="light" href="assets/image/gallery/04.jpg"><i class="fa fa-expand"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 gallery_item">
                        <div class="gallery_img">
                            <img src="assets/image/gallery/06.jpg" alt="">
                            <div class="hover">
                            	<a class="light" href="assets/image/gallery/06.jpg"><i class="fa fa-expand"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 gallery_item">
                        <div class="gallery_img">
                            <img src="assets/image/gallery/05.jpg" alt="">
                            <div class="hover">
                            	<a class="light" href="assets/image/gallery/05.jpg"><i class="fa fa-expand"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--================Gallery Area =================-->
        
        <!--================ start footer Area  =================-->    
        <?php include("parts/part-footer.php");?>
        <!--================ End footer Area  =================-->
        
        <?php include("parts/part-footer-js.php");?>
    </body>
</html>