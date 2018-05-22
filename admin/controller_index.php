<?php
require_once($global['root-url-class']."Connection.php");
$obj_connect = new Connection();

require_once($global['root-url-class']."Admin.php");
$obj_admin = new Admin();

require_once($global['root-url-class']."Encryption.php");
$obj_encrypt = new Encryption();

if(!isset($_GET['action'])){

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
    
}else{

	if(isset($_GET['action'])){

	    if($_GET['action'] == 'login'){
	    	$obj_connect->up();

	        $O_email = mysql_real_escape_string(check_input($_POST['email']));
        	$O_password = mysql_real_escape_string(check_input($_POST['password']));
        	$password = $obj_encrypt->encode($O_password);

        	$result = $obj_admin->login($O_email, $password);
	        //var_dump($result);
	        if(is_array($result)){
	        	create_session($obj_encrypt, $result);
	        	$page = $path['home'];
	        }else{
	        	$_SESSION['status'] = "Login failed. Please try again.";
	        	$_SESSION['alert'] = "failed";
	        	$page = $path['login'];
	        }

	        $obj_connect->down();
	        header("Location:".$page);
	    }

	}
	
}
?>