<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "1234";
$dbname = "news";

// Create connection
$dbcon= mysqli_connect($servername,$username,$password,$dbname);

if (!$dbcon) {
    die("Connection failed: " . mysqli_connect_error());
  }
  echo "";
  ?>

<head>
    <link href="https://fonts.googleapis.com/css?family=Lato&display=swap" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css?family=Lora&display=swap" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css?family=Playfair+Display&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
    <title>Celery</title>
    <link href="main.css" rel="stylesheet" />
</head>

<body>
    <div class="main">
        <div id="home" class="head">
            <div class="h-container animate__animated animate__backInUp">
                <div class="image-h-2"></div>
            </div>
            <div class="fms animate__animated animate__backInLeft">
                <div class="container-fms"></div>
                <span class="fms-title">Find your space now</span>
                <div class="date">
                    <div class="date-container"></div><span class="date-text">9 Aug 2020</span>
                    <div class="name"></div><span class="date-title">Date</span>
                </div>
                <div class="type-container">
                    <div class="type-box"></div><span class="type-text">Private Office</span>
                    <div class="name"></div><span class="type-title">Type</span>
                </div>
                <div class="location-container">
                    <div class="location-box"></div><span class="location-text">Malang, Indonesia</span>
                    <div class="name"></div><span class="location-title">Location</span>
                </div>
                <div class="fms-b-c"><span class="fms-b-t">FIND MY SPACE</span></div>
            </div>
            <div class="celery-header-container animate__animated animate__backInRight">
                <span class="intro-text">Revolutionary co-working <br> space to realize your
                    <br>
                    innovation</span>
                <span class="celery-text">In celery, we spearhead new initiatives and
                    provide
                    mentorship
                    to a new startup, and help grow their opportunities in key local, regional and global
                    markets</span>
            </div>
            <div class="introducing-container animate__animated animate__backInRight">
                <div class="introducing-tab"></div><span class="introducing-text">Introducing</span>
            </div>
            <div class="navbar">
                <div class="navbar-items">
                    <a class="home" href="#home">Home</a>
                    <a class="workspace" href="#spaces">Spaces</a>
                    <a class="events" href="#newsSection">News</a>
                    <a class="contact" href="#footer">Contact Us</a>
                </div>
                <span class="logo">Celery.</span>
            </div>
        </div>
        <div id="spaces" class="spaces-c animate__animated animate__backInUp">

            <div class="spaces-title-c">
                <span class="spaces-title">Our Spaces</span>
                <span class="spaces-subtitle">Our space is designed to give you a different experience when working
                    with your team or personally</span>
            </div>

            <div class="slides-c">
                <div class="office-s">
                    <span class="slide-title-3">Custom Office</span>
                    <div class="image-sli-3"></div>
                    <div class="button-container-sli-1">
                    </div>
                </div>
                <div class="private-space">
                    <div class="color-spaces"></div>
                    <div class="shadow-spaces"></div>
                    <div class="spaces-btn-c">
                        <div class="spaces-btn"></div>
                        <span class="spaces-txt">Check avaibility</span>
                    </div>
                    <span class="title-space">Comfortable space, Full speed wifi, Free coffee & Snacks and many
                        more</span>
                    <span class="subtitle-space">Private Space</span>
                </div>
                <div class="teams-spaces-c">
                    <span class="teams-title">Working with team</span>
                    <div class="teams-image"></div>
                    <div class="teams-arrow"></div>
                </div>
            </div>
        </div>
        <div id="newsSection" class="news-container animate__animated animate__backInUp">
            <div class="row">
                <div class="col-sm-4 col-xs-12"></div>
            </div>
            <div class="news-background">
                <div class="news-items">
                    <?php
                    
                        $sql = "SELECT * FROM posts";
                        $result = mysqli_query($dbcon, $sql);
                        $hsql = "UPDATE posts SET hits = hits +1";
                        mysqli_query($dbcon, $hsql);

                        $hsql = "SELECT * FROM posts";
                        $res = mysqli_query($dbcon, $hsql);
                        $hits = mysqli_fetch_row($res);
                        $row = mysqli_fetch_assoc($result);

                        $id = $row['id'];
                        $title = $row['title'];
                        $des = $row['description'];
                        $by = $row['posted_by'];
                        $hits = $row['hits'];
                        $time = $row['date'];


                        // echo '<div class="container"';
                        echo '<div class="row mb-2">';
                        echo '<div class="col-md-6">';
                        echo '<div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">';
                        echo '<div class="col p-4 d-flex flex-column position-static card bg-light">';
                        echo '<div class="col-md-8">';
                        echo "<h3 class='blog-post-title'>$title</h3>";
                        echo substr($des, 0, 100);
                        echo '<p><div class="blog-post-meta"></p>';
                        echo '</div> <div class="w3-text-grey">';
                        echo "$time</div>";
                        echo "</article>";
                        echo '</div>';
                        echo '</div>';
                        echo '</div>';
                        echo '</div>';
                        echo '</div>';
                    ?>
                </div>
            </div>

            <div class="news-header-container">
                <i class="fas fa-arrow-right fa-2x"></i>
                <a class="news-link" href="news/view.php">See more</a>
            </div>
            <span class="news-title-text">News, events and insights for you</span>
        </div>
        <div class="brands animate__animated animate__backInUp">
            <div class="brand-container">
                <div class="brand-icons">
                    <img src="images/g-l.png" style="width:70%">
                </div>
                <div class="brand-icons-2">
                    <img src="images/t-l.png" style="width:70%">
                </div>
                <div class="brand-icons">
                    <img src="images/u-l.png" style="width:70%">
                </div>
                <div class="brand-icons-2">
                    <img src="images/m-l.png" style="width:70%">
                </div>
                <div class="brand-icons">
                    <img src="images/s-l.png" style="width:70%">
                </div>
                <div class="brand-icons">
                    <img src="images/st-l.png" style="width:70%">
                </div>
            </div>
            <div class="who-u">
                <span class="who-u-sub">Big brands, small bussiness, new startuo and inividuals</span>
                <span class="who-u-title">Who uses Celery?</span>
            </div>
        </div>
        <div class="why-container animate__animated animate__backInUp">
            <div class="why">
                <div class="card-background-why"></div>
                <span class="why-text">With a decade of insights and expertise, we're decided to reimagine
                    co-working bspace, designed to help a new startup grow up and realize their ideas so they can
                    give a positive impacts on many people</span>
                <div class="why-title-container">
                    <span class="why-title">We revolutionize your workspace</span>
                    <div class="why-l-container">
                        <span class="why-card-title">Why Celery</span>
                        <div class="why-line">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div id="footer" class="footer">
            <div class="background"></div>
            <div class="footer-items">
                <div class="sign-up">
                    <span class="sign-up-button-text">SIGN UP NOW</span>
                </div>
                <span class="sub-text-signup">Get the best working experience that you never felt before!</span>
                <div class="footer-header">
                    <span class="h-text">Ready to try a different work experience now?</span>
                    <div class="header-decor">
                        <span class="decor-title">Become a member</span>
                        <div class="decor"></div>
                    </div>
                </div>
            </div>
            <div class="pattern-back-1">
                <div class="pattern-back-2">
                </div>
            </div>
            <div class="image-ad"></div>
        </div>
        <div class="contact-footer">
            <div class="background-container"></div>
            <div class="item-container">
                <div class="footer-links">
                    <div class="first-links">
                        <span class="link-a">Cafe & restaurant</span>
                        <span class="link-b">Child playground</span>
                        <span class="link-c">Event spaces</span>
                        <span class="link-d">Meeting rooms</span>
                        <span class="link-e">Co-working spaces</span>
                        <span class="link-f">Spaces</span>
                    </div>
                    <div class="second-links">
                        <span class="link-g">Press</span>
                        <span class="link-h">Careers</span>
                        <span class="link-i">Pricing</span>
                        <span class="link-j">About Us</span>
                        <span class="link-k">Company</span>
                    </div>
                    <div class="third-links">
                        <span class="link-l">Help</span>
                        <span class="link-m">Privacy Policy</span>
                        <span class="link-n">FAQs</span>
                        <span class="link-o">Support</span>
                    </div>
                    <div class="fourth-links">
                        <span class="link-p">(+62) 82334670000</span>
                        <span class="link-q">Jalan Jayakatwang No.301 Ngasem, Kediri</span>
                        <span class="link-r">Hello@celery.com</span>
                        <span class="link-s">Contact Us</span>
                    </div>
                </div>
                <div class="tagline-container">
                    <div class="social-icons">
                        <i class="fab fa-instagram fa-2x"></i>
                        <i class="fab fa-youtube fa-2x"></i>
                        <i class="fab fa-facebook-f fa-2x"></i>
                    </div>
                    <span class="tagline-text">We offer comfortable spaces, cozy cafe, high-speed internet,
                        spacious
                        parking area and many more for your best workspaces and meetings</span>
                    <span class="title-tagline">Celery</span>
                </div>
            </div>
        </div>
    </div>
</body>