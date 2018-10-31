<?php
include_once($global['root-url']."class/Crud.php");
$crud = new Crud();

include_once($global['root-url']."model/Keluarga.php");
$keluarga = new Keluarga();

if(!isset($_GET['action'])){
	$_id = isset($_GET['id']) ? $_GET['id'] : "";
	$sectors = listSector();
	$datas = $keluarga->get_detail($crud, $_id);
	//var_dump($datas);
}else{

	if(isset($_GET['action'])){

	    if($_GET['action'] == "edit" && issetVar(array('id', 'new_name', 'sector'))){
	    	$keluarga->setId($crud->escape_string(check_input($_POST['id'])));
			$keluarga->setName($crud->escape_string(check_input($_POST['new_name'])));
			$keluarga->setSector($crud->escape_string(check_input($_POST['sector'])));
			$keluarga->setAddress($crud->escape_string(check_input(nl2br($_POST['address'], false))));
			$keluarga->setStatus(isset($_POST['status']) ? $_POST['status'] : 0);
			$_old_name = $crud->escape_string(check_input($_POST['old_name']));

			$check_name = $keluarga->getName() != $_old_name ? $keluarga->check_name($crud, $keluarga->getName()) : false;
			if($check_name){
				$message = "Name '".$keluarga->getName()."' already exist";
				$alert = "failed";
			}else{
				$result = $keluarga->update_data($crud, $keluarga);
               	if($result){
                    $message = "Edit Keluarga '".$keluarga->getName()."' success";
                    $alert = "success";
                }else{
                    $message = "Edit Keluarga '".$keluarga->getName()."' failed. Please try again";
                    $alert = "failed";
                }
			}

	        $_SESSION['status'] = $message;
	        $_SESSION['alert'] = $alert;
	        header("Location:".$path['keluarga']);
	    
	    } else {
	    	$_SESSION['status'] = "Action Not Found.";
	        $_SESSION['alert'] = "failed";
	        header("Location:".$path['home']);
	    }

	} else {
		$_SESSION['status'] = "Not Found.";
        $_SESSION['alert'] = "failed";
        header("Location:".$path['home']);
	}
	
}
?>