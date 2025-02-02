<?php
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    $con = new mysqli("localhost","root","","test");
    if($con->connect_error) {
        die("Failed to connect: ".$con->connect_error);
    } else {
        $stmt = $con->prepare("select * from regi where email = ?");
        $stmt->bind_param("s",$username);
        $stmt->execute();
        $stmt_result = $stmt->get_result();
        if($stmt_result->num_rows > 0){
            $data = $stmt_result->fetch_assoc();
            if($data['password'] === $password){
                echo "Login Successfull";
            } else {
                echo "Invalid Password";
            }
        } else {
            echo "<center><h1>Thank you...</h1></center>";
            echo "<u><center>$username</u> Login Successfull</center>";
      }
    }
    
?>