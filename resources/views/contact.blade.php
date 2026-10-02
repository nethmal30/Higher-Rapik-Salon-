<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CONTACT US - HIGHER RAPIK</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700;900&display=swap" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
</head>
<body>

    <nav class="navbar navbar-expand-lg navbar-custom sticky-top">
        <div class="container">
            <a class="navbar-brand navbar-brand-custom d-flex align-items-center" href="/">
                <img src="{{ asset('images/logo.png.png') }}" alt="Logo" width="40" height="40" class="d-inline-block align-top me-3 rounded-circle">
                HIGHER RAPIK <span>SALON</span>
            </a>
            <div class="navbar-nav ms-auto">
                <a class="nav-link nav-link-custom" href="/">Home</a>
                <a class="nav-link nav-link-custom" href="/services">Services</a>
                <a class="nav-link nav-link-custom active" href="/contact">Contact</a>
                <a class="nav-link nav-link-custom" href="/booking">Booking</a>
            </div>
        </div>
    </nav>

    <div class="container my-5 py-5">
        <div class="row justify-content-center">
            <div class="col-md-7">
                <div class="card card-glass p-3 shadow-lg">
                    <div class="card-header bg-transparent text-center py-4" style="border-bottom: 1px solid rgba(255,255,255,0.05);">
                        <span class="hero-subtitle">Find Us</span>
                        <h2 class="fw-bold mb-1" style="color: var(--gold-primary); letter-spacing: 2px;">CONTACT INFORMATION</h2>
                    </div>
                    <div class="card-body p-4 fs-6" style="color: var(--text-gray); line-height: 2;">
                        
                        <div class="mb-4 d-flex align-items-start">
                            <span class="me-3 fw-bold" style="color: var(--gold-primary); font-size: 20px;">📍</span>
                            <div>
                                <h5 class="text-white fw-bold mb-1">Our Location</h5>
                                <p class="mb-0">Higher Rapik Unisex Salon, Katunayaka , seeduwa, Sri Lanka.</p>
                            </div>
                        </div>

                        <div class="mb-4 d-flex align-items-start">
                            <span class="me-3 fw-bold" style="color: var(--gold-primary); font-size: 20px;">📞</span>
                            <div>
                                <h5 class="text-white fw-bold mb-1">Hotline</h5>
                                <p class="mb-0">+94 70 142 8322</p>
                            </div>
                        </div>

                        <div class="mb-4 d-flex align-items-start">
                            <span class="me-3 fw-bold" style="color: var(--gold-primary); font-size: 20px;">⏰</span>
                            <div>
                                <h5 class="text-white fw-bold mb-1">Opening Hours</h5>
                                <p class="mb-0">Open Daily: 9:00 AM - 8:00 PM</p>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<!-- Footer conect -->
    @include('footer')

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>