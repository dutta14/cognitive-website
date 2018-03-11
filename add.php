<?php
if($_POST["value"]) {
    $servername = "localhost";
    $user = "projecttalent";
    $pwd = "E5huchA";
    $dbname = "projecttalent";

    $conn = new mysqli($servername, $user, $pwd, $dbname);

    if($conn->connect_error) {
        die("connection failed: " .$conn->connect_error);
    }
    
    
    $sqlcount = "select count(uid) from resultinfo as count";
    $result = $conn->query($sql);
    
    $count = 1;
     if($result->num_rows > 0) {
       while($row = $result->fetch_assoc()) {
           $count = $row["count"];
           break;
       }
     }

    $var = $_POST["value"];

    $sql = "insert into resultinfo values('$count','$var')";
    if($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "error: ". $conn->error;
    }
    $conn->close();
}

?>