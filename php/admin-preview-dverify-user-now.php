<?php

	require("database-connection.php");
	
	class dverify{
		private $usermail;
		private $db;
        private $query_a;
        private $query_b;
        private $query_c;
		function __construct($usermail){
			$this->db = new db();
			$this->db = $this->db->database();
            $this->usermail = $usermail;			

            $this->query_a = "DELETE FROM exam_result WHERE email = '$usermail'";
            if($this->db->query($this->query_a))
            {
                $this->query_b = "UPDATE login_info SET status = 'Pending' WHERE email = '$usermail'";
                if($this->db->query($this->query_b))
                {
                   $this->query_c = "DELETE FROM exam_time WHERE email = '$usermail'";
                   if($this->db->query($this->query_c))
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
                    echo "failed";
                }
            }
            else
            {
        	   echo "failed";
            
            }

		}
	}

	class main{
		private $usermail;
		function __construct(){
            $this->usermail = trim($_POST['request']);
            new dverify($this->usermail);
		}
	}

	new main();

?>