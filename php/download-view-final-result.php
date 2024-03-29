<?php

    require("../dompdf/autoload.inc.php");
    use Dompdf\Dompdf;   
    require("database-connection.php");

	
	class admin_preview_view_detailed_result{
		private $db;
		private $query_a;
		private $query;
		private $response_a;
		private $response;
		private $data;

		
				//function Start
				function view_result($dmail)
				{
					$this->query = "SELECT * FROM exam_result, question_answer WHERE exam_result.ques_id = question_answer.ques_id AND email='$dmail'";
					$this->response = $this->db->query($this->query);
					if($this->response->num_rows != 0)
					{ 
						$omarks=0;
						$tmarks=0;
						$studentno="";
						$email="";
						$percent=0;
						$negative=0;
						$npercent=0;
						$a = "style='background-color:red'";
						$b = "style='background-color:red'";
						while($data = $this->response->fetch_assoc())
						{
							$x=0;
							$y=0;
							$tmarks+=4;
							if($data['marked']==1)
							{
								if($data['is_radiobox']==1)
								{
									if($data['option_d_ans']==$data['option_d_final_ans'])
									{
										if($data['option_c_ans']==$data['option_c_final_ans'])
										{
											if($data['option_b_ans']==$data['option_b_final_ans'])
											{
												if($data['option_a_ans']==$data['option_a_final_ans'])
												{
													$x=4;
													$y=4;
												}
												else
												{
													$y = -1;
												}
											}
											else
											{
												$y = -1;
											}
										}
										else
										{
											$y = -1;
										}
									}	
									else
									{
										$y = -1;
									}		
								} 
								else
								{
									if($data['option_a_ans']==$data['option_a_final_ans'])
									{
										$x+=1;
										$y+=1;
									}
									else
									{
										$y-=1;
									}
									if($data['option_b_ans']==$data['option_b_final_ans'])
									{
										$x+=1;
										$y+=1;
									}
									else
									{
										$y-=1;
									}
									if($data['option_c_ans']==$data['option_c_final_ans'])
									{
										$x+=1;
										$y+=1;
									}
									else
									{
										$y-=1;
									}
									if($data['option_d_ans']==$data['option_d_final_ans'])
									{
										$x+=1;
										$y+=1;
									}
									else
									{
										$y-=1;
									}
								}
							}
							$negative+=$y;
							$omarks+=$x;
							$studentno=$data['student_no'];
							$email=$data['email'];
							$percent = round(($omarks/$tmarks)*100,2);
							$npercent = round(($negative/$tmarks)*100,2);
							if($percent>33)
							{
								$a = "style='background-color:green'";
							}
							if($npercent>33)
							{
								$b = "style='background-color:green'";
							}
						}
						$temp =  "	<tr>
								<td>".$studentno."</td>
								<td>".$email."</td>
								<th>".$omarks."</th>
								<th>".$negative."</th>
								<th>".$tmarks."</th>
								<th ".$a.">".$percent."</th>
								<th ".$b.">".$npercent."</th>
								</tr>
                            ";
                        return $temp;
					}
				}
				//Function End

		

		function __construct(){
			$this->db = new db();
            $this->db = $this->db->database();
            $xy = new Dompdf();

			$this->query_a = "SELECT DISTINCT(email) FROM exam_result";
            $this->response_a = $this->db->query($this->query_a);
            $design ="<h3 style='text-align:center;text-decoration: underline;'>View Final Result</h3>";
			if($this->response_a->num_rows!=0)
			{
				$design .= "<table border='1px' cellspacing='1px' cellpadding='4px' style='width:100%;'>";
				$design .= "<tr style='background-color:yellow'><th>Student No.</th><th>Email</th><th>Positive Marking</th><th>Negative Marking</th><th>Total Marks</th><th>Positive Percentage</th><th>Negative Percentage</th></tr>";
						
				while($data = $this->response_a->fetch_assoc())
				{
					$dmail = $data['email'];
					$design .= $this->view_result($dmail);

				}

				$design .= "</table>";
			}
			else
			{
				$design .= "<table border='1px' cellspacing='1px' cellpadding='4px' style='width:100%;'>";
				$design .= "<tr style='background-color:yellow'><th width='15%'>Student No.</th><th width='30%'>Email</th><th width='10%'>Positive Marking</th><th width='10%'>Negative Marking</th><th width='10%'>Total Marks</th><th width='10%'>Positive Percentage</th><th width='10%'>Negative Percentage</th></tr>";
				$design .= "<tr><th colspan='7'>No Data Found</th></tr>";
				$design .= "</table>";
            }
            $xy->loadHtml($design);
            $xy->setPaper("A4","portrait");
            $xy->render();
            $xy->stream();


			
		}	
	}

	new admin_preview_view_detailed_result();
	

?>
