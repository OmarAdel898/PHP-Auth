<?php
require "connection.php";

if (isset($_GET['logout'])) {
    session_destroy();
    header("location:login.php");
    exit;
}

if (isset($_POST['btn-register'])) {
    $name     = trim($_POST['name']);
    $email    = trim($_POST['email']);
    $password = $_POST['password'];

    if (!preg_match("/^[a-zA-Z\s]{3,}$/", $name)) {
        header("location:register.php?message=Invalid name: letters only, min 3 characters.");
        exit;
    }
    if (!preg_match("/^[0-9]{8,20}$/", $password)) {
        header("location:register.php?message=Password must be 8-20 digits only.");
        exit;
    }
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        header("location:register.php?message=Invalid email address.");
        exit;
    }
    if ($userModel->findByEmail($email)) {
        header("location:register.php?message=Email already exists.");
        exit;
    }

    $userModel->register($name, $email, $password);
    header("location:login.php?success=Registration successful! Please login.");
    exit;
}

if (isset($_POST['btn-login'])) {
    $email    = trim($_POST['login_email']);
    $password = $_POST['login_pass'];

    $user = $userModel->login($email, $password);

    if ($user) {
        $_SESSION['loginId']  = $user['id'];
        $_SESSION['userName'] = $user['name'];
        header("location:home.php");
    } else {
        header("location:login.php?message=Invalid email or password.");
    }
    exit;
}

if (isset($_GET['deleteId'])) {
    $userModel->delete((int) $_GET['deleteId']);
    header("location:allUsers.php?message=User deleted successfully.");
    exit;
}

if (isset($_POST['btn-update'])) {
    $id    = (int) $_POST['id'];
    $name  = trim($_POST['name']);
    $email = trim($_POST['email']);

    $userModel->update($id, $name, $email);
    header("location:allUsers.php?message=User updated successfully.");
    exit;
}
?>