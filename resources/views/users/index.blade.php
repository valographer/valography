<x-layout>
    <h2 class="form-heading">Users</h2>
    <ol class="collection collection-container">
        <li class="item item-container users">
            <div class="attribute" data-name="Name">Name</div>
            <div class="attribute" data-name="E-Mail">E-Mail</div>
            <div class="attribute" data-name="Info">Info</div>
            <div class="attribute" data-name="Categories">Categories</div>
            <div class="attribute" data-name="Admin">Admin</div>
            <div class="attribute" data-name="Edit">Edit</div>
            <div class="attribute" data-name="Delete">Delete</div>
        </li>
        @foreach ($users as $user)
            <li class="item item-container users">
                <div class="attribute" data-name="Name">{{$user->name}}</div>
                <div class="attribute" data-name="E-Mail">{{$user->email}}</div>
                <div class="attribute" data-name="Info">{{$user->info}}</div>
                <div class="attribute" data-name="Categories">{{($user->kd)?'All':'Restricted'}}</div>
                <div class="attribute" data-name="Admin">{{($user->admin)?'Yes':'No'}}</div>
                <div class="attribute" data-name="Edit"><a href="/admin/users/edit?id={{$user->id}}"><i class="fa fa-pen"></i></a></div>
                <div class="attribute" data-name="Delete"><a href="/admin/users/delete?id={{$user->id}}"><i class="fa fa-trash"></i></a></div>
            </li>
        @endforeach
    </ol>
</x-layout>