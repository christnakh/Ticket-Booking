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

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$event_id = isset($_GET['event_id']) ? (int)$_GET['event_id'] : null;
$error_message = '';
$event_data = null;
$bookingSuccessful = false;
$lastInsertedId = null;

if ($event_id) {
    $stmt = $conn->prepare("SELECT * FROM events WHERE id = ?");
    $stmt->bind_param("i", $event_id);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if ($result->num_rows > 0) {
        $event_data = $result->fetch_assoc();
    } else {
        $error_message = 'Event not found.';
    }
    $stmt->close();
} else {
    $error_message = 'Event ID not provided.';
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['event_id'])) {
    $event_id = (int)$_POST['event_id'];
    $user_id = $_SESSION['user_id'];
    $quantity = $_POST['quantity'];
    $ticket_type = $_POST['ticket_type'];

    $stmt = $conn->prepare("INSERT INTO bookings (event_id, user_id, quantity, ticket_type) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("iiis", $event_id, $user_id, $quantity, $ticket_type);
    if ($stmt->execute()) {
        $bookingSuccessful = true;
        $lastInsertedId = $conn->insert_id;
    }
    $stmt->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Event Booking</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
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

    <main class="container my-5">
        <h2 class="mb-4">Book Event</h2>
        <?php if ($error_message): ?>
            <div class="alert alert-danger" role="alert"><?php echo $error_message; ?></div>
        <?php elseif ($event_data): ?>
            <div class="card mb-4">
                <div class="card-body">
                    <h5 class="card-title"><?php echo $event_data['title']; ?></h5>
                    <p class="card-text"><?php echo $event_data['description']; ?></p>
                    <p class="card-text">Price: $<?php echo $event_data['price']; ?></p>
                </div>
            </div>
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]) . '?event_id=' . $event_id; ?>" method="post">
                <input type="hidden" name="event_id" value="<?php echo $event_id; ?>">
                <div class="mb-3">
                    <label for="quantity" class="form-label">Quantity</label>
                    <select class="form-control" id="quantity" name="quantity" required >
                        <option value=1>1</option>
                        <option value=2>2</option>
                    </select>

                </div>
                <div class="mb-3">
                    <label for="ticket_type" class="form-label">Ticket Type</label>
                    <select class="form-select" id="ticket_type" name="ticket_type" required>
                        <option value="Simple Ticket">Simple Ticket</option>
                        <option value="Back Stage">Back Stage</option>
                        <option value="Lounge">Lounge</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Book Now</button>
            </form>
        <?php endif; ?>
    </main>

    <footer class="text-center mt-5">
        <p>By Georgio Khalife, Charbel Mnessa, Wael Safi</p>
    </footer>

    <?php if ($bookingSuccessful && $lastInsertedId): ?>
    <script>
        alert('Successfully booked. Your booking ID is <?php echo $lastInsertedId; ?>.');
        window.location.href = '/';
    </script>
    <?php endif; ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

<?php
$conn->close();
?>
