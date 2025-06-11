@extends('layouts.app')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Facility Management Module</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f8f9fa;
            display: flex;
            min-height: 100vh;
        }

        .sidebar {
            width: 250px;
            background: #2c3e50;
            color: white;
            min-height: 100vh;
            order: 1;
        }

        .sidebar-header {
            padding: 20px;
            border-bottom: 1px solid #34495e;
            text-align: center;
        }

        .sidebar-title {
            font-size: 18px;
            font-weight: bold;
            margin: 0;
        }

        .sidebar-subtitle {
            font-size: 12px;
            color: #bdc3c7;
            margin: 5px 0 0 0;
        }

        .sidebar-menu {
            padding: 20px 0;
        }
        .menu-item {
            padding: 12px 20px;
            cursor: pointer;
            transition: background 0.3s;
            border-left: 3px solid transparent;
        }

        .menu-item:hover {
            background: #34495e;
        }

        .menu-item.active {
            background: #34495e;
            border-left-color: #3498db;
        }

        .container {
            flex: 1;
            background: white;
            min-height: 100vh;
            order: 2;
        }

        .header {
            background: #2c3e50;
            color: white;
            padding: 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .logo {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .logo-box {
            width: 40px;
            height: 40px;
            background: #3498db;
            border-radius: 4px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: bold;
            font-size: 18px;
        }

        .system-name {
            font-size: 14px;
            color: #bdc3c7;
        }

        .main-title {
            font-size: 24px;
            margin: 0;
        }

        .controls {
            padding: 20px;
            border-bottom: 1px solid #ecf0f1;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .add-facility-btn {
            background: #27ae60;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 4px;
            cursor: pointer;
            font-weight: bold;
            transition: background 0.3s;
        }

        .add-facility-btn:hover {
            background: #219a52;
        }

        .facility-table {
            width: 100%;
            border-collapse: collapse;
            margin: 0;
        }

        .facility-table th {
            background: #34495e;
            color: white;
            padding: 15px;
            text-align: left;
            font-weight: 600;
        }

        .facility-table td {
            padding: 15px;
            border-bottom: 1px solid #ecf0f1;
        }

        .facility-table tr:hover {
            background: #f8f9fa;
        }

        .status-badge {
            padding: 4px 12px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: bold;
        }

        .status-active {
            background: #d4edda;
            color: #155724;
        }

        .status-inactive {
            background: #f8d7da;
            color: #721c24;
        }

        .facility-type {
            display: inline-block;
            padding: 4px 8px;
            background: #e3f2fd;
            color: #1565c0;
            border-radius: 4px;
            font-size: 12px;
            margin-right: 5px;
        }

        .action-buttons {
            display: flex;
            gap: 5px;
        }

        .btn {
            padding: 6px 12px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 12px;
            transition: opacity 0.3s;
        }

        .btn:hover {
            opacity: 0.8;
        }

        .btn-edit {
            background: #f39c12;
            color: white;
        }

        .btn-delete {
            background: #e74c3c;
            color: white;
        }

        .facility-indicator {
            color: #27ae60;
            font-size: 18px;
            font-weight: bold;
        }

        .facility-indicator.no {
            color: #e74c3c;
        }

        .modal {
            display: none;
            position: fixed;
            z-index: 1000;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0,0,0,0.5);
        }

        .modal-content {
            background-color: white;
            margin: 5% auto;
            padding: 30px;
            border-radius: 8px;
            width: 500px;
            max-width: 90%;
            box-shadow: 0 4px 20px rgba(0,0,0,0.3);
        }

        .modal-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
            padding-bottom: 15px;
            border-bottom: 1px solid #ecf0f1;
        }

        .modal-title {
            font-size: 20px;
            font-weight: bold;
            color: #2c3e50;
            margin: 0;
        }

        .close {
            color: #aaa;
            font-size: 28px;
            font-weight: bold;
            cursor: pointer;
            line-height: 1;
        }

        .close:hover {
            color: #000;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-label {
            display: block;
            margin-bottom: 8px;
            font-weight: 600;
            color: #2c3e50;
        }

        .form-input {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 4px;
            font-size: 14px;
            box-sizing: border-box;
        }

        .form-select {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 4px;
            font-size: 14px;
            box-sizing: border-box;
            background-color: white;
        }

        .modal-buttons {
            display: flex;
            gap: 10px;
            justify-content: flex-end;
            margin-top: 30px;
            padding-top: 20px;
            border-top: 1px solid #ecf0f1;
        }

        .btn-primary {
            background: #27ae60;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-weight: bold;
        }

        .btn-secondary {
            background: #95a5a6;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        .btn-primary:hover {
            background:rgb(42, 54, 47);
        }

        .btn-secondary:hover {
            background: #7f8c8d;
        }
    </style>
