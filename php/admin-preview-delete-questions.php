<?php

if(!isset($_SESSION['adminmail']))
{
    header("Location: admin-panel-login-page.php");
}
else
{
    
    require("database-connection.php");
	
	class admin_preview_delete_questions{
		private $db;
		private $query;
		private $response;
		private $data;
		function __construct(){
			$this->db = new db();
			$this->db = $this->db->database();
			
			$this->query = "SELECT * FROM question_answer";
            $this->response = $this->db->query($this->query);
			if($this->response->num_rows != 0)
			{
                echo "<table border='1px' cellspacing='1px' cellpadding='4px' style='width:100%;'>";
                echo "<tr style='background-color:yellow'><th width='10%'>Serial No.</th><th>Question</th><th width='10%'>Delete</th></tr>";
                $x=1;
                while($data = $this->response->fetch_assoc())
                {
					echo "<tr><th>".$x."</th>
						  <td style='padding-left:10px'>".$data['question']."</td>
						  <th><span style='cursor:pointer; color:red;' data='".$data['ques_id']."' class='del-question'>Delete</span></th></tr>";
					$x++;
                }
                echo "</table>";
			}
            else
            {
				echo "Data not found";
			}

		}
	}

	new admin_preview_delete_questions();

}

?>
