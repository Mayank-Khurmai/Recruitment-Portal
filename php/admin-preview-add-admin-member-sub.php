<?php

	require("database-connection.php");
	
	class add_user{
		private $mail;
        private $name;
        private $mobile;
        private $pass;
        private $role;
		private $db;
		private $query;
		function __construct($mail,$name,$mobile,$pass,$role){
			$this->db = new db();
			$this->db = $this->db->database();
            $this->mail = $mail;
            $this->mail = mysqli_real_escape_string($this->db,$this->mail);
            $this->name = $name;
			$this->name = mysqli_real_escape_string($this->db,$this->name);
			$this->mobile = $mobile;
            $this->mobile = mysqli_real_escape_string($this->db,$this->mobile);
            $this->pass = $pass;
            $this->pass = mysqli_real_escape_string($this->db,$this->pass);
            $this->role = $role;
			$this->role = mysqli_real_escape_string($this->db,$this->role);
			
			$this->query = "INSERT INTO admin_login_info(email, name, pass, mobile, role) VALUES('$mail','$name','$pass','$mobile','$role')";
            if($this->db->query($this->query))
			{
                echo "Success";
			}
			else{
				echo "Failed";
			}

		}
	}

	class main{
		private $mail;
        private $name;
        private $mobile;
        private $pass;
        private $role;
		function __construct(){
            $this->mail = base64_decode($_POST['mail']);
            $this->mail = trim($this->mail);
            $this->mail = htmlspecialchars($this->mail,ENT_QUOTES);
            $this->name = base64_decode($_POST['name']);
            $this->name = trim($this->name);
            $this->name = htmlspecialchars($this->name,ENT_QUOTES);
            $this->mobile = base64_decode($_POST['mobile']);
            $this->mobile = trim($this->mobile);
            $this->mobile = htmlspecialchars($this->mobile,ENT_QUOTES);
            $this->pass = base64_decode($_POST['pass']);
            $this->pass = trim($this->pass);
            $this->pass = htmlspecialchars($this->pass,ENT_QUOTES);
            $this->role = base64_decode($_POST['role']);
            $this->role = trim($this->role);
            $this->role = htmlspecialchars($this->role,ENT_QUOTES);
			new add_user($this->mail,$this->name,$this->mobile,$this->pass,$this->role);
		}
	}

	new main();

?>