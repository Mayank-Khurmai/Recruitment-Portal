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
		private $query;
		private $response;
		private $data;
		function __construct(){
			$this->db = new db();
			$this->db = $this->db->database();

			$this->query = "SELECT * FROM exam_result, question_answer WHERE exam_result.ques_id = question_answer.ques_id";
			$this->response = $this->db->query($this->query);
			if($this->response->num_rows != 0)
			{
				echo "<table border='1px' cellspacing='1px' cellpadding='4px' style='width:100%;'>";
				echo "<tr style='background-color:yellow'><th width='10%'>Student No.</th><th width='25%'>Email</th><th width='8%'>Ques ID</th><th width='10%'>Multi Answer</th><th width='5%'>Visited</th><th width='5%'>Attempted</th><th width='5%'>Reviewed</th><th>A</th><th>B</th><th>C</th><th>D</th><th width='8%'>Weightage</th></tr>";
				while($data = $this->response->fetch_assoc())
				{
					$x=0;
					$visited="No";
					$attempted="No";
					$reviewed="No";
					$multi = "No";
					$a="background-color:red";
					$b="background-color:red";
					$c="background-color:red";
					$d="background-color:red";
					if($data['marked']==1)
					{
						if($data['is_radiobox']==1)
						{
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
											$x=1;
										}
									}
								}
							}			
						} 
						else
						{
							if($data['option_a_ans']==$data['option_a_final_ans'])
							{
								$a = "background-color:green";
								$x+=0.25;
							}
							if($data['option_b_ans']==$data['option_b_final_ans'])
							{
								$b = "background-color:green";
								$x+=0.25;
							}
							if($data['option_c_ans']==$data['option_c_final_ans'])
							{
								$c = "background-color:green";
								$x+=0.25;
							}
							if($data['option_d_ans']==$data['option_d_final_ans'])
							{
								$d = "background-color:green";
								$x+=0.25;
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
						$reviewed= "Yes";
					}
					if($data['is_radiobox']==0)
					{
						$multi ="Yes";
					}
					
					echo "
						<tr>
							<td style='padding-left:5px'>".$data['student_no']."</td>
							<td style='padding-left:5px'>".$data['email']."</td>
							<th style='padding-left:5px'>".$data['ques_id']."</th>
							<th style='padding-left:5px'>".$multi."</th>
							<th style='padding-left:5px'>".$visited."</th>
							<th style='padding-left:5px'>".$attempted."</th>
							<th style='padding-left:5px'>".$reviewed."</th>
							<th style='padding-left:5px; ".$a."'>".$data['option_a_final_ans']."</th>
							<th style='padding-left:5px; ".$b."''>".$data['option_b_final_ans']."</th>
							<th style='padding-left:5px; ".$c."''>".$data['option_c_final_ans']."</th>
							<th style='padding-left:5px; ".$d."''>".$data['option_d_final_ans']."</th>
							<th style='padding-left:5px;'>".$x."</th>
						</tr>
						";
				}
				echo "</table>";
			}
			else
			{
				echo "<table border='1px' cellspacing='1px' cellpadding='4px' style='width:100%;'>
						<tr style='background-color:yellow'><th width='10%'>Student No.</th><th width='25%'>Email</th><th width='8%'>Ques ID</th><th width='5%'>Visited</th><th width='5%'>Attempted</th><th width='5%'>Reviewed</th><th width='10%'>Multi Answer</th><th>A</th><th>B</th><th>C</th><th>D</th><th width='8%'>Weightage</th></tr>
						<tr><th colspan='12'>No Data Found</th></tr>
			  			</table>
					";	
			}
		}
	}

	new admin_preview_view_detailed_result();
	
}

?>
