<?php

	require("database-connection.php");
	
	class edit_student{
        private $editid;
        private $name;
        private $roll;
        private $mobile;
		private $db;
        private $query_a;
        private $query_b;
        private $response;
		function __construct($editid, $name, $roll, $mobile){
			$this->db = new db();
			$this->db = $this->db->database();
            $this->editid = $editid;		
            $this->name = $name;		
            $this->roll = $roll;		
            $this->mobile = $mobile;			

            $this->query_a = "SELECT student_no FROM login_info where student_no='$roll' and email != '$editid'";
            $this->response = $this->db->query($this->query_a);
            if($this->response->num_rows==0)
            {
                $this->query_b = "UPDATE login_info SET name='$name', student_no='$roll', mobile='$mobile' WHERE email = '$editid'";
                if($this->db->query($this->query_b))
                {
                    echo "Success";
                }
            else
            {
                echo "Failed";
            }
            }
            else
            {
                echo "Duplicate";
            }

            
           
		}
	}

	class main{
        private $editid;
        private $name;
        private $roll;
        private $mobile;
		function __construct(){
            $this->editid = trim($_POST['editid']);
            $this->name = trim($_POST['name']);
            $this->roll = trim($_POST['roll']);
            $this->mobile = trim($_POST['mobile']);
            new edit_student($this->editid, $this->name, $this->roll, $this->mobile);
		}
	}

	new main();

?>