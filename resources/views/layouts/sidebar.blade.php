<!-- resources/views/layouts/sidebar.blade.php -->
<div class="sidebar bg-white h-screen w-60 p-4">
    <div class="logo flex items-center mb-8">
        <div class="text-xl font-bold text-blue-600">Swift Retreat</div>
    </div>
    <ul class="space-y-4">
        <li>
            <a href="{{ route('dashboard') }}" class="flex items-center space-x-2 text-blue-600 font-medium">
                <i class="fas fa-home"></i>
                <span>Dashboard</span>
            </a>
        </li>
        <li>
            <a class="flex items-center space-x-2 text-gray-700 hover:text-blue-600">
                {{-- <a href="{{ route('reservations') }}" class="flex items-center space-x-2 text-gray-700 hover:text-blue-600"> --}}
                <i class="fas fa-book"></i>
                <span>Reservations</span>
            </a>
        </li>
        <li>
            <a href="{{ route('guest') }}" class="flex items-center space-x-2 text-gray-700 hover:text-blue-600">
                <i class="fas fa-user"></i>
                <span>Guest</span>
            </a>
        </li>
        <li>
            <a class="flex items-center space-x-2 text-gray-700 hover:text-blue-600">
                {{-- <a href="{{ route('rooms') }}" class="flex items-center space-x-2 text-gray-700 hover:text-blue-600"> --}}
                <i class="fas fa-door-open"></i>
                <span>Rooms</span>
            </a>
        </li>
        <li>
            <a class="flex items-center space-x-2 text-gray-700 hover:text-blue-600">
                {{-- <a href="{{ route('staff') }}" class="flex items-center space-x-2 text-gray-700 hover:text-blue-600"> --}}
                <i class="fas fa-users"></i>
                <span>Staff</span>
            </a>
        </li>
        <li>
            <a class="flex items-center space-x-2 text-gray-700 hover:text-blue-600">
                {{-- <a href="{{ route('rate') }}" class="flex items-center space-x-2 text-gray-700 hover:text-blue-600"> --}}
                <i class="fas fa-dollar-sign"></i>
                <span>Rate</span>
            </a>
        </li>
        <li>
            <a class="flex items-center space-x-2 text-gray-700 hover:text-blue-600">
                {{-- <a href="{{ route('setting') }}" class="flex items-center space-x-2 text-gray-700 hover:text-blue-600"> --}}
                <i class="fas fa-cog"></i>
                <span>Setting</span>
            </a>
        </li>
    </ul>
</div>
