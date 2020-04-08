<?php
    //protect by admins DB
    require_once('db_connect.php');
    session_start();
    $sql = "SELECT adminid FROM admins WHERE username = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $_SESSION['username']);
    $stmt->execute();
    $result = $stmt->get_result();
    if($result->num_rows === 0)
        header('Location: home.html');
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>My Grocery Tracker</title>
        <link rel="stylesheet" href="css/home.css"/>
        <link href="https://fonts.googleapis.com/css?family=Amatic+SC&display=swap" rel="stylesheet">
        <script src="https://code.jquery.com/jquery-3.3.1.js"> </script>
        <script> 
            $(function(){
            $("#header").load("header.php"); 
            $("#footer").load("footer.html"); 
            });
        </script> 
    </head>
    <body>
        <header id="header">
        </header>
        
        <main>
            <!-- Main Page contents -->
            <p>This is the admin portal!</p>
        </main>

        <footer id="footer"></footer>
    </body>
</html>