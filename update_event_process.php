<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["id"]) && isset($_POST["title"]) && isset($_POST["description"]) && isset($_POST["price"]) && isset($_POST["type_id"])) {
        $event_id = $_POST["id"];
        $title = $_POST["title"];
        $description = $_POST["description"];
        $price = $_POST["price"];
        $type_id = $_POST["type_id"];

        if (isset($_FILES["image"])) {
            $file_name = $_FILES["image"]["name"];
            $temp_name = $_FILES["image"]["tmp_name"];
            $file_type = $_FILES["image"]["type"];
            $file_size = $_FILES["image"]["size"];
            $file_error = $_FILES["image"]["error"];

            if ($file_error == 0) {
                $target_dir = "images/";
                $target_file = $target_dir . basename($file_name);

                if (move_uploaded_file($temp_name, $target_file)) {
                    $conn = new mysqli('localhost', 'root', 'root', 'ticketbooking');

                    if ($conn->connect_error) {
                        die("Connection failed: " . $conn->connect_error);
                    }

                    $sql = "UPDATE events SET title='$title', description='$description', image='$target_file', price='$price', type_id='$type_id' WHERE id='$event_id'";

                    if ($conn->query($sql) === TRUE) {
                        echo "Event updated successfully.";
                    } else {
                        echo "Error updating event: " . $conn->error;
                    }

                    $conn->close();
                } else {
                    echo "Sorry, there was an error uploading your file.";
                }
            } else {
                echo "Sorry, there was an error uploading your file.";
            }
        } else {
            echo "No image uploaded.";
        }
    } else {
        echo "Please fill out all the fields.";
    }
} else {
    echo "Invalid request.";
}
?>
