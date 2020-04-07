<?php
    define('DBHOST', 'localhost');
    define('DBNAME', '360project');
    define('DBUSER', 'root');
    define('DBPASS', 'root');
    $conn = mysqli_connect(DBHOST, DBUSER, DBPASS, DBNAME);
    
	if($conn->connect_error)
        die("<p>Unable to connect to database:  ".$conn->connect_error."</p>");
?>