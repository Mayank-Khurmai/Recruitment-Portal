<?php

    require("database-connection.php");
    require("../dompdf/autoload.inc.php");
    use Dompdf\Dompdf;
	
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
            $xy = new Dompdf();
            $this->query = "SELECT * FROM question_answer ORDER BY ques_id";
            $this->response=$this->db->query($this->query);
            $design ="<h3 style='text-align:center;text-decoration: underline;'>View All Questions</h3>";
        	if($this->response->num_rows!=0)
			{  
                $x =1;
                while($this->data=$this->response->fetch_assoc())
                {
                    $a="white";
                    $b="white";
                    $c="white";
                    $d="white";
                    if($this->data['option_a_ans']==1){$a = 'yellow';}
                    if($this->data['option_b_ans']==1){$b = 'yellow';}
                    if($this->data['option_c_ans']==1){$c = 'yellow';}
                    if($this->data['option_d_ans']==1){$d = 'yellow';}
                    
                  $design .= "
                    <table border='1px' cellspacing='1px' cellpadding='10px' width='100%'>
                                <tr>
                                    <th width='12%' bgcolor='gray'>Ques - ".$x."</th>
                                    <td bgcolor='gray'><b>".$this->data['question']."</b></td>
                                    <td bgcolor='gray' width='12%'><b>ID - ".$this->data['ques_id']."</b></td>
                                </tr>
                                <tr>
                                    <th bgcolor='gray'>A</th>
                                    <td bgcolor='".$a."' colspan='2'>".$this->data['option_a']."</td>
                                </tr>
                                <tr>
                                    <th bgcolor='gray'>B</th>      
                                    <td bgcolor='".$b."' colspan='2'>".$this->data['option_b']."</td>
                                </tr>
                                <tr>
                                    <th bgcolor='gray'>C</th>
                                    <td bgcolor='".$c."' colspan='2'>".$this->data['option_c']."</td>
                                </tr>
                                <tr>
                                    <th bgcolor='gray'>D</th>
                                    <td bgcolor='".$d."' colspan='2'>".$this->data['option_d']."</td>
                                </tr>
                            </table>
                            <br><br>
                  ";
                  $x++;
                }    
                $xy->loadHtml($design);
                $xy->setPaper("A4","portrait");
                $xy->render();
                $xy->stream("view-all-questions.pdf", array("Attachment" => false));
			    exit(0);
			}
		}
	}

	new view_all_question();

?>