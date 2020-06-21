<?php
if(!isset($_SESSION['usermail']))
{
    header("Location: ../index.php");
}
  
else
{
    require("database-connection.php");
	
	class student_time_remain{
		private $db;
		private $query;
		private $response;
		private $data;
		function __construct(){
			$this->db = new db();
			$this->db = $this->db->database();
			$usermail = $_SESSION['usermail'];
			$this->query = "SELECT * FROM exam_time WHERE email ='$usermail'";
            $this->response = $this->db->query($this->query);
			if($this->response->num_rows != 0)
			{
                while($data = $this->response->fetch_assoc())
                {		
                    echo "
                        <span id='minute-span'>".$data['exam_duration']."</span> : <span id='second-span'>00</span></b>
                        ";
				}
            
            }
            else
            {
				echo $data['Dummy Student'];
			}
		}
	}

	new student_time_remain();

}

?>
