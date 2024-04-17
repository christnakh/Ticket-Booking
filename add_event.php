<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

$conn = new mysqli('localhost', 'root', 'root', 'ticketbooking');

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = $_POST['title'];
    $description = $_POST['description'];
    $image = $_FILES['image']['name'];
    $price = $_POST['price'];
    $type_id = $_POST['type_id'];

    $target_dir = "images/";
    $target_file = $target_dir . basename($_FILES["image"]["name"]);

    // Check for file upload error
    if ($_FILES["image"]["error"] > 0) {
        echo "Error: " . $_FILES["image"]["error"] . "<br>";
    } else {
        if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
            $sql = "INSERT INTO events (title, description, image, price, type_id) VALUES ('$title', '$description', '$image', '$price', '$type_id')";
            if ($conn->query($sql) === TRUE) {
                echo "Event added successfully";
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }
}

$conn->close();
?>
