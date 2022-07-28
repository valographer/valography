<nav class="navbar navbar-expand-lg p-1 fixed-bottom">
    <div class="container-fluid">
        <div class="user h5">Admin</div>    
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarAdmin">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarAdmin">
            <ul class="navbar-nav ms-auto h5">
                <li class="nav-item"><a class="nav-link {{Request::is("admin/posts/create")? 'active':''}}" href="/admin/posts/create">Create Post</a></li>
                <li class="nav-item"><a class="nav-link {{Request::is("admin/categories")? 'active':''}}" href="/admin/categories">Categories</a></li>
                <li class="nav-item"><a class="nav-link {{Request::is("admin/categories/create")? 'active':''}}" href="/admin/categories/create">Create Category</a></li>
                <li class="nav-item"><a class="nav-link {{Request::is("admin/users")? 'active':''}}" href="/admin/users">Users</a></li>
                <li class="nav-item"><a class="nav-link {{Request::is("admin/users/register")? 'active':''}}" href="/admin/users/register">Create User</a></li>
            </ul>
        </div>
    </div>
</nav>