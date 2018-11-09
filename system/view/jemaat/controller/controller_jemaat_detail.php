<?php
include_once($global['root-url']."class/Crud.php");
$crud = new Crud();

include_once($global['root-url']."model/Jemaat.php");
$jemaat = new Jemaat();

include_once($global['root-url']."model/Keluarga.php");
$keluarga = new Keluarga();

if(!isset($_GET['action'])){
	$_id = isset($_GET['id']) ? check_input($_GET['id']) : "";
	$keluargas = $keluarga->get_list($crud);
	$datas = $jemaat->get_detail($crud, $_id);
	//var_dump($datas);
}else{

	if(isset($_GET['action'])){

	    if($_GET['action'] == "edit" && issetVar(array('id', 'first_name', 'last_name', 'keluarga', 'gender'))){
	    	$jemaat->setId(check_input($_POST['id']));
	    	$jemaat->setKeluargaId(check_input($_POST['keluarga']));
			$jemaat->setFirstName(check_input($_POST['first_name']));
			$jemaat->setMiddleName(check_input($_POST['middle_name']));
			$jemaat->setLastName(check_input($_POST['last_name']));
			$jemaat->setFullName(checkFullName($jemaat->getFirstName(), $jemaat->getMiddleName(), $jemaat->getLastName()));
			$jemaat->setGender(check_input($_POST['gender']));
			$jemaat->setBirthday($_POST['birthday'] != "" ? date("Y-m-d", strtotime(check_input($_POST['birthday']))) : "0000-00-00");
			$jemaat->setPhone1(check_input($_POST['phone1']));
			$jemaat->setPhone2(check_input($_POST['phone2']));
			$jemaat->setPhone3(check_input($_POST['phone3']));
			$jemaat->setNotes(check_input(nl2br($_POST['notes'], false)));
			$jemaat->setStatus(isset($_POST['status']) ? check_input($_POST['status']) : 0);

			$result = $jemaat->update_data($crud, $jemaat);
           	if($result){
                $message = "Edit Jemaat '".$jemaat->getFullName()."' success";
                $alert = "success";
            }else{
                $message = "Edit Jemaat '".$jemaat->getFullName()."' failed. Please try again";
                $alert = "failed";
            }

	        $_SESSION['status'] = $message;
	        $_SESSION['alert'] = $alert;
	        header("Location:".$path['jemaat']);
	    
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