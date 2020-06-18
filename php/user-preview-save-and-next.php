<?php

	require("database-connection.php");
	
	class save_and_next{
		private $usermail;
        private $quesid;
        private $option_a_ans;
        private $option_b_ans;
        private $option_c_ans;
        private $option_d_ans;
		private $db;
        private $query;
		function __construct($usermail,$quesid,$option_a_ans,$option_b_ans,$option_c_ans,$option_d_ans){
			$this->db = new db();
            $this->db = $this->db->database();
            $this->usermail = $usermail;
            $this->quesid = $quesid;
            $this->option_a_ans = $option_a_ans;
            $this->option_b_ans = $option_b_ans;
            $this->option_c_ans = $option_c_ans;
            $this->option_d_ans = $option_d_ans;
			
            $this->query = "UPDATE exam_result SET marked='1', reviewed='0', option_a_final_ans = '$option_a_ans',
                            option_b_final_ans = '$option_b_ans', option_c_final_ans = '$option_c_ans' , option_d_final_ans = '$option_d_ans' 
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
        private $option_a_ans;
        private $option_b_ans;
        private $option_c_ans;
        private $option_d_ans;
		function __construct(){
            $this->usermail = trim($_POST['usermail']);
            $this->quesid = trim($_POST['quesid']);
            $this->option_a_ans = $_POST['option_a_ans'];
            $this->option_b_ans = $_POST['option_b_ans'];
            $this->option_c_ans = $_POST['option_c_ans'];
            $this->option_d_ans = $_POST['option_d_ans'];
            new save_and_next(
                             $this->usermail,
                             $this->quesid,
                             $this->option_a_ans,
                             $this->option_b_ans,
                             $this->option_c_ans,
                             $this->option_d_ans
                            );
		}
	}

	new main();

?>