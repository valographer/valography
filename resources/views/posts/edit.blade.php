<x-layout>
    <form method="POST" action="/admin/posts/edit" class="form">
        @csrf

        <x-form.label name="image" />
        <img src="{{ asset('public/images/'.$post->slug.'.jpg') }}" 
            class="img-fluid" 
            alt="image" 
            title="image">
        <x-form.input-hidden id="id" value="{{$post->id}}" type="hidden" />
        <x-form.category value="{{$post->category_id}}"/>
        <x-form.textarea id="post" value="{{$post->post}}"/>

        <a href="/admin/post/delete?id={{ $post->id }}"><i class="fa fa-trash"></i></a></td>

        <x-form.button>Edit</x-form.button>
    </form>
</x-layout>