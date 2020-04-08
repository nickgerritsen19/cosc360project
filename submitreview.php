<?php
    session_start();
    if($_SESSION['loggedIn'] == true) {
        require_once('db_connect.php');
        $sql = "SELECT username FROM users WHERE username = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $_SESSION["username"]);
        $stmt->execute();
        $username = $stmt->get_result();

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

    }
?>
