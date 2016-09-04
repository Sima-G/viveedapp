@foreach($speakers AS $speaker)
    <option value="{{ $speaker->id }}">{{ $speaker->full_name }}</option>
@endforeach