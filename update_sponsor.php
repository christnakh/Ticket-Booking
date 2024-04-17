<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Sponsor</title>
</head>
<body>
    <h1>Update Sponsor</h1>
    
    <?php
    if (isset($_GET['id'])) {
        $sponsor_id = $_GET['id'];
        
        $conn = new mysqli('localhost', 'root', 'root', 'ticketbooking');
        
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (isset($_FILES["image"]) && $_FILES["image"]["error"] == 0) {
                $target_dir = "images/";
                $target_file = $target_dir . basename($_FILES["image"]["name"]);
                $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
                if ($_FILES["image"]["size"] > 500000) {
                    echo "Sorry, your file is too large.";
                } else {
                    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg") {
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
            
            $sponsor_name = $_POST['name'];
            
            $sql = "UPDATE sponsors SET name='$sponsor_name', image='$image_url' WHERE id=$sponsor_id";
            if ($conn->query($sql) === TRUE) {
                echo "Sponsor updated successfully.";
            } else {
                echo "Error updating sponsor: " . $conn->error;
            }
        }
        
        $result = $conn->query("SELECT * FROM sponsors WHERE id = $sponsor_id");
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
    ?>
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]) . "?id=$sponsor_id"; ?>" method="post" enctype="multipart/form-data">
                <input type="hidden" name="id" value="<?php echo $sponsor_id; ?>">
                <label>Name:</label><br>
                <input type="text" name="name" value="<?php echo $row['name']; ?>" required><br>
                <label>Current Image:</label><br>
                <img src="<?php echo $row['image']; ?>" alt="Sponsor Image" width="100"><br>
                <input type="hidden" name="current_image" value="<?php echo $row['image']; ?>">
                <label>New Image:</label><br>
                <input type="file" name="image" accept="image/*"><br>
                <button type="submit">Update Sponsor</button>
            </form>
    <?php
        } else {
            echo "Sponsor not found.";
        }
        
        $conn->close();
    } else {
        echo "Sponsor ID not provided.";
    }
    ?>
</body>
</html>
