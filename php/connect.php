<?php
    $username = $_POST['username'];
    $password = $_POST['password'];

    $conn = new mysqli('localhost', 'root','firstphp');
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
        }else{
            $stmt = $conn->prepare("insert into registration(username, password) value(?,?)");
            $stmt->bind_param("si", $username, $password);
            $stmt->execute();
            echo "registration successfully done";
            $stmt->close();
            $conn->close();
        }
?>