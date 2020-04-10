<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Submit a Review</title>
        <link rel="stylesheet" href="css/home.css"/>
        <link href="https://fonts.googleapis.com/css?family=Amatic+SC&display=swap" rel="stylesheet">
        <script src="https://code.jquery.com/jquery-3.3.1.js"> </script>
        <script type="text/javascript" src="script/prevalidation.js"></script>
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
            <form method="POST" id="mainForm" action="submitreview.php">
                <fieldset>
                    <legend>Submit a Review</legend>
                    <p>
                        <label>Product:</label></br>
                        <select name="productid">
                            <?php
                            require_once("db_connect.php");
                            $sql = "SELECT productname FROM products";
                            $stmt = $conn->prepare($sql);
                            $stmt->bind_param("s", $_GET['productname']);
                            $stmt->execute();
                            $result = $stmt->get_result();
                            
                            while($row = $result->fetch_assoc()) {
                                unset($productname);
                                $productname = $row['productname'];
                                echo '<option value="'.$productname.'" >'.$productname.'</option>';
                            }
                            $stmt->close();
                            $conn->close();
                            ?> 
                        </select>
                    </p>
                    <p>
                        <label>Review Title</label></br>
                        <textarea class="required" name="reviewtitle" cols="75%" rows="1%"></textarea>
                    </p>
                    <p>
                        <label>Review</label></br>
                        <textarea class="required" name="review" cols="75%" rows="5%" ></textarea>
                    </p>    
                    <p>
                            <label>Rating</label></br>
                            <input type="radio" class="required" name="rating" value="5" /> 5 
                            <input type="radio" class="required" name="rating" value="4" /> 4
                            <input type="radio" class="required" name="rating" value="3" /> 3 
                            <input type="radio" class="required" name="rating" value="2" /> 2 
                            <input type="radio" class="required" name="rating" value="1" /> 1
                        </p>
                        
                        <p>
                            <input type="submit">
                            <input type="reset">
                        </p>
                </fieldset>
            </form>
        </main>
    </body>
    </html>