<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Lettuce Get Some Deals</title>
    <link rel="stylesheet" href="css/maryhome.css"/>
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
        <div id="left-sidebar">
            <h2>Weekly Trends</h2>
            <p>Here's a look at the weekly average price trends of groceries by category. Click on the graphs to see more!</p>
            <article class="trend-graph">
                <h3>Produce</h3>
                <a href="#trends"><img class="image" src="images/graph.png" alt="produce-trends" height="150"></a>
            </article>
            <article class="trend-graph">
                <h3>Meat</h3>
                <a href="#trends"><img class="image" src="images/graph.png" alt="produce-trends" height="150"></a>
            </article>
            <article class="trend-graph">
                <h3>Baked Goods</h3>
                <a href="#trends"><img class="image" src="images/graph.png" alt="produce-trends" height="150"></a>
            </article>
        </div>
        <div id="center">
            <?php
                session_start();
                require_once("db_connect.php");
                $sql = "SELECT * FROM products";
                $result = $conn->query($sql);
                while($row = $result->fetch_assoc()) {
                    echo '<article class="product-tile">';
                        $productname = $row['productname'];
                        printf("<h3>%s</h3>",$productname);
                        printf("<a href=product.php?product=%s><img class=\"image\" src=\"%s\" alt=\"%s\" width=\"200\"></a>",$productname,$row['imageURL'],$productname);
                        printf("<p>%s</p>",$row['description']);
                        echo "<table class=\"price-table\">
                                <caption>Best Deals</caption>
                                <tbody>
                                    <tr>
                                    <td class=\"store\"><a href=\"https://www.realcanadiansuperstore.ca\">Superstore</a></td>";
                                    printf("<td class=\"price\">%s</td>",$row['superstoreprice']);
                                echo "</tr>
                                    <tr>
                                        <td class=\"store\"><a href=\"https://www.saveonfoods.com\">Save On Foods</a></td>";
                                        printf("<td class=\"price\">%s</td>",$row['saveonprice']);
                                echo "</tr>
                                    <tr>
                                        <td class=\"store\"><a href=\"https://www.walmart.ca/en\">Walmart</a></td>";
                                        printf("<td class=\"price\">%s</td>",$row['walmartprice']);
                                echo "</tr>
                                </tbody>
                            </table>             
                    </article>";
                }
            ?>
        </div>
    </main>
    <footer id="footer"></footer>
</body>
</html>