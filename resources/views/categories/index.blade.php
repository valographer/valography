<x-layout>
    <h2 class="form-heading">Categories</h2>
    <ol class="collection collection-container">
        <li class="item item-container categories">
            <div class="attribute">Name</div>
            <div class="attribute">Slug</div>
            <div class="attribute">Edit</div>
        </li>
        @foreach ($categories as $category)
            <li class="item item-container categories">
                <div class="attribute" data-name="Name">{{$category->name}}</div>
                <div class="attribute" data-name="Slug">{{$category->slug}}</div>
                <div class="attribute" data-name="Edit"><a href="/admin/categories/edit?id={{ $category->id }}"><i class="fa fa-pen"></i></a></div>
            </li>
        @endforeach
    </ol>
</x-layout>