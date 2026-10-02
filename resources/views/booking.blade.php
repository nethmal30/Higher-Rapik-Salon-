<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LUXURY BOOKING - HIGHER RAPIK</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700;900&display=swap" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <style>
        /* Stylist Card Style */
        .stylist-card {
            border: 1px solid #b89047 !important;
            background: rgba(184, 144, 71, 0.1) !important;
            box-shadow: 0 0 15px rgba(184, 144, 71, 0.3);
        }
        /* Time Slot Buttons */
        .time-slot-radio { display: none; }
        .time-slot-label {
            display: block;
            padding: 12px 5px;
            background: #111111;
            border: 1px solid #222222;
            color: #ffffff;
            text-align: center;
            cursor: pointer;
            border-radius: 4px;
            font-size: 13px;
            transition: all 0.2s ease;
        }
        .time-slot-label:hover:not(.slot-booked) {
            border-color: #b89047;
            color: #b89047;
        }
        .slot-booked {
            background: #222222 !important;
            border: 1px solid #333333 !important;
            color: #555555 !important;
            cursor: not-allowed !important;
            text-decoration: line-through;
        }
        /* Premium Form Inputs */
        .form-input-premium {
            background-color: #111111 !important;
            border: 1px solid #222222 !important;
            color: #ffffff !important;
            padding: 12px !important;
        }
        .form-input-premium:focus {
            border-color: #b89047 !important;
            box-shadow: 0 0 8px rgba(184, 144, 71, 0.3) !important;
        }
        label {
            color: #b89047;
            font-size: 14px;
            margin-bottom: 8px;
            font-weight: 500;
        }
        .btn-gold-premium {
            background-color: #b89047;
            color: #000000;
            font-weight: 700;
            letter-spacing: 1px;
            border: none;
            text-transform: uppercase;
            transition: all 0.3s ease;
        }
        .btn-gold-premium:hover {
            background-color: #dfb45b;
            box-shadow: 0 0 15px rgba(184, 144, 71, 0.5);
        }
        .auth-tabs {
            display: flex;
            border-bottom: 1px solid rgba(184, 144, 71, 0.2);
            margin-bottom: 30px;
        }
        .auth-tab {
            flex: 1;
            background: transparent;
            border: none;
            color: #a0a0a0;
            font-size: 13px;
            font-weight: 600;
            letter-spacing: 1.5px;
            text-transform: uppercase;
            padding: 14px 10px;
            cursor: pointer;
            transition: all 0.3s ease;
            border-bottom: 2px solid transparent;
        }
        .auth-tab.active {
            color: #b89047;
            border-bottom-color: #b89047;
        }
        .auth-panel { display: none; }
        .auth-panel.active { display: block; }
        .auth-card-booking {
            background: rgba(255, 255, 255, 0.03);
            border: 1px solid rgba(184, 144, 71, 0.2);
            padding: 40px;
        }
        .auth-alert-error {
            background: rgba(220, 53, 69, 0.15);
            border: 1px solid rgba(220, 53, 69, 0.4);
            color: #f8a5a5;
            font-size: 14px;
            padding: 12px 16px;
            margin-bottom: 20px;
        }
        .user-welcome-bar {
            background: rgba(184, 144, 71, 0.1);
            border: 1px solid rgba(184, 144, 71, 0.3);
            padding: 15px 20px;
            margin-bottom: 30px;
        }
        /* Simple modal for forgot-password on booking page */
        .bp-modal-overlay {
            position: fixed;
            inset: 0;
            background: rgba(0,0,0,0.6);
            display: none;
            align-items: center;
            justify-content: center;
            z-index: 1050;
        }
        .bp-modal {
            background: #0b0b0b;
            border: 1px solid rgba(184,144,71,0.2);
            padding: 24px;
            width: 100%;
            max-width: 420px;
            border-radius: 6px;
        }
        .bp-modal .close-btn {
            background: transparent;
            border: none;
            color: #a0a0a0;
            font-size: 18px;
        }
    </style>
