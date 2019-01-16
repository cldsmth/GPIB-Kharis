<?php
header("content-type: application/json");
header("access-control-allow-origin: *");
include_once(dirname(dirname(__FILE__))."/helpers/require_api.php");

if(isset($_GET['action'])){//start gate

	include_once($global['root-url']."class/Crud.php");
	$crud = new Crud();

	include_once($global['root-url']."model/Admin.php");
	$admin = new Admin();

	//===================================== export ========================================
	if($_GET['action'] == 'check_email' && issetVar(array('admin_id', 'auth_code', 'email'))){
		$_admin_id = $crud->escape_string(check_input($_POST['admin_id']));
		$_auth_code = $crud->escape_string(check_input($_POST['auth_code']));
		$_email = $crud->escape_string(check_input($_POST['email']));
		
		if($admin->check_code($crud, $_admin_id, $_auth_code)){
			$result = $admin->check_email($crud, $_email);
			if($result){
				$_message = array("status" => "400", "message" => "E-mail ".$_email." already exist");
			}else{
				$_message = array("status" => "200", "message" => "E-mail ".$_email." available");
			}
		}else{
			$_message = array("status" => "401", "message" => "Unauthorized");
		}
		echo json_encode($_message);
	}

	else{
		$_message = array("status" => "404", "message" => "Action Not Found");
		echo json_encode($_message);
	}
}//end gate
else{
	$_message = array("status" => "404", "message" => "Not Found");
	echo json_encode($_message);
}
?>