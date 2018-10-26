<?php
$global['absolute-url'] = "http://".$_SERVER['HTTP_HOST']."/gpib/";
$global['absolute-url-admin'] = $global['absolute-url']."admin/";
$global['root-url'] = $_SERVER['DOCUMENT_ROOT']."/gpib/";
$global['root-url-class'] = $global['root-url']."class/";
$global['api'] = $global['absolute-url']."api/";
$global['favicon'] = $global['absolute-url-admin']."/assets/images/logo.png";
$seo['company-name'] = "GPIB Kharis";
$seo['copyright'] = "Copyright ".$seo['company-name']." ".date('Y')." &copy;";
?>