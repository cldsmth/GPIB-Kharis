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
	if(!isset($_GET['action'])){
		$obj_connect->up();

		if(isset($_COOKIE['cookie_datas']) && !isset($_SESSION['GpibKharis']['admin']['id'])){ //if login check me out
			//set cookie in session
			create_session($obj_encrypt, json_decode($_COOKIE['cookie_datas'], true));
		}

		$obj_connect->down();

	} else if(isset($_GET['action'])){
		if($_GET['action'] == 'logout'){
		    //set end data session
		    end_cookie();
			end_session();
			if(!isset($_SESSION['GpibKharis'])){
				header("Location:".$path['login']."?logout");
			}
		}
	}
}
?>