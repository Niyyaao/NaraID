<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>{{ $album->title }} - Nara.Id</title>

    @vite([
    'resources/sass/app.scss',
    'resources/css/main.css',
    'resources/js/main.js',
    'resources/js/app.js'
    ])

    <link href="https://fonts.googleapis.com" rel="preconnect">
    <link href="https://fonts.googleapis.com" rel="preconnect" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&family=Montserrat:wght@400;500;600;700&family=Lato:wght@400;500;700&display=swap" rel="stylesheet">
</head>

<style>
    /* header halaman detail katalog: selalu tampil (latar gelap) */
    .catalog-page .header {
        --background-color: #172536;
        --default-color: #ffffff;
        --heading-color: #ffffff;
        background-color: #172536;
        
    }
</style>

<body class="catalog-page ">

    <header id="header" class="header fixed-top">
        <div class="container-fluid container-xl position-relative">
            <div class="top-row d-flex align-items-center justify-content-between">
                <a href="{{ url('/') }}" class="logo d-flex align-items-center">
                    <img src="{{ asset('img/logo1.png') }}" alt="NARA.ID" style="width: 150px; height: auto;">
                </a>
            </div>
        </div>
    </header>

    <main class="main">
        <section class="catalog-detail section">
            <div class="container">

                <div class="page-head">
                    <div>
                        <h1>Album Detail</h1>
                    </div>
                    <a href="{{ route('landing') }}#catalog" class="btn-back">
                        <i class="bi bi-arrow-left me-2"></i><span>Back</span>
                    </a>
                </div>

                <div class="card-body shadow mb-4 buyer-detail-content">
                    <div class="buyer-detail-image-wrap">
                        <img src="{{ asset('storage/albums/' . $album->image) }}"
                            onerror="this.src='{{ asset('images/default-cover.png') }}'"
                            alt="{{ $album->title }}" class="buyer-detail-image">
                        @if ($album->stock > 0)
                        <span class="buyer-detail-badge badge-instock">In Stock</span>
                        @else
                        <span class="buyer-detail-badge badge-outstock">Sold Out</span>
                        @endif
                    </div>

                    <div class="buyer-detail-info">
                        <span class="buyer-detail-artist">{{ $album->artist_name }}</span>
                        <h1 class="buyer-detail-title">{{ $album->title }}</h1>
                        <div class="buyer-detail-price">IDR {{ number_format($album->price, 0, ',', '.') }}</div>
                        <div class="buyer-detail-stock"><span>Stock : </span><strong>{{ $album->stock }} pcs</strong></div>
                        <div class="buyer-detail-desc"><span>Description </span>
                            <p>{{ $album->description }}</p>
                        </div>

                        <div class="buyer-actions">
                            @if ($album->stock > 0)
                            <a href="{{ route('login') }}" class="album-btn album-btn--primary px-4 ">
                                <i class="bi bi-box-arrow-in-right"></i> Login to Order
                            </a>
                            @else
                            <span class="album-btn album-btn--disabled">
                                <i class="bi bi-slash-circle"></i> Sold Out
                            </span>
                            @endif
                        </div>
                    </div>
                </div>

            </div>
        </section>
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
                                <p>+62 856-9352-6592</p>
                            </div>
                        </div>
                        <div class="contact-item">
                            <div class="contact-icon">
                                <i class="bi bi-envelope"></i>
                            </div>
                            <div class="contact-info text-center">
                                <p>naraid@gmail.com</p>
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

</body>

</html>