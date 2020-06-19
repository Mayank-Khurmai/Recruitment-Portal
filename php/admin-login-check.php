<?php

	require("database-connection.php");
	
	class check_user{
		private $username;
        private $password;
        private $secretkey;
		private $db;
		private $query;
		private $response;
		private $tmp_pwd;
		private $data;
		function __construct($username,$password,$secretkey){
			$this->db = new db();
			$this->db = $this->db->database();
            $this->username = $username;
            $this->username = mysqli_real_escape_string($this->db,$this->username);
            $this->password = $password;
			$this->password = mysqli_real_escape_string($this->db,$this->password);
			$this->secretkey = $secretkey;
            $this->secretkey = mysqli_real_escape_string($this->db,$this->secretkey);
			
			$this->query = "SELECT * FROM admin_login_info WHERE email='$username' AND pass='$password' AND mobile='$secretkey'";
            $this->response = $this->db->query($this->query);
			if($this->response->num_rows != 0)
			{
                session_start();
                $_SESSION['adminmail'] = $username;
                echo "success";
			}
			else{
				echo "failed";
			}

		}
	}

	class main{
		private $username;
        private $password;
        private $secretkey;
		function __construct(){
            $this->username = base64_decode($_POST['username']);
            $this->username = trim($this->username);
            $this->username = htmlspecialchars($this->username,ENT_QUOTES);
            $this->password = base64_decode($_POST['password']);
            $this->password = trim($this->password);
            $this->password = htmlspecialchars($this->password,ENT_QUOTES);
            $this->secretkey = base64_decode($_POST['secretkey']);
            $this->secretkey = trim($this->secretkey);
            $this->secretkey = htmlspecialchars($this->secretkey,ENT_QUOTES);
			new check_user($this->username,$this->password,$this->secretkey);
		}
	}

	new main();

?>