<!-- resources/views/dashboard.blade.php -->
@extends('layouts.app')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">



</head>
<body class="bg-gray-50">

    <div class="flex">


        <div class="flex-1 p-6">




            <!-- Table -->

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
                        <div class="bg-white shadow rounded overflow-x-auto">
                <table class="min-w-full text-left">


                    </tbody>
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
