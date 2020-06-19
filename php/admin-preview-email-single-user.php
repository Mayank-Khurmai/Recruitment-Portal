<?php

if(!isset($_SESSION['adminmail']))
{
    header("Location: admin-panel-login-page.php");
}
else
{
	
	class admin_preview_email_single_user{
		function __construct(){
            echo "
                <div style='width:100%; height:500px; padding:20px;'>
                    <form>    
                        <table width='80%' bgcolor='gray' cellpadding='4px' cellspacing='0px' style='margin: 0 auto; padding:10px; padding-left:15px; padding-right:15px'>
                            <tr>
                                <td><input type='email' required='required' style='width:100%; padding:5px' placeholder='Send To'></td>
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




