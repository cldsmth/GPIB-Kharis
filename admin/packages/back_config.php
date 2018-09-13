<?php
$global['absolute-url'] = "http://www.tamara.id/dev/gpib/";
$global['absolute-url-admin'] = $global['absolute-url']."admin/";
$global['root-url'] = $_SERVER['DOCUMENT_ROOT']."/dev/gpib/";
$global['root-url-class'] = $global['root-url']."class/";
$global['api'] = $global['absolute-url']."api/";
$global['favicon'] = $global['absolute-url-admin']."/assets/images/logo.png";
$seo['company-name'] = "GPIB Kharis";
$seo['copyright'] = "Copyright ".$seo['company-name']." ".date('Y')." &copy;";
$path['logout'] = "?action=logout";

//login page
$title['login'] = $seo['company-name']." | Login";
$path['login'] = $global['absolute-url-admin'];

//home page
$title['home'] = $seo['company-name']." | Home";
$path['home'] = $global['absolute-url-admin']."module/home/index.php";

//admin page
$title['admin'] = $seo['company-name']." | Admin";
$path['admin'] = $global['absolute-url-admin']."module/admin/index.php";
$path['admin-add'] = $global['absolute-url-admin']."module/admin/insert.php";
?>