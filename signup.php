<?php
// Database connection (update with your local MAMP MySQL details)
$servername = "localhost";  // MAMP default is localhost
$username = "root";  // MAMP default MySQL username
$password = "root";  // MAMP default MySQL password
$database = "thegalwaycompass";  // Your local MAMP database name

$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $first_name = trim($_POST['first_name']);
    $last_name = trim($_POST['last_name']);
    $username = trim($_POST['username']);
    $email = trim($_POST['email']);
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    // Validate password match
    if ($password !== $confirm_password) {
        die("Error: Passwords do not match!");
    }

    // Hash the password for security
    $password_hash = password_hash($password, PASSWORD_DEFAULT);

    // Insert user into database using prepared statement
    $stmt = $conn->prepare("INSERT INTO users (first_name, last_name, username, email, password_hash) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("sssss", $first_name, $last_name, $username, $email, $password_hash);

    if ($stmt->execute()) {
        echo "Registration successful! <a href='log-in.html'>Log in here</a>";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
}

$conn->close();
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up - Galway City</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="CSS/home.css">
    <link rel="stylesheet" href="CSS/fonts.css">
    <link rel="stylesheet" href="CSS/footer.css">

     <!-- Font Awesome for Social Icons -->
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

</head>

<body>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg custom-navbar">
        <div class="container-fluid">
            <a class="navbar-brand hover-effect" href="index.html">
                <video src="IMG/Logo/AnimatedLogo.mp4" class="img-fluid" style="width: 150px;" autoplay loop muted></video>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item"><a class="nav-link hover-effect gabarito" href="index.html">Home</a></li>
                    <li class="nav-item"><a class="nav-link gabarito hover-effect" href="history.html">History</a></li>
                    <li class="nav-item"><a class="nav-link gabarito hover-effect" href="#">Events</a></li>
                    <li class="nav-item"><a class="nav-link gabarito hover-effect" href="#">Chat</a></li>
                    <li class="nav-item"><a class="nav-link gabarito hover-effect" href="#">Help</a></li>
                </ul>
                <ul class="d-flex navbar-nav">
                    <li><button class="btn gabarito hover-effect me-2 mb-2"
                            style="border-color: #1282A2; color: #1282A2"><a href="log-in.html" style="color: #1282A2; text-decoration: none;">Log In</a></button></li>
                    <li><button class="btn gabarito hover-effect me-2"
                            style="background-color: #1282A2; color: #fff">Sign Up</button></li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="signup-container mt-3 mb-5">
        <div class="signup-image"></div>
        <div class="signup-form-container">
            <div class="signup-card-header">Sign Up</div>
             
            <form action="signup.php" method="POST">
                <div class="mb-3">
                    <label for="first-name" class="form-label">First Name</label>
                    <input type="text" class="form-control" id="first-name" name="first_name" required>
                </div>
                <div class="mb-3">
                    <label for="last-name" class="form-label">Last Name</label>
                    <input type="text" class="form-control" id="last-name" name="last_name" required>
                </div>
                <div class="mb-3">
                    <label for="username" class="form-label">Username</label>
                    <input type="text" class="form-control" id="username" name="username" required>
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" name="email" required>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" id="password" name="password" required>
                </div>
                <div class="mb-3">
                    <label for="confirm-password" class="form-label">Confirm Password</label>
                    <input type="password" class="form-control" id="confirm-password" name="confirm_password" required>
                </div>
                <button type="submit" class="btn signup-btn-primary w-100">Sign Up</button>
            </form>
            <div class="login-link">
                <p>Already have an account? <a href="log-in.html">Log in here</a></p>
            </div>
        </div>
    </div>

    <div class="footer-dark">
        <footer>
            <div class="container">
                <div class="row">
                    <div class="col-sm-6 col-md-3 item">
                        <h3>Services</h3>
                        <ul>
                            <li><a href="#">Web design</a></li>
                            <li><a href="#">Development</a></li>
                            <li><a href="#">Hosting</a></li>
                        </ul>
                    </div>
                    <div class="col-sm-6 col-md-3 item">
                        <h3>About</h3>
                        <ul>
                            <li><a href="#">Company</a></li>
                            <li><a href="#">Team</a></li>
                            <li><a href="#">Careers</a></li>
                        </ul>
                    </div>
                    <div class="col-md-6 item text">
                        <h3>Company Name</h3>
                        <p>Praesent sed lobortis mi. Suspendisse vel placerat ligula. Vivamus ac sem lacus.
                            Ut vehicula rhoncus elementum. Etiam quis tristique lectus. Aliquam in arcu eget
                            velit pulvinar dictum vel in justo.</p>
                    </div>
                    <div class="col-md-6">
                        <div class="socials">
                            <ul>
                                <li><a href="#"><i class="fab fa-facebook-f icon"></i></a></li>
                                <li><a href="#"><i class="fab fa-twitter icon"></i></a></li>
                                <li><a href="#"><i class="fab fa-linkedin-in icon"></i></a></li>
                                <li><a href="#"><i class="fab fa-google-plus-g icon"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <p class="copyright">The Galway Compass © 2025</p>
            </div>
        </footer>
    </div>

    <script src="JS/trailingCursor.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>