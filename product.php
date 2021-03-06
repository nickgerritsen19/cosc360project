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
        <?php
            require_once("db_connect.php");
            $sql = "SELECT * FROM products WHERE productid = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("s", $_GET['productid']);
            $stmt->execute();
            $result = $stmt->get_result();

            $row = $result->fetch_assoc();
            $productname = $row['productname'];
            $imageURL = $row['imageURL'];
            $description = $row['description'];
            $saveonprice = $row['saveonprice'];
            $superstoreprice = $row['superstoreprice'];
            $walmartprice = $row['walmartprice'];
        ?>
        <header id="header"></header>
        <main>
            <div id="right-sidebar">
                
                <h2>Prices</h2>
                <article class="entry">
                    <h3>Supterstore</h3>
                    <p><?php echo '$'.$superstoreprice;?> <a href="https://www.realcanadiansuperstore.ca/">Go To Website</a></p>
                </article>
                <article class="entry">
                    <h3>Save On Foods</h3>
                    <p><?php echo '$'.$saveonprice;?><a href="https://www.saveonfoods.com/">Go To Website</a></p>
                </article>
                <article class="entry">
                    <h3>Walmart</h3>
                    <p><?php echo '$'.$walmartprice;?><a href="https://www.walmart.ca/en">Go To Website</a></p>
                </article>
            </div>
            <div id="info">
                <img id="product-img" src="<?php echo $imageURL;?>">
                <h2 style="margin-top: 20px;"><?php echo $productname;?></h2>
                <p id="price"><?php echo '$'.min($superstoreprice,$saveonprice,$walmartprice);?></p>
            </br>
                <p><?php echo $description;?></p>
            </div>

            <section id="reviews">
                <h2>Reviews</h2>
                <?php
                    $sql = "SELECT * FROM reviews WHERE productid = ?";
                    $stmt = $conn->prepare($sql);
                    $stmt->bind_param("s", $_GET['productid']);
                    $stmt->execute();
                    $result = $stmt->get_result();
        
                    $stmt->close();
                    $conn->close();
                    if ($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()) {
                            $username = $row['username'];
                            $content = $row['reviewcontent'];
                            $title = $row['reviewtitle'];
                            $rating = $row['rating'];
                            $reviewdate = $row['reviewdate'];
                            $ratingstring = '';
                                
                            echo '<article class="review-entry">';
                                echo '<p>';
                                for($i = 0; $i < $rating; $i++){
                                    echo '★';
                                }
                                for($i = $rating; $i < 5; $i++){
                                    echo '☆';
                                }
                                echo ' '.$title.'</p>';
                                echo '<p>Reviewed on '.$reviewdate.'</p></br>';
                                echo '<p>'.$content.'</p>';
                            echo '</article>';
                        }
                    } else {
                        echo '<p>There are no reviews for this product yet!</p>';
                    }

                ?>
                <?php
                    session_start();
                    if($_SESSION['loggedIn'] ==true) {
                        printf("<h2> <a href=\"reviewform.php\">Leave a Review</a></h2>");
                    } else {
                        printf("<h2><a href=\"login.html\">Log In to Leave a Review</a></h2>");
                    }
                ?>
            </section>
        </main>

        <footer id="footer"></footer>
    </body>
</html>