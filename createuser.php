<?php
    require_once('db_connect.php');

    $firstname = $_POST["firstname"];
    $lastname = $_POST["lastname"];
    $username = $_POST["username"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $city = $_POST["city"];

    $sql = "INSERT INTO users (firstname, lastname, username, email, city, password) VALUES (?,?,?,?,?,?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssssss", $firstname, $lastname, $username, $email, $city, $password);
    $stmt->execute();
    
    $stmt->close();
    $conn->close();

    $newURL = "home.php";

    //Redirect.
    header('Location: '.$newURL);
?>