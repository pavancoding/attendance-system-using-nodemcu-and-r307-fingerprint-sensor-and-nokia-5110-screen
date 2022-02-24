<?php
$servername = "localhost";

// REPLACE with your Database name
$dbname = "id18174354_studentdatabase";
// REPLACE with Database user
$username = "id18174354_pavankumar";
// REPLACE with Database user password
$password = "tneduts@S123";
if ($_SERVER["REQUEST_METHOD"] == "GET") {
        $id = test_input($_GET["id"]);
        // Create connection
        if($id!=''){
        $conn = new mysqli($servername, $username, $password, $dbname);
        // Check connection
        
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        } 
        $sql = "SELECT * from info where fingerprintid=".$id."";
        $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                // output data of each row
                 while($row = $result->fetch_assoc()) {
                        $regno=$row["registrationno"];
             }
         $sql = "SELECT * from details where regno='".$regno."'";
        $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                // output data of each row
                 while($row = $result->fetch_assoc()) {
                        echo $row["firstname"];
             }
            date_default_timezone_set('Asia/Kolkata');
            $presenttime=time();
            echo $presenttime;
            if($presenttime >= strtotime("8:00:00") and $presenttime <= strtotime("8:59:59"))
            $sql="update ".$regno." set hour1=1 where date ='". date("Y-m-d")."'";
            if($presenttime >= strtotime("9:00:00") and $presenttime <= strtotime("9:59:59"))
            $sql="update ".$regno." set hour2=1 where date ='". date("Y-m-d")."'";
            if($presenttime >= strtotime("10:00:00") and $presenttime <= strtotime("10:59:59"))
            $sql="update ".$regno." set hour3=1 where date ='". date("Y-m-d")."'";
            if($presenttime >= strtotime("11:00:00") and $presenttime <= strtotime("11:59:59"))
            $sql="update ".$regno." set hour4=1 where date ='". date("Y-m-d")."'";
            if($presenttime >= strtotime("12:00:00") and $presenttime <= strtotime("12:59:59"))
            $sql="update ".$regno." set hour5=1 where date ='". date("Y-m-d")."'";
            if($presenttime >= strtotime("13:00:00") and $presenttime <= strtotime("13:59:59"))
            $sql="update ".$regno." set hour6=1 where date ='". date("Y-m-d")."'";
            if($presenttime >= strtotime("14:00:00") and $presenttime <= strtotime("14:59:59"))
           $sql="update ".$regno." set hour7=1 where date ='". date("Y-m-d")."'";
            if($presenttime >= strtotime("15:00:00") and $presenttime <= strtotime("15:59:59"))
           $sql="update ".$regno." set hour8=1 where date='". date("Y-m-d")."'";
            if ($conn->query($sql) === TRUE) {
  echo "Record updated successfully";
} else {
  echo "Error updating record: " . $conn->error;
  echo $sql;
}
            
        $conn->close();
        }
            }
        
}
else
        echo "pass all parameters";
}
else {
    echo "No data posted with HTTP POST.";
}

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    $data=str_replace('_',' ',$data);
    return $data;
}