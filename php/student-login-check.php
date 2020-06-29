<?php

	require("database-connection.php");
	
	class check_user{
		private $username;
		private $password;
		private $db;
		private $query;
		private $response;
		private $tmp_pwd;
		private $data;
		function __construct($username,$password){
			$this->db = new db();
			$this->db = $this->db->database();
            $this->username = $username;
            $this->username = mysqli_real_escape_string($this->db,$this->username);
            $this->password = $password;
            $this->password = mysqli_real_escape_string($this->db,$this->password);
			$this->query = "SELECT * FROM login_info WHERE student_no ='$password' AND email='$username' AND status='Approved'";
            $this->response = $this->db->query($this->query);
			if($this->response->num_rows != 0)
			{
                session_start();
                $_SESSION['usermail'] = $username;
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
		function __construct(){
            $this->username = base64_decode($_POST['username']);
            $this->username = trim($this->username);
			$this->username = htmlspecialchars($this->username,ENT_QUOTES);
			$this->password = base64_decode($_POST['password']);
            $this->password = trim($this->password);
            $this->password = htmlspecialchars($this->password,ENT_QUOTES);
			new check_user($this->username,$this->password);
		}
	}

	new main();


?>