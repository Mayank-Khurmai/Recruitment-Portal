<?php
    require("database-connection.php");

	class check_exam{
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

                if($data['exam_date']==date('yy-m-d'))
                {
                    $x = $data['exam_time_start'];
                    $xx = $data['exam_time_end'];
                    date_default_timezone_set('Asia/Kolkata');
                    $y = date('H:i:s');
                    if($y>$x)
                    {
                        if($y<$xx)
                        {
                            echo "
                                <div class='heading-div'>
                                <span class='confirm-login-heading'>Confirm your Credentials</span>
                                </div>
                                <div class='user-logo-div'></div>
                                <div class='form-div'>
                                    <form method='post' autocomplete='off'>
                                        <div class='email-form-div'>
                                            <div class='user-id-div'> 
                                            </div>
                                            <div class='user-id-input-div'> 
                                                <input type='email' id='input-mail' placeholder='Email Id'>
                                            </div>
                                        </div>
                                        <br><br>
                                        <div class='pass-form-div'>
                                            <div class='user-key-div'> 
                                            </div>
                                            <div class='user-key-input-div'> 
                                                <input type='password' id='input-pass' placeholder='Password'>
                                            </div>
                                        </div>
                                        <br><br>
                                        <div class='submit-div'>
                                            <button type='submit' id='submit-div-btn'>Login</button>
                                        </div>
                                        <div class='loading-error-div'>
                                            <span id='error-msg'>Invalid Login! Please try Again...</span>
                                        </div>
                                    </form>
                                </div>
                              ";
                        }
                        else
                        {
                            echo "
                                <div id='my-admin-loader-output'> 
                                <div class='my-admin-loader-div'>
                                    <div class='admin-loader-logo-text' style='font-size:20px'>
                                                Exam is not Set
                                    </div>
                                    <div class='admin-loader'></div>
                                </div>
                                </div>
                                ";
                        }
                    }
                    else
                    {
                        $t1 = strtotime($x);
                        $t2 = strtotime($y);
                        $fm = ceil(($t1-$t2)/60);
                        if($fm<10)
                        {
                            $fm= "0".$fm;
                        }
                        echo "
                        <div id='my-admin-loader-output'> 
                        <div class='my-admin-loader-div'>
                            <div class='admin-loader-logo-text'>
                                <div style='text-align:center'>Start In</div>
                                    <div id='m-s-span'>
                                        <span id='m-span'>".$fm."</span>:<span id='s-span'>00</span>
                                    </div>
                                </div>
                            <div class='admin-loader'></div>
                        </div>
                        </div>
                            ";
                    }
                }
                else
                {
                    echo "
                        <div id='my-admin-loader-output'> 
                        <div class='my-admin-loader-div'>
                            <div class='admin-loader-logo-text' style='font-size:20px'>
                                        Exam is not Set
                            </div>
                            <div class='admin-loader'></div>
                        </div>
                        </div>
                        ";
                }               
            }
            else
            {
                echo "
                    <div id='my-admin-loader-output'> 
                    <div class='my-admin-loader-div'>
                        <div class='admin-loader-logo-text' style='font-size:20px'>
                                    Exam is not Set
                        </div>
                        <div class='admin-loader'></div>
                    </div>
                    </div>
                    ";
			}
		}
	}
    new check_exam();
?>