<?php

	require("database-connection.php");
	
	class view_all_question{
		private $question;
        private $option_a;
        private $option_b;
        private $option_c;
        private $option_d;
        private $option_a_ans;
        private $option_b_ans;
        private $option_c_ans;
        private $option_d_ans;
		private $db;
		private $query;
        private $response;
        private $data;
		function __construct(){
			$this->db = new db();
			$this->db = $this->db->database();
            $this->query = "SELECT * FROM question_answer ORDER BY ques_id";
            $this->response=$this->db->query($this->query);
        	if($this->response->num_rows!=0)
			{  
                $x =1;
                while($this->data=$this->response->fetch_assoc())
                {
                    $a="";
                    $b="";
                    $c="";
                    $d="";
                    if($this->data['option_a_ans']==1){$a = 'yellow';}
                    if($this->data['option_b_ans']==1){$b = 'yellow';}
                    if($this->data['option_c_ans']==1){$c = 'yellow';}
                    if($this->data['option_d_ans']==1){$d = 'yellow';}
                    
                  echo("
                    <table border='1px' cellspacing='1px' cellpadding='10px' width='100%'>
                                <tr>
                                    <th width='12%' bgcolor='gray'>Question - ".$x."</th>
                                    <td bgcolor='gray'><b>".$this->data['question']."</b></td>
                                </tr>
                                <tr>
                                    <th bgcolor='gray'>A</th>
                                    <td bgcolor='".$a."'>".$this->data['option_a']."</td>
                                </tr>
                                <tr>
                                    <th bgcolor='gray'>B</th>      
                                    <td bgcolor='".$b."'>".$this->data['option_b']."</td>
                                </tr>
                                <tr>
                                    <th bgcolor='gray'>C</th>
                                    <td bgcolor='".$c."'>".$this->data['option_c']."</td>
                                </tr>
                                <tr>
                                    <th bgcolor='gray'>D</th>
                                    <td bgcolor='".$d."'>".$this->data['option_d']."</td>
                                </tr>
                            </table>
                            <br><br>
                  ");
                  $x++;
                }    
			}
			else{
				echo "Failed";
			}
		}
	}

	new view_all_question();

?>