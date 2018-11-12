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
	    $total_page = hasProperty($datas, "data") ? $datas->total_page : 0;
	    $total_data = hasProperty($datas, "data") ? $datas->total_data : 0;
	    $total_data_all = hasProperty($datas, "data") ? $datas->total_data_all : 0;
    }else if($filename == "insert"){
        $keluargas = $keluarga->get_list($crud);
    }else{
    	//code import
    }

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

	    if($_GET['action'] == "add" && issetVar(array('first_name', 'last_name', 'keluarga', 'gender'))){
	    	$jemaat->setId($generator->generate(32));
	    	$jemaat->setKeluargaId(check_input($_POST['keluarga']));
			$jemaat->setFirstName(check_input($_POST['first_name']));
			$jemaat->setMiddleName(check_input($_POST['middle_name']));
			$jemaat->setLastName(check_input($_POST['last_name']));
			$jemaat->setFullName(checkFullName($jemaat->getFirstName(), $jemaat->getMiddleName(), $jemaat->getLastName()));
			$jemaat->setGender(check_input($_POST['gender']));
			$jemaat->setBirthday(check_input(checkFormatDateValue($_POST['birthday'])));
			$jemaat->setPhone1(check_input($_POST['phone1']));
			$jemaat->setPhone2(check_input($_POST['phone2']));
			$jemaat->setPhone3(check_input($_POST['phone3']));
			$jemaat->setNotes(check_input(nl2br($_POST['notes'], false)));
			$jemaat->setStatus(isset($_POST['status']) ? check_input($_POST['status']) : 0);

			$result = $jemaat->insert_data($crud, $jemaat);
           	if($result){
                $message = "Add New Jemaat '".$jemaat->getFullName()."' success";
                $alert = "success";
            }else{
                $message = "Add New Jemaat '".$jemaat->getFullName()."' failed. Please try again";
                $alert = "failed";
            }

	        $_SESSION['status'] = $message;
	        $_SESSION['alert'] = $alert;
	        header("Location:".$path['jemaat']);
	    
	    } else if($_GET['action'] == "delete" && issetVar(array('id', 'name'))){
	    	$_id = check_input($_GET['id']);
            $_name = check_input($_GET['name']);

            $result = $jemaat->delete_data($crud, $_id);
            if($result){
                $message = "Jemaat '".$_name."' success to be deleted in system";
                $alert = "success";
            }else{
                $message = "Jemaat '".$_name."' failed to be deleted in system";
                $alert = "failed";
            }

	        $_SESSION['status'] = $message;
	        $_SESSION['alert'] = $alert;
	        header("Location:".$path['jemaat']);

        } else if($_GET['action'] == "import" && isset($_FILES['file'])){
	    	error_reporting(E_ALL^E_NOTICE); //remove notice
            include_once($global['root-url']."/system/libraries/php-excel-reader/excel_reader2.php");
            include_once($global['root-url']."/system/libraries/php-excel-reader/SpreadsheetReader.php");

            $datas = "";
            $excels = save_excel("file", $global['root-url']."uploads/template/");
			if($excels['status'] == 200){
				$file_location = $excels['data']['location'];
				chmod($file_location, 0777);
				$datas = array();
				$num = 0;

				$Reader = new SpreadsheetReader($file_location);
                $totalSheet = count($Reader->sheets());
                for($i=0; $i < $totalSheet; $i++){
                    $Reader->ChangeSheet($i);
                    $index = 0;
                    $isFormat = false;
                    foreach($Reader as $Row){
                        if($index > 0){
                        	if($isFormat){
                        		if($Row[0] != ""){
                        			$sector = $Row[1];
                        			$first_name = $Row[2];
	                        		$middle_name = $Row[3];
	                        		$last_name = $Row[4];
	                        		$keluarga_name = $Row[5];
	                        		$gender = $Row[6];
	                        		$phone = $Row[7];
	                        		$status = $Row[8];
	                        		$notes = $Row[9];
	                        		$birthday = $Row[10];
	                        		$address = $Row[11];
	                        		//set array data
	                        		$datas['data'][$num]['sector'] = check_input($sector);
	                        		$datas['data'][$num]['first_name'] = check_input($first_name);
	                        		$datas['data'][$num]['middle_name'] = check_input($middle_name);
	                        		$datas['data'][$num]['last_name'] = check_input($last_name);
	                        		$datas['data'][$num]['keluarga_name'] = check_input($keluarga_name);
	                        		$datas['data'][$num]['gender'] = checkGenderValue($gender);
	                        		$datas['data'][$num]['phone'] = check_input($phone);
	                        		$datas['data'][$num]['status'] = check_input(checkStatusValue($status));
	                        		$datas['data'][$num]['notes'] = check_input($notes);
	                        		$datas['data'][$num]['birthday'] = check_input(checkFormatDateValue($birthday));
	                        		$datas['data'][$num]['address'] = check_input($address);
	                        		$num++;
                        		}
                        	}
                        }else{
                        	$columns = array(0 => array('value' => $Row[0], 'text' => "NO"),
					            1 => array('value' => $Row[1], 'text' => "SEKTOR"),
					            2 => array('value' => $Row[2], 'text' => "NAMA AWAL"),
					            3 => array('value' => $Row[3], 'text' => "NAMA AKHIR"),
					            4 => array('value' => $Row[4], 'text' => "NAMA MARGA"),
					            5 => array('value' => $Row[5], 'text' => "NAMA KELUARGA"),
					            6 => array('value' => $Row[6], 'text' => "JENIS KELAMIN"),
					            7 => array('value' => $Row[7], 'text' => "NO. TELP / HP"),
					            8 => array('value' => $Row[8], 'text' => "STATUS AKTIF"),
					            9 => array('value' => $Row[9], 'text' => "CATATAN"),
					            10 => array('value' => $Row[10], 'text' => "TANGGAL LAHIR"),
					            11 => array('value' => $Row[11], 'text' => "ALAMAT"),
					        );
                        	$array_check = array();
                        	$index_check = 0;
                        	foreach($columns as $column){
                        		if($column['value'] == $column['text']){
                        			$array_check[$index_check] = true;
                        			$index_check++;
                        		}
                        	}
                        	if(count($array_check) == count($columns)){
                        		$isFormat = true;
                        	}
                        }
                        $index++;
                    }
                }
                unlink($file_location);
			}

			var_dump(json_encode($datas));
			/*if(is_array($datas)){
				if(isset($datas['data'])){
					$message = "Import file excel success";
					$alert = "success";
				}else{
					$message = "Invalid format column file excel. Please check your file excel with the same format template";
					$alert = "failed";
				}
			}else{
				$message = "Import file excel failed";
				$alert = "failed";
			}

			$_SESSION['status'] = $message;
	        $_SESSION['alert'] = $alert;
	        header("Location:".$path['jemaat-import']);*/
	    
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