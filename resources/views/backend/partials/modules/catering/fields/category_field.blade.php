@if($target_selection == "single")
    @foreach($categories AS $category)
        <option></option>
        <option value="{{ $category->id }}">{{ $category->title }}</option>
    @endforeach
@elseif($target_selection == "multiple")
    @foreach($categories AS $category)
        <option value="{{ $category->id }}">{{ $category->title }}</option>
    @endforeach
@endif