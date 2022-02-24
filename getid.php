<?php
$servername = "localhost";

// REPLACE with your Database name
$dbname = "id18174354_studentdatabase";
// REPLACE with Database user
$username = "id18174354_pavankumar";
// REPLACE with Database user password
$password = "tneduts@S123";
if ($_SERVER["REQUEST_METHOD"] == "GET") {
        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);
        
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        } 
        $id=0;
        while($id==0){
        $sql ="select * from id";
        $result = $conn->query($sql);
  while($row = $result->fetch_assoc()) {
    $id=$row["id"];
  }
     
    }
        echo $id;
        $sql ="update id set id=0";
        
        if ($conn->query($sql) === TRUE) {
        } 
        else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
        $conn->close();
}
else {
    echo "No data posted with HTTP POST.";
}

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}