<?php

	require("database-connection.php");
	
	class new_visit{
		private $usermail;
        private $quesid;
		private $db;
		private $query;
		function __construct($usermail,$quesid){
			$this->db = new db();
			$this->db = $this->db->database();
            $this->usermail = $usermail;
            $this->quesid = $quesid;
			

           $this->query = "UPDATE exam_result SET visited='1' WHERE email = '$usermail' AND ques_id = '$quesid'";
           $this->db->query($this->query);
		}
	}

	class main{
		private $usermail;
        private $quesid;
		function __construct(){
            $this->usermail = trim($_POST['usermail']);
            $this->quesid = trim($_POST['quesid']);

            new new_visit(
                             $this->usermail,
                             $this->quesid  
                            );
		}
	}

	new main();

?>