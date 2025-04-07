<?php
session_start();

// Database connection (update with your local MAMP MySQL details)
$servername = "localhost";
$username = "root";
$password = "root";
$database = "thegalwaycompass";

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = trim($_POST['email']);
    $password = $_POST['password'];

    // Prepare and execute SQL query to fetch user data
    $stmt = $conn->prepare("SELECT id, first_name, last_name, email, password_hash FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // User found, now verify password
        $user = $result->fetch_assoc();
        if (password_verify($password, $user['password_hash'])) {
            // Password is correct, log the user in
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['first_name'] = $user['first_name'];
            $_SESSION['last_name'] = $user['last_name'];
            $_SESSION['email'] = $user['email'];
            
            // Redirect to a welcome or dashboard page
            header("Location: index.php");
            exit();
        } else {
            $error_message = "Invalid password.";
        }
    } else {
        $error_message = "No account found with that email.";
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
    <title>Log In - Galway City</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="CSS/home.css">
    <link rel="stylesheet" href="CSS/footer.css">
</head>
<body>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg custom-navbar">
        <div class="container-fluid">
            <a class="navbar-brand hover-effect" href="index.php">
                <video src="IMG/Logo/AnimatedLogo.mp4" class="img-fluid" style="width: 150px;" autoplay loop muted></video>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item"><a class="nav-link hover-effect gabarito active" href="index.php">Home</a></li>
                    <li class="nav-item"><a class="nav-link gabarito hover-effect" href="history.php">History</a></li>
                    <li class="nav-item"><a class="nav-link gabarito hover-effect" href="events.php">Events</a></li>
                    <li class="nav-item"><a class="nav-link gabarito hover-effect" href="#">Chat</a></li>
                    <li class="nav-item"><a class="nav-link gabarito hover-effect" href="#">Help</a></li>
                </ul>
                <ul class="d-flex navbar-nav">
                    <?php if (isset($_SESSION['first_name'])): ?>
                        <li class="nav-item">
                            <span class="navbar-text me-4" style="border-color: #1282A2; color: #1282A2"><?php echo ucfirst($_SESSION['first_name']); ?></span>
                        </li>
                        <li><a class="btn gabarito hover-effect me-2 mb-2" href="logout.php"
                                style="border-color: #1282A2; color: #1282A2">Log Out</a></li>
                    <?php else: ?>
                        <li><button class="btn gabarito hover-effect me-2 mb-2"
                                style="border-color: #1282A2; color: #1282A2"><a href="login.php"
                                    style="color: #1282A2; text-decoration: none;">Log In</a></button></li>
                        <li><button class="btn gabarito hover-effect me-2" style="background-color: #1282A2"><a
                                    href="signup.php" style="color: #fff; text-decoration: none;">Sign Up</a></button></li>
                    <?php endif; ?>

                </ul>
            </div>
        </div>
    </nav>

    <div class="login-container mt-3 mb-5">
        <div class="login-image"></div>
        <div class="login-form-container">
            <div class="login-card-header">Log In to Your Account</div>
            <form action="login.php" method="POST">
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" name="email" required>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" id="password" name="password" required>
                </div>
                <button type="submit" class="btn login-btn-primary w-100">Log In</button>
            </form>
            <div class="signup-link">
                <p>Don't have an account? <a href="signup.php">Sign up here</a></p>
            </div>

            <?php
            if (isset($error_message)) {
                echo "<div class='alert alert-danger mt-3'>$error_message</div>";
            }
            ?>
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
