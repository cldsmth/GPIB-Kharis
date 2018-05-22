<?php
$global['absolute-url'] = "http://www.tamara.id/dev/gpib/";
$global['absolute-url-admin'] = $global['absolute-url']."admin/";
$global['root-url'] = $_SERVER['DOCUMENT_ROOT']."/dev/gpib/";
$global['api'] = $global['absolute-url']."api/";
$global['favicon'] = $global['absolute-url-admin']."/assets/images/logo.png";
$seo['company-name'] = "GPIB Kharis";
$seo['copyright'] = "Copyright ".$seo['company-name']." ".date('Y')." &copy;";

//login page
$title['login'] = $seo['company-name']." | Login";
$path['login'] = $global['absolute-url-admin'];

//home page
$title['home'] = $seo['company-name']." | Home";
$path['home'] = $global['absolute-url-admin']."module/home/index.php";
?>