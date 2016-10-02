@foreach($categories AS $category)
    <option value="{{ $category->id }}">{{ $category->title }}</option>
@endforeach