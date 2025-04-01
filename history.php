<?php
// Start the session
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>The Galway Compass - History</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="CSS/footer.css">
    <link rel="stylesheet" href="CSS/home.css">
    <link rel="stylesheet" href="CSS/fonts.css">

    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
    <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>

    <!-- Font Awesome for Social Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/gsap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/ScrollTrigger.min.js"></script>
    <!--Fonts-->
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Gabarito:wght@400..900&family=Radley:ital@0;1&display=swap');
    </style>
</head>

<body>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg custom-navbar">
        <div class="container-fluid">
            <a class="navbar-brand hover-effect" href="index.php">
                <video src="IMG/Logo/AnimatedLogo.mp4" class="img-fluid" style="width: 150px;" autoplay loop muted></video>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item"><a class="nav-link hover-effect gabarito" href="index.php">Home</a></li>
                    <li class="nav-item"><a class="nav-link gabarito hover-effect active" style="color: #001F54;" href="history.php">History</a></li>
                    <li class="nav-item"><a class="nav-link gabarito hover-effect" href="#">Events</a></li>
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

    <section id="history-header" class="mb-5">
        <h1 class="fancy">History</h1>
    </section>


    <div class="timeline-container">
        <!-- SVG Vertical Wavy Line -->
        <svg class="timeline-svg" viewBox="0 0 100 2500" xmlns="http://www.w3.org/2000/svg">
            <path d="M50,0 Q75,200 50,400 T50,800 T50,1200 T50,1600 T50,2000 T50,2500" />
        </svg>

        <!-- 1. Founding of Galway -->
        <div class="timeline-item fade-in">
            <span class="timeline-dot"></span>
            <img src="IMG/History/1.jpeg" alt="Founding of Galway">
            <div class="timeline-content">
                <h3>1230 – The Founding of Galway</h3>
                <p>Anglo-Norman lord Richard de Burgh establishes a fort at the mouth of the River Corrib, marking the city's foundation.</p>
            </div>
        </div>

        <!-- 2. Galway Gains Independence -->
        <div class="timeline-item fade-in">
            <span class="timeline-dot"></span>
            <img src="IMG/History/2.jpeg" alt="Charter of Galway">
            <div class="timeline-content">
                <h3>1396 – Galway Gains Independence</h3>
                <p>King Richard II grants Galway a charter, allowing self-governance and control over trade.</p>
            </div>
        </div>

        <!-- 3. Rise of the Tribes -->
        <div class="timeline-item fade-in">
            <span class="timeline-dot"></span>
            <img src="IMG/Hero/IMG_2210.jpg" alt="Tribes of Galway">
            <div class="timeline-content">
                <h3>1400s – The Rise of the Tribes of Galway</h3>
                <p>Fourteen merchant families known as the Tribes of Galway dominate trade and politics.</p>
            </div>
        </div>

        <!-- 4. Lynch's Window -->
        <div class="timeline-item fade-in">
            <span class="timeline-dot"></span>
            <img src="IMG/History/4.jpeg" alt="Lynch's Window">
            <div class="timeline-content">
                <h3>1493 – The Legend of Lynch’s Window</h3>
                <p>Mayor James Lynch FitzStephen allegedly hangs his own son for murder, inspiring the term 'Lynch Law.'</p>
            </div>
        </div>

        <!-- 5. Cromwell's Siege -->
        <div class="timeline-item fade-in">
            <span class="timeline-dot"></span>
            <img src="IMG/History/5.jpeg" alt="Cromwell's Siege">
            <div class="timeline-content">
                <h3>1651 – Cromwell’s Siege of Galway</h3>
                <p>After a nine-month siege, Cromwell’s forces capture the city, causing economic decline.</p>
            </div>
        </div>

        <!-- 6. Williamite War -->
        <div class="timeline-item fade-in">
            <span class="timeline-dot"></span>
            <img src="IMG/History/6.jpeg" alt="Williamite War">
            <div class="timeline-content">
                <h3>1691 – The Williamite War & Galway’s Surrender</h3>
                <p>Galway surrenders to William of Orange, leading to British rule.</p>
            </div>
        </div>

        <!-- 7. The Great Famine -->
        <div class="timeline-item fade-in">
            <span class="timeline-dot"></span>
            <img src="IMG/History/7.jpeg" alt="Great Famine">
            <div class="timeline-content">
                <h3>1845–1852 – The Famine</h3>
                <p>The potato blight causes mass starvation and emigration, devastating Galway’s population.</p>
            </div>
        </div>

        <!-- 8. Irish Independence -->
        <div class="timeline-item fade-in">
            <span class="timeline-dot"></span>
            <img src="IMG/History/8.jpeg" alt="Irish Independence">
            <div class="timeline-content">
                <h3>1922 – Irish Independence & The Civil War</h3>
                <p>Galway becomes part of the Irish Free State after the War of Independence.</p>
            </div>
        </div>

        <!-- 9. Economic Revival -->
        <div class="timeline-item fade-in">
            <span class="timeline-dot"></span>
            <img src="IMG/History/9.jpeg" alt="Economic Revival">
            <div class="timeline-content">
                <h3>1950s–2000s – Economic & Cultural Revival</h3>
                <p>The expansion of University of Galway and growth of tourism fuel Galway’s resurgence.</p>
            </div>
        </div>

        <!-- 10. Modern Galway -->
        <div class="timeline-item fade-in">
            <span class="timeline-dot"></span>
            <img src="IMG/History/10.jpeg" alt="Modern Galway">
            <div class="timeline-content">
                <h3>Present – Galway as a Cultural Hub</h3>
                <p>Galway is known for its arts, music, and festivals, recognized as European Capital of Culture 2020.</p>
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>

</body>

</html>