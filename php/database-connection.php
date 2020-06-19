<?php

class db{
		private $db;
		function database()
		{
			$this->db = new mysqli("localhost","root","","recruitment_portal");
			if(!$this->db->connect_error)
			{
				return $this->db;
			}
		}
    }
    
?>