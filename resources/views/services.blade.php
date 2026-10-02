<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SERVICES - HIGHER RAPIK</title>
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
                <a class="nav-link nav-link-custom active" href="/services">Services</a>
                <a class="nav-link nav-link-custom" href="/contact">Contact</a>
                <a class="nav-link nav-link-custom" href="/booking">Booking</a>
            </div>
        </div>
    </nav>

    <section class="services-page py-5">
        <div class="container my-5 py-4">
            <div class="text-center mb-5">
                <span class="hero-subtitle">Our Menu</span>
                <h2 class="fw-bold text-uppercase" style="letter-spacing: 2px;">Premium Services</h2>
                <p class="text-muted small">Experience excellence with our elite salon solutions</p>
            </div>

        <div class="row g-4">
            <div class="col-md-4">
                <div class="card card-glass h-100 p-3 text-center">
                    <div class="card-body">
                        <h4 class="fw-bold mb-3" style="color: var(--gold-primary);">Hair Cut & Beard</h4>
                        <p style="color: var(--text-gray); font-size: 14px;">A polished cut paired with sharp beard detailing for a fresh and modern appearance.</p>
                        <div class="mt-4">
                            <span class="badge border border-1 p-2 px-3 fw-bold" style="color: var(--gold-light); border-color: var(--gold-primary) !important;">RS. 1,500/= up</span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card card-glass h-100 p-3 text-center">
                    <div class="card-body">
                        <h4 class="fw-bold mb-3" style="color: var(--gold-primary);">Head Massage</h4>
                        <p style="color: var(--text-gray); font-size: 14px;">Relaxing head massage therapy to relieve tension, improve circulation, and refresh the scalp.</p>
                        <div class="mt-4">
                            <span class="badge border border-1 p-2 px-3 fw-bold" style="color: var(--gold-light); border-color: var(--gold-primary) !important;">RS. 800/= up</span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card card-glass h-100 p-3 text-center">
                    <div class="card-body">
                        <h4 class="fw-bold mb-3" style="color: var(--gold-primary);">Clean-up</h4>
                        <p style="color: var(--text-gray); font-size: 14px;">Complete grooming clean-up with detailed care for skin, hairline, and overall freshness.</p>
                        <div class="mt-4">
                            <span class="badge border border-1 p-2 px-3 fw-bold" style="color: var(--gold-light); border-color: var(--gold-primary) !important;">RS. 1,500/= up</span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card card-glass h-100 p-3 text-center">
                    <div class="card-body">
                        <h4 class="fw-bold mb-3" style="color: var(--gold-primary);">Facial</h4>
                        <p style="color: #ffffff; font-size: 14px;">Signature facial treatments designed to brighten skin, restore hydration, and unveil a glowing complexion.</p>
                        <div class="mt-4">
                            <span class="badge border border-1 p-2 px-3 fw-bold" style="color: var(--gold-light); border-color: var(--gold-primary) !important;">RS. 3,500/= up</span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card card-glass h-100 p-3 text-center">
                    <div class="card-body">
                        <h4 class="fw-bold mb-3" style="color: var(--gold-primary);">Hair Treatment</h4>
                        <p style="color: var(--text-gray); font-size: 14px;">Nourishing hair treatments to strengthen strands, add shine, and restore healthy scalp balance.</p>
                        <div class="mt-4">
                            <span class="badge border border-1 p-2 px-3 fw-bold" style="color: var(--gold-light); border-color: var(--gold-primary) !important;">RS. 3,000/= up</span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card card-glass h-100 p-3 text-center">
                    <div class="card-body">
                        <h4 class="fw-bold mb-3" style="color: var(--gold-primary);">Hair Colors</h4>
                        <p style="color: var(--text-gray); font-size: 14px;">Vibrant and customized hair coloring services to refresh your look with rich, lasting tones.</p>
                        <div class="mt-4">
                            <span class="badge border border-1 p-2 px-3 fw-bold" style="color: var(--gold-light); border-color: var(--gold-primary) !important;">RS. 5,000/= up</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="text-center mt-5">
            <a href="/booking" class="btn btn-gold-premium shadow">Book A Service Now</a>
        </div>
    </div>
    </section>

    <section class="services-page py-5">
        <div class="container my-5 py-4">
            <div class="text-center mb-5">
                <span class="hero-subtitle">Bridal & Groom Packages</span>
                <h2 class="fw-bold text-uppercase" style="letter-spacing: 2px;">Premium Wedding Packages</h2>
                <p class="text-muted small">Choose a complete luxury package for your wedding day preparation.</p>
            </div>

            <div class="row g-4">
                <div class="col-md-6">
                    <div class="card card-glass h-100 p-4">
                        <div class="card-body">
                            <h4 class="fw-bold mb-4" style="color: var(--gold-primary);">Premium Packages</h4>

                            <div class="mb-4 p-3 rounded-3" style="background: rgba(255,255,255,0.03); border: 1px solid rgba(184,144,71,0.12);">
                                <h5 class="fw-bold mb-3" style="color: #b89047;">Low Budget</h5>
                                <p class="mb-2" style="color: #ffffff;">Hair cut, Beard cut, Facial, Hair setting, Make up, Dressing</p>
                                <div class="fw-bold" style="color: #b89047;">Rs. 23,000</div>
                            </div>

                            <div class="mb-4 p-3 rounded-3" style="background: rgba(255,255,255,0.03); border: 1px solid rgba(184,144,71,0.12);">
                                <h5 class="fw-bold mb-3" style="color:#b89047;">Medium Budget</h5>
                                <p class="mb-2" style="color: #ffffff;">Hair cut, Beard cut, Facial - Gold, Pedicure, Hair setting, Make up, Dressing</p>
                                <div class="fw-bold" style="color: #b89047;">Rs. 33,000</div>
                            </div>

                            <div class="p-3 rounded-3" style="background: rgba(255,255,255,0.03); border: 1px solid rgba(184,144,71,0.12);">
                                <h5 class="fw-bold mb-3" style="color: #b89047">High Budget</h5>
                                <p class="mb-2" style="color: #ffffff;">Hair cut, Beard cut, 2 Facials - Gold, Pedicure, Hair setting, Make up, Dressing</p>
                                <div class="fw-bold" style="color: #b89047;">Rs. 40,000</div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="card card-glass h-100 p-4">
                        <div class="card-body">
                            <h4 class="fw-bold mb-4" style="color: var(--gold-primary);">Bestman Packages</h4>

                            <div class="mb-4 p-3 rounded-3" style="background: rgba(255,255,255,0.03); border: 1px solid rgba(184,144,71,0.12);">
                                <h5 class="fw-bold mb-3" style="color: #b89047">Low Budget</h5>
                                <p class="mb-2" style="color: #ffffff;"> Hair cut, Beard cut, Facial, Hair setting, Make up, Dressing</p>
                                <div class="fw-bold" style="color: #b89047;">Rs. 10,000</div>
                            </div>

                            <div class="mb-4 p-3 rounded-3" style="background: rgba(255,255,255,0.03); border: 1px solid rgba(184,144,71,0.12);">
                                <h5 class="fw-bold mb-3" style="color: #b89047">Medium Budget</h5>
                                <p class="mb-2" style="color: #ffffff;">Hair cut, Beard cut, Facial - Normal, Pedicure, Hair setting, Make up, Dressing</p>
                                <div class="fw-bold" style="color: #b89047;">Rs. 15,000</div>
                            </div>

                            <div class="p-3 rounded-3" style="background: rgba(255,255,255,0.03); border: 1px solid rgba(184,144,71,0.12);">
                                <h5 class="fw-bold mb-3" style="color: #b89047">High Budget</h5>
                                <p class="mb-2" style="color: #ffffff;">Hair cut, Beard cut, Facials - Normal, Pedicure, Hair setting, Make up, Dressing</p>
                                <div class="fw-bold" style="color: #b89047;">Rs. 15,000</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="text-center mt-4">
                <a href="/booking" class="btn btn-outline-light rounded-0 px-4 py-2" style="border-color: #b89047; color: #fff;">Reserve Your Package</a>
            </div>
        </div>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<!-- Footer conection -->
    @include('footer')
</body>
</html>