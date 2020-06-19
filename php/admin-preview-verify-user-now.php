<?php

	require("database-connection.php");
	
	class verify{
		private $usermail;
		private $db;
        private $query_a;
        private $query_b;
        private $query_c;
        private $query_d;
        private $query_e;
        private $query_f;
        private $query_g;
        private $response_a;
        private $response_b;
        private $response_c;
        private $response_d;
		function __construct($usermail){
			$this->db = new db();
			$this->db = $this->db->database();
            $this->usermail = $usermail;			

            $this->query_a = "SELECT email FROM exam_result WHERE email = '$usermail'";
            $this->response_a = $this->db->query($this->query_a);
            if($this->response_a->num_rows != 0)
            {
                $this->query_b = "UPDATE login_info SET status = 'Approved' WHERE email = '$usermail'";
                if($this->db->query($this->query_b))
                {
                    echo "success";
                }
                else
                {
                    echo "failed";
                }
            }
            else
            {
                $this->query_b = "SELECT * FROM login_info WHERE email = '$usermail'";
                $this->response_b = $this->db->query($this->query_b);
                $data = $this->response_b->fetch_assoc();
                $name = $data['name'];
                $studentno = $data['student_no'];


                $this->query_c = "SELECT ques_id FROM question_answer";
                $this->response_c = $this->db->query($this->query_c);
                if($this->response_c->num_rows != 0)
                {
                    while($data = $this->response_c->fetch_assoc())
                    {
                        $quesid = $data['ques_id'];
                        $this->query_d = "INSERT INTO exam_result(email, name, student_no,ques_id) VALUES('$usermail', '$name', '$studentno', '$quesid')";
                        $this->db->query($this->query_d);
                    }
                    $this->query_e = "UPDATE login_info SET status = 'Approved' WHERE email = '$usermail'";
                    if($this->db->query($this->query_e))
                    {
                       $this->query_f = "SELECT * FROM exam_date_time";
                       $this->response_d = $this->db->query($this->query_f);
                       if($this->response_d->num_rows != 0)
                       {
                        while($data = $this->response_d->fetch_assoc())
                        {
                            $exam_date = $data['exam_date'];
                            $exam_start_time = $data['exam_time_start'];
                            $exam_end_time = $data['exam_time_end'];
                            $exam_duration = $data['total_duration'];

                            $this->query_g = "INSERT INTO exam_time(email, exam_date, exam_start_time, exam_end_time, exam_duration, minute_remain) VALUES('$usermail', '$exam_date', '$exam_start_time', '$exam_end_time', '$exam_duration', '$exam_duration')";
                            if($this->db->query($this->query_g))
                            {
                                echo "success";
                            }
                            else
                            {
                                echo "failed";
                            }
                        }
                       }
                       else
                       {
                           echo "failed";
                       }
                    }
                    else
                    {
                        echo "failed";
                    }
                }
                else
                {
                    echo "failed";
                }
            }

		}
	}

	class main{
		private $usermail;
		function __construct(){
            $this->usermail = trim($_POST['request']);
            new verify($this->usermail);
		}
	}

	new main();

?>