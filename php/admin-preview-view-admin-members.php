<?php

if(!isset($_SESSION['adminmail']))
{
    header("Location: admin-panel-login-page.php");
}
else
{
    
    require("database-connection.php");
	
	class admin_preview_view_all_admin{
		private $db;
		private $query;
		private $response;
		private $data;
		function __construct(){
			$this->db = new db();
			$this->db = $this->db->database();
			
			$this->query = "SELECT * FROM admin_login_info";
            $this->response = $this->db->query($this->query);
			if($this->response->num_rows != 0)
			{
                echo "<table border='1px' cellspacing='1px' cellpadding='4px' style='width:100%;'>";
                echo "<tr style='background-color:yellow'><th width='10%'>Sr. No.</th><th width='35%'>Email</th><th width='35%'>Name</th><th width='10%'>Mobile</th><th width='10%'>Role</th></tr>";
                $x=1;
                while($data = $this->response->fetch_assoc())
                {
					echo "
						<tr>
							<th style='padding-left:5px'>".$x."</th>	
							<td style='padding-left:5px'>".$data['email']."</td>
							<td style='padding-left:5px'>".$data['name']."</td>
							<td style='padding-left:5px'>".$data['mobile']."</td>
							<td style='padding-left:5px'>".$data['role']."</td>
						</tr>
						";
					$x++;
				}
                echo "</table>";
			}
            else
            {
				echo "<table border='1px' cellspacing='1px' cellpadding='4px' style='width:100%;'>
						<tr style='background-color:yellow'><th width='5%'>Sr. No.</th><th width='15%'>Roll Number</th><th width='30%'>Email</th><th width='30%'>Name</th><th width='10%'>Mobile</th><th width='10%'>Status</th></tr>
							<tr><th colspan='6'>No Data Found</th></tr>
					  </table>
					";
			}

		}
	}

	new admin_preview_view_all_admin();

}

?>
