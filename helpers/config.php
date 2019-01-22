<?php
define('PATH', "http://".$_SERVER['HTTP_HOST']."/gpib/");
define('ADMIN', PATH."system/");
define('ROOT', $_SERVER['DOCUMENT_ROOT']."/");
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
	'gallery-desc' => ""
);

$path = array(
	'home' => PATH,
	'about-us' => PATH."about-us.php",
	'contact-us' => PATH."contact-us.php",
	'blog' => PATH."blog.php",
	'blog-detail' => PATH."blog-detail.php",
	'gallery' => PATH."gallery.php"
);
?>