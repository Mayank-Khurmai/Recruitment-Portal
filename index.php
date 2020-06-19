<!DOCTYPE html>
<html lang="en-US">
<head>
    <title>OSS Recruitment</title>
    <link rel="icon" href="images/logo.png" type="image/icon type">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/main5.css">
    <link rel="stylesheet" href="css/font-awesome.css">

    <script src="js/jquery-1.9.1.min.js"></script>
    <script src="js/main.js"></script>
</head>
<body onload="onbodyload()">
  
<!-- Loader Coding Start
<div id="my-loader">
        <div class="my-loader-div">
            <img src="images/logo.png" class="loader-logo" alt="FLUX">
        <div class="loader"></div>
        </div>
</div>
 Loader Coding End-->



<!-- Main Body Coding Start-->
<div id="full-body">

    <div class="login-form-div">
        <div class="heading-div">
            <span class="confirm-login-heading">Confirm your Credentials</span>
        </div>
        <div class="user-logo-div"></div>
        <div class="form-div">
            <form method="post">
                <div class="email-form-div">
                    <div class="user-id-div"> 
                    </div>
                    <div class="user-id-input-div"> 
                        <input type="email" id="input-mail" placeholder="Email Id">
                    </div>
                </div>
                <br><br>
                <div class="pass-form-div">
                    <div class="user-key-div"> 
                    </div>
                    <div class="user-key-input-div"> 
                        <input type="password" id="input-pass" placeholder="Password">
                    </div>
                </div>
                //function Start
				function view_result($dmail)
				{
					$this->query = "SELECT * FROM exam_result, question_answer WHERE exam_result.ques_id = question_answer.ques_id AND email='mayankkhurmai8@gmail.com'";
					$this->response = $this->db->query($this->query);
					if($this->response->num_rows != 0)
					{ 
						$total=0;
						echo "<table border='1px' cellspacing='1px' cellpadding='4px' style='width:80%;'>";
						echo "<tr style='background-color:yellow'><th width='10%'>Student No.</th><th width='25%'>Email</th><th width='8%'>Ques ID</th><th>A</th><th>B</th><th>C</th><th>D</th><th width='8%'>Weightage</th></tr>";
						while($data = $this->response->fetch_assoc())
						{
							$x=0;
							$a="background-color:red";
							$b="background-color:red";
							$c="background-color:red";
							$d="background-color:red";
							if($data['marked']==1)
							{
								if($data['is_radiobox']==1)
								{
									if($data['option_a_ans']==$data['option_a_final_ans'])
									{
										$a = "background-color:green";
									}
									if($data['option_b_ans']==$data['option_b_final_ans'])
									{
										$b = "background-color:green";
									}
									if($data['option_c_ans']==$data['option_c_final_ans'])
									{
										$c = "background-color:green";
									}
									if($data['option_d_ans']==$data['option_d_final_ans'])
									{
										$d = "background-color:green";
										if($data['option_c_ans']==$data['option_c_final_ans'])
										{
											if($data['option_b_ans']==$data['option_b_final_ans'])
											{
												if($data['option_a_ans']==$data['option_a_final_ans'])
												{
													$x=1;
												}
											}
										}
									}			
								} 
								else
								{
									if($data['option_a_ans']==$data['option_a_final_ans'])
									{
										$a = "background-color:green";
										$x+=0.25;
									}
									if($data['option_b_ans']==$data['option_b_final_ans'])
									{
										$b = "background-color:green";
										$x+=0.25;
									}
									if($data['option_c_ans']==$data['option_c_final_ans'])
									{
										$c = "background-color:green";
										$x+=0.25;
									}
									if($data['option_d_ans']==$data['option_d_final_ans'])
									{
										$d = "background-color:green";
										$x+=0.25;
									}
								}
							}
							$total+=$x;
							echo "
								<tr>
									<td style='padding-left:5px'>".$data['student_no']."</td>
									<td style='padding-left:5px'>".$data['email']."</td>
									<th style='padding-left:5px'>".$data['ques_id']."</th>
									<th style='padding-left:5px; ".$a."'>".$data['option_a_final_ans']."</th>
									<th style='padding-left:5px; ".$b."''>".$data['option_b_final_ans']."</th>
									<th style='padding-left:5px; ".$c."''>".$data['option_c_final_ans']."</th>
									<th style='padding-left:5px; ".$d."''>".$data['option_d_final_ans']."</th>
									<th style='padding-left:5px;'>".$x."</th>
								</tr>
								";
						}
						echo "</table>";
						echo $total;
					}
					else
					{
						// echo "<table border='1px' cellspacing='1px' cellpadding='4px' style='width:100%;'>
						// 		<tr style='background-color:yellow'><th width='10%'>Student No.</th><th width='25%'>Email</th><th width='8%'>Ques ID</th><th width='5%'>Visited</th><th width='5%'>Attempted</th><th width='5%'>Reviewed</th><th width='10%'>Multi Answer</th><th>A</th><th>B</th><th>C</th><th>D</th><th width='8%'>Weightage</th></tr>
						// 		<tr><th colspan='12'>No Data Found</th></tr>
						// 		</table>
						// 	";	
					}
				}
				while($data = $this->response_a->fetch_assoc())
				{
					$dmail = $data['email'];
					view_result($dmail);

				}
			
				//Function End
                <br><br>
                <div class="submit-div">
                    <button type="submit" id="submit-div-btn">Login</button>
                </div>
                <div class="loading-error-div">
                    <span id="error-msg">Invalid Login! Please try Again...</span>
                    <div id="login-check"></div> 
                </div>
            </form>
        </div>

        <div class="oss-name-div">
              <span class="oss-name-text">Open Source Software Research &amp; Development Centre</span>   
        </div>
    </div>

</div>
<!-- Main Body Coding End-->

<!-- jQuery Coding Start-->

<script>

$(document).ready(function() {
    $('#submit-div-btn').click(function(e) {
        e.preventDefault();
        $.ajax({
            type : "POST",
            url  : "php/student-login-check.php",
            data : {
                    username : btoa($("#input-mail").val()),
                    password : btoa($("#input-pass").val())
            },
            cache : false,
            beforeSend : function(){
                    document.getElementById("login-check").style.display = "block";
            },
            success: function(response)
            {
              if(response.trim()=="success"){
                document.getElementById("login-check").style.display = "none";
                window.location = "php/student-after-login.php";
              }
              else{
                document.getElementById("login-check").style.display = "none";
                document.getElementById("error-msg").style.display = "block";
              }
              return false;
            }
        });
    });
});

</script>

<!-- jQuery Coding Start-->
</body>
</html>
