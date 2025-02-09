<?php 
require_once('../Model/config.php');

if($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);

    $sql = "INSERT INTO users (username, email , password) VALUES ( ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('sss', $username, $email, $password);

    if($stmt->execute()){
        echo "Registration successful <a href='login.php'>Login here</a>";
    }else {
        echo "Error: " . $stmt->error;
    }

}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Registration</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<header>
    <h1>Registration</h1>
</header>

<form method="Post">
    <input type="text" name="username" placeholder="Username" required><br>
    <input type="email" name="email" placeholder="Email" require><br>
    <input type="password" name="password" placeholder="Password" required><br>
    <button type="submit">Register</button>