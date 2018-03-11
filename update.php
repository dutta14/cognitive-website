<?php
    $servername = "localhost";
    $user = "projecttalent";
    $pwd = "E5huchA";
    $dbname = "projecttalent";

    $conn = new mysqli($servername, $user, $pwd, $dbname);

    if($conn->connect_error) {
        die("connection failed: " .$conn->connect_error);
    }

   

//    $sql = "create table resultinfo(uid varchar(255), entry varchar(10000000))";
//    $result = $conn->query($sql);
//    
//    if($result)
//        echo "Success";
//    else
//        echo "Failure";
// 

    $sql = "select * from pilotdata";
    $result = $conn->query($sql);

    $count = 1;

//    $output = array();
//    $c = 1;
    if($result->num_rows > 0) {
       while($row = $result->fetch_assoc()) {
           $entry = $row["entry"];
           $sql2 = "insert into resultinfo values('$count','$entry')";
           if($conn->query($sql2))
               echo "success\n";
           else
               echo "failure\n";
           $count++;
       }
    }
//            echo $sql2."\n\n";
//            $conn->query($sql2);
//            $c = $c+1;
//        }
//    }
     $conn->close();
?>