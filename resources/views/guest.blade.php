{{-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Guest Management</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <div class="row">

            <!-- Sidebar -->
            <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css">

            <div class="sidebar h-screen w-60 p-4 shadow-lg" style="background-color:  #white;">
                <div class="logo flex items-center mb-8">
                    <div class="text-xl font-bold text-blue-600">Swift Retreat</div>
                </div>
                <ul class="space-y-4">
                    <li>
                        <a href="{{ route('dashboard') }}" class="flex items-center space-x-2 text-black-700 hover:text-blue-600 hover:bg-blue-200 transition rounded-lg px-4 py-2 hover:bg-blue-200 transition rounded-lg px-4 py-2">
                            <i class="fas fa-home"></i>
                            <span>Dashboard</span>
                        </a>
                    </li>
                    <li>
                        <a class="flex items-center space-x-2 text-black-700 hover:text-blue-600 hover:bg-blue-200 transition rounded-lg px-4 py-2">
                            {{-- <a href="{{ route('reservations') }}" class="flex items-center space-x-2 text-black-700 hover:text-blue-600 hover:bg-blue-200 transition rounded-lg px-4 py-2">
                            <i class="fas fa-book"></i>
                            <span>Facilities</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('guest') }}" class="flex items-center space-x-2 text-black-700 hover:text-blue-600 hover:bg-blue-200 transition rounded-lg px-4 py-2">
                            <i class="fas fa-user"></i>
                            <span>Guest</span>
                        </a>
                    </li>
                    <li>
                        <a  class="flex items-center space-x-2 text-black-700 hover:text-blue-600 hover:bg-blue-200 transition rounded-lg px-4 py-2">
                            {{-- <a href="{{ route('rooms') }}" class="flex items-center space-x-2 text-black-700 hover:text-blue-600 hover:bg-blue-200 transition rounded-lg px-4 py-2">
                            <i class="fas fa-door-open"></i>
                            <span>Rooms</span>
                        </a>
                    </li>

                </ul>
            </div>

            <div class="col-12">
                <h1>Guest Management</h1>

                <!-- Add New Guest Button -->
                <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#addGuestModal">
                    + Add New Guest
                </button>

                <!-- Guests Table -->
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Guest ID</th>
                            <th>Full Name</th>
                            <th>Username</th>
                            <th>Email Address</th>
                            <th>Phone Number</th>
                            <th>Password</th>
                            <th>Booking Date</th>
                            <th>Check-In Date</th>
                            <th>Check-Out Date</th>
                            <th>Payment Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($guests as $index => $guest)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $guest->guest_id }}</td>
                            <td>{{ $guest->full_name }}</td>
                            <td>{{ $guest->username }}</td>
                            <td>{{ $guest->email }}</td>
                            <td>{{ $guest->phone_number }}</td>
                            <td>{{ $guest->password }}</td>
                            <td>{{ $guest->booking_date }}</td>
                            <td>{{ $guest->check_in_date }}</td>
                            <td>{{ $guest->check_out_date }}</td>
                            <td>{{ $guest->payment_status }}</td>
                            <td>
                                <button type="button" class="btn btn-sm btn-warning me-1"
                                        data-bs-toggle="modal"
                                        data-bs-target="#editGuestModal{{ $guest->id }}">
                                    Edit
                                </button>
                                <form action="{{ route('guests.destroy', $guest->id) }}" method="POST" style="display: inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger"
                                            onclick="return confirm('Are you sure you want to delete this guest?')">
                                        Delete
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Add Guest Modal -->
    <div class="modal fade" id="addGuestModal" tabindex="-1">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add New Guest</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <form action="{{ route('guests.store') }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Full Name</label>
                                <input type="text" class="form-control" name="full_name" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Username</label>
                                <input type="text" class="form-control" name="username" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Email Address</label>
                                <input type="email" class="form-control" name="email" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Phone Number</label>
                                <input type="text" class="form-control" name="phone_number" required>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Password</label>
                            <input type="password" class="form-control" name="password" required>
                        </div>
                        <div class="row">
                            <div class="col-md-4 mb-3">
                                <label class="form-label">Booking Date</label>
                                <input type="date" class="form-control" name="booking_date" required>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label class="form-label">Check-In Date</label>
                                <input type="date" class="form-control" name="check_in_date" required>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label class="form-label">Check-Out Date</label>
                                <input type="date" class="form-control" name="check_out_date" required>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Payment Status</label>
                            <select class="form-control" name="payment_status" required>
                                <option value="">Select Status</option>
                                <option value="Paid">Paid</option>
                                <option value="Pending">Pending</option>
                                <option value="Cancelled">Cancelled</option>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Edit Guest Modals -->
    @foreach($guests as $guest)
    <div class="modal fade" id="editGuestModal{{ $guest->id }}" tabindex="-1">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Guest - {{ $guest->guest_id }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <form action="{{ route('guests.update', $guest->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Full Name</label>
                                <input type="text" class="form-control" name="full_name" value="{{ $guest->full_name }}" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Username</label>
                                <input type="text" class="form-control" name="username" value="{{ $guest->username }}" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Email Address</label>
                                <input type="email" class="form-control" name="email" value="{{ $guest->email }}" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Phone Number</label>
                                <input type="text" class="form-control" name="phone_number" value="{{ $guest->phone_number }}" required>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Password</label>
                            <input type="password" class="form-control" name="password" value="{{ $guest->password }}" required>
                        </div>
                        <div class="row">
                            <div class="col-md-4 mb-3">
                                <label class="form-label">Booking Date</label>
                                <input type="date" class="form-control" name="booking_date" value="{{ $guest->booking_date }}" required>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label class="form-label">Check-In Date</label>
                                <input type="date" class="form-control" name="check_in_date" value="{{ $guest->check_in_date }}" required>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label class="form-label">Check-Out Date</label>
                                <input type="date" class="form-control" name="check_out_date" value="{{ $guest->check_out_date }}" required>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Payment Status</label>
                            <select class="form-control" name="payment_status" required>
                                <option value="Paid" {{ $guest->payment_status == 'Paid' ? 'selected' : '' }}>Paid</option>
                                <option value="Pending" {{ $guest->payment_status == 'Pending' ? 'selected' : '' }}>Pending</option>
                                <option value="Cancelled" {{ $guest->payment_status == 'Cancelled' ? 'selected' : '' }}>Cancelled</option>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    @endforeach

</body>
</html> --}}






@extends('layouts.app')

@section('content')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Guest Management</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        * {
            box-sizing: border-box;
        }

        body {
            font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif;
            line-height: 1.5;
            color: #212529;
            background-color: #fff;
            margin: 0;
            padding: 0;
        }

        .table-responsive {
            display: block;
            width: 100%;
            overflow-x: auto;
            -webkit-overflow-scrolling: touch;
            white-space: nowrap;
        }

        .table-responsive .table {
            margin-bottom: 0;
            min-width: 800px;
        }

        .container {
            width: 100%;
            padding-right: 15px;
            padding-left: 15px;
            margin-right: auto;
            margin-left: auto;
            max-width: 1200px;
        }

        .mt-5 {
            margin-top: 3rem;
        }

        .row {
            display: flex;
            flex-wrap: wrap;
            margin-right: -15px;
            margin-left: -15px;
        }

        .col-12 {
            flex: 0 0 100%;
            max-width: 100%;
            position: relative;
            width: 100%;
            padding-right: 15px;
            padding-left: 15px;
        }

        .col-md-4 {
            flex: 0 0 33.333333%;
            max-width: 33.333333%;
            position: relative;
            width: 100%;
            padding-right: 15px;
            padding-left: 15px;
        }

        .col-md-6 {
            flex: 0 0 50%;
            max-width: 50%;
            position: relative;
            width: 100%;
            padding-right: 15px;
            padding-left: 15px;
        }

        /* Sidebar Styles */
        .sidebar {
            height: 100vh;
            width: 15rem;
            padding: 1rem;
            box-shadow: 0 0.125rem 0.25rem rgba(0, 0, 0, 0.075);
            background-color: white;
            position: fixed;
            left: 0;
            top: 0;
            z-index: 1000;
        }

        .logo {
            display: flex;
            align-items: center;
            margin-bottom: 2rem;
        }

        .logo .text-xl {
            font-size: 1.25rem;
            font-weight: bold;
            color: #3b82f6;
        }

        .sidebar ul {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .sidebar ul li {
            margin-bottom: 1rem;
        }

        .sidebar ul li a {
            display: flex;
            align-items: center;
            color: #374151;
            text-decoration: none;
            padding: 0.5rem 1rem;
            border-radius: 0.5rem;
            transition: all 0.3s ease;
        }

        .sidebar ul li a:hover {
            color: #3b82f6;
            background-color: #dbeafe;
        }

        .sidebar ul li a i {
            margin-right: 0.5rem;
        }

        /* Main content adjustment for sidebar */
        .main-content {
            margin-left: 15rem;
            padding: 2rem;
        }

        /* Button Styles */
        .btn {
            display: inline-block;
            font-weight: 400;
            line-height: 1.5;
            color: #212529;
            text-align: center;
            text-decoration: none;
            vertical-align: middle;
            cursor: pointer;
            user-select: none;
            background-color: transparent;
            border: 1px solid transparent;
            padding: 0.375rem 0.75rem;
            font-size: 1rem;
            border-radius: 0.375rem;
            transition: color 0.15s ease-in-out, background-color 0.15s ease-in-out, border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
        }

        .btn-primary {
            color: #fff;
            background-color: #0d6efd;
            border-color: #0d6efd;
        }

        .btn-primary:hover {
            color: #fff;
            background-color: #0b5ed7;
            border-color: #0a58ca;
        }

        .btn-warning {
            color: #000;
            background-color: #ffc107;
            border-color: #ffc107;
        }

        .btn-warning:hover {
            color: #000;
            background-color: #ffca2c;
            border-color: #ffc720;
        }

        .btn-danger {
            color: #fff;
            background-color: #dc3545;
            border-color: #dc3545;
        }

        .btn-danger:hover {
            color: #fff;
            background-color: #c82333;
            border-color: #bd2130;
        }

        .btn-secondary {
            color: #fff;
            background-color: #6c757d;
            border-color: #6c757d;
        }

        .btn-secondary:hover {
            color: #fff;
            background-color: #5c636a;
            border-color: #565e64;
        }

        .btn-sm {
            padding: 0.25rem 0.5rem;
            font-size: 0.875rem;
            border-radius: 0.25rem;
        }

        .mb-3 {
            margin-bottom: 1rem;
        }

        .me-1 {
            margin-right: 0.25rem;
        }

        .btn-close {
            box-sizing: content-box;
            width: 1em;
            height: 1em;
            padding: 0.25em 0.25em;
            color: #000;
            background: transparent url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 16 16' fill='%23000'%3e%3cpath d='m.235.677 1.872-1.878 6.385 6.385L14.877-.201l1.878 1.878L10.37 8.063l6.385 6.385-1.878 1.878-6.385-6.385L2.107 16.32.235 14.442l6.385-6.385L.235.677z'/%3e%3c/svg%3e") center/1em auto no-repeat;
            border: 0;
            border-radius: 0.375rem;
            opacity: 0.5;
        }

        .btn-close:hover {
            color: #000;
            text-decoration: none;
            opacity: 0.75;
        }

        /* Table Styles */
        .table {
            width: 100%;
            margin-bottom: 1rem;
            color: #212529;
            vertical-align: top;
            border-collapse: collapse;
        }

        .table-bordered {
            border: 1px solid #dee2e6;
        }

        .table-bordered > :not(caption) > * {
            border-width: 1px 0;
        }

        .table-bordered > :not(caption) > * > * {
            border-width: 0 1px;
        }

        .table > :not(caption) > * > * {
            padding: 0.5rem 0.5rem;
            background-color: var(--bs-table-bg);
            border-bottom-width: 1px;
            white-space: nowrap;
        }

        .table > thead {
            vertical-align: bottom;
        }

        .table > thead > tr > th {
            background-color: #f8f9fa;
            font-weight: 600;
            border-bottom: 2px solid #dee2e6;
        }

        .table tbody tr:hover {
            background-color: rgba(0, 0, 0, 0.075);
        }

        /* Modal Styles */
        .modal {
            position: fixed;
            top: 0;
            left: 0;
            z-index: 1055;
            display: none;
            width: 100%;
            height: 100%;
            overflow-x: hidden;
            overflow-y: auto;
            outline: 0;
        }

        .modal.fade {
            transition: opacity 0.15s linear;
        }

        .modal.show {
            display: block;
        }

        .modal-dialog {
            position: relative;
            width: auto;
            margin: 0.5rem;
            pointer-events: none;
        }

        .modal-lg {
            max-width: 800px;
        }

        .modal-content {
            position: relative;
            display: flex;
            flex-direction: column;
            width: 100%;
            pointer-events: auto;
            background-color: #fff;
            background-clip: padding-box;
            border: 1px solid rgba(0, 0, 0, 0.2);
            border-radius: 0.5rem;
            outline: 0;
            box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.15);
        }

        .modal-header {
            display: flex;
            flex-shrink: 0;
            align-items: center;
            justify-content: space-between;
            padding: 1rem 1rem;
            border-bottom: 1px solid #dee2e6;
            border-top-left-radius: calc(0.5rem - 1px);
            border-top-right-radius: calc(0.5rem - 1px);
        }

        .modal-title {
            margin-bottom: 0;
            line-height: 1.5;
            font-size: 1.25rem;
            font-weight: 500;
        }

        .modal-body {
            position: relative;
            flex: 1 1 auto;
            padding: 1rem;
        }

        .modal-footer {
            display: flex;
            flex-wrap: wrap;
            flex-shrink: 0;
            align-items: center;
            justify-content: flex-end;
            padding: 0.75rem;
            border-top: 1px solid #dee2e6;
            border-bottom-right-radius: calc(0.5rem - 1px);
            border-bottom-left-radius: calc(0.5rem - 1px);
        }

        .modal-footer > * {
            margin: 0.25rem;
        }

        .modal-backdrop {
            position: fixed;
            top: 0;
            left: 0;
            z-index: 1050;
            width: 100vw;
            height: 100vh;
            background-color: #000;
        }

        .modal-backdrop.fade {
            opacity: 0;
        }

        .modal-backdrop.show {
            opacity: 0.5;
        }

        /* Form Styles */
        .form-label {
            margin-bottom: 0.5rem;
            font-weight: 500;
        }

        .form-control {
            display: block;
            width: 100%;
            padding: 0.375rem 0.75rem;
            font-size: 1rem;
            font-weight: 400;
            line-height: 1.5;
            color: #212529;
            background-color: #fff;
            background-image: none;
            border: 1px solid #ced4da;
            border-radius: 0.375rem;
            transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
        }

        .form-control:focus {
            color: #212529;
            background-color: #fff;
            border-color: #86b7fe;
            outline: 0;
            box-shadow: 0 0 0 0.25rem rgba(13, 110, 253, 0.25);
        }

        select.form-control {
            cursor: pointer;
        }

        /* Responsive Design */
        @media (min-width: 768px) {
            .modal-dialog {
                max-width: 500px;
                margin: 1.75rem auto;
            }
        }

        @media (max-width: 767.98px) {
            .col-md-4,
            .col-md-6 {
                flex: 0 0 100%;
                max-width: 100%;
            }

            .sidebar {
                transform: translateX(-100%);
                transition: transform 0.3s ease;
            }

            .main-content {
                margin-left: 0;
            }
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <div class="row">


            <div class="main-content">
                <div class="col-12">
                    <h1 class="text-4xl font-bold mb-8 text-gray-800">Guest Management</h1>

                    <!-- Add New Guest Button -->
                    <button type="button" class="btn btn-primary mb-5" data-bs-toggle="modal" data-bs-target="#addGuestModal">
                        + Add New Guest
                    </button>

                    <!-- Guests Table -->
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Guest ID</th>
                                    <th>Full Name</th>
                                    <th>Username</th>
                                    <th>Email Address</th>
                                    <th>Phone <br> Number</th>
                                    <th>Password</th>
                                    <th>Booking <br> Date</th>
                                    <th>Check-In <br> Date</th>
                                    <th>Check-Out <br> Date</th>
                                    <th>Payment <br> Status</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($guests as $index => $guest)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $guest->guest_id }}</td>
                                    <td>{{ $guest->full_name }}</td>
                                    <td>{{ $guest->username }}</td>
                                    <td>{{ $guest->email }}</td>
                                    <td>{{ $guest->phone_number }}</td>
                                    <td>{{ $guest->password }}</td>
                                    <td>{{ $guest->booking_date }}</td>
                                    <td>{{ $guest->check_in_date }}</td>
                                    <td>{{ $guest->check_out_date }}</td>
                                    <td>{{ $guest->payment_status }}</td>
                                    <td>
                                        <button type="button" class="btn btn-sm btn-warning me-1"
                                                data-bs-toggle="modal"
                                                data-bs-target="#editGuestModal{{ $guest->id }}">
                                            Edit
                                        </button>
                                        <form action="{{ route('guests.destroy', $guest->id) }}" method="POST" style="display: inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger"
                                                    onclick="return confirm('Are you sure you want to delete this guest?')">
                                                Delete
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Add Guest Modal -->
    <div class="modal fade" id="addGuestModal" tabindex="-1">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add New Guest</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <form action="{{ route('guests.store') }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Full Name</label>
                                <input type="text" class="form-control" name="full_name" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Username</label>
                                <input type="text" class="form-control" name="username" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Email Address</label>
                                <input type="email" class="form-control" name="email" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Phone Number</label>
                                <input type="text" class="form-control" name="phone_number" required>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Password</label>
                            <input type="password" class="form-control" name="password" required>
                        </div>
                        <div class="row">
                            <div class="col-md-4 mb-3">
                                <label class="form-label">Booking Date</label>
                                <input type="date" class="form-control" name="booking_date" required>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label class="form-label">Check-In Date</label>
                                <input type="date" class="form-control" name="check_in_date" required>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label class="form-label">Check-Out Date</label>
                                <input type="date" class="form-control" name="check_out_date" required>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Payment Status</label>
                            <select class="form-control" name="payment_status" required>
                                <option value="">Select Status</option>
                                <option value="Paid">Paid</option>
                                <option value="Pending">Pending</option>
                                <option value="Cancelled">Cancelled</option>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Edit Guest Modals -->
    @foreach($guests as $guest)
    <div class="modal fade" id="editGuestModal{{ $guest->id }}" tabindex="-1">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Guest - {{ $guest->guest_id }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <form action="{{ route('guests.update', $guest->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Full Name</label>
                                <input type="text" class="form-control" name="full_name" value="{{ $guest->full_name }}" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Username</label>
                                <input type="text" class="form-control" name="username" value="{{ $guest->username }}" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Email Address</label>
                                <input type="email" class="form-control" name="email" value="{{ $guest->email }}" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Phone Number</label>
                                <input type="text" class="form-control" name="phone_number" value="{{ $guest->phone_number }}" required>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Password</label>
                            <input type="password" class="form-control" name="password" value="{{ $guest->password }}" required>
                        </div>
                        <div class="row">
                            <div class="col-md-4 mb-3">
                                <label class="form-label">Booking Date</label>
                                <input type="date" class="form-control" name="booking_date" value="{{ $guest->booking_date }}" required>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label class="form-label">Check-In Date</label>
                                <input type="date" class="form-control" name="check_in_date" value="{{ $guest->check_in_date }}" required>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label class="form-label">Check-Out Date</label>
                                <input type="date" class="form-control" name="check_out_date" value="{{ $guest->check_out_date }}" required>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Payment Status</label>
                            <select class="form-control" name="payment_status" required>
                                <option value="Paid" {{ $guest->payment_status == 'Paid' ? 'selected' : '' }}>Paid</option>
                                <option value="Pending" {{ $guest->payment_status == 'Pending' ? 'selected' : '' }}>Pending</option>
                                <option value="Cancelled" {{ $guest->payment_status == 'Cancelled' ? 'selected' : '' }}>Cancelled</option>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    @endforeach

    <script>
        // Simple Modal Implementation
        document.addEventListener('DOMContentLoaded', function() {
            // Modal toggle functionality
            const modalToggles = document.querySelectorAll('[data-bs-toggle="modal"]');
            const modalCloses = document.querySelectorAll('[data-bs-dismiss="modal"]');

            modalToggles.forEach(toggle => {
                toggle.addEventListener('click', function() {
                    const targetModal = document.querySelector(this.getAttribute('data-bs-target'));
                    if (targetModal) {
                        showModal(targetModal);
                    }
                });
            });

            modalCloses.forEach(close => {
                close.addEventListener('click', function() {
                    const modal = this.closest('.modal');
                    if (modal) {
                        hideModal(modal);
                    }
                });
            });

            // Close modal when clicking backdrop
            document.addEventListener('click', function(e) {
                if (e.target.classList.contains('modal')) {
                    hideModal(e.target);
                }
            });

            function showModal(modal) {
                const backdrop = document.createElement('div');
                backdrop.className = 'modal-backdrop fade show';
                document.body.appendChild(backdrop);

                modal.style.display = 'block';
                modal.classList.add('show');
                document.body.style.overflow = 'hidden';
            }

            function hideModal(modal) {
                const backdrop = document.querySelector('.modal-backdrop');
                if (backdrop) {
                    backdrop.remove();
                }

                modal.style.display = 'none';
                modal.classList.remove('show');
                document.body.style.overflow = '';
            }
        });
    </script>
</body>
</html>
@endsection
