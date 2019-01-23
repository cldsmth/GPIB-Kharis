<?php
    include("helpers/require.php");
    $curpage = "event";
?>
<!doctype html>
<html lang="en">
    <head>
        <title><?=$seo['event-title'];?></title>
        <meta name="keywords" content="<?=$seo['event-keyword'];?>">
        <meta name="description" content="<?=$seo['event-desc'];?>">
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
                    <h2 class="page-cover-tittle">Event Title</h2>
                    <ol class="breadcrumb">
                        <li><a href="<?=$path['home'];?>">Home</a></li>
                        <li><a href="<?=$path['event'];?>">Event</a></li>
                        <li class="active">Event Title</li>
                    </ol>
                </div>
            </div>
        </section>
        <!--================Breadcrumb Area =================-->

        <!--================Event Area =================-->
        <section class="event_details_area section_gap">
            <div class="container">
                <div class="row">
                    <div class="col-md-8">
                        <img class="img-fluid" src="assets/image/event.jpg" alt="">
                    </div>
                    <div class="col-md-4 align-self-center">
                        <ul class="list_style sermons_category event_category">
                            <li><i class="lnr lnr-user"></i>Saturday, 5th may, 2018</li>
                            <li><i class="lnr lnr-apartment"></i>Rocky beach Church</li>
                            <li><i class="lnr lnr-location"></i>Santa monica, Los Angeles, USA</li>
                        </ul>
                    </div>
                    <div class="col-md-12 event_details">
                        <h2 class="event_title">Spreading Peace to world</h2>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident.</p>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident.</p>
                    </div>
                </div>
            </div>
        </section>
        <!--================Event Area =================-->
        
        <!--================ start footer Area  =================-->    
        <?php include("parts/part-footer.php");?>
        <!--================ End footer Area  =================-->
        
        <?php include("parts/part-footer-js.php");?>
    </body>
</html>