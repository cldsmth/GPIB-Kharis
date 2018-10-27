<?php
include_once($global['root-url']."class/Crud.php");
$crud = new Crud();

include_once($global['root-url']."class/Encryption.php");
$encrypt = new Encryption();

include_once($global['root-url']."class/SimpleImage.php");
$image = new SimpleImage();

include_once($global['root-url']."model/Admin.php");
$admin = new Admin();

if(!isset($_GET['action'])){
	$_id = isset($_GET['id']) ? $_GET['id'] : "";
	$datas = $admin->get_detail($crud, $_id);
	//var_dump($datas);
}else{

	if(isset($_GET['action'])){

	    if($_GET['action'] == "edit" && issetVar(array('id', 'name', 'email'))){
	    	print_r($_POST);
	    	/*$admin->setId($generator->generate(32));
			$admin->setName($crud->escape_string(check_input($_POST['name'])));
			$admin->setEmail($crud->escape_string(check_input($_POST['email'])));
			$admin->setPassword($crud->escape_string(check_input($_POST['password'])));
			$admin->setRepassword($crud->escape_string(check_input($_POST['repassword'])));
			$admin->setStatus(isset($_POST['status']) ? $_POST['status'] : 0);
			$admin->setAuthCode(generate_code(32));
			$admin->setSaltHash(substr(md5(time()), 0, 5));
            $password = substr(doHash($admin->getPassword(), $admin->getSaltHash()), 0, 64);

			$check_email = $admin->check_email($crud, $admin->getEmail());
			if($check_email){
				$message = "E-mail '".$admin->getEmail()."' already exist";
				$alert = "failed";
			}else{
				if($admin->getPassword() == $admin->getRepassword()){
					$admin->setPassword($password);
					$images = save_image($image, "image", $global['root-url']."uploads/admin/");
					if($images['status'] == 200){
						$admin->setImage($encrypt->encrypt_decrypt("encrypt", $images['data']['filename']));
					}
					$result = $admin->insert_data($crud, $admin);
	               	if($result){
	                    $message = "Add New Administrator '".$admin->getName()."' success";
	                    $alert = "success";
	                }else{
	                    $message = "Add New Administrator '".$admin->getName()."' failed. Please try again";
	                    $alert = "failed";
	                }
				}else{
					$message = "Password does not match";
	                $alert = "failed";
				}
			}

	        $_SESSION['status'] = $message;
	        $_SESSION['alert'] = $alert;
	        header("Location:".$path['admin']);*/
	    
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