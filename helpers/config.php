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
	'home-desc' => ""
);

$path = array(
	'home' => PATH,
);

?>