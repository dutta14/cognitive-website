<?php
    if(isset($_GET['userid']))
        $inpid = $_GET['userid'];
    else
         $inpid = -999;
    $servername = "localhost";
    $user = "projecttalent";
    $pwd = "E5huchA";
    $dbname = "projecttalent";

    $conn = new mysqli($servername, $user, $pwd, $dbname);

    if($conn->connect_error) {
        die("connection failed: " .$conn->connect_error);
    }

    $sql = "select * from resultinfo";
    $result = $conn->query($sql);
    $conn->close();

    $output = array();
    if($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $entry = json_decode($row["entry"]);
            $entry->uid = $row["uid"];
            $uid = $entry->userId;
            if($inpid == -999)
                array_push($output, $entry);
            else {
                if($inpid == $uid)
                    array_push($output, $entry);
            }
        }
    }

    header('Content-type: application/json');
    print_r(json_encode($output));
?>