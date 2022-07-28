<x-layout>
    <h2>Categories</h2>
    <table class="table table-striped table-bordered">
        <tr>
            <th>Name</th>
            <th>Slug</th>
            <th>Edit</th>
        </tr>
        @foreach ($categories as $category)
            <tr>
                <td>{{$category->name}}</td>
                <td>{{$category->slug}}</td>
                <td><a href="/admin/categories/edit?id={{ $category->id }}"><i class="fa fa-pen"></i></a></td>
            </tr>
        @endforeach
    </table>
</x-layout>