<?php
    define('DBHOST', 'localhost');
    define('DBNAME', '360project');
    define('DBUSER', 'root');
    define('DBPASS', 'root');
?>

<?php
    $firstname = $_POST["firstname"];
    $lastname = $_POST["lastname"];
    $username = $_POST["username"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $city = $_POST["city"];

    // Create connection
    $conn = new mysqli(DBHOST, DBUSER, DBPASS, DBNAME);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    } else 
        echo "Connected successfully";

    $sql = "INSERT INTO users (firstname, lastname, username, email, city, password) VALUES (?,?,?,?,?,?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssssss", $firstname, $lastname, $username, $email, $city, $password);
    $stmt->execute();
    
    $stmt->close();
    $conn->close();

    $newURL = "home.html";

    //Redirect.
    header('Location: '.$newURL);
?>