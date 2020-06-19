<?php

	require("database-connection.php");
	
	class clear_response{
		private $usermail;
        private $quesid;
		private $db;
        private $query;
		function __construct($usermail,$quesid){
			$this->db = new db();
            $this->db = $this->db->database();
            $this->usermail = $usermail;
            $this->quesid = $quesid;
			
            $this->query = "UPDATE exam_result SET marked='0', reviewed='0', option_a_final_ans = '0',
                            option_b_final_ans = '0', option_c_final_ans = '0' , option_d_final_ans = '0' 
                            WHERE email = '$usermail' AND ques_id = '$quesid'";

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
        private $quesid;
		function __construct(){
            $this->usermail = trim($_POST['usermail']);
            $this->quesid = trim($_POST['quesid']);
            new clear_response(
                             $this->usermail,
                             $this->quesid,
                            );
		}
	}

	new main();

?>