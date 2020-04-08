<?php
require_once('db_connect.php');

    //Need to figgure out how to get username when logged in//
    //$username = 
    $review = $_POST["review"];    
    $rating = $_POST["rating"];
    $productid = $_POST["productid"];

    $sql = "INSERT INTO reviews (username, reviewcontent, rating, productid) VALUES (?,?,?,?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssss", $username, $review, $rating, $productid);
    $stmt->execute();
    $stmt->close();
    $conn->close();
    
    $newURL = "product.html";

    header('Location: '.$newURL);
    
    


?>
