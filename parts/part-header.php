<header class="header_area">
    <div class="header_top">
        <div class="container">
            <div class="row">
                <div class="col-sm-6 col-5">
                    <ul class="nav social_icon">
                        <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                        <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                        <li><a href="#"><i class="fa fa-dribbble"></i></a></li>
                        <li><a href="#"><i class="fa fa-behance"></i></a></li>
                    </ul>
                </div>
                <div class="col-sm-6 col-7">
                    <div class="top_btn d-flex justify-content-end">
                        <a href="#">Gallery</a>
                        <a href="#">Tata Ibadah</a>
                        <a href="#">Warta Jemaat</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <nav class="navbar navbar-expand-lg navbar-light">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <a class="navbar-brand logo_h" href="<?=$path['home'];?>"><img src="<?=$global['absolute-url'];?>assets/image/Logo.png" alt=""></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse offset" id="navbarSupportedContent">
                <ul class="nav navbar-nav menu_nav ml-auto">
                    <li class="nav-item <?=($curpage == "home" ? "active" : "");?>"><a class="nav-link" href="<?=$path['home'];?>">Home</a></li> 
                    <!--<li class="nav-item"><a class="nav-link" href="ministries.html">Minisrtries</a></li>
                    <li class="nav-item"><a class="nav-link" href="sermons.html">Sermons</a></li>!-->
                    <li class="nav-item <?=($curpage == "event" ? "active" : "");?>"><a class="nav-link" href="#">Event</a></li>
                    <li class="nav-item <?=($curpage == "blog" ? "active" : "");?>"><a class="nav-link" href="<?=$path['blog'];?>">Blog</a></li>
                    <li class="nav-item submenu dropdown <?=($curpage == "pages" ? "active" : "");?>">
                        <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Pages</a>
                        <ul class="dropdown-menu">
                            <li class="nav-item"><a class="nav-link" href="<?=$path['gallery'];?>">Gallery</a></li>
                            <li class="nav-item"><a class="nav-link" href="#">Tata Ibadah</a></li>
                            <li class="nav-item"><a class="nav-link" href="#">Warta Jemaat</a></li>
                        </ul>
                    </li>
                    <li class="nav-item <?=($curpage == "about" ? "active" : "");?>"><a class="nav-link" href="<?=$path['about-us'];?>">About Us</a></li>
                    <li class="nav-item <?=($curpage == "contact" ? "active" : "");?>"><a class="nav-link" href="<?=$path['contact-us'];?>">Contact Us</a></li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li class="nav-item"><a href="#" class="search"><i class="lnr lnr-magnifier"></i></a></li>
                </ul>
            </div> 
        </div>
    </nav>
</header>