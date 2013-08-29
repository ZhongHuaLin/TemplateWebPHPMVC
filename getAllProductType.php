<?php

	function doQuery($host, $username, $pw, $db, $query){
		$connection = mysqli_connect($host, $username, $pw, $db);
		if (mysqli_connect_errno($connection))
		{
			return array('status'=>'ERROR', 'message'=>"Failed to connect to MySQL: " . mysqli_connect_error());
		}
		
		$result = mysqli_query($connection, $query);
		if(!$result){
			return array('status'=>'ERROR', 'message'=>'ERROR in the DB'.mysqli_error($connection));
		}else if(mysqli_num_rows($result) > 0){
			$typeNames = array();
			while($row = mysqli_fetch_array($result)){
				array_push($typeNames, $row);
			}
			return array('status'=>'SUCCESS', 'message'=>$typeNames);
		}else{
			$success = false;
			return array('status'=>'ERROR', 'message'=>'Nothing inside typename table');
		}
		mysqli_close($connection);
	}
?>
