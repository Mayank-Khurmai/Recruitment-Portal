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
					$m=$data['minute_remain'];
					$s=$data['second_remain'];
					if($s<10)
					{
						$s ="0".$data['second_remain'];
					}
                    echo "
                        <span id='minute-span'>".$m."</span> : <span id='second-span'>".$s."</span></b>
                        ";
				}
            
            }
            else
            {
				echo $data['Time Not Set'];
			}
		}
	}

	new student_time_remain();

}

?>
