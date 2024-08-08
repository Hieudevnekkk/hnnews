<option value="{{ $category->id }}"
    @isset($model->parent_id)
        @if ($model->parent_id === $category->id) {{ 'selected' }} @endif
    @endisset
    @isset($model->category_id)
    @if ($model->category_id === $category->id)
        {{ 'selected' }}
    @endif
    @endisset>


    {{ $each }}{{ $category->name }}
</option>

@if ($category->children)

    @php($each .= '-')

    @foreach ($category->children as $child)
        @include('admin.categories.nested-category', ['category' => $child])
    @endforeach

@endif
