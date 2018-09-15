<?php
require_once($global['root-url-class']."Connection.php");
$obj_connect = new Connection();

require_once($global['root-url-class']."Admin.php");
$obj_admin = new Admin();

require_once($global['root-url-class']."Encryption.php");
$obj_encrypt = new Encryption();

if(!isset($_GET['action'])){
	$obj_connect->up();
	$O_page = isset($_GET['page']) ? $_GET['page'] : 1;

	$filename = PHPFilename();
    if($filename == "index"){
        $datas = $obj_admin->get_all($O_page);
	    //var_dump($datas);
	    $total_data = is_array($datas) ? $datas[0]['total_data_all'] : 0;
	    $total_page = is_array($datas) ? $datas[0]['total_page'] : 0;

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
        //insert.php
    }

    $obj_connect->down();

}else{

	if(isset($_GET['action'])){

	    if($_GET['action'] == 'add' && issetVar(array('email'))){
	    	$obj_connect->up();

			print_r($_POST);	        

	        $obj_connect->down();
	        /*$_SESSION['status'] = $message;
	        $_SESSION['alert'] = $alert;
	        header("Location: index.php");*/
	    
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