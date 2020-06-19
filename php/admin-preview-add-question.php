<?php

if(!isset($_SESSION['adminmail']))
{
    header("Location: admin-panel-login-page.php");
}
else
{
	
	class admin_preview_add_question{
		function __construct(){
            echo "
                <form id='add-question-form'>     
                    <table class='add-question-table' border='1px' cellspacing='1px' cellpadding='10px' width='100%'>
                        <tr>
                            <th colspan='4'>
                                ADD QUESTION 
                            </th>
                        </tr>
                        <tr>
                            <th width='15%'>Question</th>
                            <td colspan='3'><textarea id='textarea' required='required' style='width:100%; height:120px; resize:none;'></textarea></td>
                        </tr>
                        <tr>
                            <td colspan='2'></td>
                            <td colspan='2' width='18%'><div><input type='radio' required='required' class='radio-check' name='radio_check' value='radiobox'>Single Answer</div><div><input type='radio' required='required' class='radio-check' name='radio_check' value='checkbox'>Multiple Answers</div></td>
                        </tr>
                        <tr>
                            <th>Option A</th>
                            <td><input type='text' id='option-a' required='required' style='width:100%; padding:4px;' placeholder='Type Option A'></td>
                            <th><input type='radio' required='required' value='1' class='all-radio-btn' disabled='disabled' name='radio_option'></th>
                            <th><input type='checkbox' class='all-check-btn' id='check-a' value='1' disabled='disabled'></th>
                        </tr>
                        <tr>
                            <th>Option B</th>
                            <td><input type='text' id='option-b' required='required' style='width:100%; padding:4px;' placeholder='Type Option B'></td>
                            <th><input type='radio' required='required' value='2' class='all-radio-btn' disabled='disabled' name='radio_option'></th>
                            <th><input type='checkbox' class='all-check-btn' id='check-b' value='2' disabled='disabled'></th>
                        </tr>
                        <tr>
                            <th>Option C</th>
                            <td><input type='text' id='option-c' required='required' style='width:100%; padding:4px;' placeholder='Type Option C'></td>
                            <th><input type='radio' required='required' value='3' class='all-radio-btn' disabled='disabled' name='radio_option'></th>
                            <th><input type='checkbox' class='all-check-btn' id='check-c' value='3' disabled='disabled'></th>
                        </tr>
                        <tr>
                            <th>Option D</th>
                            <td><input type='text' id='option-d' required='required' style='width:100%; padding:4px;' placeholder='Type Option D'></td>
                            <th><input type='radio' required='required' value='4' class='all-radio-btn' disabled='disabled' name='radio_option'></th>
                            <th><input type='checkbox' class='all-check-btn' id='check-d' value='4' disabled='disabled'></th>
                        </tr>
                        <tr>
                            <th colspan='4'>
                                <button disabled='disabled' id='add-question-btn' data='add-ques-btn' class='all-php-btn'>Add Question</button>
                            </th>
                        </tr>
                    </table>
                </form> 
            ";

		}
	}

	new admin_preview_add_question();

}

?>
