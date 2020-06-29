<?php

    require("database-connection.php");
    require("../dompdf/autoload.inc.php");
    use Dompdf\Dompdf;
	
	class admin_preview_view_all_user{
		private $db;
		private $query;
		private $response;
		private $data;
		function __construct(){
			$this->db = new db();
            $this->db = $this->db->database();
            
            $x = new Dompdf();
			
			$this->query = "SELECT * FROM login_info ORDER BY student_no";
            $this->response = $this->db->query($this->query);
            $design="<h3 style='text-align:center;text-decoration: underline;'>All Users</h3>";
			if($this->response->num_rows != 0)
			{
                $design .= "<table border='1px' cellpadding='3px' style='width:100%;'>
                           <tr style='background-color:yellow'><th>Sr. No.</th><th>Roll Number</th><th>Email</th><th>Name</th><th>Mobile</th><th>Status</th></tr>";
                $y=1;
                
                while($data = $this->response->fetch_assoc())
                {
					$design .= "
						<tr>
							<th style='padding-left:5px'>".$y."</th>	
							<td style='padding-left:5px'>".$data['student_no']."</td>
							<td style='padding-left:5px'>".$data['email']."</td>
							<td style='padding-left:5px'>".$data['name']."</td>
							<td style='padding-left:5px'>".$data['mobile']."</td>
							<td style='padding-left:5px'>".$data['status']."</td>
						</tr>
						";
					$y++;
                }
                $design .= "</table>";
            }
            else
            {
				$design .= "<table border='1px' cellspacing='1px' cellpadding='4px' style='width:100%;'>
						<tr style='background-color:yellow'><th width='5%'>Sr. No.</th><th width='15%'>Roll Number</th><th width='30%'>Email</th><th width='30%'>Name</th><th width='10%'>Mobile</th><th width='10%'>Status</th></tr>
							<tr><th colspan='6'>No Data Found</th></tr>
					  </table>
					";
			}
            $x->loadHtml($design);
            $x->setPaper("A4","portrait");
            $x->render();
			$x->stream("view-all-users.pdf", array("Attachment" => false));
			exit(0);

		}
	}

	new admin_preview_view_all_user();


?>
