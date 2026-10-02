<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HIGHER RAPIK SALON</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700;900&display=swap" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
</head>
<body>

    <!-- Luxury Navbar -->
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
                    <a class="nav-link nav-link-custom active" href="/">Home</a>
                    <a class="nav-link nav-link-custom" href="/services">Services</a>
                    <a class="nav-link nav-link-custom" href="/contact">Contact</a>
                    <a class="nav-link nav-link-custom" href="/booking">Booking</a>
                </div>
            </div>
        </div>
    </nav>

    <!-- Advanced Hero Overlay -->
    <section class="hero-section" style="background: linear-gradient(180deg, rgba(11,11,11,0.75) 0%, rgba(11,11,11,0.95) 100%), url('{{ asset('images1/WhatsApp Image 2026-07-08 at 14.30.48.jpeg') }}') center/cover no-repeat;">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-10 text-center">
                    <span class="hero-subtitle">Premium Unisex Luxury Salon</span>
                    <h1 class="hero-title text-white mb-4">Define Your <br><span>True Style</span></h1>
                    <p class="text-gray mb-5 mx-auto" style="max-width: 600px; font-size: 15px; color: #b0b0b0;">
                        Discover luxury hair styling, precision beard grooming, and elite aesthetics designed exclusively for those who demand perfection.
                    </p>
                    <a href="/booking" class="btn btn-gold-premium shadow">Make An Appointment</a>
                </div>
            </div>
        </div>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <section class="hub-section py-5">
        <div class="container">
            <div class="section-heading text-center mb-5">
                <span class="section-label">Central Hub</span>
                <h2>Experience the Salon Journey</h2>
                <p class="text-gray mx-auto" style="max-width: 680px;">
                    Start with a curated introduction, explore premium styles, and see how every detail comes together.
                </p>
            </div>

            <div class="row g-4 align-items-stretch mb-4">
                <div class="col-lg-6">
                    <div class="image-detail-card h-100">
                        <div class="image-detail-image">
                            <img src="{{ asset('images1/WhatsApp Image 2026-07-08 at 14.30.48.jpeg') }}" alt="Classic Taper Fade" class="w-100 h-100 rounded-start">
                        </div>
                        <div class="image-detail-text">
                            <span class="section-label">Style Feature</span>
                            <h3>Classic Taper Fade</h3>
                            <div class="style-badges d-flex flex-wrap gap-2 mb-3">
                                <span class="style-badge">Premium</span>
                                <span class="style-badge">Sharp</span>
                                <span class="style-badge">Textured</span>
                            </div>
                            <p class="text-gray">A crisp taper fade with soft texture on top and a polished finish around the temples and nape. Ideal for clients seeking a sharp, low-maintenance look.</p>
                            <ul class="spotlight-list list-unstyled mt-3">
                                <li><strong>Cut:</strong> low taper fade with layered top.</li>
                                <li><strong>Finish:</strong> matte styling for subtle definition.</li>
                                <li><strong>Perfect for:</strong> everyday elegance and clean lines.</li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="image-detail-card h-100">
                        <div class="image-detail-image">
                            <img src="{{ asset('images1/WhatsApp Image 2026-07-08 at 14.30.49.jpeg') }}" alt="Textured Crop" class="w-100 h-100 rounded-start">
                        </div>
                        <div class="image-detail-text">
                            <span class="section-label">Style Feature</span>
                            <h3>Textured Crop</h3>
                            <div class="style-badges d-flex flex-wrap gap-2 mb-3">
                                <span class="style-badge">Edgy</span>
                                <span class="style-badge">Modern</span>
                                <span class="style-badge">Effortless</span>
                            </div>
                            <p class="text-gray">A modern cropped cut with textured fringe and subtle tapering at the sides. This style adds movement and shape for a bold, contemporary finish.</p>
                            <ul class="spotlight-list list-unstyled mt-3">
                                <li><strong>Cut:</strong> textured top with short, blended sides.</li>
                                <li><strong>Finish:</strong> light product for natural separation.</li>
                                <li><strong>Perfect for:</strong> fresh, easy-care styling every day.</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row g-3 gallery-grid">
                <div class="col-6 col-md-3">
                    <div class="gallery-item rounded" style="background-image: url('{{ asset('images1/WhatsApp Image 2026-07-08 at 14.17.53.jpeg') }}');"></div>
                </div>
                <div class="col-6 col-md-3">
                    <div class="gallery-item rounded" style="background-image: url('{{ asset('images1/WhatsApp Image 2026-07-08 at 14.18.17.jpeg') }}');"></div>
                </div>
                <div class="col-6 col-md-3">
                    <div class="gallery-item rounded" style="background-image: url('{{ asset('images1/WhatsApp Image 2026-07-08 at 14.18.17 (1).jpeg') }}');"></div>
                </div>
                <div class="col-6 col-md-3">
                    <div class="gallery-item rounded" style="background-image: url('{{ asset('images1/WhatsApp Image 2026-07-08 at 14.30.35.jpeg') }}');"></div>
                </div>
            </div>
        </div>
    </section>

    <section class="testimonial-section py-5">
        <div class="container">
            <div class="section-heading text-center mb-5">
                <span class="section-label">Customer Feedback</span>
                <h2>What Our Clients Are Saying</h2>
                <p class="text-gray mx-auto" style="max-width: 680px;">Real stories from guests who loved their salon transformation at Higher Rapik.</p>
            </div>

            <div class="row g-4">
                <div class="col-md-6 col-lg-4">
                    <div class="card card-glass h-100 p-4 testimonial-card">
                        <p class="text-gray">"Amazing service from start to finish. The barber understood exactly what I wanted and delivered a clean fade with a perfect beard finish."</p>
                        <div class="d-flex align-items-center mt-4">
                            <div class="testimonial-avatar rounded-circle d-flex align-items-center justify-content-center">S</div>
                            <div>
                                <h5 class="mb-1 text-white">Sajith</h5>
                                <p class="small text-muted mb-0">Regular Client</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 col-lg-4">
                    <div class="card card-glass h-100 p-4 testimonial-card">
                        <p class="text-gray">"Love the atmosphere and attention to detail. My haircut looked fresh and lasted longer than any other salon I have visited."</p>
                        <div class="d-flex align-items-center mt-4">
                            <div class="testimonial-avatar rounded-circle d-flex align-items-center justify-content-center">M</div>
                            <div>
                                <h5 class="mb-1 text-white">Madhush</h5>
                                <p class="small text-muted mb-0">Satisfied Guest</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 col-lg-4">
                    <div class="card card-glass h-100 p-4 testimonial-card">
                        <p class="text-gray">"Great value and friendly staff. The facial and hair treatment left my skin and hair looking refreshed and healthy."</p>
                        <div class="d-flex align-items-center mt-4">
                            <div class="testimonial-avatar rounded-circle d-flex align-items-center justify-content-center">N</div>
                            <div>
                                <h5 class="mb-1 text-white">Nirosha</h5>
                                <p class="small text-muted mb-0">Happy Customer</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

<!-- Footer conection -->
    @include('footer')

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>