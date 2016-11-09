{{--{{ dd($groups) }}--}}

@if($source_type == "object")
    @if($target_selection == "single")
        <option></option>
    @endif
    @foreach($ingredients AS $ingredient)
        <option value="{{ $ingredient->id }}">{{ $ingredient->title }}</option>
@endforeach
@elseif($source_type == "collection")
    @if($target_selection == "single")
        <option></option>
    @endif
    @foreach ($groups as $group)
        @foreach ($group->ctr_ingredients as $ctr_ingredient)
            <option value="{{ $ctr_ingredient->id }}">{{ $ctr_ingredient->title }}</option>
        @endforeach
    @endforeach
@endif