</head>
<body style="background-color: #0a0a0a; color: #ffffff; font-family: 'Poppins', sans-serif;">

    <!-- Navbar Layout -->
     <nav class="navbar navbar-expand-lg navbar-custom sticky-top">
        <div class="container">
            <a class="navbar-brand navbar-brand-custom d-flex align-items-center" href="/">
                <img src="{{ asset('images/logo.png.png') }}" alt="Logo" width="40" height="40" class="d-inline-block align-top me-3 rounded-circle">
                HIGHER RAPIK <span>SALON</span>
            </a>
            <div class="navbar-nav ms-auto">
                <a class="nav-link nav-link-custom" href="/">Home</a>
                <a class="nav-link nav-link-custom" href="/services">Services</a>
                <a class="nav-link nav-link-custom" href="/contact">Contact</a>
                <a class="nav-link nav-link-custom active" href="/booking">Booking</a>
                @auth
                    @if(!auth()->user()->isAdmin())
                        <form action="{{ route('logout') }}" method="POST" class="d-inline">
                            @csrf
                            <button type="submit" class="nav-link nav-link-custom border-0 bg-transparent">Logout</button>
                        </form>
                    @endif
                @endauth
            </div>
        </div>
    </nav>

    <div class="container my-5">
        <div class="text-center mb-5">
            <h2 class="fw-bold text-uppercase" style="letter-spacing: 2px; color: #ffffff;">Luxury Appointment Booking</h2>
            <p class="text-muted">Reserve your premium grooming session with our master stylist</p>
        </div>

        @if(session('success'))
            <div class="alert alert-success text-center mb-4" style="background-color: rgba(25, 135, 84, 0.2); color: #25cff2; border: 1px solid #198754;">
                {{ session('success') }}
            </div>
        @endif

        @if(session('error'))
            <div class="alert alert-danger text-center mb-4" style="background-color: rgba(220, 53, 69, 0.15); color: #f8a5a5; border: 1px solid #dc3545;">
                {{ session('error') }}
            </div>
        @endif

        @guest
        <!-- Login & Register (Booking page only) -->
        <div class="row justify-content-center mb-5">
            <div class="col-md-6">
                <div class="auth-card-booking">
                    <div class="text-center mb-4">
                        <h4 class="fw-bold text-uppercase" style="letter-spacing: 2px; color: #ffffff;">Sign In to Book</h4>
                        <p class="text-muted small">Create an account or log in to reserve your appointment</p>
                    </div>

                    @if ($errors->any())
                        <div class="auth-alert-error">
                            {{ $errors->first() }}
                        </div>
                    @endif

                    <div class="auth-tabs">
                        <button type="button" class="auth-tab active" data-tab="login">Login</button>
                        <button type="button" class="auth-tab" data-tab="register">Register</button>
                    </div>

                    <!-- Login Form -->
                    <div class="auth-panel active" id="panel-login">
                        <form action="{{ route('login') }}" method="POST">
                            @csrf
                            <input type="hidden" name="portal" value="user">
                            <div class="mb-3">
                                <label>Email Address</label>
                                <input type="email" name="email" class="form-control form-input-premium rounded-0"
                                       value="{{ old('email') }}" placeholder="you@example.com" required>
                            </div>
                            <div class="mb-3">
                                <label>Password</label>
                                <input type="password" name="password" class="form-control form-input-premium rounded-0"
                                       placeholder="Enter your password" required>
                            </div>
                            <div class="mb-4">
                                <div class="form-check">
                                    <input type="checkbox" name="remember" id="remember" class="form-check-input"
                                           style="background:#111; border-color:#333;" {{ old('remember') ? 'checked' : '' }}>
                                    <label class="form-check-label text-muted small" for="remember">Remember me</label>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-gold-premium w-100 py-3 rounded-0">Sign In</button>
                        </form>
                        <div class="text-center mt-3">
                            <a href="#" id="booking-forgot-link">Forgot your password?</a>
                        </div>
                    </div>

                    <!-- Register Form -->
                    <div class="auth-panel" id="panel-register">
                        <form action="{{ route('register') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label>Full Name</label>
                                <input type="text" name="name" class="form-control form-input-premium rounded-0"
                                       value="{{ old('name') }}" placeholder="Your full name" required>
                            </div>
                            <div class="mb-3">
                                <label>Email Address</label>
                                <input type="email" name="email" class="form-control form-input-premium rounded-0"
                                       value="{{ old('email') }}" placeholder="you@example.com" required>
                            </div>
                            <div class="mb-3">
                                <label>Password</label>
                                <input type="password" name="password" class="form-control form-input-premium rounded-0"
                                       placeholder="Create a password" required>
                            </div>
                            <div class="mb-4">
                                <label>Confirm Password</label>
                                <input type="password" name="password_confirmation" class="form-control form-input-premium rounded-0"
                                       placeholder="Confirm your password" required>
                            </div>
                            <button type="submit" class="btn btn-gold-premium w-100 py-3 rounded-0">Create Account</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        @else
        <!-- Logged-in user welcome -->
        <div class="user-welcome-bar d-flex justify-content-between align-items-center">
            <span>Welcome, <strong style="color: #b89047;">{{ auth()->user()->name }}</strong> — complete your booking below.</span>
            <form action="{{ route('logout') }}" method="POST" class="d-inline">
                @csrf
                <button type="submit" class="btn btn-sm btn-outline-light rounded-0" style="border-color: #b89047; color: #b89047;">Logout</button>
            </form>
        </div>

        <form action="{{ route('appointment.store') }}" method="POST">
            @csrf
            
            <!-- STEP 1: SELECT PROFESSIONAL STYLIST  -->
            <div class="mb-5">
                <h4 class="mb-4" style="color: #b89047; font-size: 18px; letter-spacing: 1px; font-weight: 700;">1. OUR PROFESSIONAL STYLIST</h4>
                <div class="row justify-content-center">
                    <div class="col-md-6">
                        <!-- Hidden input  id  auto-submit  -->
                        <input type="radio" name="stylist_id" value="1" checked style="display: none;">
                        <div class="card stylist-card p-4 text-center rounded-0">
                            <!-- Premium Barber  -->
                            <img src="{{ asset('images/WhatsApp Image 2026-06-03 at 8.49.06 PM.jpeg') }}" class="rounded-circle mx-auto mb-3" width="100" height="100" style="border: 2px solid #b89047; object-fit: cover;">
                            <h5 class="text-white fw-bold mb-1">Rukshan Dulantha Fdo</h5>
                            <p class="text-muted small mb-0">Elite Master Barber & Aesthetics Specialist</p>
                            <span class="badge mt-2 mx-auto" style="background: #b89047; color: #000; width: fit-content; font-size: 10px;">AVAILABLE TODAY</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- STEP 2 & 3: CHOOSE DATE & TIME SLOTS -->
            <div class="row mb-5">
                <!-- Date Input -->
                <div class="col-md-4 mb-4">
                    <h4 class="mb-4" style="color: #b89047; font-size: 18px; font-weight: 700;">2. CHOOSE DATE</h4>
                    <label for="booking_date">Appointment Date</label>
                    <input type="date" name="booking_date" class="form-control form-input-premium rounded-0" id="booking_date" required min="{{ date('Y-m-d') }}">
                </div>

                <!-- Real-time Full Day Time Slots -->
                <div class="col-md-8 mb-4">
                    <h4 class="mb-4" style="color: #b89047; font-size: 18px; font-weight: 700;">3. AVAILABLE TIME SLOTS (REAL-TIME)</h4>
                    <label>Select your comfortable time session</label>
                    <div class="row g-2" id="time-slots-container">
                        <!-- auto-generate  -->
                    </div>
                </div>
            </div>

            <!-- STEP 4: CUSTOMER INFORMATION -->
            <div class="p-4 rounded-0 mb-5" style="background: rgba(255,255,255,0.01); border: 1px solid rgba(184, 144, 71, 0.1);">
                <h4 class="mb-4" style="color: #b89047; font-size: 18px; font-weight: 700;">4. CUSTOMER INFORMATION</h4>
                <div class="row">
                    <!-- Customer Name -->
                    <div class="col-md-4 mb-3">
                        <label>Customer Full Name</label>
                        <input type="text" name="customer_name" class="form-control form-input-premium rounded-0"
                               placeholder="e.g. WNB Vikramasinghe" value="{{ auth()->user()->name }}" required>
                    </div>
                    
                    <!-- Email Address -->
                    <div class="col-md-4 mb-3">
                        <label>Email Address</label>
                        <input type="email" name="email" class="form-control form-input-premium rounded-0"
                               placeholder="e.g. name@example.com" value="{{ auth()->user()->email }}" required>
                    </div>

                    <!-- Mobile Number -->
                    <div class="col-md-4 mb-3">
                        <label>Mobile Number (For Urgent Contacts)</label>
                        <input type="text" name="phone" class="form-control form-input-premium rounded-0" placeholder="e.g. 0771234567" required>
                    </div>

                    <!-- Service Type -->
                    <div class="col-md-12 mb-3">
                        <label>Service Type</label>
                        <select name="service" class="form-select form-input-premium rounded-0" required>
                            <option value="Hair Styling & Cut">Hair Cut & Beard</option>
                            <option value="Premium Beard Grooming">Head Massage</option>
                            <option value="Luxury Gold Facial">Clean-up</option>
                            <option value="Hair Coloring">Facial</option>
                            <option value="Hair Coloring">Hair Treatment</option>
                            <option value="Hair Coloring">Hair Colors</option>
                        </select>
                    </div>

                    <!-- Special Instructions -->
                    <div class="col-md-12 mb-3">
                        <label>Special Instructions (Optional)</label>
                        <textarea name="message" class="form-control form-input-premium rounded-0" rows="3" placeholder="Any specific requirements..."></textarea>
                    </div>
                </div>
                
                <button type="submit" class="btn btn-gold-premium w-100 py-3 mt-3 rounded-0">Confirm Luxury Appointment</button>
            </div>
        </form>
        @endguest
    </div>

    @include('footer')

    <!-- Forgot password modal (booking page) -->
    <div class="bp-modal-overlay" id="bp-forgot-modal">
        <div class="bp-modal card-glass">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <h5 class="mb-0" style="color: #ffffff;">Reset Password</h5>
                <button class="close-btn" id="bp-forgot-close">&times;</button>
            </div>
            <p class="text-muted small">Enter your email and we'll send a password reset link.</p>

            <form action="{{ route('password.email') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="bp-email">Email Address</label>
                    <input type="email" name="email" id="bp-email" class="form-control form-input-premium" placeholder="you@example.com" required>
                </div>
                <div class="d-flex justify-content-end">
                    <button type="submit" class="btn btn-gold-premium">Send Reset Link</button>
                </div>
            </form>
        </div>
    </div>

    <script>
    // Auth tab switching
    document.querySelectorAll('.auth-tab').forEach(tab => {
        tab.addEventListener('click', function() {
            document.querySelectorAll('.auth-tab').forEach(t => t.classList.remove('active'));
            document.querySelectorAll('.auth-panel').forEach(p => p.classList.remove('active'));
            this.classList.add('active');
            document.getElementById('panel-' + this.dataset.tab).classList.add('active');
        });
    });

    @if(old('name') || $errors->has('password_confirmation'))
    document.querySelector('.auth-tab[data-tab="register"]').click();
    @endif

    @auth
    // Laravel එකෙන් එවපු බුකින් ලිස්ට් එක ජාවාස්ක්‍රිප්ට් එකට ගන්නවා
    const allBookedAppointments = @json($bookedAppointments ?? []);

    const fullDaySlots = [
        '09:00 AM', '09:30 AM', '10:00 AM', '10:30 AM', '11:00 AM', '11:30 AM',
        '12:00 PM', '12:30 PM', '01:00 PM', '01:30 PM', '02:00 PM', '02:30 PM',
        '03:00 PM', '03:30 PM', '04:00 PM', '04:30 PM', '05:00 PM', '05:30 PM',
        '06:00 PM', '06:30 PM', '07:00 PM', '07:30 PM'
    ];

    function generateTimeSlots() {
        const selectedDate = document.getElementById('booking_date').value;
        const container = document.getElementById('time-slots-container');
        if(!container) return;
        container.innerHTML = '';

        // තෝරාගත් දවසට අදාළව දැනටමත් බුක් වී ඇති වෙලාවල් වෙන් කරගැනීම
        const bookedForDate = allBookedAppointments
            .filter(app => app.booking_date === selectedDate)
            .map(app => app.booking_time);

        fullDaySlots.forEach((time, index) => {
            const isBooked = bookedForDate.includes(time);
            
            container.innerHTML += `
                <div class="col-4 col-sm-3 col-md-2 mb-2">
                    <input type="radio" name="booking_time" value="${time}" id="slot_${index}" class="time-slot-radio" ${isBooked ? 'disabled' : ''} required>
                    <label for="slot_${index}" class="time-slot-label ${isBooked ? 'slot-booked' : ''}">${time}</label>
                </div>
            `;
        });
        
        // ක්ලික් කිරීම් වලදී පාට මාරු වන Logic එක
        setupSlotSelection();
    }

    function setupSlotSelection() {
        const labels = document.querySelectorAll('.time-slot-label:not(.slot-booked)');
        labels.forEach(label => {
            label.addEventListener('click', function() {
                labels.forEach(l => {
                    l.style.background = '#111111';
                    l.style.color = '#ffffff';
                    l.style.borderColor = '#222222';
                });
                this.style.background = '#b89047';
                this.style.color = '#000000';
                this.style.borderColor = '#b89047';
                this.style.fontWeight = 'bold';
            });
        });
    }

    // ඉන්පුට් එක වෙනස් වෙද්දී ක්‍රියාත්මක වීම
    document.getElementById('booking_date').addEventListener('change', generateTimeSlots);
    window.onload = generateTimeSlots;
    @endauth
</script>
<script>
// Forgot-password modal logic for booking page
document.addEventListener('DOMContentLoaded', function(){
    var link = document.getElementById('booking-forgot-link');
    var modal = document.getElementById('bp-forgot-modal');
    var closeBtn = document.getElementById('bp-forgot-close');

    if(link && modal){
        link.addEventListener('click', function(e){
            e.preventDefault();
            modal.style.display = 'flex';
            document.getElementById('bp-email').focus();
        });
    }

    if(closeBtn && modal){
        closeBtn.addEventListener('click', function(){
            modal.style.display = 'none';
        });
    }

    // close when clicking outside modal
    if(modal){
        modal.addEventListener('click', function(e){
            if(e.target === modal) modal.style.display = 'none';
        });
    }
});
</script>
</body>
</html>