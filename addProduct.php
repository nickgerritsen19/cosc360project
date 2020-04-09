<?php
    require_once("db_connect.php");
    session_start();

    $productname = $_POST["productname"];
    $productimage = $_POST["productimage"];
    $description = $_POST["description"];
    $saveonprice = $_POST["saveonprice"];
    $superstoreprice = $_POST["superstoreprice"];
    $walmartprice = $_POST["walmartprice"];
    //$imageURL = "images/".$productimage;
    $target_dir = "images/";
    $target_file = $target_dir . basename($_FILES["productimage"]["name"]);

    $sql = "INSERT INTO products (productname, imageURL, description, saveonprice, superstoreprice, walmartprice) VALUES (?,?,?,?,?,?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssddd", $productname, $target_file, $description, $saveonprice, $superstoreprice, $walmartprice);
    $stmt->execute();
    $stmt->close();
    $conn->close();
    
    //Upload image
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    // Check if image file is a actual image or fake image
    if(isset($_POST["submit"])) {
        $check = getimagesize($_FILES["productimage"]["tmp_name"]);
        if($check !== false) {
            echo "File is an image - " . $check["mime"] . ".";
            $uploadOk = 1;
        } else {
            echo "File is not an image.";
            $uploadOk = 0;
        }
    }
    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        $_SESSION['msg'] = "Sorry, your file was not uploaded.";
        $newURL = "adminportal.php?success=0";
    
        // if everything is ok, try to upload file
    } else {
        if (move_uploaded_file($_FILES["productimage"]["tmp_name"], $target_file)) {
            $_SESSION['msg'] = "The file ". basename( $_FILES["productimage"]["name"]). " has been uploaded.";
            $newURL = "adminportal.php?success=1";
        } else {
            $_SESSION['msg'] = "Sorry, there was an error uploading your file.";
            $newURL = "adminportal.php?success=0";
        }
    }

    //Redirect.
    header('Location: '.$newURL);

?>