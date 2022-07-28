<x-layout>
    <h2 class="form-heading">Users</h2>
    <table class="table table-striped table-bordered">
        <tr>
            <th>Name</th>
            <th>E-Mail</th>
            <th>Info</th>
            <th>Categories</th>
            <th>Admin</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
        @foreach ($users as $user)
        <tr>
            <td>{{$user->name}}</td>
            <td>{{$user->email}}</td>
            <td>{{$user->info}}</td>
            <td>{{($user->kd)?'All':'Restricted'}}</td>
            <td>{{($user->admin)?'Yes':'No'}}</td>
            <td><a href="/admin/users/edit?id={{$user->id}}"><i class="fa fa-pen"></i></a></td>
            <td><a href="/admin/users/delete?id={{$user->id}}"><i class="fa fa-trash"></i></a></td>
        </tr>
        @endforeach
    </table>
</x-layout>