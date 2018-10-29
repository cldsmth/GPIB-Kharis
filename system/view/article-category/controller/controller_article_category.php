<?php
include_once($global['root-url']."class/Crud.php");
$crud = new Crud();

include_once($global['root-url']."class/RandomStringGenerator.php");
$generator = new RandomStringGenerator();

include_once($global['root-url']."model/Category.php");
$category = new Category();

if(!isset($_GET['action'])){
	$datas = $category->get_all($crud, "article");
    //var_dump($datas);
    $total_data = is_array($datas) ? count($datas) : 0;

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

	    if($_GET['action'] == "add" && issetVar(array('title'))){
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
	    
	    } else if($_GET['action'] == "delete" && issetVar(array('id', 'title'))){
            print_r($_GET);
            /*$_id = $crud->escape_string(check_input($_GET['id']));
            $_name = $crud->escape_string(check_input($_GET['name']));
            $_admin_id = $_SESSION['GpibKharis']['admin']['id'];

            if($_admin_id != $_id){
            	$result = $admin->delete_data($crud, $_id, $encrypt, $global['root-url']."uploads/admin/");
	            if($result){
	                $message = "Administrator '".$_name."' success to be deleted in system";
	                $alert = "success";
	            }else{
	                $message = "Administrator '".$_name."' failed to be deleted in system";
	                $alert = "failed";
	            }
	            $page = $path['admin'];
            }else{
            	$message = "You cannot delete '".$_name."' when you're logged in";
            	$alert = "failed";
            	$page = $path['home'];
            }

	        $_SESSION['status'] = $message;
	        $_SESSION['alert'] = $alert;
	        header("Location:".$page);*/

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