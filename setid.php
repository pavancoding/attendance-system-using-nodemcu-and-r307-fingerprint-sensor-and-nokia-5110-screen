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
        $conn = new mysqli($servername, $username, $password, $dbname);
        if($id!=''){
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        } 
        
        $sql ="update id set id=".$id;
        
        if ($conn->query($sql) === TRUE) {
            echo "details inserted <br>";
        } 
        else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
        $conn->close();
        }
        else
        echo "fill all parameters";
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