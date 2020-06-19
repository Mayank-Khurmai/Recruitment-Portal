<?php

	require("database-connection.php");
	
	class edit_question{
        private $quesid;
		private $question;
        private $option_a;
        private $option_b;
        private $option_c;
        private $option_d;
        private $option_a_ans;
        private $option_b_ans;
        private $option_c_ans;
        private $option_d_ans;
        private $is_radiobox;
        private $is_checkbox;
		private $db;
        private $query;
		function __construct($quesid,$question,$option_a,$option_b,$option_c,$option_d,$option_a_ans,$option_b_ans,$option_c_ans,$option_d_ans,$is_radiobox,$is_checkbox){
			$this->db = new db();
            $this->db = $this->db->database();
            $this->quesid = $quesid;
            $this->question = $question;
            $this->question = mysqli_real_escape_string($this->db,$this->question);
            $this->option_a = $option_a;
			$this->option_a = mysqli_real_escape_string($this->db,$this->option_a);
            $this->option_b = $option_b;
			$this->option_b = mysqli_real_escape_string($this->db,$this->option_b);
            $this->option_c = $option_c;
			$this->option_c = mysqli_real_escape_string($this->db,$this->option_c);
            $this->option_d = $option_d;
            $this->option_d = mysqli_real_escape_string($this->db,$this->option_d);
            $this->option_a_ans = $option_a_ans;
            $this->option_b_ans = $option_b_ans;
            $this->option_c_ans = $option_c_ans;
            $this->option_d_ans = $option_d_ans;
            $this->is_radiobox = $is_radiobox;
            $this->is_checkbox = $is_checkbox;
			
            $this->query = "UPDATE question_answer SET question = '$question', option_a = '$option_a', option_a_ans = '$option_a_ans', 
                            option_b = '$option_b', option_b_ans = '$option_b_ans', option_c = '$option_c', option_c_ans = '$option_c_ans', 
                            option_d = '$option_d', option_d_ans = '$option_d_ans', is_radiobox = '$is_radiobox', is_checkbox = '$is_checkbox' 
                            WHERE ques_id = '$quesid'";
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
        private $quesid;
		private $question;
        private $option_a;
        private $option_b;
        private $option_c;
        private $option_d;
        private $option_a_ans;
        private $option_b_ans;
        private $option_c_ans;
        private $option_d_ans;
        private $is_radiobox;
        private $is_checkbox;
		function __construct(){
            $this->quesid = base64_decode($_POST['quesid']);
            $this->question = base64_decode($_POST['question']);
            $this->question = trim($this->question);
            $this->question = htmlspecialchars($this->question,ENT_QUOTES);
            $this->option_a = trim($this->option_a);
            $this->option_a = htmlspecialchars($this->option_a,ENT_QUOTES);
            $this->option_b = base64_decode($_POST['option_b']);
            $this->option_b = trim($this->option_b);
            $this->option_b = htmlspecialchars($this->option_b,ENT_QUOTES);
            $this->option_c = base64_decode($_POST['option_c']);
            $this->option_a = base64_decode($_POST['option_a']);
            $this->option_c = trim($this->option_c);
            $this->option_c = htmlspecialchars($this->option_c,ENT_QUOTES);
            $this->option_d = base64_decode($_POST['option_d']);
            $this->option_d = trim($this->option_d);
            $this->option_d = htmlspecialchars($this->option_d,ENT_QUOTES);
            $this->option_a_ans = base64_decode($_POST['option_a_ans']);
            $this->option_b_ans = base64_decode($_POST['option_b_ans']);
            $this->option_c_ans = base64_decode($_POST['option_c_ans']);
            $this->option_d_ans = base64_decode($_POST['option_d_ans']);
            $this->is_radiobox = base64_decode($_POST['is_radiobox']);
            $this->is_checkbox = base64_decode($_POST['is_checkbox']);
            new edit_question(
                             $this->quesid,
                             $this->question,
                             $this->option_a,
                             $this->option_b,
                             $this->option_c,
                             $this->option_d,
                             $this->option_a_ans,
                             $this->option_b_ans,
                             $this->option_c_ans,
                             $this->option_d_ans,
                             $this->is_radiobox,
                             $this->is_checkbox
                            );
		}
	}

	new main();

?>