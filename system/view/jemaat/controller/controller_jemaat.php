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
	    	$jemaat->setId($generator->generate(32));
	    	$jemaat->setKeluargaId(check_input($_POST['keluarga']));
			$jemaat->setFirstName(check_input($_POST['first_name']));
			$jemaat->setMiddleName(check_input($_POST['middle_name']));
			$jemaat->setLastName(check_input($_POST['last_name']));
			$jemaat->setGender(check_input($_POST['gender']));
			$jemaat->setBirthday($_POST['birthday'] != "" ? check_input($_POST['birthday']) : "0000-00-00");
			$jemaat->setPhone1(check_input($_POST['phone1']));
			$jemaat->setPhone2(check_input($_POST['phone2']));
			$jemaat->setPhone3(check_input($_POST['phone3']));
			$jemaat->setNotes(check_input(nl2br($_POST['notes'], false)));
			$jemaat->setStatus(isset($_POST['status']) ? check_input($_POST['status']) : 0);

			$result = $jemaat->insert_data($crud, $jemaat);
           	if($result){
                $message = "Add New Jemaat '".$jemaat->getFirstName()."' success";
                $alert = "success";
            }else{
                $message = "Add New Jemaat '".$jemaat->getFirstName()."' failed. Please try again";
                $alert = "failed";
            }

	        $_SESSION['status'] = $message;
	        $_SESSION['alert'] = $alert;
	        header("Location:".$path['jemaat']);
	    
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