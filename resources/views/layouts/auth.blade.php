<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Login') - HIGHER RAPIK SALON</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
</head>
<body>

    <nav class="navbar navbar-expand-lg navbar-custom sticky-top">
        <div class="container">
            <a class="navbar-brand navbar-brand-custom d-flex align-items-center" href="/">
                <img src="{{ asset('images/logo.png.png') }}" alt="Logo" width="40" height="40" class="d-inline-block align-top me-3 rounded-circle">
                HIGHER RAPIK <span>SALON</span>
            </a>
            <button class="navbar-toggler text-white border-0" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <div class="navbar-nav ms-auto">
                    <a class="nav-link nav-link-custom" href="/">Home</a>
                    <a class="nav-link nav-link-custom" href="/services">Services</a>
                    <a class="nav-link nav-link-custom" href="/contact">Contact</a>
                    <a class="nav-link nav-link-custom" href="/booking">Booking</a>
                </div>
            </div>
        </div>
    </nav>

    <section class="auth-section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-5 col-lg-4">
                    @yield('content')
                </div>
            </div>
        </div>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
