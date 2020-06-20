<?php

if(!isset($_SESSION['adminmail']))
{
    header("Location: admin-panel-login-page.php");
}
else
{
    require("database-connection.php");
	
	class admin_preview_email_single_user{
        private $db;
		private $query;
		private $response;
		private $data;
		function __construct(){
            $this->db = new db();
			$this->db = $this->db->database();
            
            echo "
                <div style='width:100%; height:500px; padding:20px;'>
                <form>    
                    <table width='80%' bgcolor='gray' cellpadding='4px' cellspacing='0px' style='margin: 0 auto; padding:10px; padding-left:15px; padding-right:15px'>
                        <tr>
                            <td>
                            <select required='required' style='width:100%; padding:5px'>
                            <option value='' disabled selected hidden>Send To</option>
                ";
			$this->query = "SELECT * FROM login_info";
            $this->response = $this->db->query($this->query);
			if($this->response->num_rows != 0)
			{
                while($data = $this->response->fetch_assoc())
                {
                    echo "<option value='".$data['email']."'>".$data['email']." ----- (".$data['status'].")</option>";
                }
            }
            else
            {
               // <input type='email'   >   
            }
           
                                
                echo "
                                </select>
                                </td>
                            </tr>
                            <tr>
                                <td><input type='text' required='required' style='width:100%; padding:5px;' placeholder='Subject of Email'></td>
                            </tr>
                            <tr>
                                <td><textarea required='required' placeholder='Message or Content to Send' style='width:100%; height:300px; resize:none; padding:5px'></textarea></td>
                            </tr>
                            <tr>
                                <th><button type='submit' style='height:40px; width:100px; border-radius:5%; cursor:pointer'>Send Now</button></th>
                        </table>
                    </form>
                </div>
            ";

		}
	}

	new admin_preview_email_single_user();
}

?>




