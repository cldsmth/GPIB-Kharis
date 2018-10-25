<?php
require_once($global['root-url-class']."Connection.php");
$obj_connect = new Connection();

require_once($global['root-url-class']."Encryption.php");
$obj_encrypt = new Encryption();

if(!isset($_SESSION['GpibKharis'])){

	$_SESSION['status'] = "You must login first.";
	$_SESSION['alert'] = "failed";
    header("Location:".$path['login']."?notLogin");

}else{
	$conn = $obj_connect->setup();
	if(isset($_COOKIE['cookie_datas']) && !isset($_SESSION['GpibKharis']['admin']['id'])){ //if login check me out
		create_session(json_decode($_COOKIE['cookie_datas'], true)); //set cookie in session
	}
	$obj_connect->close();
}
?>