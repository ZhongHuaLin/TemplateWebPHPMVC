<?php
	class DataBase{
		private $host;
		private $uname;
		private $pw;
		private $db;
		private $stmt;
		private $connection;
		
		function __construct($hostaddress, $username, $password, $dbname){
			$this->host = $hostaddress;
			$this->uname = $username;
			$this->pw = $password;
			$this->db = $dbname;
			try{
				$this->connection = new PDO('mysql:host='.$this->host.';dbname='.$this->db, $this->uname, $this->pw);
				$this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			}catch (PDOException $e) {
				print "Error!: " . $e->getMessage() . "<br/>";
				die();
			}
		}
		
		public function setQuery($Query){
			try{
				$this->stmt = $this->connection->prepare($Query);
			//exit(var_dump($Query));
			}catch (PDOException $e) {
				print "Error!: " . $e->getMessage() . "<br/>";
				die();
			}
		}
		
		// function use to run query.
		// NEED: hostname, username, password, database name, query
		public function doQuery($arr){
			$re = $this->stmt->execute($arr);
			if(!$re){
				return array('status'=>'ERROR', 'message'=>'ERROR in the DB'.mysqli_error($connection));
			}else{
				$resultlist = array();
				while($row = $this->stmt->fetch(PDO::FETCH_ASSOC)){
					array_push($resultlist, $row);
				}
				if(sizeof($resultlist) > 0)
					return array('status'=>'SUCCESS', 'message'=>$resultlist);
				else
					return array('status'=>'ERROR', 'message'=>'Cannot find the data you look for');
			}
		}
		
		function __destruct(){
			$this->connection = null;
		}
	}
?>
