<?php

	require("database-connection.php");
	
	class remove_student{
		private $usermail;
		private $db;
        private $query;
		function __construct($usermail){
			$this->db = new db();
			$this->db = $this->db->database();
            $this->usermail = $usermail;			

            $this->query = "DELETE FROM login_info WHERE email = '$usermail'";
            if($this->db->query($this->query))
            {
                echo "success";
            }
            else
            {
                echo "failed";
            }
           
		}
	}

	class main{
		private $usermail;
		function __construct(){
            $this->usermail = trim($_POST['usermail']);
            new remove_student($this->usermail);
		}
	}

	new main();

?>