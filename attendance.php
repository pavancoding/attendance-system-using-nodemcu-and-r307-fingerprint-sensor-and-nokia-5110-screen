<?php

	

			$servername = "localhost";

		// REPLACE with your Database name
		$dbname = "id18174354_studentdatabase";
		// REPLACE with Database user
		$username = "id18174354_pavankumar";
		// REPLACE with Database user password
		$password = "tneduts@S123";
		$api_key= $value= "";
		if ($_SERVER["REQUEST_METHOD"] == "GET") {
				$regno = test_input($_GET["regno"]);
				$todate = test_input($_GET["todate"]);
				$fromdate = test_input($_GET["fromdate"]);
				$conn = new mysqli($servername, $username, $password, $dbname);
				// Check connection
				if ($conn->connect_error) {
					die("Connection failed: " . $conn->connect_error);
				} 
		
				if(date("Y-m-d")<$todate){
					$todate=date("Y-m-d");
				}
				$sql ="select * from ".$regno." where date between '".$fromdate."' and '".$todate."'";
			   $result = $conn->query($sql);
		
			   if ($result->num_rows > 0) {
				// output data of each row
				while($row = $result->fetch_assoc()) {
				  echo $row["date"]." ".$row["hour1"]." ".$row["hour2"]." ".$row["hour3"]." ".$row["hour4"]." ".$row["hour5"]." ".$row["hour6"]." ".$row["hour7"]." ".$row["hour8"];
				  echo "<br>";
				}
			  } else {
				echo "0 results";
			  }
			
				$conn->close();
		}
		function test_input($data) {
			$data = trim($data);
			$data = stripslashes($data);
			$data = htmlspecialchars($data);
			$data=str_replace('_',' ',$data);
			return $data;
		} ?>