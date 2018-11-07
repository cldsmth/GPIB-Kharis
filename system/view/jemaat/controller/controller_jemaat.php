<?php
include_once($global['root-url']."class/Crud.php");
$crud = new Crud();

include_once($global['root-url']."class/RandomStringGenerator.php");
$generator = new RandomStringGenerator();

include_once($global['root-url']."model/Jemaat.php");
$jemaat = new Jemaat();

include_once($global['root-url']."model/Keluarga.php");
$keluarga = new Keluarga();

if(!isset($_GET['action'])){
	$_page = isset($_GET['page']) ? check_input($_GET['page']) : 1;
	$filename = PHPFilename();
    if($filename == "index"){
        $datas = $jemaat->get_all($crud, $_page);
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
        $keluargas = $keluarga->get_list($crud);
    }
}else{

	if(isset($_GET['action'])){

	    if($_GET['action'] == "add" && issetVar(array('first_name', 'middle_name', 'last_name', 'keluarga', 'gender'))){
	    	print_r($_POST);
	    	/*$keluarga->setId($generator->generate(32));
			$keluarga->setName($crud->escape_string(check_input($_POST['name'])));
			$keluarga->setSector($crud->escape_string(check_input($_POST['sector'])));
			$keluarga->setAddress($crud->escape_string(check_input(nl2br($_POST['address'], false))));
			$keluarga->setStatus(isset($_POST['status']) ? $_POST['status'] : 0);

			$check_name = $keluarga->check_name($crud, $keluarga->getName());
			if($check_name){
				$message = "Name '".$keluarga->getName()."' already exist";
				$alert = "failed";
			}else{
				$result = $keluarga->insert_data($crud, $keluarga);
               	if($result){
                    $message = "Add New Keluarga '".$keluarga->getName()."' success";
                    $alert = "success";
                }else{
                    $message = "Add New Keluarga '".$keluarga->getName()."' failed. Please try again";
                    $alert = "failed";
                }
			}

	        $_SESSION['status'] = $message;
	        $_SESSION['alert'] = $alert;
	        header("Location:".$path['keluarga']);*/
	    
	    } else if($_GET['action'] == "delete" && issetVar(array('id', 'name'))){
	    	print_r($_POST);
            /*$_id = $crud->escape_string(check_input($_GET['id']));
            $_name = $crud->escape_string(check_input($_GET['name']));

            $result = $keluarga->delete_data($crud, $_id);
            if($result){
                $message = "Keluarga '".$_name."' success to be deleted in system";
                $alert = "success";
            }else{
                $message = "Keluarga '".$_name."' failed to be deleted in system";
                $alert = "failed";
            }

	        $_SESSION['status'] = $message;
	        $_SESSION['alert'] = $alert;
	        header("Location:".$path['keluarga']);*/

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