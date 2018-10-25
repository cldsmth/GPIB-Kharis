<?php
class Connection{
	
	//Include database connection settings
	const USERNAME = "root";
	const PASSWORD = "";
	const HOSTNAME = "localhost";
	const DATABASE = "cldsmth_gpib";
    
	public function setup(){
		$link = mysqli_connect(self::HOSTNAME, self::USERNAME, self::PASSWORD, self::DATABASE);
		/* check connection */
		if(mysqli_connect_errno()){
		    printf("Connect failed: %s\n", mysqli_connect_error());
		    exit();
		}else{
			return $link;
		}
	}

	public function close(){
		$link = mysqli_connect(self::HOSTNAME, self::USERNAME, self::PASSWORD, self::DATABASE);
		mysqli_close($link);
	}

}
?>