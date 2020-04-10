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


        $reviewtitle = $_POST["reviewtitle"]
        $review = $_POST["reviewcontent"];    
        $rating = $_POST["rating"];
        $productid = $_POST["productid"];
    
        $sql = "INSERT INTO reviews (username, reviewtitle, reviewcontent, rating, productid) VALUES (?,?,?,?,?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssss", $username, $reviewtitle, $reviewcontent, $rating, $productid);
        $stmt->execute();
        $stmt->close();
        $conn->close();
        
        $newURL = "product.php";
    
        header('Location: '.$newURL);

    } else {
        prinf("<p>Must be signed in to leave a review</p>");
    }
?>
