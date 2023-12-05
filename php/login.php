<?php
include "db_conn.php";
session_start();
if ((isset($_POST['userName'])) && (isset($_POST['password']))) {
    function validate($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        return $data;
    }

    $username = validate($_POST['userName']);
    $password = validate($_POST['password']);

    if(empty($username)) {
        header("Location: ../index.php?error=Username is required");
        exit();
    } elseif (empty($password)) {
        header("Location: ../index.php?error=Password is required");
        exit();
    } else {
        // valid 
        $sql = "SELECT * FROM account WHERE user_name = '$username' AND password = '$password' ";
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) === 1) {
            $row = mysqli_fetch_assoc($result);
            if ( ($row['user_name'] === $username) && ($row['password'] === $password) ) {
                $_SESSION['id'] = $row['id'];
                $_SESSION['username'] = $row['user_name'];
                $_SESSION['password'] = $row['password'];
                $_SESSION['account_name'] = $row['AdminName'];
                echo($_SESSION['id']);
                header("Location: ../pages/main.php");
                exit();
            }
            // print_r($row);
        } else {
            header("Location: ../index.php?error=Incorect username or password");
            exit();
        }
        
    }
} else {
    header("Location: ../index.php");
    exit();
}

?>