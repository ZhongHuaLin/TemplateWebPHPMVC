<?php
	class DataBase{
		private $host;
		private $uname;
		private $pw;
		private $db;
		private $query;
		private $connection;
		
		function __construct($hostaddress, $username, $password, $dbname){
			$this->host = $hostaddress;
			$this->uname = $username;
			$this->pw = $password;
			$this->db = $dbname;
			$this->connection = mysqli_connect($this->host, $this->uname, $this->pw, $this->db);
			if (mysqli_connect_errno())
			{
				exit("Failed to connect to MySQL: " . mysqli_connect_error());
			}
		}
		
		public function setQuery($Query){
			$this->query = $Query;
		}
		
		// function use to run query.
		// NEED: hostname, username, password, database name, query
		public function doQuery(){
			$result = mysqli_query($this->connection, $this->query);
			if(!$result){
				return array('status'=>'ERROR', 'message'=>'ERROR in the DB'.mysqli_error($connection));
			}else if(mysqli_num_rows($result) > 0){
				$resultlist = array();
				while($row = mysqli_fetch_array($result)){
					array_push($resultlist, $row);
				}
				return array('status'=>'SUCCESS', 'message'=>$resultlist);
			}else{
				$success = false;
				return array('status'=>'ERROR', 'message'=>'Nothing inside typename table');
			}
		}
		
		function __destruct(){
			mysqli_close($this->connection);
		}
	}
?>
