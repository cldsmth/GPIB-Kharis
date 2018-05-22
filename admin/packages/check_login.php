<?php
require_once($global['root-url-class']."Connection.php");
$obj_connect = new Connection();

if(!isset($_SESSION['GpibKharis'])){
	$_SESSION['status'] = "You must login first.";
	$_SESSION['alert'] = "failed";
    header("Location:".$path['login']."?notLogin");
}else{
	if(!isset($_GET['action'])){
		$obj_connect->up();

		//code line

		$obj_connect->down();
	}else if(isset($_GET['action'])){
		if($_GET['action'] == 'logout'){
		    end_session();
			if(!isset($_SESSION['GpibKharis'])){
				header("Location:".$path['login']."?logout");
			}
		}
	}
}
?>