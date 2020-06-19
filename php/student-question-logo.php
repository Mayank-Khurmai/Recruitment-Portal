<?php
if(!isset($_SESSION['usermail']))
{
    header("Location: ../index.php");
}
  
else
{
	class student_preview_question_logo{
		private $db;
		private $query;
		private $response;
		private $data;
		function __construct(){
			$this->db = new db();
			$this->db = $this->db->database();
			$usermail = $_SESSION['usermail'];
			$this->query = "SELECT * FROM question_answer, exam_result WHERE question_answer.ques_id = exam_result.ques_id AND exam_result.email ='$usermail'";
            $this->response = $this->db->query($this->query);
			if($this->response->num_rows != 0)

			{
            $x=1;
            while($data = $this->response->fetch_assoc())
                {
					echo "<div class='question-no-box ques-no-id'";

						if($data['visited']==1)
						{
							if($data['marked']==1)
							{
								if($data['reviewed']==1)
								{
									echo "style='background-color: blue'";
								}
								else{
									echo "style='background-color: green'";
								}
							}

							else
							{
								echo "style='background-color: white'";
							}
						}  
							
					echo "quesid='".$data['ques_id']."' visited='".$data['visited']."' reviewed='".$data['reviewed']."' quesno='".$x."'
						  marked='".$data['marked']."'  question='".$data['question']."' optiona='".$data['option_a']."' 
						  optionb='".$data['option_b']."' optionc='".$data['option_c']."' optiond='".$data['option_d']."'
						  option_a_ans='".$data['option_a_final_ans']."' option_b_ans='".$data['option_b_final_ans']."'
						  option_c_ans='".$data['option_c_final_ans']."' option_d_ans='".$data['option_d_final_ans']."'
						  quesno='".$x."' isradiobox='".$data['is_radiobox']."'>
							<div class='question-no-box-text'>".$x."</div>
						</div>
						";
                        $x++;
				}
            
            }
            else
            {
				echo " <div style='padding:5px'>
						 Approval Pending by the Admin!
						<br> Please Contact the Invigilator
						<br> <button style='padding:6px; margin:4px;background-color:red; outline:none; border:2px solid black; border-radius:10px; cursor:pointer' onclick='location.reload();'>Reload Page</button>
						</div>
						";
			}


		}
	}

	new student_preview_question_logo();

}

?>
