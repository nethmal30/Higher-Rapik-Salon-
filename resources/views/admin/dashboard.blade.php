<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ADMIN DASHBOARD - HIGHER RAPIK</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">
    <!-- FontAwesome Icon  (Phone/Mail ) -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        body { background-color: #0c0c0c; color: #fff; font-family: 'Poppins', sans-serif; }
        .admin-card { background: #111; border: 1px solid rgba(184, 144, 71, 0.2); padding: 20px; margin-bottom: 30px; }
        .gold-text { color: #b89047; font-weight: 700; }
        .table-premium { color: #fff; border-color: #222; }
        .table-premium th { color: #b89047; border-bottom: 2px solid #b89047; text-transform: uppercase; font-size: 13px; letter-spacing: 1px; }
        .table-premium td { background: #111; border-bottom: 1px solid #222; vertical-align: middle; font-size: 14px; }
        .btn-gold { background: #b89047; color: #000; font-weight: 600; border: none; transition: all 0.3s ease; }
        .btn-gold:hover { background: #dfb45b; box-shadow: 0 0 10px rgba(184, 144, 71, 0.4); }
        .form-control-admin { background: #1a1a1a !important; border: 1px solid #333 !important; color: #fff !important; rounded-radius: 0; }
        .form-control-admin:focus { border-color: #b89047 !important; box-shadow: none !important; }
        .badge-status { padding: 6px 12px; font-size: 11px; font-weight: 600; text-transform: uppercase; }
    </style>
</head>
<body>

    <div class="container my-5">
        <!-- Dashboard Header -->
        <div class="d-flex justify-content-between align-items-center mb-5 border-bottom pb-3" style="border-color: rgba(184, 144, 71, 0.2) !important;">
            <h2>HIGHER RAPIK <span class="gold-text">ADMIN PANEL</span></h2>
            <div class="d-flex gap-2 align-items-center">
                <span class="text-muted small me-2"><i class="fas fa-user-shield me-1"></i> {{ auth()->user()->name }}</span>
                <a href="/" class="btn btn-outline-light btn-sm rounded-0 px-3">View Website</a>
                <form action="{{ route('admin.clearCustomers') }}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure you want to clear all customer booking records? This cannot be undone.');">
                    @csrf
                    <button type="submit" class="btn btn-danger btn-sm rounded-0 px-3">Clear Customers</button>
                </form>
                <form action="{{ route('logout') }}" method="POST" class="d-inline">
                    @csrf
                    <button type="submit" class="btn btn-gold btn-sm rounded-0 px-3">Logout</button>
                </form>
            </div>
        </div>

        <!-- Success Alert Message -->
        @if(session('success'))
            <div class="alert alert-success text-center mb-4" style="background: rgba(25,135,84,0.2); color: #25cff2; border: 1px solid #198754; id: success-alert;">
                <i class="fas fa-check-circle me-2"></i> {{ session('success') }}
            </div>
        @endif

        <div class="row">
            <!-- Staff Management Modules -->
            <div class="col-md-4">
                <!-- Add New Stylist Form -->
                <div class="admin-card">
                    <h5 class="gold-text mb-4"><i class="fas fa-user-plus me-2"></i> ADD NEW STYLIST</h5>
                    <form action="{{ route('admin.addStaff') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label class="text-muted small mb-1">Stylist Full Name</label>
                            <input type="text" name="name" class="form-control form-control-admin rounded-0" placeholder="e.g. Alex Rapik" required>
                        </div>
                        <div class="mb-3">
                            <label class="text-muted small mb-1">Specialty / Role</label>
                            <input type="text" name="specialty" class="form-control form-control-admin rounded-0" placeholder="e.g. Hair Tattoo & Coloring" required>
                        </div>
                        <button type="submit" class="btn btn-gold w-100 py-2 mt-2 rounded-0">Add to System</button>
                    </form>
                </div>

                <!-- Current Stylists List -->
                <div class="admin-card">
                    <h5 class="gold-text mb-3"><i class="fas fa-users me-2"></i> ACTIVE STYLISTS</h5>
                    <ul class="list-group list-group-flush">
                        @forelse($staffMembers as $staff)
                            <li class="list-group-item bg-transparent text-white border-secondary d-flex justify-content-between align-items-center px-0 py-3">
                                <div>
                                    <h6 class="mb-0 fw-bold text-white">{{ $staff->name }}</h6>
                                    <small class="text-muted">{{ $staff->specialty }}</small>
                                </div>
                                <span class="badge bg-success bg-opacity-20 text-success border border-success rounded-0 small px-2">Active</span>
                            </li>
                        @empty
                            <li class="list-group-item bg-transparent text-muted px-0 small">No stylists added yet.</li>
                        @endforelse
                    </ul>
                </div>
            </div>

            <!--  Manage Appointments Table  -->
            <div class="col-md-8">
                <div class="admin-card">
                    <h5 class="gold-text mb-4"><i class="fas fa-calendar-check me-2"></i> LIVE APPOINTMENTS RESERVATIONS</h5>
                    <div class="table-responsive">
                        <table class="table table-premium text-white">
                            <thead>
                                <tr>
                                    <th>Customer Details</th>
                                    <th>Date & Session</th>
                                    <th>Service</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($appointments as $app)
                                <tr>
                                    <!-- 📌 customer details -->
                                    <td>
                                        <span class="fw-bold text-white" style="font-size: 15px;">{{ $app->customer_name ?? $app->name }}</span><br>
                                        <small class="text-muted"><i class="fas fa-envelope me-1" style="font-size: 11px;"></i> {{ $app->email }}</small><br>
                                        <small class="gold-text"><i class="fas fa-phone me-1" style="font-size: 11px;"></i> {{ $app->phone ?? 'No Contact' }}</small>
                                    </td>
                                    
                                    <!-- date and time -->
                                    <td>
                                        <i class="fas fa-calendar-alt text-muted me-1"></i> {{ $app->booking_date }}<br>
                                        <small class="gold-text fw-bold"><i class="fas fa-clock me-1"></i> {{ $app->booking_time ?? '09:00 AM' }}</small>
                                    </td>
                                    
                                    <!--  -->
                                    <td>
                                        <span class="text-white-50">{{ $app->service }}</span>
                                    </td>
                                    
                                    <!--  (Status Badge) -->
                                    <td>
                                        <span class="badge badge-status rounded-0 
                                            @if($app->status == 'Completed') bg-success 
                                            @elif($app->status == 'Cancelled') bg-danger 
                                            @else bg-warning text-dark @endif">
                                            {{ $app->status ?? 'Pending' }}
                                        </span>
                                    </td>
                                    
                                    <!--  Action Form  -->
                                    <td>
                                        <div class="d-flex gap-1">
                                            <form action="{{ route('admin.updateStatus', $app->id) }}" method="POST" class="d-flex gap-1">
                                                @csrf
                                                <select name="status" class="form-select form-select-sm bg-dark text-white border-secondary rounded-0" style="width: 115px; font-size: 12px;">
                                                    <option value="Confirmed" {{ $app->status == 'Confirmed' ? 'selected' : '' }}>Confirm</option>
                                                    <option value="Completed" {{ $app->status == 'Completed' ? 'selected' : '' }}>Mark Done</option>
                                                    <option value="Cancelled" {{ $app->status == 'Cancelled' ? 'selected' : '' }}>Cancel</option>
                                                </select>
                                                <button type="submit" class="btn btn-gold btn-sm px-2 rounded-0"><i class="fas fa-save"></i></button>
                                            </form>
                                            <form action="{{ route('admin.deleteAppointment', $app->id) }}" method="POST" onsubmit="return confirm('Remove this customer booking?');">
                                                @csrf
                                                <button type="submit" class="btn btn-danger btn-sm px-2 rounded-0"><i class="fas fa-trash-alt"></i></button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="5" class="text-center text-muted py-5">
                                        <i class="fas fa-folder-open d-block mb-2 fa-2x"></i> No appointments booked yet.
                                    </td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>
</html>