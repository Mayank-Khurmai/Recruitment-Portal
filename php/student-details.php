<?php
if(!isset($_SESSION['usermail']))
{
    header("Location: ../index.php");
}
  
else
{
    class student_preview_details{
		private $db;
		private $query;
		private $response;
		private $data;
		function __construct(){
			$this->db = new db();
			$this->db = $this->db->database();
			$usermail = $_SESSION['usermail'];
			$this->query = "SELECT name, student_no FROM login_info WHERE email ='$usermail'";
            $this->response = $this->db->query($this->query);
			if($this->response->num_rows != 0)
			{
                while($data = $this->response->fetch_assoc())
                {		
                    echo "
                        <div class='user-profile-div-fname' id='usermail-div' userid='".$usermail."'>
                            ".$data['name']."
                        </div>
                        <div class='user-profile-div-id'>
                            ".$data['student_no']."
                        </div>
                        ";
				}
            
            }
            else
            {
				echo $data['Dummy Student'];
			}


		}
	}

	new student_preview_details();

}

?>
