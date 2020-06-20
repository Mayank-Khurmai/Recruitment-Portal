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
		private $data_b;

		

		function __construct(){
			$this->db = new db();
			$this->db = $this->db->database();

			$this->query_a = "SELECT DISTINCT(email) FROM exam_result";
			$this->response_a = $this->db->query($this->query_a);
			if($this->response_a->num_rows!=0)
			{

				
			}
			else
			{

			}


			
		}	
	}
}
	new admin_preview_view_detailed_result();
	
}

?>
