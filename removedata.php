<?php

if(isset($_GET["uid"])) {
    $uid = $_GET["uid"];
    $servername = "localhost";
    $user = "projecttalent";
    $pwd = "E5huchA";
    $dbname = "projecttalent";

    $conn = new mysqli($servername, $user, $pwd, $dbname);

    if($conn->connect_error) {
        die("connection failed: " .$conn->connect_error);
    }

    $sql = "delete from resultinfo where uid='$uid'";
    if($conn->query($sql) === TRUE) {
        echo "deleted successfully";
    } else {
        echo "error: ". $conn->error;
    }
    $conn->close();
}
?>