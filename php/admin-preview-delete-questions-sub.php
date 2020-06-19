<?php

	require("database-connection.php");
	
	class delete_question{
		private $quesid;
		private $db;
		private $query_a;
		private $query_b;
		function __construct($quesid){
			$this->db = new db();
			$this->db = $this->db->database();
            $this->quesid = $quesid;			

            $this->query_a = "DELETE FROM question_answer WHERE ques_id = '$quesid'";
            if($this->db->query($this->query_a))
            {
				$this->query_b = "DELETE FROM exam_result WHERE ques_id = '$quesid'";
				if($this->db->query($this->query_b))
				{
					echo "success";
				}	
				else
				{
					echo "failed";
				}
            }
            else
            {
                echo "failed";
            }
           
		}
	}

	class main{
		private $quesid;
		function __construct(){
            $this->quesid = trim($_POST['quesid']);
            new delete_question($this->quesid);
		}
	}

	new main();

?>