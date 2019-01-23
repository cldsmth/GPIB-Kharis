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
                    <h2 class="page-cover-tittle">Event</h2>
                    <ol class="breadcrumb">
                        <li><a href="<?=$path['home'];?>">Home</a></li>
                        <li class="active">Event</li>
                    </ol>
                </div>
            </div>
        </section>
        <!--================Breadcrumb Area =================-->
       
        <!--================Event Date Area =================-->
        <section class="event_date_area">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 d_flex">
                        <div class="evet_location flex">
                            <h3>Spreading the faith to all</h3>
                            <p><span class="lnr lnr-calendar-full"></span>5th may, 2018</p>
                            <p><span class="lnr lnr-clock"></span>Saturday, 09.00 am to 05.00 pm</p>
                        </div>
                    </div>
                    <div class="col-md-6 event_time">
                        <h4>Our Next Event Starts in</h4>
                        <div id="timer" class="timer">
                            <div class="timer__section days">
                                <div class="timer__number"></div>
                                <div class="timer__label">days</div>
                            </div>
                            <div class="timer__section hours">
                                <div class="timer__number"></div>
                                <div class="timer__label">hours</div>
                            </div>
                            <div class="timer__section minutes">
                                <div class="timer__number"></div>
                                <div class="timer__label">Minutes</div>
                            </div>
                            <div class="timer__section seconds">
                                <div class="timer__number"></div>
                                <div class="timer__label">seconds</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--================Event Date Area =================-->
        
        <!--================Event Blog Area=================-->
        <section class="event_blog_area section_gap">
            <div class="container">
                <div class="row event_two">
                    <div class="col-lg-4 col-sm-6">
                        <div class="event_post">
                            <img src="assets/image/blog1.jpg" alt="">
                            <a href="<?=$path['event-detail'];?>"><h2 class="event_title">Spreading Peace to world</h2></a>
                            <ul class="list_style sermons_category event_category">
                                <li><i class="lnr lnr-user"></i>Saturday, 5th may, 2018</li>
                                <li><i class="lnr lnr-apartment"></i>Rocky beach Church</li>
                                <li><i class="lnr lnr-location"></i>Santa monica, Los Angeles, USA</li>
                            </ul>
                            <a href="<?=$path['event-detail'];?>" class="btn_hover">View Details</a>
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-6">
                        <div class="event_post">
                            <img src="assets/image/blog2.jpg" alt="">
                            <a href="<?=$path['event-detail'];?>"><h2 class="event_title">Spread Happyness to world</h2></a>
                            <ul class="list_style sermons_category event_category">
                                <li><i class="lnr lnr-user"></i>Saturday, 5th may, 2018</li>
                                <li><i class="lnr lnr-apartment"></i>Rocky beach Church</li>
                                <li><i class="lnr lnr-location"></i>Santa monica, Los Angeles, USA</li>
                            </ul>
                            <a href="<?=$path['event-detail'];?>" class="btn_hover">View Details</a>
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-6">
                        <div class="event_post">
                            <img src="assets/image/blog3.jpg" alt="">
                            <a href="<?=$path['event-detail'];?>"><h2 class="event_title">Spreading Light to world</h2></a>
                            <ul class="list_style sermons_category event_category">
                                <li><i class="lnr lnr-user"></i>Saturday, 5th may, 2018</li>
                                <li><i class="lnr lnr-apartment"></i>Rocky beach Church</li>
                                <li><i class="lnr lnr-location"></i>Santa monica, Los Angeles, USA</li>
                            </ul>
                            <a href="<?=$path['event-detail'];?>" class="btn_hover">View Details</a>
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-6">
                        <div class="event_post">
                            <img src="assets/image/blog1.jpg" alt="">
                            <a href="<?=$path['event-detail'];?>"><h2 class="event_title">Spreading Peace to world</h2></a>
                            <ul class="list_style sermons_category event_category">
                                <li><i class="lnr lnr-user"></i>Saturday, 5th may, 2018</li>
                                <li><i class="lnr lnr-apartment"></i>Rocky beach Church</li>
                                <li><i class="lnr lnr-location"></i>Santa monica, Los Angeles, USA</li>
                            </ul>
                            <a href="<?=$path['event-detail'];?>" class="btn_hover">View Details</a>
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-6">
                        <div class="event_post">
                            <img src="assets/image/blog2.jpg" alt="">
                            <a href="<?=$path['event-detail'];?>"><h2 class="event_title">Spread Happyness to world</h2></a>
                            <ul class="list_style sermons_category event_category">
                                <li><i class="lnr lnr-user"></i>Saturday, 5th may, 2018</li>
                                <li><i class="lnr lnr-apartment"></i>Rocky beach Church</li>
                                <li><i class="lnr lnr-location"></i>Santa monica, Los Angeles, USA</li>
                            </ul>
                            <a href="<?=$path['event-detail'];?>" class="btn_hover">View Details</a>
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-6">
                        <div class="event_post">
                            <img src="assets/image/blog3.jpg" alt="">
                            <a href="<?=$path['event-detail'];?>"><h2 class="event_title">Spreading Light to world</h2></a>
                            <ul class="list_style sermons_category event_category">
                                <li><i class="lnr lnr-user"></i>Saturday, 5th may, 2018</li>
                                <li><i class="lnr lnr-apartment"></i>Rocky beach Church</li>
                                <li><i class="lnr lnr-location"></i>Santa monica, Los Angeles, USA</li>
                            </ul>
                            <a href="<?=$path['event-detail'];?>" class="btn_hover">View Details</a>
                        </div>
                    </div>
                </div>
                <br>
                <nav class="blog-pagination justify-content-center d-flex">
                    <ul class="pagination">
                        <li class="page-item">
                            <a href="#" class="page-link" aria-label="Previous">
                                <span aria-hidden="true">
                                    <span class="lnr lnr-chevron-left"></span>
                                </span>
                            </a>
                        </li>
                        <li class="page-item"><a href="#" class="page-link">01</a></li>
                        <li class="page-item active"><a href="#" class="page-link">02</a></li>
                        <li class="page-item"><a href="#" class="page-link">03</a></li>
                        <li class="page-item"><a href="#" class="page-link">04</a></li>
                        <li class="page-item"><a href="#" class="page-link">09</a></li>
                        <li class="page-item">
                            <a href="#" class="page-link" aria-label="Next">
                                <span aria-hidden="true">
                                    <span class="lnr lnr-chevron-right"></span>
                                </span>
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>
        </section>
        <!--================Blog Area=================-->
        
        <!--================ start footer Area  =================-->    
        <?php include("parts/part-footer.php");?>
        <!--================ End footer Area  =================-->
        
        <?php include("parts/part-footer-js.php");?>
    </body>
</html>