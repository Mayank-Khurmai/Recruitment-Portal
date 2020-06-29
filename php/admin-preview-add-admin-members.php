<?php

if(!isset($_SESSION['adminmail']))
{
    header("Location: admin-panel-login-page.php");
}
else
{
	
	class admin_preview_add_admin{
		function __construct(){
            echo "
            <div class='login-form-div'>
            <div class='user-logo-div'></div>
            <div class='form-div'>
                    <div class='email-form-div'>
                        <div class='user-id-div'> 
                        </div>
                        <div class='user-id-input-div'> 
                            <input type='email' id='input-mail' placeholder='Email Id'>
                        </div>
                    </div>
                    <br>
                    <div class='email-form-div'>
                        <div class='user-id-div'> 
                        </div>
                        <div class='user-id-input-div'> 
                            <input type='email' id='input-name' placeholder='Name'>
                        </div>
                    </div>
                    <br>
                    <div class='pass-form-div'>
                        <div class='user-key-div'> 
                        </div>
                        <div class='user-key-input-div'> 
                            <input type='number' id='input-mobile' placeholder='Mobile'>
                        </div>
                    </div>
                    <br>
                    <div class='pass-form-div'>
                        <div class='user-key-div'> 
                        </div>
                        <div class='user-key-input-div'> 
                            <input type='password' id='input-pass' placeholder='Password'>
                        </div>
                    </div>
                    <br>
                    <div class='pass-form-div'>
                        <div class='user-id-div'> 
                        </div>
                        <div class='user-key-input-div'> 
                            <Select id='select-div' name='member-admin'>
                                <option value='Member'>Member</option>
                                <option value='Admin'>Admin</option>
                            </select>
                        </div>
                    </div>
                    <br>
                    <div class='submit-div'>
                        <button id='add-member-btn' class='add-a-member-btn'>Add Admin</button>
                    </div>
            </div>
             </div>
            ";

		}
	}

	new admin_preview_add_admin();

}

?>
