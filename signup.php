<?php

session_start();

$host = 'localhost';
$user = 'root';
$pass = 'root';
$db = 'ticketbooking';

$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    die('Connection failed: ' . $conn->connect_error);
}

if (isset($_SESSION['user_id'])) {
    header("Location: index.php");
    exit();
}

if (isset($_POST['signup'])) {
    $full_name = $_POST['name'];
    $password = $_POST['password'];
    $email = $_POST['email'];
    $phone_number = $_POST['phone_number'];

    $sql = "INSERT INTO users (full_name, password, email, phone_number) VALUES ('$full_name', '$password', '$email', '$phone_number')";

    if ($conn->query($sql) === TRUE) {
        echo "Signup successful!";
        header("Location: login.php");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signup</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h2 class="mb-4">Signup</h2>
        <form method="post" action="" enctype="multipart/form-data">
            <div class="form-group">
                <label for="name">Full Name:</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" class="form-control" id="password" name="password" required>
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="phone_number">Phone Number:</label>
                <input type="text" class="form-control" id="phone_number" name="phone_number" required>
            </div>
            <button type="submit" class="btn btn-primary" name="signup">Signup</button>
        </form>
        <button class="btn btn-secondary mt-3" onclick="window.location.href='login.php'">Login</button>
    </div>
</body>
</html>
