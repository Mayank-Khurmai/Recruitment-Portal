<?php

if(!isset($_SESSION['adminmail']))
{
    header("Location: admin-panel-login-page.php");
}
else
{
    
    require("database-connection.php");
	
	class admin_preview_remove_admin{
		private $db;
		private $query;
		private $response;
		private $data;
		function __construct(){
			$this->db = new db();
			$this->db = $this->db->database();
			
			$this->query = "SELECT * FROM admin_login_info WHERE role != 'Super Admin'";
            $this->response = $this->db->query($this->query);
			if($this->response->num_rows != 0)
			{
                echo "<table border='1px' cellspacing='1px' cellpadding='4px' style='width:100%'>";
                echo "<tr style='background-color:yellow'><th width='30%'>Email</th><th width='30%'>Name</th><th width='15%'>Mobile</th><th width='15%'>Role</th><th width='10%'>Remove</th></tr>";
                while($data = $this->response->fetch_assoc())
                {
					echo "
						 <tr>
							<td style='padding-left:10px'>".$data['email']."</td>
							<td style='padding-left:10px'>".$data['name']."</td>
							<td style='padding-left:10px'>".$data['mobile']."</td>
							<td style='padding-left:10px'>".$data['role']."</td>
							<th><span style='cursor:pointer; color:red;' data='".$data['email']."' class='rm-admin'>Remove</span></th>
						  </tr>
						  ";
                }
                echo "</table>";
			}
            else
            {
				echo "<table border='1px' cellspacing='1px' cellpadding='4px' style='width:100%'>";
                echo "<tr style='background-color:yellow'><th width='30%'>Email</th><th width='30%'>Name</th><th width='15%'>Mobile</th><th width='15%'>Role</th><th width='10%'>Remove</th></tr>";
				echo "<th colspan='5'>No Data Found</th>";
				echo "</tr></table>";
			}

		}
	}

	new admin_preview_remove_admin();

}

?>
