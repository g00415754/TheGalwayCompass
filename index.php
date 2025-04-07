<?php
// Start the session
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>The Galway Compass</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="CSS/footer.css">
    <link rel="stylesheet" href="CSS/home.css">
    <link rel="stylesheet" href="CSS/fonts.css">
    <link rel="stylesheet" href="CSS/bus.css">

    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
    <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>

    <!-- Font Awesome for Social Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/gsap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/ScrollTrigger.min.js"></script>

</head>

<body>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg custom-navbar">
        <div class="container-fluid">
            <a class="navbar-brand hover-effect" href="#">
                <video src="IMG/Logo/AnimatedLogo.mp4" class="img-fluid" style="width: 150px;" autoplay loop muted
                    playsinline controlslist="nodownload"></video>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item"><a class="nav-link hover-effect gabarito active" href="#"
                            style="color: #001F54;">Home</a></li>
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



    <section id="hero">
        <h1 class="fancy">Welcome to <br>Galway City!</h1>
        <p>Whether you're here for the culture, the food, or the stunning coastal views, <br>Galway promises an
            unforgettable adventure.</p>
        <a href="#" class="btn gabarito discover-btn">Discover now</a>

    </section>


    <blockquote class="mt-5 mb-5 fade-in">
        <p>
            Discover Galway – where history, culture, and community come to life. Nestled along Ireland’s rugged west
            coast, Galway is a city of storytellers, musicians, and dreamers. Wander through its cobbled streets,
            uncover centuries-old landmarks, and immerse yourself in a vibrant arts and festival scene. Whether you're
            seeking must-visit attractions, upcoming events, or hidden local gems, this site is your gateway to all
            things Galway. Stay informed, explore more, and join the conversation in our chat space—because Galway is
            best experienced together!
        </p>
    </blockquote>

    <section id="statistics" class="container py-5 mt-5 mb-5 fade-in">
        <div class="row align-items-center">
            <!-- Left Side: Interesting Facts and Description -->
            <div class="col-md-6">
                <div class="interesting-facts">
                    <h1>
                        Interesting <br>
                        <span>F</span>
                        <span>A</span>
                        <span>C</span>
                        <span>T</span>
                        <span>S</span>
                    </h1>
                </div>
                <p>Galway is a city rich in history, culture, and unique traditions, with countless fascinating stories
                    to discover. While there’s so much to explore, here are just a few intriguing facts that make Galway
                    truly special.</p>
            </div>

            <!-- Right Side: Statistics -->
            <div class="col-md-6 text-center fade-in">
                <div class="row row-cols-2 g-2"> <!-- 2 equal columns with extra spacing -->
                    <div class="col">
                        <div class="stat-box text-center p-4 border rounded">
                            <i class="fas fa-handshake"></i><br>
                            <strong>Friendliest City</strong>
                            <p>Galway has been recognised as Europe's friendliest city multiple times, most recently in
                                2020.</p>
                        </div>
                    </div>
                    <div class="col">
                        <div class="stat-box text-center p-4 border rounded">
                            <i class="fas fa-ring"></i> <br>
                            <strong>Claddagh Ring Origin</strong>
                            <p>The iconic Claddagh Ring, symbolising love, loyalty, and friendship, originated in
                                Galway.</p>
                        </div>
                    </div>
                    <div class="col">
                        <div class="stat-box text-center p-4 border rounded">
                            <i class="fas fa-palette"></i> <br>
                            <strong>Cultural Vibrancy</strong>
                            <p>Known as the "Cultural Heart of Ireland," Galway hosts approximately 123 festivals
                                annually.</p>
                        </div>
                    </div>
                    <div class="col">
                        <div class="stat-box text-center p-4 border rounded">
                            <i class="fas fa-theater-masks"></i> <br>
                            <strong>Festive Celebrations</strong>
                            <p>The Galway Continental Christmas Market is Ireland's top-rated Christmas market.</p>
                        </div>
                    </div>
                </div>
            </div>


        </div> <!-- Closing row -->
    </section>


    <section class="carousel-section mb-5 fade-in">
        <h2 class="text-center">Popular attractions <i class="fas fa-map-marked-alt" style="color: #1282A2"></i></h2>
        <div class="container">
            <div class="carousel-container">
                <div id="multiCardCarousel" class="carousel slide" data-bs-ride="carousel">

                    <!-- Carousel inner -->
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="card">
                                        <img src="IMG/Hero/IMG_2210.jpg" class="card-img-top" alt="Image 1">
                                        <div class="card-body">
                                            <h5 class="card-title">Eyre Square</h5>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="card">
                                        <img src="IMG/Hero/IMG_2219.jpg" class="card-img-top" alt="Image 2">
                                        <div class="card-body">
                                            <h5 class="card-title">Shop Street</h5>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="card">
                                        <img src="IMG/Hero/IMG_2373.jpg" class="card-img-top" alt="Image 3">
                                        <div class="card-body">
                                            <h5 class="card-title">Spanish Arch</h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="carousel-item">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="card">
                                        <img src="IMG/Hero/IMG_2324.jpg" class="card-img-top" alt="Image 4">
                                        <div class="card-body">
                                            <h5 class="card-title">The Docks</h5>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="card">
                                        <img src="IMG/Hero/IMG_2431.jpg" class="card-img-top" alt="Image 5">
                                        <div class="card-body">
                                            <h5 class="card-title">The West End</h5>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="card">
                                        <img src="IMG/Hero/IMG_2358.jpg" class="card-img-top" alt="Image 6">
                                        <div class="card-body">
                                            <h5 class="card-title">The Galway Museum</h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                    <!-- Carousel Controls -->
                    <button class="carousel-control-prev" type="button" data-bs-target="#multiCardCarousel"
                        data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#multiCardCarousel"
                        data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    </button>
                </div>
            </div>
        </div>
    </section>

    <h2 class="text-center pb-5 mapText fade-in">Find them <span style="color: #1282A2">(and more)</span> on our
        interactive map
    </h2>
    <div id="galway-map" style="height: 80vh; width: 80%; margin: auto; border-radius: 20px;"></div>

    <section id="bus-section" class="container-fluid mt-5 fade-in">
        <div class="row bus-row">
            <!-- Bus Column -->
            <div class="col-md-6 bus-col">
                <div class="bus-container">
                    <img src="IMG/bus.png" alt="Bus">
                </div>
            </div>

            <!-- Content Column -->
            <div class="col-md-6 content-col">
                <h2>Travelling to Galway City</h2>
                <div class="accordion mt-3" id="accordionExample">
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                Travelling by Coach
                            </button>
                        </h2>
                        <div id="collapseOne" class="accordion-collapse collapse show"
                            data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                Getting to Galway City by coach is affordable, comfortable, and hassle-free. Major
                                operators run frequent services from across Ireland. <br><br>
                                📍 Arrives at: Galway Coach Station (Fairgreen Road), minutes from Eyre Square. <br><br>
                                ⏳ Travel Times: <i class="fa-solid fa-arrow-right"></i> Dublin ~2.5 to 3 hrs <br><br>
                                Plan your trip: <a href="https://www.citylink.ie">Citylink</a> | <a
                                    href="https://www.buseireann.ie">Bus Éireann</a>
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                Travelling by Plane
                            </button>
                        </h2>
                        <div id="collapseTwo" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                Flying is the fastest way to reach Galway, with Shannon Airport being the nearest
                                international hub. <br><br>
                                Nearest Airport: Shannon Airport (SNN) ~1 hr 15 min from Galway <br>
                                <i class="fa-solid fa-arrows-rotate"></i> Other Options: Dublin Airport (DUB) ~2.5 hrs
                                via coach <br><br>

                                📍 Getting to Galway from Shannon: <br>
                                <i class="fa-solid fa-bus"></i> Bus Éireann (Route 51) - Direct bus (~1 hr 30 min) <br>
                                <i class="fa-solid fa-car-side"></i> Car Rental / Taxi - ~1 hr via M18 <br><br>

                                Plan your trip: <a href="https://www.shannonairport.ie">Shannon Airport</a> | <a
                                    href="https://www.dublinairport.com">Dublin Airport</a>
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                Travelling via Aran Island Ferries
                            </button>
                        </h2>
                        <div id="collapseThree" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                If you're visiting Galway from the Aran Islands, the Aran Island Ferries provide a
                                scenic and reliable connection to the mainland. <br><br>
                                📍 Inis Mór, Inis Meáin & Inis Oírr <i class="fa-solid fa-arrow-right"></i> Rossaveel
                                Harbour (~40 min) <br>
                                📍 Inis Mór <i class="fa-solid fa-arrow-right"></i> Galway City Dock (Seasonal, ~90 min)
                                <br><br>

                                Getting to Galway from Rossaveel: <br>
                                <i class="fa-solid fa-bus"></i> Shuttle Bus: Direct coach to Galway City (~1 hr) <br>
                                <i class="fa-solid fa-car-side"></i> Drive: ~45 min via R336 <br><br>

                                Plan your trip: <a href="https://www.aranislandferries.com">Aran Island Ferries</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>

    <h2 class="mt-5 text-center toursText fade-in">Fancy a Walking <div class="interesting-facts">
            <h1 style="font-size: 5rem; margin-top: 1rem;">
                <span>T</span>
                <span>O</span>
                <span>U</span>
                <span>R</span>
                <span>?</span>
            </h1>
        </div>Plenty to Choose From!</h2>
    <section id="tours" class="mb-5 fade-in">
        <img src="IMG/character.jpeg" class="character mt-4" alt="Walking Character">
        <div class="tour-content mt-4">
            <div class="column">
                <h2>Historic <i class="fas fa-landmark"></i></h2>
                <p><b>Galway Tours</b>: Offers a "Walking Tour of Medieval Galway," guiding visitors through must-see
                    locations and hidden gems, including historic pubs like The King's Head and O'Connell's.​<br><br>
                    <b>Experience Galway</b>: Provides the "Welcome to Galway" walking tour, taking you through narrow
                    streets and historic landmarks, offering a blend of heritage, culture, and local interest. ​
                </p>
            </div>
            <div class="column">
                <h2>Cultural & Food <i class="fas fa-theater-masks"></i></h2>
                <p><b>Galway Food Tours</b>: Conducts a 2.5-hour culinary walking tour, allowing participants to
                    discover local culinary spots, tasting everything from oysters to cheeses, and experiencing Galway's
                    vibrant food scene. <br><br>
                    <b>Lally Tours</b>: Offers the "Walk, Talk & Taste Tour of Galway City," where you can explore Irish
                    history, culture, and folklore while sampling traditional dishes, beverages, snacks, and desserts
                    across four local venues.
                </p>
            </div>
            <div class="column">
                <h2>Scenic Coastal <i class="fas fa-sailboat"></i></h2>
                <p>While specific guided tours focusing solely on the Salthill Promenade are less common, many visitors
                    enjoy self-guided walks along this scenic route, taking in the fresh Atlantic air and stunning views
                    of Galway Bay.​</p>
            </div>
        </div>
    </section>


    <section id="gallery" class="mt-5 fade-in">
        <h2 class="galleryText text-center">Take a look at our Gallery</h2>
        <div class="marquee-container">
            <div class="marquee">
                <img src="IMG/Hero/IMG_2440.jpg">
                <img src="IMG/Hero/IMG_2431.jpg">
                <img src="IMG/Hero/IMG_2307.jpg">
                <img src="IMG/Hero/IMG_2236.jpg">
                <img src="IMG/Hero/IMG_2244.jpg">
                <img src="IMG/Hero/IMG_2324.jpg">

                <!-- Duplicate images for seamless loop -->
                <img src="IMG/Hero/IMG_2440.jpg">
                <img src="IMG/Hero/IMG_2431.jpg">
                <img src="IMG/Hero/IMG_2307.jpg">
                <img src="IMG/Hero/IMG_2236.jpg">
                <img src="IMG/Hero/IMG_2244.jpg">
                <img src="IMG/Hero/IMG_2324.jpg">
            </div>
        </div>

        <div class="marquee-container">
            <div class="marquee-inverse">
                <img src="IMG/Hero/IMG_2358.jpg">
                <img src="IMG/Hero/IMG_2323.jpg">
                <img src="IMG/Hero/IMG_2374.jpg">
                <img src="IMG/Hero/IMG_2427.jpg">
                <img src="IMG/Hero/IMG_2373.jpg">
                <img src="IMG/Hero/IMG_2324.jpg">

                <!-- Duplicate images for seamless loop -->
                <img src="IMG/Hero/IMG_2358.jpg">
                <img src="IMG/Hero/IMG_2323.jpg">
                <img src="IMG/Hero/IMG_2374.jpg">
                <img src="IMG/Hero/IMG_2427.jpg">
                <img src="IMG/Hero/IMG_2373.jpg">
                <img src="IMG/Hero/IMG_2324.jpg">
            </div>
        </div>

        <div class="marquee-container">
            <div class="marquee">
                <img src="IMG/Hero/IMG_2324.jpg">
                <img src="IMG/Hero/IMG_2243.jpg">
                <img src="IMG/Hero/IMG_2323.jpg">
                <img src="IMG/Hero/IMG_2440.jpg">
                <img src="IMG/Hero/IMG_2307.jpg">
                <img src="IMG/Hero/IMG_2386.jpg">

                <!-- Duplicate images for seamless loop -->
                <img src="IMG/Hero/IMG_2324.jpg">
                <img src="IMG/Hero/IMG_2243.jpg">
                <img src="IMG/Hero/IMG_2323.jpg">
                <img src="IMG/Hero/IMG_2440.jpg">
                <img src="IMG/Hero/IMG_2307.jpg">
                <img src="IMG/Hero/IMG_2386.jpg">
            </div>
        </div>

        <p class="text-center mb-5 mt-4 fade-in" style="font-family: Poppins, sans-serif;">Find more gorgeous content of
            Galway city using <span style="color: #1282A2">#GalwayCity</span> on all social media platforms.</p>
    </section>


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
    <script src="JS/heroText.js"></script>
    <script src="JS/galwayMap.js"></script>
    <script src="JS/bus.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>

</body>

</html>