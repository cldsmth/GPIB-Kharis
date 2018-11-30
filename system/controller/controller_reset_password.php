<?php
include_once($global['root-url']."class/Crud.php");
$crud = new Crud();

include_once($global['root-url']."class/Encryption.php");
$encrypt = new Encryption();

include_once($global['root-url']."model/Admin.php");
$admin = new Admin();

if(!isset($_GET['action'])){
	$_p1 = isset($_GET['p1']) ? check_input($_GET['p1']) : "";
	$_p2 = isset($_GET['p2']) ? check_input($_GET['p2']) : "";

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

	    if($_GET['action'] == 'reset' && issetVar(array('p1', 'p2', 'password', 'repassword'))){
	    	$_p1 = check_input($_POST['p1']);
	    	$_p2 = check_input($_POST['p2']);
	    	$_password = check_input($_POST['password']);
            $_repassword = check_input($_POST['repassword']);
            $_url = check_input($_POST['url']);

            echo "E-mail: ".$encrypt->encrypt_decrypt("decrypt", $_p1)."<br>";
            echo "Reset Code: ".$encrypt->encrypt_decrypt("decrypt", $_p2)."<br>";

	        /*$_email = check_input($_POST['email']);
	        $_password = check_input($_POST['password']);
        	$_remember_me = isset($_POST['remember_me']) ? check_input($_POST['remember_me']) : "no";
        	$salt = $admin->get_salt($crud, $_email);
        	$password = substr(doHash($_password, $salt), 0, 64);

        	$result = $admin->login($crud, $_email, $password);
	        //var_dump($result);
	        if(hasProperty($result, "id")){
	        	if($result->status == 1){
	        		create_session($result);
		        	if(isset($_SESSION['GpibKharis']) && $_remember_me == "yes"){
		        		create_cookie(json_encode($_SESSION['GpibKharis']));
		        	}
	        		$page = $path['home'];
	        	}else{
	        		$_SESSION['status'] = "Login failed. Your account has been inactive";
		        	$_SESSION['alert'] = "failed";
		        	$page = $path['login'];
	        	}
	        }else{
	        	$_SESSION['status'] = "Login failed. Please try again";
	        	$_SESSION['alert'] = "failed";
	        	$page = $path['login'];
	        }
	        header("Location:".$page);*/
	    
		} else {
	    	$_SESSION['status'] = "Action Not Found.";
	        $_SESSION['alert'] = "failed";
	        header("Location:".$path['reset-password']);
	    }

	} else {
		$_SESSION['status'] = "Not Found.";
        $_SESSION['alert'] = "failed";
        header("Location:".$path['reset-password']);
	}
	
}
?>