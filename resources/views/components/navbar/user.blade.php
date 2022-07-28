<nav class="navbar navbar-expand-lg p-1 fixed-top">
    <div class="container-fluid">
        <a href="/" class="navbar-brand">Valography</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarContent">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarContent">
            <ul class="navbar-nav ms-auto h5">
                <li class="nav-item"><a href="/" class="nav-link {{Request::is("/")? 'active':''}}">Alle</a></li>
                @foreach (\App\Models\Category::showCategories() as $category)
                    <li class="nav-item"><a class="nav-link {{Request::is("posts/$category->slug")? 'active':''}}" href="/posts/{{$category->slug}}" >{{$category->name}}</a></li>
                @endforeach
                <li class="nav-item"><a href="/logout" class="logout nav-link warning">Log out</a></li>
            </ul>
        </div>
    </div>
</nav>