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





?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="style.css">
    <title>Ticket Booking</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
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
                            <a class="nav-link active" aria-current="page" href="#">Home</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Events
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="#parties">Parties</a>
                            <a class="dropdown-item" href="#clubs 18+">Clubs 18+</a>
                            <a class="dropdown-item" href="#concerts">Concerts</a>
                            <a class="dropdown-item" href="#stand-up comedy show">Stand-up Comedy Show</a>
                            <a class="dropdown-item" href="#theatre show">Theatre Show</a>
                            <a class="dropdown-item" href="#sponsors">Sponsors</a>
                            </div>
                        </li>
                           <li class="nav-item">
                            <a class="nav-link" href="https://wa.me/70371291">Contact Us</a>
                        </li>
             <li class="nav-item">
                <?php
                    if (isset($_SESSION['user_id'])) {
                        echo '<a class="nav-link" href="/logout.php">Logout</a>';
                    }
                ?>
            </li>

                        <li class="nav-item">
                            <a class="nav-link" href="/profile.php">Profile</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>
<br><br><br><br> <br>

    <main>


    <!-- Parties -->
            <section class="container my-5">
    <a id="parties"></a>
    <h2>Parties</h2>
    <div class="row g-4">
        <?php
        $party_query = "SELECT * FROM events WHERE type_id = 1;";
        $party_result = $conn->query($party_query);
        if ($party_result->num_rows > 0) {
            while ($row = $party_result->fetch_assoc()) {
                echo '<div class="col-12 col-md-6 col-lg-3 my-5">';
                echo '<div class="card h-100 border-0 shadow-lg rounded">';
                echo '<img src="'. '/images/' . $row['image'] . '" class="card-img-top" alt="...">';
                echo '<div class="card-body">';
                echo '<h5 class="card-title">' . $row['title'] . '</h5>';
                echo '<p class="card-text">' . $row['description'] . '</p>';
                echo '<h5>$' . $row['price'] . '</h5>';
                echo '</div>';
                echo '<div class="p-3">';
                echo '<a href="booking.php?event_id=' . $row['id'] . '" class="btn btn-primary">Book Now</a>';
                echo '</div>';
                echo '</div>';
                echo '</div>';
            }
        } else {
            echo 'No parties available.';
        }
        ?>
    </div>
</section>



<!-- Clubs 18+ -->

        <section class="container my-5">
            <a id="clubs 18+"></a>
            <h2 class="">Clubs 18+</h5>
               <div class="row g-4">
                <?php
                $party_query = "SELECT * FROM events WHERE type_id = 2;";
                $party_result = $conn->query($party_query);
                if ($party_result->num_rows > 0) {
                    while ($row = $party_result->fetch_assoc()) {
                    echo '<div class="col-12 col-md-6 col-lg-3 my-5">';
                echo '<div class="card h-100 border-0 shadow-lg rounded">';
                echo '<img src="'.'/images/' . $row['image'] . '" class="card-img-top" alt="...">';
                echo '<div class="card-body">';
                echo '<h5 class="card-title">' . $row['title'] . '</h5>';
                echo '<p class="card-text">' . $row['description'] . '</p>';
                echo '<h5>$' . $row['price'] . '</h5>';
                echo '</div>';
                echo '<div class="p-3">';
                   echo '<a href="booking.php?event_id=' . $row['id'] . '" class="btn btn-primary">Book Now</a>';
                echo '</div>';
                echo '</div>';
                echo '</div>';
                    }
                } else {
                    echo 'No parties available.';
                }
                ?>
            </div>
        </section>

