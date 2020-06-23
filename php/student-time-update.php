<?php

	require("database-connection.php");
	
	class update_time{
		private $usermail;
        private $m;
        private $s;
		private $db;
        private $query;
		function __construct($usermail,$m,$s){
			$this->db = new db();
            $this->db = $this->db->database();
            $this->usermail = $usermail;
            $this->m = $m;
            $this->s = $s;
			
            $this->query = "UPDATE exam_time SET minute_remain='$m', second_remain = '$s' 
                            WHERE email = '$usermail'";

            $this->db->query($this->query);
		}
	}

	class main{
		private $usermail;
        private $m;
        private $s;
		function __construct(){
            $this->usermail = trim($_POST['usermail']);
            $this->m = trim($_POST['m']);
            $this->s = trim($_POST['s']);
            new update_time(
                             $this->usermail,
                             $this->m,
                             $this->s
                            );
		}
	}

	new main();

?>