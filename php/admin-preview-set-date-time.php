<?php

if(!isset($_SESSION['adminmail']))
{
    header("Location: admin-panel-login-page.php");
}
else
{
    
    require("database-connection.php");
	
	class admin_preview_view_all_user{
		private $db;
		private $query;
		private $response;
		private $data;
		function __construct(){
			$this->db = new db();
			$this->db = $this->db->database();
			
			$this->query = "SELECT * FROM exam_date_time";
            $this->response = $this->db->query($this->query);
			if($this->response->num_rows != 0)
			{
               $data = $this->response->fetch_assoc();
                echo "
                    <table width='100%' cellspacing='0px' cellpadding='7px'>
                    <tr>
                        <th colspan='4'><span style='font-size:20px'>Exam Date </span></th>
                    </tr>
                    <tr>
                        <th colspan='4'><input id='date-span' value='".$data['exam_date']."' type='date' style='width:210px; height:40px; font-size:25px; color:red'></th>
                    </tr>
                    <tr><td colspan='4'></td></tr>
                    <tr><td colspan='4'></td></tr>
                    <tr>
                        <th width='20%'></th>
                        <th width='30%'><span style='font-size:15px'>Exam Start Time</span></th>
                        <th width='30%'><span style='font-size:15px'>Exam End Time</span></th>
                        <th width='20%'></th>
                    </tr>
                    <tr>
                        <th></th>
                        <th><input id='start-time-span' value='".$data['exam_time_start']."' type='time' min='00:00' max='24:00' style='width:120px; height:40px; font-size:25px; color:red'></th>
                        <th><input id='end-time-span' value='".$data['exam_time_end']."' type='time' min='00:00' max='24:00' style='width:120px; height:40px; font-size:25px; color:red'></th>
                        <th></th>
                    </tr>
                    <tr><td colspan='4'></td></tr>
                    <tr><td colspan='4'></td></tr>
                    <tr>
                        <th colspan='4'><button id='set-time-btn' style='width:200px; height:40px; font-size:15px; border-radius:10px; cursor:pointer; outline:none'>Set Exam Time</button></th>
                    </tr>
                    </table>
            ";
				
			}
            else
            {
                echo "Something Went Wrong";
			}

		}
	}

	new admin_preview_view_all_user();

}

?>
