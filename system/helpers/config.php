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
	'favicon' => ADMIN."assets/images/logo.png"
);

$seo = array(
	'company-name' => NAME,
	'copyright' => "Copyright ".NAME." ".date('Y')." &copy;"
);

$path = array(
	'login' => ADMIN,
	'logout' => ADMIN."?action=logout",
	'decrypt-fie' => PATH."file/",
	'home' => ADMIN."view/home/",
	'admin' => ADMIN."view/admin/",
	'admin-add' => ADMIN."view/admin/new/",
	'admin-edit' => ADMIN."view/admin/update/",
	'article-category' => ADMIN."view/article-category/"
);

$title = array(
	'login' => NAME." | Login",
	'home' => NAME." | Home",
	'admin' => NAME." | Admin",
	'article-category' => NAME." | Article Category"
);
?>