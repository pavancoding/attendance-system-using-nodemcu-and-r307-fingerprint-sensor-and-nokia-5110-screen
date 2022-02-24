<?php
$servername = "localhost";

// REPLACE with your Database name
$dbname = "id18174354_studentdatabase";
// REPLACE with Database user
$username = "id18174354_pavankumar";
// REPLACE with Database user password
$password = "tneduts@S123";
if ($_SERVER["REQUEST_METHOD"] == "GET") {
        $firstname = test_input($_GET["firstname"]);
        $lastname = test_input($_GET["lastname"]);
        $email = test_input($_GET["email"]);
        $regno = test_input($_GET["regno"]);
        $gender = test_input($_GET["gender"]);
        $year = test_input($_GET["year"]);
        $department= test_input($_GET["department"]);
        $section = test_input($_GET["section"]);
        $id = test_input($_GET["id"]);
        // Create connection
        if($firstname!='' and $lastname!='' and $email !='' and $regno!='' and $gender!='' and $year !='' and $year!=''and $department!='' and $section!='' and $id!=''){
        $conn = new mysqli($servername, $username, $password, $dbname);
        // Check connection
        
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        } 
        $date=date("Y-m-d");
        $sql = "INSERT INTO details
        
        VALUES ('" . $firstname. "','" . $lastname . "','" . $gender . "','" . $email . "','" . $regno . "','" . $year . "','" . $department . "','" . $section . "','$date')";
        
        if ($conn->query($sql) === TRUE) {
            echo "details inserted ";
        } 
        else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
        $sql = "INSERT INTO info
        VALUES ('" . $regno . "','" . $id . "','" . $firstname. "')";
        
        if ($conn->query($sql) === TRUE) {
            echo "details inserted in info";
        } 
        else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
        $sql = "CREATE TABLE `id18174354_studentdatabase`.`".$regno."` ( `date` DATE NOT NULL , `hour1` TINYINT NOT NULL
         DEFAULT 0, `hour2` TINYINT NOT NULL DEFAULT 0, `hour3` TINYINT NOT NULL DEFAULT 0, `hour4` TINYINT NOT NULL DEFAULT 0, `hour5` TINYINT NOT NULL DEFAULT 0, `hour6` TINYINT NOT NULL DEFAULT 0, `hour7` TINYINT NOT NULL DEFAULT 0, `hour8` TINYINT NOT NULL DEFAULT 0) ENGINE = InnoDB;
";
        
        if ($conn->query($sql) === TRUE) {
            echo "table created succefully<br>";
        } 
        else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
        $sql = "insert into ".$regno." (date)
    select * from 
    (select adddate('1970-01-01',t4.i*10000 + t3.i*1000 + t2.i*100 + t1.i*10 + t0.i) selected_date from
     (select 0 i union select 1 union select 2 union select 3 union select 4 union select 5 union select 6 union select 7 union select 8 union select 9) t0,
     (select 0 i union select 1 union select 2 union select 3 union select 4 union select 5 union select 6 union select 7 union select 8 union select 9) t1,
     (select 0 i union select 1 union select 2 union select 3 union select 4 union select 5 union select 6 union select 7 union select 8 union select 9) t2,
     (select 0 i union select 1 union select 2 union select 3 union select 4 union select 5 union select 6 union select 7 union select 8 union select 9) t3,
     (select 0 i union select 1 union select 2 union select 3 union select 4 union select 5 union select 6 union select 7 union select 8 union select 9) t4) v
    where selected_date between '".date("Y-m-d")."' and '2023-12-31'";
        
        if ($conn->query($sql) === TRUE) {
            echo "table created succefully<br>";
        } 
        else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    
        $conn->close();
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