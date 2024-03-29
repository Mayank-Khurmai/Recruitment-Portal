<?php

if(!isset($_SESSION['adminmail']))
{
    header("Location: admin-panel-login-page.php");
}
else
{
    
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
						$percent=0;
						$negative=0;
						$npercent=0;
						while($data = $this->response->fetch_assoc())
						{
							$x=0;
							$y=0;
							$visited="No";
							$attempted="No";
							$reviewed="No";
							$multi = "Yes";
							$weightage=0;
							$a="background-color:red";
							$b="background-color:red";
							$c="background-color:red";
							$d="background-color:red";
							$p = "style='background-color:red'";
							$n = "style='background-color:red'";
							if($data['marked']==1)
							{
								if($data['is_radiobox']==1)
								{
									$multi = "No";
									if($data['option_a_ans']==$data['option_a_final_ans'])
									{
										$a = "background-color:green";
									}
									if($data['option_b_ans']==$data['option_b_final_ans'])
									{
										$b = "background-color:green";
									}
									if($data['option_c_ans']==$data['option_c_final_ans'])
									{
										$c = "background-color:green";
									}
									if($data['option_d_ans']==$data['option_d_final_ans'])
									{
										$d = "background-color:green";
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
										$a = "background-color:green";
										$x+=1;
										$y+=1;
									}
									else
									{
										$y-=1;
									}
									if($data['option_b_ans']==$data['option_b_final_ans'])
									{
										$b = "background-color:green";
										$x+=1;
										$y+=1;
									}
									else
									{
										$y-=1;
									}
									if($data['option_c_ans']==$data['option_c_final_ans'])
									{
										$c = "background-color:green";
										$x+=1;
										$y+=1;
									}
									else
									{
										$y-=1;
									}
									if($data['option_d_ans']==$data['option_d_final_ans'])
									{
										$d = "background-color:green";
										$x+=1;
										$y+=1;
									}
									else
									{
										$y-=1;
									}
								}
							}
							if($data['visited']==1)
							{
								$visited = "Yes";
							}
							if($data['marked']==1)
							{
								$attempted = "Yes";
							}
							if($data['reviewed']==1)
							{
								$reviewed = "Yes";
							}
							$weightage+=$y;
							echo "	
								<tr>
								<tr>
								<td style='padding-left:5px'>".$data['student_no']."</td>
								<td style='padding-left:5px'>".$data['email']."</td>
								<th style='padding-left:5px'>".$data['ques_id']."</th>
								<th style='padding-left:5px'>".$visited."</th>
								<th style='padding-left:5px'>".$attempted."</th>
								<th style='padding-left:5px'>".$reviewed."</th>
								<th style='padding-left:5px'>".$multi."</th>
								<th style='padding-left:5px; ".$a."'>".$data['option_a_final_ans']."</th>
								<th style='padding-left:5px; ".$b."''>".$data['option_b_final_ans']."</th>
								<th style='padding-left:5px; ".$c."''>".$data['option_c_final_ans']."</th>
								<th style='padding-left:5px; ".$d."''>".$data['option_d_final_ans']."</th>
								<th style='padding-left:5px;'>".$weightage."</th>
								
								
							</tr>
								</tr>
							";
							$omarks+=$x;
							$tmarks+=4;
							$negative+=$y;
							$percent = round(($omarks/$tmarks)*100,2);
							$npercent =round(($negative/$tmarks)*100,2);
							if($percent>33)
							{
								$p = "style='background-color:green'";
							}
							if($npercent>33)
							{
								$n = "style='background-color:green'";
							}
						}
						echo "
								<tr><td style='border:none' colspan='12'></td></tr>
								<tr><td style='border:none' colspan='7'></td><td colspan='4'><b>Positive Marking</b></td><th>".$omarks."</th></tr>
								<tr><td style='border:none' colspan='7'></td><td colspan='4'><b>Negative Marking</b></td><th>".$negative."</th></tr>
								<tr><td style='border:none' colspan='7'></td><td colspan='4'><b>Total Marks</b></td><th>".$tmarks."</th></tr>
								<tr><td style='border:none' colspan='7'></td><td colspan='4' ".$p."><b>Positive Percentage</b></td><th ".$p.">".$percent."</th></tr>
								<tr><td style='border:none' colspan='7'></td><td colspan='4' ".$n."><b>Negative Percentage</b></td><th ".$n.">".$npercent."</th></tr>
								</tr>
							";
					}
					else
					{
							echo "<tr><th colspan='12'>No Data Found</th></tr>";	
					}
				}
				//Function End

		

		function __construct(){
			$this->db = new db();
			$this->db = $this->db->database();

			$this->query_a = "SELECT DISTINCT(email) FROM exam_result";
			$this->response_a = $this->db->query($this->query_a);
			if($this->response_a->num_rows!=0)
			{
				while($data = $this->response_a->fetch_assoc())
				{
					echo "<table border='3px' cellspacing='1px' cellpadding='4px' style='width:100%; margin-bottom:30px;'>";
					echo "<tr style='background-color:yellow'><th width='10%'>Student No.</th><th width='25%'>Email</th><th width='8%'>Ques ID</th><th width='5%'>Visited</th><th width='5%'>Attempted</th><th width='5%'>Reviewed</th><th width='10%'>Multi Answer</th><th>A</th><th>B</th><th>C</th><th>D</th><th width='8%'>Weightage</th></tr>";
					$dmail = $data['email'];
					$this->view_result($dmail);
					echo "</table>";

				}
			}
			else
			{
				echo "<table border='3px' cellspacing='1px' cellpadding='4px' style='width:100%; margin-bottom:30px;'>";
				echo "<tr style='background-color:yellow'><th width='10%'>Student No.</th><th width='25%'>Email</th><th width='8%'>Ques ID</th><th width='5%'>Visited</th><th width='5%'>Attempted</th><th width='5%'>Reviewed</th><th width='10%'>Multi Answer</th><th>A</th><th>B</th><th>C</th><th>D</th><th width='8%'>Weightage</th></tr>";
				echo "<tr><th colspan='12'>No Data Found</th></tr>";
				echo "</table>";	
			}


			
		}	
	}

	new admin_preview_view_detailed_result();
	
}

?>
