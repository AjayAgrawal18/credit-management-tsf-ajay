<?php 

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

    $name = $_POST['nameinp'];
    $email = $_POST['emailinp'];
    $credits = (int)$_POST['credinp'];

    $sql = "SELECT Email FROM users WHERE Email='$email'";
    $isThere = $conn->query($sql);
    if($isThere->num_rows > 0) {
        echo "<script> alert('Same Email already exists! Please use another email!!'); window.location.href='index.php'; </script>";
    }

    function insert_data( $table_name, $data ) {
        $key = array_keys($data);  
        $value = array_values($data);

        $query ="INSERT INTO $table_name ( ". implode(',' , $key) .") VALUES('". implode("','" , $value) ."')";

        return $query;
    }

    $name = $_POST['nameinp'];
    $email = $_POST['emailinp'];
    $credits = (int)$_POST['credinp'];

    $data = array("Name"=>$name , "Email"=>$email , "Credits"=>$credits);
    $table_name = "users";
  
    $sql = insert_data($table_name , $data);

    if ($conn->query($sql) === TRUE) {
        echo "<script> alert('User Created Successfully'); window.location.href='viewUsers.php'; </script>";
    } else {
        echo "<script> alert('Couldnt Create User! Try Again!!'); window.location.href='index.php'; </script>";
    }

?>