<form action="{{ route('facilities.update', $facility->id) }}" method="POST">
    @csrf
    @method('PUT')
    <label for="room_number">Room Number</label>
    <input type="text" name="room_number" value="{{ $facility->room_number }}" required>

    <label for="prayer_room">Prayer Room</label>
    <input type="checkbox" name="prayer_room" {{ $facility->prayer_room ? 'checked' : '' }}>

    <label for="halal_dining">Halal Dining</label>
    <input type="checkbox" name="halal_dining" {{ $facility->halal_dining ? 'checked' : '' }}>

    <label for="family_friendly">Family Friendly</label>
    <input type="checkbox" name="family_friendly" {{ $facility->family_friendly ? 'checked' : '' }}>

    <button type="submit">Update Facility</button>
</form>
