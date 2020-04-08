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
        <link rel="stylesheet" href="css/maryhome.css"/>
        <link rel="stylesheet" href="css/table.css"/>
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
            <?php
                $sql = "SELECT username, firstname, lastname, email, city FROM users ORDER BY username ASC";
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                    // output data into table
                    printf("<table>\n");
                    printf("<caption>Site Users</caption>\n");
                    printf("<thead>\n");
                    printf("<tr><th>Username</th><th>First Name</th><th>Last Name</th><th>Email</th><th>City</th></tr>\n");
                    printf("</thead>\n");
                    printf("<tbody>\n");
                    $totalUsers = 0;
                    while($row = $result->fetch_assoc()) {
                        $totalUsers++;
                        printf("<tr><td>%s</td><td>%s</td><td>%s</td><td>%s</td><td>%s</td></tr>\n",$row['username'],$row['firstname'],$row['lastname'],$row['email'],$row['city']);
                    }
                    printf("</tbody>");
                    printf("<tfoot>");
                    printf("<tr><td>Total Users: %d</td></tr>",$totalUsers);
                    printf("</tfoot>");
                    printf("</table>");   
                } else {
                    echo "<p>Your website has no users! (This should be impossible...)</p>";
                }
            ?>
        </main>

        <footer id="footer"></footer>
    </body>
</html>