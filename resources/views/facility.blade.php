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
            background-color: #f5f5f5;
            min-height: 200vh;
        }

        .sidebar {
            position: fixed;
            top: 4px;
            left: 0;
            width: 150px;
            height: calc(100vh - 80px);
            background: white;
            border-right: 1px solid #e0e0e0;
            padding-top: 10px;
        }

        .container {
            margin-left: 250px;
            margin-top: 30px;
            background: #fcf9f9;
            min-height: calc(100vh - 80px);
            width: calc(100% - 200px);
        }

        .controls {
            padding: 20px;
            border-bottom: 1px solid #e2e4e5;
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
            border-collapse: separate;
            margin: 0;
        }

        .facility-table th {
            background: #d2d4d6;
            color: rgb(159, 153, 153);
            padding: 15px;
            text-align: left;
            font-weight: 700;
        }

        .facility-table td {
            padding: 15px;
            border-bottom: 1px solid #ecf0f1;
        }

        .facility-table tr:hover {
            background: #dbdcdd;
        }

        .status-badge {
            padding: 4px 12px;
            border-radius: 40px;
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
            gap: 10px;
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
            border-bottom: 1px solid #65787d;
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
            background: rgb(42, 54, 47);
        }

        .btn-secondary:hover {
            background: #7f8c8d;
        }

        .menu-item {
            padding: 15px 20px;
            cursor: pointer;
            transition: background 0.3s;
        }

        .menu-item:hover {
            background: #f8f9fa;
        }

        .menu-item.active {
            background: #e3f2fd;
            color: #1565c0;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div class="sidebar">
        <div class="menu-item active">Dashboard</div>
        <div class="menu-item">Facilities</div>
        <div class="menu-item">Guest</div>
        <div class="menu-item">Rooms</div>
    </div>

    <div class="container">
        <div class="main-content">
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
        // Global variables
        let currentEditId = null;
        let facilityCounter = 5; // Start from 5 since we have 4 existing records

        // Modal functionality
        const modal = document.getElementById('facilityModal');
        const addBtn = document.getElementById('addFacilityBtn');
        const tableBody = document.getElementById('facilityTableBody');

        // Add facility button click
        addBtn.addEventListener('click', function() {
            currentEditId = null;
            document.getElementById('modalTitle').textContent = 'Add New Facility';
            document.getElementById('facilityForm').reset();
            modal.style.display = 'block';
        });

        // Close modal function
        function closeModal() {
            modal.style.display = 'none';
            currentEditId = null;
        }

        // Edit facility function
        function editFacility(id) {
            currentEditId = id;
            document.getElementById('modalTitle').textContent = 'Edit Facility';

            // Find the row with the matching ID
            const row = document.querySelector(`tr[data-id="${id}"]`);
            if (row) {
                const cells = row.cells;

                // Populate form fields with existing data
                document.getElementById('roomNumber').value = cells[1].textContent;
                document.getElementById('prayerRoom').value = cells[2].querySelector('.facility-indicator').textContent;
                document.getElementById('halalDining').value = cells[3].querySelector('.facility-indicator').textContent;
                document.getElementById('familyFriendly').value = cells[4].querySelector('.facility-indicator').textContent;

                // Set status
                const statusText = cells[5].querySelector('.status-badge').textContent.toLowerCase();
                document.getElementById('facilityStatus').value = statusText;
            }

            modal.style.display = 'block';
        }

        // Delete facility function
        function deleteFacility(id) {
            if (confirm('Are you sure you want to delete this facility?')) {
                const row = document.querySelector(`tr[data-id="${id}"]`);
                if (row) {
                    row.remove();
                    alert('Facility deleted successfully!');
                }
            }
        }

        // Create new table row
        function createTableRow(id, guestId, roomNumber, prayerRoom, halalDining, familyFriendly, status) {
            const statusClass = status === 'active' ? 'status-active' : 'status-inactive';
            const statusText = status.charAt(0).toUpperCase() + status.slice(1);

            return `
                <tr data-id="${id}">
                    <td>${guestId}</td>
                    <td>${roomNumber}</td>
                    <td><span class="facility-indicator ${prayerRoom === 'X' ? 'no' : ''}">${prayerRoom}</span></td>
                    <td><span class="facility-indicator ${halalDining === 'X' ? 'no' : ''}">${halalDining}</span></td>
                    <td><span class="facility-indicator ${familyFriendly === 'X' ? 'no' : ''}">${familyFriendly}</span></td>
                    <td><span class="status-badge ${statusClass}">${statusText}</span></td>
                    <td>
                        <div class="action-buttons">
                            <button class="btn btn-edit" onclick="editFacility(${id})">Edit</button>
                            <button class="btn btn-delete" onclick="deleteFacility(${id})">Delete</button>
                        </div>
                    </td>
                </tr>
            `;
        }

        // Form submission
        document.getElementById('facilityForm').addEventListener('submit', function(e) {
            e.preventDefault();

            // Get form values
            const roomNumber = document.getElementById('roomNumber').value;
            const prayerRoom = document.getElementById('prayerRoom').value;
            const halalDining = document.getElementById('halalDining').value;
            const familyFriendly = document.getElementById('familyFriendly').value;
            const status = document.getElementById('facilityStatus').value;

            if (currentEditId) {
                // Edit existing facility
                const row = document.querySelector(`tr[data-id="${currentEditId}"]`);
                if (row) {
                    const cells = row.cells;

                    // Update the row data
                    cells[1].textContent = roomNumber;
                    cells[2].innerHTML = `<span class="facility-indicator ${prayerRoom === 'X' ? 'no' : ''}">${prayerRoom}</span>`;
                    cells[3].innerHTML = `<span class="facility-indicator ${halalDining === 'X' ? 'no' : ''}">${halalDining}</span>`;
                    cells[4].innerHTML = `<span class="facility-indicator ${familyFriendly === 'X' ? 'no' : ''}">${familyFriendly}</span>`;

                    const statusClass = status === 'active' ? 'status-active' : 'status-inactive';
                    const statusText = status.charAt(0).toUpperCase() + status.slice(1);
                    cells[5].innerHTML = `<span class="status-badge ${statusClass}">${statusText}</span>`;

                    alert('Facility updated successfully!');
                }
            } else {
                // Add new facility
                const guestId = `#${String(facilityCounter).padStart(3, '0')}`;
                const newRow = createTableRow(facilityCounter, guestId, roomNumber, prayerRoom, halalDining, familyFriendly, status);

                tableBody.insertAdjacentHTML('beforeend', newRow);
                facilityCounter++;

                alert('Facility added successfully!');
            }

            closeModal();
        });

        // Close modal when clicking outside
        window.addEventListener('click', function(event) {
            if (event.target === modal) {
                closeModal();
            }
        });

        // Close modal with Escape key
        document.addEventListener('keydown', function(event) {
            if (event.key === 'Escape' && modal.style.display === 'block') {
                closeModal();
            }
        });

        // Initialize - Add click events to existing buttons (in case they don't work)
        document.addEventListener('DOMContentLoaded', function() {
            // Make sure all existing edit and delete buttons work
            const editButtons = document.querySelectorAll('.btn-edit');
            const deleteButtons = document.querySelectorAll('.btn-delete');

            editButtons.forEach(button => {
                if (!button.onclick) {
                    const row = button.closest('tr');
                    const id = row.getAttribute('data-id');
                    button.addEventListener('click', () => editFacility(parseInt(id)));
                }
            });

            deleteButtons.forEach(button => {
                if (!button.onclick) {
                    const row = button.closest('tr');
                    const id = row.getAttribute('data-id');
                    button.addEventListener('click', () => deleteFacility(parseInt(id)));
                }
            });
        });
    </script>
</body>
</html>
