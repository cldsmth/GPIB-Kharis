<?php
require_once($global['root-url-class']."Connection.php");
$obj_connect = new Connection();

if(!isset($_GET['action'])){
	$conn = $obj_connect->setup();
	
	if(isset($_SESSION['status'])){
        $message = $_SESSION['status'];
        unset($_SESSION['status']);
    } else {
        $message = "";
    }

    if(isset($_SESSION['alert'])){
        $alert = $_SESSION['alert'];
        unset($_SESSION['alert']);
    } else {
        $alert = "";
    }

    $obj_connect->close();
}
?>