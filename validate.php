<?php
    define('DBHOST', 'localhost');
    define('DBNAME', 'testdatabase');
    define('DBUSER', 'root');
    define('DBPASS', 'root');

    // Create connection
    $conn = new mysqli(DBHOST, DBUSER, DBPASS, DBNAME);

    $username = $_POST["username"];
    $password = $_POST["password"];

    $sql = "SELECT username, password FROM users WHERE username = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();
    $DBpassword = $row['password'];
    if($DBpassword == $password) {
        header('Location: home.html');
    }
    if($DBpassword != $password)
        header('Location: login.php');


    $stmt->close();
    $conn->close();
?>