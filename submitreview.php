<?php
    session_start();
    if($_SESSION['loggedIn'] == true) {
        require_once('db_connect.php');
        $sql = "SELECT username FROM users WHERE username = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $_SESSION["username"]);
        $stmt->execute();
        $result = $stmt->get_result();
        $username = $result->fetch_assoc();

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

    } else {
        prinf("<p>Must be signed in to leave a review</p>");
    }
?>
