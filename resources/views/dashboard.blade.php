<!-- resources/views/dashboard.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Swift Retreat - Dashboard</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css">
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
</head>
<body class="bg-gray-50">

    <div class="flex">
        @include('layouts.sidebar')

        <div class="flex-1 p-6">
            <!-- Header -->
            <div class="flex justify-between items-center mb-4">
                <h1 class="text-2xl font-semibold">Dashboard</h1>
                <div class="flex items-center space-x-4">
                    <button class="p-2 bg-gray-200 rounded">
                        <i class="fas fa-bell"></i>
                    </button>
                    <img src="https://via.placeholder.com/40" alt="User" class="rounded-full w-10 h-10">
                </div>
            </div>

            <!-- Search Bar -->
            <div class="flex justify-between items-center mb-4">
                <div class="flex space-x-2">
                    <button class="px-4 py-2 bg-blue-600 text-white rounded">Check in</button>
                    <button class="px-4 py-2 bg-gray-200 rounded">Check out</button>
                </div>
                <div class="flex space-x-2">
                    <input type="text" placeholder="Search by room number" class="border p-2 rounded">
                    <button class="px-4 py-2 bg-gray-200 rounded">
                        <i class="fas fa-filter"></i> Filter
                    </button>
                </div>
            </div>

            <!-- Table -->
            <div class="bg-white shadow rounded overflow-x-auto">
                <table class="min-w-full text-left">
                    <thead class="bg-gray-100">
                        <tr>
                            <th class="p-2">Reservation ID</th>
                            <th class="p-2">Name</th>
                            <th class="p-2">Room Number</th>
                            <th class="p-2">Total Amount</th>
                            <th class="p-2">Shariah Labels</th>
                            <th class="p-2">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        {{-- @foreach ($guest as $g)
                            <tr class="border-b">
                                <td class="p-2">{{ $g->id }}</td>
                                <td class="p-2">{{ $g->name }}</td>
                                <td class="p-2">{{ $g->room_number }}</td>
                                <td class="p-2">${{ number_format($g->total_amount, 2) }}</td>
                                <td class="p-2">
                                    <span class="px-2 py-1 bg-blue-100 text-blue-600 rounded text-xs">Qibla</span>
                                </td>
                                <td class="p-2">
                                    @php
                                        $statusColors = [
                                            'Clean' => 'text-green-600 bg-green-100',
                                            'Dirty' => 'text-red-600 bg-red-100',
                                            'Pick up' => 'text-yellow-600 bg-yellow-100',
                                            'Inspected' => 'text-green-600 bg-green-100',
                                        ];
                                        $statusClass = $statusColors[$guest->status] ?? 'text-gray-600 bg-gray-100';
                                    @endphp
                                    <span class="px-2 py-1 rounded text-xs {{ $statusClass }}">
                                        {{ $guest->status }}
                                    </span>
                                </td>
                            </tr>
                        @endforeach --}}
                    </tbody>
                </table>
            </div>

            <!-- Pagination -->
            <div class="flex justify-end mt-4">
                {{-- {{ $guest->links() }} --}}
            </div>
        </div>
    </div>

</body>
</html>
