<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Nara.Id - K-pop Album Pre-Order</title>

    <meta name="description" content="">
    <meta name="keywords" content="">

    @vite([
    'resources/sass/app.scss',
    'resources/css/main.css',
    'resources/js/main.js',
    'resources/js/app.js'
    ])

    <link href="assets/img/favicon.png" rel="icon">
    <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <link href="https://fonts.googleapis.com" rel="preconnect">
    <link href="https://fonts.googleapis.com" rel="preconnect" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&family=Montserrat:wght@400;500;600;700&family=Lato:wght@400;500;700&display=swap" rel="stylesheet">
</head>

<body class="index-page">

    <header id="header" class="header fixed-top">
        <div class="container-fluid container-xl position-relative">

            <div class="top-row d-flex align-items-center justify-content-between">
                <a class="logo d-flex align-items-center">
                    <!-- Uncomment the line below if you also wish to use an image logo -->
                    <img src="{{ asset('img/logo1.png') }}" alt="NARA.ID" style="width: 150px; height: auto;">
                    <!-- <h1 class="sitename">NARA.ID</h1> -->
                </a>
            </div>
        </div>
    </header>

    <main class="main">
        <!-- Hero Section -->
        <section id="hero" class="hero section dark-background">
            <div class="hero-background">
                <img src="{{ asset('img/background.png') }}" alt="K-Pop Albums">
                <div class="hero-overlay"></div>
            </div>
            <div class="hero-content">
                <div class="container position-relative">
                    <div class="row justify-content-center text-center">
                        <div class="col-lg-8">
                            <h1>
                                Find Your Favorite K-Pop Albums
                            </h1>
                            <p>
                                Discover and pre-order your favorite K-Pop albums
                                easily with Nara.Id.
                            </p>
                            <div class="hero-buttons">
                                <a href="{{ route('register') }}" class="btn btn-primary">
                                    Register
                                </a>
                                <a href="{{ route('login') }}" class="btn btn-outline">
                                    Login
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- /Hero Section -->

        <!-- About Section -->
        <section id="about" class="about section">
            <!-- Section Title -->
            <div class="container section-title" data-aos="fade-up">
                <span class="subtitle">About Nara.Id</span>
                <h2>Your K-Pop Album Pre-Order Platform</h2>
                <p>
                    Nara.Id is a web-based platform made for K-Pop fans who want a
                    simpler way to pre-order albums. Instead of ordering through
                    scattered chats and manual notes, everything is organized in one
                    place, so every order is clear, recorded, and easy to track.
                </p>
            </div>
            <!-- End Section Title -->

            <div class="container" data-aos="fade-up" data-aos-delay="100">
                <div class="row g-4 justify-content-center">

                    <div class="col-md-4">
                        <div class="text-center h-100 p-3">
                            <i class="bi bi-collection fs-1 mb-3 d-block"></i>
                            <h5>All in One Place</h5>
                            <p>
                                Album details, prices, and stock information are
                                available in one catalog, so you don't need to ask
                                around before ordering.
                            </p>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="text-center h-100 p-3">
                            <i class="bi bi-shield-check fs-1 mb-3 d-block"></i>
                            <h5>Clear and Organized</h5>
                            <p>
                                Every pre-order is recorded with its own payment and
                                order status, which helps avoid mix-ups and
                                misunderstandings.
                            </p>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="text-center h-100 p-3">
                            <i class="bi bi-shop fs-1 mb-3 d-block"></i>
                            <h5>Pick Up at the Store</h5>
                            <p>
                                Collect your album directly at the store, so there
                                are no shipping worries and you can check your album
                                right away.
                            </p>
                        </div>
                    </div>

                </div>
            </div>
        </section>
        <!-- /About Section -->

        <!-- How It Works Section -->
        <section id="features" class="features section">
            <!-- Section Title -->
            <div class="container section-title" data-aos="fade-up">
                <span class="subtitle">How It Works</span>
                <h2>Order Your K-Pop Album Easily</h2>
                <p>
                    Follow these simple steps to pre-order your favorite
                    K-Pop album through Nara.Id.
                </p>
            </div>
            <div class="container" data-aos="fade-up" data-aos-delay="100">
                <div class="tabs-wrapper">
                    <!-- Tabs Header -->
                    <div class="tabs-header" data-aos="fade-up" data-aos-delay="200">
                        <ul class="nav nav-tabs">
                            <!-- Step 01 -->
                            <li class="nav-item">
                                <a class="nav-link active show"
                                    data-bs-toggle="tab"
                                    data-bs-target="#features-tab-1">
                                    <div class="tab-content-preview">
                                        <span class="tab-number">01</span>
                                        <div class="tab-text">
                                            <h6>Browse Albums</h6>
                                            <small>Find your album</small>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <!-- Step 02 -->
                            <li class="nav-item">
                                <a class="nav-link"
                                    data-bs-toggle="tab"
                                    data-bs-target="#features-tab-2">
                                    <div class="tab-content-preview">
                                        <span class="tab-number">02</span>
                                        <div class="tab-text">
                                            <h6>Place Order</h6>
                                            <small>Choose your album</small>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <!-- Step 03 -->
                            <li class="nav-item">
                                <a class="nav-link"
                                    data-bs-toggle="tab"
                                    data-bs-target="#features-tab-3">
                                    <div class="tab-content-preview">
                                        <span class="tab-number">03</span>
                                        <div class="tab-text">
                                            <h6>Make Payment</h6>
                                            <small>Pay by transfer</small>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <!-- Step 04 -->
                            <li class="nav-item">
                                <a class="nav-link"
                                    data-bs-toggle="tab"
                                    data-bs-target="#features-tab-4">
                                    <div class="tab-content-preview">
                                        <span class="tab-number">04</span>
                                        <div class="tab-text">
                                            <h6>Pick Up</h6>
                                            <small>Collect your album</small>
                                        </div>
                                    </div>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <!-- Tab Content -->
                    <div class="tab-content" data-aos="fade-up" data-aos-delay="300">

                        <!-- TAB 1 -->
                        <div class="tab-pane fade active show" id="features-tab-1">
                            <div class="row justify-content-center">
                                <div class="col-lg-8">
                                    <div class="content-area ">
                                        <div class="content-badge">
                                            <i class="bi bi-collection"></i>
                                            <span>Step 01</span>
                                        </div>
                                        <h3>Browse Your Favorite Albums</h3>
                                        <p>
                                            Explore the available K-Pop albums
                                            and find the album you want to pre-order.
                                        </p>
                                        <div class="feature-points ">
                                            <div class="point-item">
                                                <i class="bi bi-check-circle"></i>
                                                <span>Browse available albums</span>
                                            </div>
                                            <div class="point-item">
                                                <i class="bi bi-check-circle"></i>
                                                <span>View album details and price</span>
                                            </div>
                                            <div class="point-item">
                                                <i class="bi bi-check-circle"></i>
                                                <span>Check available stock</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- TAB 2 -->
                        <div class="tab-pane fade" id="features-tab-2">
                            <div class="row justify-content-center">
                                <div class="col-lg-8">
                                    <div class="content-area">
                                        <div class="content-badge">
                                            <i class="bi bi-cart-check"></i>
                                            <span>Step 02</span>
                                        </div>
                                        <h3>Place Your Pre-Order</h3>
                                        <p>
                                            Select your favorite album, choose
                                            the quantity, and submit your order.
                                        </p>
                                        <div class="feature-points ">
                                            <div class="point-item">
                                                <i class="bi bi-check-circle"></i>
                                                <span>Select your favorite album</span>
                                            </div>
                                            <div class="point-item">
                                                <i class="bi bi-check-circle"></i>
                                                <span>Choose the desired quantity</span>
                                            </div>
                                            <div class="point-item">
                                                <i class="bi bi-check-circle"></i>
                                                <span>Submit your order</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- TAB 3 -->
                        <div class="tab-pane fade" id="features-tab-3">
                            <div class="row justify-content-center">
                                <div class="col-lg-8">
                                    <div class="content-area">
                                        <div class="content-badge">
                                            <i class="bi bi-credit-card"></i>
                                            <span>Step 03</span>
                                        </div>
                                        <h3>Complete Your Payment</h3>
                                        <p>
                                            Complete your payment through
                                            bank transfer according to your
                                            order information.
                                        </p>
                                        <div class="feature-points">
                                            <div class="point-item">
                                                <i class="bi bi-check-circle"></i>
                                                <span>View payment information</span>
                                            </div>
                                            <div class="point-item">
                                                <i class="bi bi-check-circle"></i>
                                                <span>Make a bank transfer</span>
                                            </div>
                                            <div class="point-item">
                                                <i class="bi bi-check-circle"></i>
                                                <span>Check your payment status</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- TAB 4 -->
                        <div class="tab-pane fade" id="features-tab-4">
                            <div class="row justify-content-center">
                                <div class="col-lg-8">
                                    <div class="content-area">
                                        <div class="content-badge">
                                            <i class="bi bi-shop"></i>
                                            <span>Step 04</span>
                                        </div>
                                        <h3>Pick Up Your Album</h3>
                                        <p>
                                            Check your order status and collect
                                            your album at the store when it is ready.
                                        </p>
                                        <div class="feature-points">
                                            <div class="point-item">
                                                <i class="bi bi-check-circle"></i>
                                                <span>Check your order status</span>
                                            </div>
                                            <div class="point-item">
                                                <i class="bi bi-check-circle"></i>
                                                <span>Wait until your order is ready</span>
                                            </div>
                                            <div class="point-item">
                                                <i class="bi bi-check-circle"></i>
                                                <span>Pick up your album at the store</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </section>
        <!-- /How It Works Section -->
    </main>

    <footer id="footer" class="footer dark-background">
        <div class="container">
            <div class="row gy-5">
                <!-- About Nara.Id -->
                <div class="col-lg-4">
                    <div class="footer-content">
                        <a href="#" class="logo d-flex align-items-center mb-4">
                            <img src="{{ asset('img/logo1.png') }}" alt="NARA.ID" style="width: 150px; height: auto;">
                        </a>
                        <p class="mb-4">
                            Nara.Id is a web-based platform for K-Pop
                            album pre-orders with a simple and convenient
                            ordering process.
                        </p>
                    </div>
                </div>
                <!-- Navigation -->
                <div class="col-lg-4">
                    <div class="footer-links">
                        <h4>Navigation</h4>
                        <ul>
                            <li>
                                <a href="#about">
                                    <i class="bi bi-chevron-right"></i> About
                                </a>
                            </li>
                            <li>
                                <a href="#features">
                                    <i class="bi bi-chevron-right"></i> Features
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('login') }}">
                                    <i class="bi bi-chevron-right"></i> Login
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('register') }}">
                                    <i class="bi bi-chevron-right"></i> Register
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>

                <!-- Our Information -->
                <div class="col-lg-4 ">
                    <div class="footer-contact">
                        <h4>Our Information</h4>
                        <div class="contact-item">
                            <div class="contact-icon">
                                <i class="bi bi-geo-alt"></i>
                            </div>
                            <div class="contact-info">
                                <p>
                                    Jl. Contoh No. 123<br>
                                    Purbalingga, Jawa Tengah
                                </p>
                            </div>
                        </div>
                        <div class="contact-item">
                            <div class="contact-icon">
                                <i class="bi bi-telephone"></i>
                            </div>
                            <div class="contact-info text-center">
                                <p>+62 812-3456-7890</p>
                            </div>
                        </div>
                        <div class="contact-item">
                            <div class="contact-icon">
                                <i class="bi bi-envelope"></i>
                            </div>
                            <div class="contact-info text-center">
                                <p>naralid@gmail.com</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-bottom">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-12">
                        <div class="copyright text-center">
                            <p>
                                © <span>{{ date('Y') }}</span>
                                <strong class="px-1 sitename">Nara.Id</strong>
                                <span>All Rights Reserved</span>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </footer>

    <!-- Scroll Top -->
    <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

    <!-- Preloader -->
    <div id="preloader"></div>
</body>

</html>