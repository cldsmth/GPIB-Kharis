<?php
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
	        $N_email = $_POST['email'];
	        $N_password = $_POST['password'];

	        if($N_email == "dean11.cliff@gmail.com" && $N_password == "password"){
	        	$message = "Login success";
	        	$alert = "success";
	        }else{
	        	$message = "Login failed. Please try again.";
	        	$alert = "failed";
	        }

	        $_SESSION['status'] = $message;
	        $_SESSION['alert'] = $alert;
	        header("Location:".$path['login']);
	    }
	}
}
?>