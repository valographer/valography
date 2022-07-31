<x-layout>
    @foreach ($posts as $post)
        <div class="article">
            <img src="{{ url('public/images/'.$post->slug.'.jpg')}} "
                class="img-fluid" 
                alt="image" 
                title="image">
            <div class="category">
                <a href="/posts/{{ $post->category->slug }}">
                    {{$post->category->name}}
                </a>
                @if(auth()->user()->admin)
                    &nbsp;<a href="/admin/posts/edit?id={{$post->id}}"><i class="fa fa-pen"></i></a>
                @endif
            </div>
            @if($post->post != '')
                <div class="post">
                    {{$post->post}}
                </div>
            @endif
        </div>
    @endforeach
    {{ $posts->links('vendor.pagination.custom') }}
</x-layout>