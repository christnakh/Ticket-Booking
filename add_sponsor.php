<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

$conn = new mysqli('localhost', 'root', 'root', 'ticketbooking');

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $image = $_FILES['image']['name'];

    $target_dir = "images/";
    $target_file = $target_dir . basename($_FILES["image"]["name"]);

    // Check for file upload error
    if ($_FILES["image"]["error"] > 0) {
        echo "Error: " . $_FILES["image"]["error"] . "<br>";
    } else {
        if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
            $sql = "INSERT INTO sponsors (name, image) VALUES ('$name', '$image')";
            if ($conn->query($sql) === TRUE) {
                echo "Sponsor added successfully";
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
