<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (isset($_POST["id"]) && isset($_POST["name"])) {
        $sponsor_id = $_POST["id"];
        $sponsor_name = $_POST["name"];

    
        if (isset($_FILES["image"])) {
        
            if ($_FILES["image"]["error"] == 0) {
                $target_dir = "images/";
                $target_file = $target_dir . basename($_FILES["image"]["name"]);
                $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

            
                if ($_FILES["image"]["size"] > 500000) {
                    echo "Sorry, your file is too large.";
                } else {
                
                    if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg") {
                        echo "Sorry, only JPG, JPEG, PNG files are allowed.";
                    } else {
                    
                        if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
                            $image_url = $target_file;
                        } else {
                            echo "Sorry, there was an error uploading your file.";
                        }
                    }
                }
            } else {
            
                $image_url = $_POST['current_image'];
            }
        } else {
        
            $image_url = $_POST['current_image'];
        }

    
        $conn = new mysqli('localhost', 'root', 'root', 'ticketbooking');

    
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

    
        $sql = "UPDATE sponsors SET name='$sponsor_name', image='$image_url' WHERE id=$sponsor_id";
        if ($conn->query($sql) === TRUE) {
            echo "Sponsor updated successfully.";
        } else {
            echo "Error updating sponsor: " . $conn->error;
        }

    
        $conn->close();
    } else {
        echo "Please fill out all the fields.";
    }
} else {
    echo "Invalid request.";
}
?>