</head>
<body>
    <!-- Sidebar -->
    <div class="sidebar">
        <div class="sidebar-header">
            <h3 class="sidebar-title">Swift Retreat</h3>
            <p class="sidebar-subtitle">Hotel Management</p>
        </div>
        <div class="sidebar-menu">
            <div class="menu-item">Dashboard</div>
            <div class="menu-item">Reservations</div>
            <div class="menu-item">Guest</div>
            <div class="menu-item">Rooms</div>
            <div class="menu-item">Staff</div>
            <div class="menu-item">Rate</div>
            <div class="menu-item active">Setting</div>
        </div>
    </div>

    <div class="container">

        <!-- Header Section -->
        <div class="header">
            <div class="logo">
                <div>
                    <div class="main-title">Facility Management</div>
                    <div class="system-name">Hotel Management System</div>
                </div>
            </div>
        </div>

        <!-- Controls Section -->
        <div class="controls">
            <h2 style="margin: 0; color: #2c3e50;">Manage Hotel Facilities</h2>
            <button class="add-facility-btn" id="addFacilityBtn">+ Add Facility</button>
        </div>

        <!-- Facility Table -->
        <table class="facility-table">
            <thead>
                <tr>
                    <th>Guest ID</th>
                    <th>Room Number</th>
                    <th>Prayer Room</th>
                    <th>Halal Dining</th>
                    <th>Family Friendly</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody id="facilityTableBody">
                <tr data-id="1">
                    <td>#001</td>
                    <td>101</td>
                    <td><span class="facility-indicator">Y</span></td>
                    <td><span class="facility-indicator">Y</span></td>
                    <td><span class="facility-indicator">Y</span></td>
                    <td><span class="status-badge status-active">Active</span></td>
                    <td>
                        <div class="action-buttons">
                            <button class="btn btn-edit" onclick="editFacility(1)">Edit</button>
                            <button class="btn btn-delete" onclick="deleteFacility(1)">Delete</button>
                        </div>
                    </td>
                </tr>
                <tr data-id="2">
                    <td>#002</td>
                    <td>102</td>
                    <td><span class="facility-indicator">Y</span></td>
                    <td><span class="facility-indicator no">X</span></td>
                    <td><span class="facility-indicator">Y</span></td>
                    <td><span class="status-badge status-active">Active</span></td>
                    <td>
                        <div class="action-buttons">
                            <button class="btn btn-edit" onclick="editFacility(2)">Edit</button>
                            <button class="btn btn-delete" onclick="deleteFacility(2)">Delete</button>
                        </div>
                    </td>
                </tr>
                <tr data-id="3">
                    <td>#003</td>
                    <td>201</td>
                    <td><span class="facility-indicator no">X</span></td>
                    <td><span class="facility-indicator">Y</span></td>
                    <td><span class="facility-indicator no">X</span></td>
                    <td><span class="status-badge status-inactive">Inactive</span></td>
                    <td>
                        <div class="action-buttons">
                            <button class="btn btn-edit" onclick="editFacility(3)">Edit</button>
                            <button class="btn btn-delete" onclick="deleteFacility(3)">Delete</button>
                        </div>
                    </td>
                </tr>
                <tr data-id="4">
                    <td>#004</td>
                    <td>202</td>
                    <td><span class="facility-indicator">Y</span></td>
                    <td><span class="facility-indicator">Y</span></td>
                    <td><span class="facility-indicator">Y</span></td>
                    <td><span class="status-badge status-active">Active</span></td>
                    <td>
                        <div class="action-buttons">
                            <button class="btn btn-edit" onclick="editFacility(4)">Edit</button>
                            <button class="btn btn-delete" onclick="deleteFacility(4)">Delete</button>
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>

    <!-- Modal for Add/Edit Facility -->
    <div id="facilityModal" class="modal">
        <div class="modal-content">
            <div class="modal-header">
                <h3 id="modalTitle" class="modal-title">Add New Facility</h3>
                <span class="close" onclick="closeModal()">&times;</span>
            </div>

            <form id="facilityForm">
                <div class="form-group">
                    <label class="form-label" for="roomNumber">Room Number:</label>
                    <input type="text" id="roomNumber" class="form-input" required>
                </div>

                <div class="form-group">
                    <label class="form-label" for="prayerRoom">Prayer Room:</label>
                    <select id="prayerRoom" class="form-select" required>
                        <option value="">Select Option</option>
                        <option value="Y">Y - Yes</option>
                        <option value="X">X - No</option>
                    </select>
                </div>

                <div class="form-group">
                    <label class="form-label" for="halalDining">Halal Dining:</label>
                    <select id="halalDining" class="form-select" required>
                        <option value="">Select Option</option>
                        <option value="Y">Y - Yes</option>
                        <option value="X">X - No</option>
                    </select>
                </div>

                <div class="form-group">
                    <label class="form-label" for="familyFriendly">Family Friendly:</label>
                    <select id="familyFriendly" class="form-select" required>
                        <option value="">Select Option</option>
                        <option value="Y">Y - Yes</option>
                        <option value="X">X - No</option>
                    </select>
                </div>

                <div class="form-group">
                    <label class="form-label" for="facilityStatus">Status:</label>
                    <select id="facilityStatus" class="form-select" required>
                        <option value="">Select Status</option>
                        <option value="active">Active</option>
                        <option value="inactive">Inactive</option>
                    </select>
                </div>

                <div class="modal-buttons">
                    <button type="button" class="btn-secondary" onclick="closeModal()">Cancel</button>
                    <button type="submit" class="btn-primary">Save Facility</button>
                </div>
            </form>
        </div>
    </div>

    <script>
        let facilityData = [
            { id: 1, facilityId: '#001', roomNumber: '101', prayerRoom: 'Y', halalDining: 'Y', familyFriendly: 'Y', status: 'active' },
            { id: 2, facilityId: '#002', roomNumber: '102', prayerRoom: 'Y', halalDining: 'X', familyFriendly: 'Y', status: 'active' },
            { id: 3, facilityId: '#003', roomNumber: '201', prayerRoom: 'X', halalDining: 'Y', familyFriendly: 'X', status: 'inactive' },
            { id: 4, facilityId: '#004', roomNumber: '202', prayerRoom: 'Y', halalDining: 'Y', familyFriendly: 'Y', status: 'active' }
        ];

        let editingId = null;
        let nextId = 5;

        // Initialize when page loads
        document.addEventListener('DOMContentLoaded', function() {
            // Add event listener for Add Facility button
            document.getElementById('addFacilityBtn').addEventListener('click', showAddForm);

            // Add event listener for form submission
            document.getElementById('facilityForm').addEventListener('submit', handleFormSubmit);

            // Close modal when clicking outside
            window.addEventListener('click', function(event) {
                const modal = document.getElementById('facilityModal');
                if (event.target === modal) {
                    closeModal();
                }
            });
        });

        function showAddForm() {
            editingId = null;
            document.getElementById('modalTitle').textContent = 'Add New Facility';
            document.getElementById('facilityForm').reset();
            document.getElementById('facilityModal').style.display = 'block';
        }

        function editFacility(id) {
            editingId = id;
            const facility = facilityData.find(f => f.id === id);

            if (facility) {
                document.getElementById('modalTitle').textContent = 'Edit Facility';
                document.getElementById('roomNumber').value = facility.roomNumber;
                document.getElementById('prayerRoom').value = facility.prayerRoom;
                document.getElementById('halalDining').value = facility.halalDining;
                document.getElementById('familyFriendly').value = facility.familyFriendly;
                document.getElementById('facilityStatus').value = facility.status;
                document.getElementById('facilityModal').style.display = 'block';
            }
        }

        function deleteFacility(id) {
            if (confirm('Are you sure you want to delete this facility?')) {
                facilityData = facilityData.filter(f => f.id !== id);
                renderTable();
            }
        }

        function closeModal() {
            document.getElementById('facilityModal').style.display = 'none';
            editingId = null;
        }

        function renderTable() {
            const tbody = document.getElementById('facilityTableBody');
            tbody.innerHTML = '';

            facilityData.forEach(facility => {
                const row = document.createElement('tr');
                row.setAttribute('data-id', facility.id);

                const statusClass = facility.status === 'active' ? 'status-active' : 'status-inactive';
                const statusText = facility.status === 'active' ? 'Active' : 'Inactive';

                row.innerHTML = `
                    <td>${facility.facilityId}</td>
                    <td>${facility.roomNumber}</td>
                    <td><span class="facility-indicator ${facility.prayerRoom === 'X' ? 'no' : ''}">${facility.prayerRoom}</span></td>
                    <td><span class="facility-indicator ${facility.halalDining === 'X' ? 'no' : ''}">${facility.halalDining}</span></td>
                    <td><span class="facility-indicator ${facility.familyFriendly === 'X' ? 'no' : ''}">${facility.familyFriendly}</span></td>
                    <td><span class="status-badge ${statusClass}">${statusText}</span></td>
                    <td>
                        <div class="action-buttons">
                            <button class="btn btn-edit" onclick="editFacility(${facility.id})">Edit</button>
                            <button class="btn btn-delete" onclick="deleteFacility(${facility.id})">Delete</button>
                        </div>
                    </td>
                `;

                tbody.appendChild(row);
            });
        }

        function handleFormSubmit(e) {
            e.preventDefault();

            const roomNumber = document.getElementById('roomNumber').value;
            const prayerRoom = document.getElementById('prayerRoom').value;
            const halalDining = document.getElementById('halalDining').value;
            const familyFriendly = document.getElementById('familyFriendly').value;
            const status = document.getElementById('facilityStatus').value;

            if (editingId) {
                // Update existing facility
                const facilityIndex = facilityData.findIndex(f => f.id === editingId);
                if (facilityIndex !== -1) {
                    facilityData[facilityIndex] = {
                        ...facilityData[facilityIndex],
                        roomNumber,
                        prayerRoom,
                        halalDining,
                        familyFriendly,
                        status
                    };
                }
            } else {
                // Add new facility
                const newFacility = {
                    id: nextId++,
                    facilityId: `#${String(nextId - 1).padStart(3, '0')}`,
                    roomNumber,
                    prayerRoom,
                    halalDining,
                    familyFriendly,
                    status
                };
                facilityData.push(newFacility);
            }

            renderTable();
            closeModal();
        }
    </script>


                <!-- Pagination -->
                <div class="flex justify-end mt-4">
                </div>
            </div>
        </div>
</body>
</html>
