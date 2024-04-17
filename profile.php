<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile</title>
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

                    </ul>
                </div>
            </div>
        </nav>
    </header>
    <br><br><br>
    <div class="container mt-5">
        <h1>User Profile</h1>
        <?php
        session_start();
        if (isset($_SESSION['user_id'])) {
            $user_id = $_SESSION['user_id'];
            $conn = new mysqli('localhost', 'root', 'root', 'ticketbooking');

            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            $result = $conn->query("SELECT * FROM users WHERE user_id = $user_id");
            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                    $full_name = $_POST['full_name'];
                    $email = $_POST['email'];
                    $password = $_POST['password'];
                    $phone_number = $_POST['phone_number'];

                    $sql = "UPDATE users SET full_name='$full_name', email='$email', password='$password', phone_number='$phone_number' WHERE user_id=$user_id";
                    if ($conn->query($sql) === TRUE) {
                         header("Location:index.php");
                    } else {
                        echo "Error updating user: " . $conn->error;
                    }
                }
        ?>
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                    <input type="hidden" name="user_id" value="<?php echo $row['user_id']; ?>">
                    <div class="form-group">
                        <label>Full Name:</label>
                        <input type="text" name="full_name" class="form-control" value="<?php echo $row['full_name']; ?>" required>
                    </div>
                    <div class="form-group">
                        <label>Email:</label>
                        <input type="email" name="email" class="form-control" value="<?php echo $row['email']; ?>" required>
                    </div>
                    <div class="form-group">
                        <label>Password:</label>
                        <input type="text" name="password" class="form-control" value="<?php echo $row['password']; ?>" required>
                    </div>
                    <div class="form-group">
                        <label>Phone Number:</label>
                        <input type="text" name="phone_number" class="form-control" value="<?php echo $row['phone_number']; ?>">
                    </div>
                    <button type="submit" class="btn btn-primary">Update Profile</button>
                </form>
        <?php
            } else {
                echo "User not found.";
            }
            $conn->close();
        } else {
            echo "Please login to view your profile.";
        }
        ?>
    </div>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
