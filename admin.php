<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Event Management</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>    
    <header>
        <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
            <div class="container">
                <a class="navbar-brand" href="#">
                    <img src="images/logo.jpg" width="80px" height="80px">
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="/">Home</a>
                        </li>
                           <li class="nav-item">
                            <a class="nav-link" href="https://wa.me/70371291">Contact Us</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/logout.php">Logout</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="/profile.php">Profile</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <div class="container mt-5">
        <h1 class="mb-4">Event Management</h1>
        
        <!-- Add Event Form -->
        <div class="card">
            <div class="card-header">Add Event</div>
            <div class="card-body">
                <form action="add_event.php" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label>Title:</label>
                        <input type="text" name="title" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Description:</label>
                        <textarea name="description" class="form-control" required></textarea>
                    </div>
                    <div class="form-group">
                        <label>Image:</label>
                        <input type="file" name="image" class="form-control-file" accept="image/*" required>
                    </div>
                    <div class="form-group">
                        <label>Price:</label>
                        <input type="number" name="price" class="form-control" step="0.01" required>
                    </div>
                    <div class="form-group">
                        <label>Type:</label>
                        <select name="type_id" class="form-control" required>
                            <?php
                            $conn = new mysqli('localhost', 'root', 'root', 'ticketbooking');

                            if ($conn->connect_error) {
                                die("Connection failed: " . $conn->connect_error);
                            }

                            $result = $conn->query("SELECT * FROM event_types");
                            while ($row = $result->fetch_assoc()) {
                                echo "<option value='" . $row['id'] . "'>" . $row['name'] . "</option>";
                            }
                            ?>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Add Event</button>
                </form>
            </div>
        </div>
        
        <!-- Event List -->
        <div class="card mt-4">
            <div class="card-header">Event List</div>
            <div class="card-body">
                <ul class="list-group">
                    <?php
                    $result = $conn->query("SELECT * FROM events");
                    while ($row = $result->fetch_assoc()) {
                        echo "<li class='list-group-item'>" . $row['title'] . " - $" . $row['price'] . " <a href='update_event.php?id=" . $row['id'] . "' class='btn btn-sm btn-primary ml-2'>Update</a> <form action='delete_event.php' method='post' class='d-inline'><input type='hidden' name='event_id' value='" . $row['id'] . "'><button type='submit' class='btn btn-sm btn-danger ml-2'>Remove</button></form></li>";
                    }
                    ?>
                </ul>
            </div>
        </div>

        <!-- Add Sponsor Form -->
        <div class="card mt-4">
            <div class="card-header">Add Sponsor</div>
            <div class="card-body">
                <form action="add_sponsor.php" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label>Name:</label>
                        <input type="text" name="name" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Image:</label>
                        <input type="file" name="image" class="form-control-file" accept="image/*" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Add Sponsor</button>
                </form>
            </div>
        </div>
        
        <!-- Sponsor List -->
        <div class="card mt-4">
            <div class="card-header">Sponsor List</div>
            <div class="card-body">
                <ul class="list-group">
                    <?php
                    $result = $conn->query("SELECT * FROM sponsors");
                    while ($row = $result->fetch_assoc()) {
                        echo "<li class='list-group-item'>" . $row['name'] . " <a href='update_sponsor.php?id=" . $row['id'] . "' class='btn btn-sm btn-primary ml-2'>Update</a> <form action='delete_sponsor.php' method='post' class='d-inline'><input type='hidden' name='sponsor_id' value='" . $row['id'] . "'><button type='submit' class='btn btn-sm btn-danger ml-2'>Remove</button></form></li>";
                    }
                    ?>
                </ul>
            </div>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
