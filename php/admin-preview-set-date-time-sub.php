<?php

	require("database-connection.php");
	
	class date_time_set{
		private $db;
        private $query_a;
        private $query_b;
        private $edate;
        private $stime;
        private $etime;
        private $tminute;
		function __construct($edate, $stime, $etime, $tminute){
			$this->db = new db();
			$this->db = $this->db->database();
            $this->edate = $edate;			
            $this->stime = $stime;
            $this->etime = $etime;
            $this->tminute = $tminute;
            
            $this->query_a = "UPDATE exam_date_time SET exam_date = '$edate', exam_time_start = '$stime', exam_time_end = '$etime', total_duration = '$tminute'";
                if($this->db->query($this->query_a))
                {
                    $this->query_b = "UPDATE exam_time SET exam_date = '$edate', exam_start_time = '$stime', exam_end_time = '$etime', exam_duration = '$tminute', minute_remain = '$tminute'";
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
                    echo "failed";
                }
        }
	}

	class main{
        private $edate;
        private $stime;
        private $etime;
        private $tminute;
		function __construct(){
            $this->edate = trim($_POST['edate']);
            $this->stime = trim($_POST['stime']);
            $this->etime = trim($_POST['etime']);
            $this->tminute = trim($_POST['tminute']);
            new date_time_set($this->edate, $this->stime, $this->etime, $this->tminute);
		}
	}

	new main();

?>