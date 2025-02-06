<?php
session_start();
require_once 'config.php';
if (isset($_POST['register'])) {
    $name = $_POST['fname'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    
    $checkEmail = $conn->query("SELECT Email FROM registration WHERE Email='$email'");
    if ($checkEmail->num_rows > 0) {
        $_SESSION['register_error'] = 'Email is already registered!';
        $_SESSION['active_form'] = 'register';
    } else {
        $conn->query("INSERT INTO registration (fullname, Email, password) VALUES ('$name', '$email', '$password')");
    }

    header("Location: login.php");
    exit();
}   

if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];
    
    $result = $conn->query("SELECT * FROM registration WHERE Email = '$email'");
    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        if (password_verify($password, $user['password'])) {
            $_SESSION['fullname'] = $user['fullname'];
            $_SESSION['Email'] = $user['Email'];
            header("Location: http://localhost/database/admin.php");
            exit();
        }
    }

    $_SESSION['login_error'] = 'Incorrect email or password';
    $_SESSION['active_form'] = 'login';
    header("Location: login.php");
    exit();
}


?>