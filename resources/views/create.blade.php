<form action="{{ route('facility.store') }}" method="POST">
    @csrf
    <label for="room_number">Room Number</label>
    <input type="text" name="room_number" required>

    <label for="prayer_room">Prayer Room</label>
    <input type="checkbox" name="prayer_room">

    <label for="halal_dining">Halal Dining</label>
    <input type="checkbox" name="halal_dining">

    <label for="family_friendly">Family Friendly</label>
    <input type="checkbox" name="family_friendly">

    <button type="submit">Add Facility</button>
</form>
