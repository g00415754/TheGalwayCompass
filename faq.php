<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php"); // Redirect to login if not logged in
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Help/FAQ - Galway Compass</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="CSS/navbar.css">
    <link rel="stylesheet" href="CSS/faq.css">
    <link rel="stylesheet" href="CSS/footer.css">
    <link rel="stylesheet" href="CSS/cursor.css">

    <!-- Font Awesome for Social Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

</head>

<body>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg custom-navbar">
        <div class="container-fluid">
            <a class="navbar-brand hover-effect" href="index.php">
                <video src="IMG/Logo/AnimatedLogo.mp4" class="img-fluid" style="width: 150px;" autoplay loop muted
                    playsinline controlslist="nodownload"></video>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item"><a class="nav-link hover-effect gabarito" href="index.php">Home</a></li>
                    <li class="nav-item"><a class="nav-link gabarito hover-effect" href="history.php">History</a></li>
                    <li class="nav-item"><a class="nav-link gabarito hover-effect" href="events.php">Events</a></li>
                    <li class="nav-item"><a class="nav-link gabarito hover-effect" href="chat.php">Chat</a></li>
                    <li class="nav-item"><a class="nav-link gabarito hover-effect active" href="faq.php"
                            style="color: #001F54;">Help</a></li>
                </ul>
                <ul class="d-flex navbar-nav">
                    <?php if (isset($_SESSION['first_name'])): ?>
                        <li class="nav-item">
                            <span class="navbar-text me-4"
                                style="border-color: #1282A2; color: #1282A2"><?php echo ucfirst($_SESSION['first_name']); ?></span>
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

      <!-- Parallax Section -->
      <div class="parallax">
        <h2>Frequently Asked Questions</h2>
    </div>

    <!-- FAQ Content -->
    <div class="container faq-section">
        <div class="faq-question">
            <h4>1. What is The Galway Compass?</h4>
            <div class="faq-answer">
                The Galway Compass is your ultimate guide to exploring the vibrant city of Galway, Ireland. We provide insights into its history, culture, local attractions, upcoming events, and more. Whether you’re a tourist or a local, we offer something for everyone.
            </div>
        </div>

        <div class="faq-question">
            <h4>2. How can I participate in the live chat?</h4>
            <div class="faq-answer">
                To join the live chat, simply log in with your account. You’ll be able to chat with other tourists and locals, share your experiences, and get tips about things to do in Galway.
            </div>
        </div>

        <div class="faq-question">
            <h4>3. What types of events can I find on this website?</h4>
            <div class="faq-answer">
                We feature a wide range of events happening in Galway, including cultural festivals, live music performances, theatre shows, local markets, and more. You can browse through different event categories and filter them by type and date.
            </div>
        </div>

        <div class="faq-question">
            <h4>4. Is there a way to get notified about upcoming events?</h4>
            <div class="faq-answer">
                Yes, you can sign up for event notifications! Simply create an account and opt-in to receive email updates about the latest events happening in Galway.
            </div>
        </div>

        <div class="faq-question">
            <h4>5. How do I book tickets for events in Galway?</h4>
            <div class="faq-answer">
                While our website provides information about events in Galway, we recommend checking the event pages for ticketing links or visiting the event organizers' websites directly for ticket purchases.
            </div>
        </div>

        <div class="faq-question">
            <h4>6. How can I contribute to the chat space?</h4>
            <div class="faq-answer">
                Once you're logged in, you can post messages, share images, or videos, and engage in discussions with others. Whether you’re seeking recommendations or sharing experiences, the chat space is a great place to connect.
            </div>
        </div>

        <div class="faq-question">
            <h4>8. What are the best things to do in Galway?</h4>
            <div class="faq-answer">
                Some must-visit spots include the Galway Cathedral, Eyre Square, the Claddagh, and the Galway City Museum. Galway also has amazing food and music scenes, especially during events like the Galway International Arts Festival and Galway Races.
            </div>
        </div>

        <div class="faq-question">
            <h4>9. Can I filter events based on my interests?</h4>
            <div class="faq-answer">
                Absolutely! You can filter events by category, date, and location to find the ones that best suit your interests, whether you’re into arts, food, outdoor activities, or something else.
            </div>
        </div>

        <div class="faq-question">
            <h4>10. How do I get around Galway city?</h4>
            <div class="faq-answer">
                Galway is a walkable city, with many attractions located within walking distance. For longer distances, there are buses, taxis, and bike rentals available. Additionally, our website provides helpful resources on transport options in Galway.
            </div>
        </div>
    </div>

    <br><br><br>
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
