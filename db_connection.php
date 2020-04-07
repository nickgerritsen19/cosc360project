<!DOCTYPE html>

<html>

<body>
<?php

define('DBHOST', 'localhost');
define('DBNAME', 'testdatabase');
define('DBUSER', 'root');
define('DBPASS', 'root');


// Create connection
$conn = new mysqli(DBHOST, DBUSER, DBPASS, DBNAME);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} else 
    echo "Connected successfully";
$sql = '';
//$sql = "INSERT INTO friends (firstname, lastname, city, email) VALUES ('Aurora', 'Cox', 'Falkland', 'auroracox3@gmail.com')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();

?>

</body>
</html>