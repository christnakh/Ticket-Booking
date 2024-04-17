<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Event</title>
</head>
<body>
    <h1>Update Event</h1>
    
    <?php
    if (isset($_GET['id'])) {
        $event_id = $_GET['id'];
        
        $conn = new mysqli('localhost', 'root', 'root', 'ticketbooking');
        
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        
        $result = $conn->query("SELECT * FROM events WHERE id = $event_id");
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
    ?>
            <form action="update_event_process.php" method="post">
                <input type="hidden" name="id" value="<?php echo $event_id; ?>">
                <label>Title:</label><br>
                <input type="text" name="title" value="<?php echo $row['title']; ?>" required><br>
                <label>Description:</label><br>
                <textarea name="description" required><?php echo $row['description']; ?></textarea><br>
                <label>Image:</label><br>
                <input type="file" name="image" accept="image/*"><br>
                <label>Price:</label><br>
                <input type="number" name="price" step="0.01" value="<?php echo $row['price']; ?>" required><br>
                <label>Type:</label><br>
                <select name="type_id" required>
                    <?php
                    $type_result = $conn->query("SELECT * FROM event_types");
                    while ($type_row = $type_result->fetch_assoc()) {
                        $selected = ($type_row['id'] == $row['type_id']) ? 'selected' : '';
                        echo "<option value='" . $type_row['id'] . "' $selected>" . $type_row['name'] . "</option>";
                    }
                    ?>
                </select><br>
                <button type="submit">Update Event</button>
            </form>
    <?php
        } else {
            echo "Event not found.";
        }
        
        $conn->close();
    } else {
        echo "Event ID not provided.";
    }
    ?>
</body>
</html>
