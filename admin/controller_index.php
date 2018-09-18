<?php
require_once($global['root-url-class']."Connection.php");
$obj_connect = new Connection();

require_once($global['root-url-class']."Admin.php");
$obj_admin = new Admin();

if(!isset($_GET['action'])){

	if(isset($_COOKIE['cookie_datas'])){
        header("Location:".$path['home']);
    }else{
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
    }
    
}else{

	if(isset($_GET['action'])){

	    if($_GET['action'] == 'login' && issetVar(array('email', 'password'))){
	    	$obj_connect->up();

	        $O_email = mysql_real_escape_string(check_input($_POST['email']));
        	$O_password = mysql_real_escape_string(check_input($_POST['password']));
        	$O_remember_me = isset($_POST['remember_me']) ? $_POST['remember_me'] : "no";
        	$salt = $obj_admin->get_salt($O_email);
        	$password = substr(doHash($O_password, $salt), 0, 64);

        	$result = $obj_admin->login($O_email, $password);
	        //var_dump($result);
	        if(is_array($result)){
	        	create_session($result);
	        	if(isset($_SESSION['GpibKharis']) && $O_remember_me == "yes"){
	        		create_cookie(json_encode($_SESSION['GpibKharis']));
	        	}
	        	$page = $path['home'];
	        }else{
	        	$_SESSION['status'] = "Login failed. Please try again.";
	        	$_SESSION['alert'] = "failed";
	        	$page = $path['login'];
	        }

	        $obj_connect->down();
	        header("Location:".$page);
	    
	    } else if($_GET['action'] == 'logout'){
		    //set end data session
		    end_cookie();
			end_session();
			if(!isset($_SESSION['GpibKharis'])){
				header("Location:".$path['login']."?logout");
			}

		} else {
	    	$_SESSION['status'] = "Action Not Found.";
	        $_SESSION['alert'] = "failed";
	        header("Location:".$path['login']);
	    }

	} else {
		$_SESSION['status'] = "Not Found.";
        $_SESSION['alert'] = "failed";
        header("Location:".$path['login']);
	}
	
}
?>