<!-- Concerts -->
         <section class="container my-5">
            <a id="concerts"></a>
            <h2 class="">Concerts</h5>
               <div class="row g-4">
                <?php
                $party_query = "SELECT * FROM events WHERE type_id = 3;";
                $party_result = $conn->query($party_query);
                if ($party_result->num_rows > 0) {
                    while ($row = $party_result->fetch_assoc()) {
                      echo '<div class="col-12 col-md-6 col-lg-3 my-5">';
                echo '<div class="card h-100 border-0 shadow-lg rounded">';
                echo '<img src="'. '/images/' . $row['image'] . '" class="card-img-top" alt="...">';
                echo '<div class="card-body">';
                echo '<h5 class="card-title">' . $row['title'] . '</h5>';
                echo '<p class="card-text">' . $row['description'] . '</p>';
                echo '<h5>$' . $row['price'] . '</h5>';
                echo '</div>';
                echo '<div class="p-3">';
                   echo '<a href="booking.php?event_id=' . $row['id'] . '" class="btn btn-primary">Book Now</a>';
                echo '</div>';
                echo '</div>';
                echo '</div>';
                    }
                } else {
                    echo 'No parties available.';
                }
                ?>
            </div>
        </section>


<!-- Stand-up Comedy Show -->

         <section class="container my-5">
            <a id="stand-up comedy show"></a>
            <h2 class="">Stand-up Comedy Show</h5>
               <div class="row g-4">
                <?php
                $party_query = "SELECT * FROM events WHERE type_id = 4;";
                $party_result = $conn->query($party_query);
                if ($party_result->num_rows > 0) {
                    while ($row = $party_result->fetch_assoc()) {
                      echo '<div class="col-12 col-md-6 col-lg-3 my-5">';
                echo '<div class="card h-100 border-0 shadow-lg rounded">';
                echo '<img src="'. '/images/' . $row['image'] . '" class="card-img-top" alt="...">';
                echo '<div class="card-body">';
                echo '<h5 class="card-title">' . $row['title'] . '</h5>';
                echo '<p class="card-text">' . $row['description'] . '</p>';
                echo '<h5>$' . $row['price'] . '</h5>';
                echo '</div>';
                echo '<div class="p-3">';
                   echo '<a href="booking.php?event_id=' . $row['id'] . '" class="btn btn-primary">Book Now</a>';
                echo '</div>';
                echo '</div>';
                echo '</div>';
                    }
                } else {
                    echo 'No parties available.';
                }
                ?>
            </div>
        </section>


<!-- Theatre Show -->
         <section class="container my-5">
            <a id="theatre show"></a>
            <h2 class="">Theatre Show</h5>
               <div class="row g-4">
                <?php
                $party_query = "SELECT * FROM events WHERE type_id = 5;";
                $party_result = $conn->query($party_query);
                if ($party_result->num_rows > 0) {
                    while ($row = $party_result->fetch_assoc()) {
                         echo '<div class="col-12 col-md-6 col-lg-3 my-5">';
                echo '<div class="card h-100 border-0 shadow-lg rounded">';
                echo '<img src="'. '/images/' . $row['image'] . '" class="card-img-top" alt="...">';
                echo '<div class="card-body">';
                echo '<h5 class="card-title">' . $row['title'] . '</h5>';
                echo '<p class="card-text">' . $row['description'] . '</p>';
                echo '<h5>$' . $row['price'] . '</h5>';
                echo '</div>';
                echo '<div class="p-3">';
                   echo '<a href="booking.php?event_id=' . $row['id'] . '" class="btn btn-primary">Book Now</a>';
                echo '</div>';
                echo '</div>';
                echo '</div>';
                    }
                } else {
                    echo 'No parties available.';
                }
                ?>
            </div>
        </section>


    <section class="container my-5">
    <h2 class="">Sponsors</h5>
       <div class="row g-3">
        <?php
        $sql = "SELECT * FROM sponsors";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
        ?>
                <div class="col my-5">
                    <div class="card h-100 border-0 shadow-lg rounded">
                        <img src="<?php echo '/images/' . $row['image']; ?>" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $row['name']; ?></h5>
                            <p class="card-text"></p>
                            <h5></h5>
                        </div>
                        <div class="p-3">
                            <button class="btn button_custom"></button>
                        </div>
                    </div>
                </div>
        <?php
            }
        } else {
            echo "No sponsors found";
        }
        ?>
    </div>
</section>






 
    </main>
    
    
<a id="sponsors"></a>



    <footer>
        <footer class="text-cente">
            <p class="text-center "><small>
                    By Georgio Khalife, Charbel Mnessa, Wael Safi
                </small></p>
        </footer>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
            crossorigin="anonymous"></script>
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>

</html>