<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>User Profile</title>
        <link rel="stylesheet" href="css/maryhome.css"/>
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
        <header id="header"></header>
        
        <main>
            <h2>Your Tracked Items</h2>
            <div id="center">
                <article class="product-tile">
                    <h3>Romaine Lettuce</h3>
                    <a href="#product-romaine-lettuce"><img class="image" src="images/romaine-lettuce.png" alt="romaine-lettuce" width="200"></a>
                    <p>A variety of lettuce that grows in a tall head of sturdy dark green leaves with firm ribs down their centers.</p>
                    <table class="price-table">
                        <caption>Best Deals</caption>
                        <tbody>
                            <tr>
                                <td class="store"><a href="#superstore">Superstore</a></td>
                                <td class="price">$3.50</td>
                            </tr>
                            <tr>
                                <td class="store"><a href="#save-on-foods">Save On Foods</a></td>
                                <td class="price">$4.00</td>
                            </tr>
                            <tr>
                                <td class="store"><a href="#walmart">Walmart</a></td>
                                <td class="price">$7.99</td>
                            </tr>
                        </tbody>
                    </table>             
                </article>
                <article class="product-tile">
                    <h3>White Bread</h3>
                    <a href="#product-wonder-bread"><img class="image" src="images/wonder-bread.png" alt="wonder-bread" width="200"></a>
                    <p>A loaf of Wonder brand white sliced bread.</p>
                    <table class="price-table">
                        <caption>Best Deals</caption>
                        <tbody>
                            <tr>
                                <td class="store"><a href="#walmart">Walmart</a></td>
                                <td class="price">$1.57</td>
                            </tr>
                            <tr>
                                <td class="store"><a href="#superstore">Superstore</a></td>
                                <td class="price">$1.95</td>
                            </tr>
                            <tr>
                                <td class="store"><a href="#save-on-foods">Save On Foods</a></td>
                                <td class="price">$2.99</td>
                            </tr>
                        </tbody>
                    </table>             
                </article>
            </div>
            <div id="personal-info">
                <?php
                    session_start();
                    require_once('db_connect.php');
                    $sql = "SELECT firstname, lastname, username, email, city FROM users WHERE username = ?";
                    $stmt = $conn->prepare($sql);
                    $stmt->bind_param("s", $_SESSION["username"]);
                    $stmt->execute();
                    $result = $stmt->get_result();

                    $stmt->close();
                    $conn->close();

                    while($row = $result->fetch_assoc()){
                        $firstname = $row['firstname'];
                        $lastname = $row['lastname'];
                        $email = $row['email'];
                        $city = $row['city'];
                    }
                    echo '<h2>Personal Details</h2>';
                    printf("<p>First Name: %s</p>",$firstname);
                    printf("<p>Last Name: %s</p>",$lastname);
                    printf("<p>Username: %s</p>",$_SESSION['username']);
                    printf("<p>Email Address: %s</p>",$email);
                    printf("<p>City of Residence: %s</p>",$city);
                ?>
            </div>
        </main>

        <footer id="footer"></footer>
    </body>
</html>