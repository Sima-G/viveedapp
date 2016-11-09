@if($source_type == "object")
    @if($target_selection == "single")
        <option></option>
    @endif
    @foreach($groups AS $group)
        <option value="{{ $group->id }}">{{ $group->title }}</option>
    @endforeach
@elseif($source_type == "collection")
    @if($target_selection == "single")
        <option></option>
    @endif
    @foreach ($categories as $category)
        @foreach ($category->ctr_groups as $group)
            <option value="{{ $group->id }}">{{ $group->title }}</option>
        @endforeach
    @endforeach
@endif