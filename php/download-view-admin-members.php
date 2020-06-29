<?php

    require("database-connection.php");
    require("../dompdf/autoload.inc.php");
    use Dompdf\Dompdf;
	
	class admin_preview_view_all_admin{
		private $db;
		private $query;
		private $response;
		private $data;
		function __construct(){
			$this->db = new db();
            $this->db = $this->db->database();
            
            $xy = new Dompdf();
			
			$this->query = "SELECT * FROM admin_login_info";
            $this->response = $this->db->query($this->query);
            $design="<h3 style='text-align:center;text-decoration: underline;'>All Admin Members</h3>";
			if($this->response->num_rows != 0)
			{
                $design .= "<table border='1px' cellspacing='1px' cellpadding='4px' style='width:100%;'>";
                $design .= "<tr style='background-color:yellow'><th>Sr. No.</th><th>Email</th><th>Name</th><th>Mobile</th><th>Role</th></tr>";
                $x=1;
                while($data = $this->response->fetch_assoc())
                {
					$design .= "
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
                $design .= "</table>";
            }
            else
            {
				$design .= "<table border='1px' cellspacing='1px' cellpadding='4px' style='width:100%;'>";
                $design .= "<tr style='background-color:yellow'><th>Sr. No.</th><th>Email</th><th>Name</th><th>Mobile</th><th>Role</th></tr>";
                $design .= "<tr><th colspan='6'>No Data Found</th></tr>";
				$design .= "</table>";
			}
            $xy->loadHtml($design);
            $xy->setPaper("A4","portrait");
            $xy->render();
            $xy->stream();

		}
	}

	new admin_preview_view_all_admin();


?>
