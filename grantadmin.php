<?php
    require_once('db_connect.php');
    session_start();
    $sql = "SELECT * FROM users WHERE username = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $_POST['username']);
    $stmt->execute();
    $result = $stmt->get_result();
    if($result->num_rows === 0) { //User does not exist
        $_SESSION['msg'] = $_POST['username']." does not exist.";
        header('Location: adminportal.php?success=0');
    } else {
        $row = $result->fetch_assoc();
        if($row['isAdmin']) {
            $_SESSION['msg'] = $_POST['username']." is already an administrator.";
            header('Location: adminportal.php?success=0');
        } else {
            $sql = "UPDATE users SET isAdmin=true WHERE username = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("s", $_POST['username']);
            $stmt->execute();
            $_SESSION['msg'] = $_POST['username']." was successfully added as an administrator.";
            header('Location: adminportal.php?success=1');
        }
        $stmt->close();
        $conn->close();
    }
?>