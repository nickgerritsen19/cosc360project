<?php
    require_once('db_connect.php');

    session_start();

    $_SESSION['loggedIn'] = false;

    /** Get customer id **/
    $username = null;
    if(isset($_POST['username']))
        $username = $_POST['username'];
    if($username == null)
        die("No username entered.");

    //get customer password
    $password = "";
    if(isset($_POST['password']))
        $password = $_POST['password'];
    if($_POST['password'] == "")
        die("No password entered.");

    if ($_SERVER["REQUEST_METHOD"] == "POST"){
        $stmt = $conn->prepare("SELECT username, password FROM users WHERE username=? AND password=?");
        $stmt->bind_param( "ss", $username,$password);
            $stmt->execute();
            $stmt->store_result();
            $rows = $stmt->num_rows;
            if($rows == 1){
                //user is found, set session variable and redirect
                $_SESSION['username'] = $username;
                $_SESSION['loggedIn'] = true;
                header('Location: home.html');
            }else{
                $_SESSION['errMsg'] = "<p style='color:red' align='center'> Invalid username/password! </p>";
                //username and password combo do not exist
                header('Location: login.php');
            }
            $conn->close();
    }else{
        //user is trying to access page indirectly, redirect to login page
        header('Location: login.php');
    }
?>