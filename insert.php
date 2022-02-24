<?php
$servername = "localhost";

// REPLACE with your Database name
$dbname = "id18174354_studentdatabase";
// REPLACE with Database user
$username = "id18174354_pavankumar";
// REPLACE with Database user password
$password = "tneduts@S123";

// Keep this API Key value to be compatible with the ESP32 code provided in the project page. 
// If you change this value, the ESP32 sketch needs to match
$api_key_value = "tPmAT5Ab3j7F9";

$api_key= $value= "";

if ($_SERVER["REQUEST_METHOD"] == "GET") {
        $value = test_input($_GET["value"]);
        echo $value;
        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);
        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        } 
        
        $sql = "INSERT INTO studentdetails
        VALUES ('" . $value . "')";
        
        if ($conn->query($sql) === TRUE) {
            echo "New record created successfully";
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
    $data=str_replace('_',' ',$data);
    return $data;
}