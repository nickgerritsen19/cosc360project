<?php
    session_start();
    require_once('db_connect.php');

    $username = $_SESSION['username'];
    $reviewtitle = $_POST["reviewtitle"];
    $reviewcontent = $_POST["reviewcontent"];    
    $rating = $_POST["rating"];
    $productid = $_POST["productid"];


    /*$sql = "SELECT username FROM users WHERE username = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $_SESSION["username"]);
    $stmt->execute();
    $result = $stmt->get_result();*/
        
   

    
    $sql = "INSERT INTO reviews (username, reviewtitle, reviewcontent, rating, productid) VALUES (?,?,?,?,?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssss", $username, $reviewtitle, $reviewcontent, $rating, $productid);
    $stmt->execute();
    $stmt->close();
    $conn->close();
        
    $newURL = "home.php";
    header('Location: '.$newURL);
?>
