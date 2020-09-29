<?php 
    $fromUser = $_COOKIE['cUser'];
    $toUser = $_POST['testUser'];
    $toBeTransCreds = $_POST['tcreds'];

    if($fromUser == $toUser) {
        echo "<script> alert('You cannot transfer credits to yourself!'); window.location.href='viewUsers.php'; </script>";
    } else {
        if($toBeTransCreds < 0) {
            echo "<script> alert('Transfer Amount cannot be negative!'); window.location.href='viewUsers.php'; </script>";
        }
        else if($toBeTransCreds == 0) {
            echo "<script> alert('Transfer Amount should not be zero!'); window.location.href='viewUsers.php'; </script>";
        }
    
        $servername = "localhost";
        $username = "id14993753_root";
        $password = "c8M]_lSDSVW4>h3s";
        $dbname = "id14993753_gripspark";
    
        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);
        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
    
        function insert_data( $table_name, $data ) {
            $key = array_keys($data);  
            $value = array_values($data);
    
            $query ="INSERT INTO $table_name ( ". implode(',' , $key) .") VALUES('". implode("','" , $value) ."')";
    
            return $query;
        }
    
        $result = $conn->query("SELECT Credits FROM users WHERE Name='$fromUser'");
        if($result->num_rows > 0) {
            $res = $result->fetch_assoc();
    
            if($toBeTransCreds > $res['Credits'] ) {
                echo "<script> alert('Insufficient Balance'); window.location.href='viewUsers.php'; </script>";
            } else {
                
                $newFromCredits = $res['Credits'] - $toBeTransCreds;
                $updateFrom = "UPDATE users SET Credits='$newFromCredits' WHERE Name='$fromUser'";
                if($conn->query($updateFrom) === TRUE) {
    
                    $resultFrom = $conn->query("SELECT Credits FROM users WHERE Name='$toUser'");
                    $newToCredits = 0;
                    if($resultFrom->num_rows > 0) {
                        $r = $resultFrom->fetch_assoc();
                        $newToCredits = $r['Credits'] + $toBeTransCreds;
                    }
    
                    $updateFrom = "UPDATE users SET Credits='$newToCredits' WHERE Name='$toUser'";
                    if($conn->query($updateFrom) === TRUE) {
    
                        $data = array("Sender"=>$fromUser , "Receiver"=>$toUser , "Transferred_Credits"=>$toBeTransCreds);
                        $table_name = "transactions";
    
                        $sql = insert_data($table_name , $data);
    
                        if ($conn->query($sql) === TRUE) {
                            echo "<script> alert('Transfer Successful'); window.location.href='viewUsers.php'; </script>";
                        } else {
                            echo "<script> alert('Couldnt Update Tansaction History! Try Again!!'); window.location.href='viewUsers.php'; </script>";
                        }
                    } else {
                        echo "<script> alert('Transfer Unsuccessful! Please try transferring again!!'); window.location.href='viewUsers.php'; </script>";
                    }
    
                } else {
                    echo "<script> alert('Transfer Unsuccessful! Please try transferring again!!'); window.location.href='viewUsers.php'; </script>";
                }
            }
        }
    }

    
?>