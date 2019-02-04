<?php
define('PATH', "http://".$_SERVER['HTTP_HOST']."/project/gpib/");
define('ADMIN', PATH."system/");
define('ROOT', $_SERVER['DOCUMENT_ROOT']."/project/");
define('NAME', "GPIB Kharis");

$global = array(
	'absolute-url' => PATH,
	'absolute-url-admin' => ADMIN,
	'root-url' => ROOT."gpib/",
	'api' => PATH."api/",
	'favicon' => PATH."assets/image/favicon.png"
);

$seo = array(
	'company-name' => NAME,
	'copyright' => "Copyright ".NAME." ".date('Y')." &copy;",
	'home-title' => NAME." | Homepage",
	'home-keyword' => "",
	'home-desc' => "",
	'about-us-title' => NAME." | About Us",
	'about-us-keyword' => "",
	'about-us-desc' => "",
	'contact-us-title' => NAME." | Contact Us",
	'contact-us-keyword' => "",
	'contact-us-desc' => "",
	'blog-title' => NAME." | Blog",
	'blog-keyword' => "",
	'blog-desc' => "",
	'gallery-title' => NAME." | Gallery",
	'gallery-keyword' => "",
	'gallery-desc' => "",
	'event-title' => NAME." | Event",
	'event-keyword' => "",
	'event-desc' => "",
	'tata-ibadah-title' => NAME." | Tata Ibadah",
	'tata-ibadah-keyword' => "",
	'tata-ibadah-desc' => "",
	'warta-jemaat-title' => NAME." | Warta Jemaat",
	'warta-jemaat-keyword' => "",
	'warta-jemaat-desc' => ""
);

$path = array(
	'home' => PATH,
	'about-us' => PATH."about-us.php",
	'contact-us' => PATH."contact-us.php",
	'blog' => PATH."blog.php",
	'blog-detail' => PATH."blog-detail.php",
	'gallery' => PATH."gallery.php",
	'gallery-detail' => PATH."gallery-detail.php",
	'event' => PATH."event.php",
	'event-detail' => PATH."event-detail.php",
	'tata-ibadah' => PATH."tata-ibadah.php",
	'warta-jemaat' => PATH."warta-jemaat.php"
);
?>