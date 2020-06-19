<?php

	require("database-connection.php");
	
	class edit_question{
		private $quesid;
		private $db;
        private $query;
        private $response;
		function __construct($quesid){
			$this->db = new db();
			$this->db = $this->db->database();
            $this->quesid = $quesid;			

            $this->query = "SELECT * FROM question_answer WHERE ques_id = '$quesid'";
            $this->response = $this->db->query($this->query);
            if($this->response->num_rows != 0)
            {
                $data = $this->response->fetch_assoc();
                $x=""; $y=""; $ra=""; $rb=""; $rc=""; $rd=""; $ca=""; $cb=""; $cc=""; $cd="";
                if($data['is_radiobox'] == 1)
                {
                    $x = "checked";
                    if($data['option_a_ans'] == 1)
                        {$ra = "checked";}
                    else if($data['option_b_ans'] == 1)
                        {$rb = "checked";}
                    else if($data['option_c_ans'] == 1)
                        {$rc = "checked";}
                    else 
                        {$rd = "checked";}
                }
                else
                {
                    $y = "checked";
                    if($data['option_a_ans'] == 1)
                        {$ca = "checked";}
                    if($data['option_b_ans'] == 1)
                        {$cb = "checked";}
                    if($data['option_c_ans'] == 1)
                        {$cc = "checked";}
                    if($data['option_d_ans'] == 1)
                        {$cd = "checked";}
                }
                
                echo "
                    <form id='add-question-form'>     
                        <table class='add-question-table' border='1px' cellspacing='1px' cellpadding='10px' width='100%'>
                            <tr>
                                <th colspan='4'>
                                    ADD QUESTION 
                                </th>
                            </tr>
                            <tr>
                                <th width='15%'>Question</th>
                                <td colspan='3'><textarea id='textarea' required='required' style='width:100%; height:120px; resize:none;'>".$data['question']."</textarea></td>
                            </tr>
                            <tr>
                                <td colspan='2'></td>
                                <td colspan='2' width='18%'><div><input type='radio' ".$x." required='required' class='radio-check' name='radio_check' value='radiobox'>Single Answer</div><div><input type='radio' ".$y." required='required' class='radio-check' name='radio_check' value='checkbox'>Multiple Answers</div></td>
                            </tr>
                            <tr>
                                <th>Option A</th>
                                <td><input type='text' value='".$data['option_a']."' id='option-a' required='required' style='width:100%; padding:4px;' placeholder='Type Option A'></td>
                                <th><input type='radio' ".$ra." required='required' value='1' class='all-radio-btn' disabled='disabled' name='radio_option'></th>
                                <th><input type='checkbox' ".$ca." class='all-check-btn' id='check-a' value='1' disabled='disabled'></th>
                            </tr>
                            <tr>
                                <th>Option B</th>
                                <td><input type='text' value='".$data['option_b']."' id='option-b' required='required' style='width:100%; padding:4px;' placeholder='Type Option B'></td>
                                <th><input type='radio' ".$rb." required='required' value='2' class='all-radio-btn' disabled='disabled' name='radio_option'></th>
                                <th><input type='checkbox' ".$cb." class='all-check-btn' id='check-b' value='2' disabled='disabled'></th>
                            </tr>
                            <tr>
                                <th>Option C</th>
                                <td><input type='text' value='".$data['option_c']."' id='option-c' required='required' style='width:100%; padding:4px;' placeholder='Type Option C'></td>
                                <th><input type='radio' ".$rc." required='required' value='3' class='all-radio-btn' disabled='disabled' name='radio_option'></th>
                                <th><input type='checkbox' ".$cc." class='all-check-btn' id='check-c' value='3' disabled='disabled'></th>
                            </tr>
                            <tr>
                                <th>Option D</th>
                                <td><input type='text' value='".$data['option_d']."' id='option-d' required='required' style='width:100%; padding:4px;' placeholder='Type Option D'></td>
                                <th><input type='radio' ".$rd." required='required' value='4' class='all-radio-btn' disabled='disabled' name='radio_option'></th>
                                <th><input type='checkbox' ".$cd." class='all-check-btn' id='check-d' value='4' disabled='disabled'></th>
                            </tr>
                            <tr>
                                <th colspan='4'>
                                    <button disabled='disabled' id='add-question-btn' data='".$data['ques_id']."' class='all-php-btn'>Update Question</button>
                                </th>
                            </tr>
                        </table>
                    </form> 
            ";
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
            new edit_question($this->quesid);
		}
	}

	new main();

?>