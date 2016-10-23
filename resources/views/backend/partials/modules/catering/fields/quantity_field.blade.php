@if($source_type == "object")
    @if($target_selection == "single")
        <option></option>
    @endif
    @foreach($quantities AS $quantity)
        <option value="{{ $quantity->id }}">{{ $quantity->title }}</option>
    @endforeach
@elseif($source_type == "collection")
    @if($target_selection == "single")
        <option></option>
    @endif
    @foreach ($categories as $category)
        @foreach ($category->ctr_quantities as $quantity)
            <option value="{{ $quantity->id }}">{{ $quantity->title }}</option>
        @endforeach
    @endforeach
@endif