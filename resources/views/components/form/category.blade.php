@props(['value' => ''])
<div class="form-element">
    <x-form.label name="category" for="category_id" />
    <select class="" name="category_id" id="category_id">
        @foreach (\App\Models\Category::all() as $category)
            <option value="{{$category->id}}" {{($category->id == $value)?' selected':''}}>{{$category->name}}</option>
        @endforeach
    </select>

    <x-form.error name="category" />
</div>