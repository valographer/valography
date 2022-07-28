<x-layout>
    <h2 class="form-heading">Create Post</h2>
    <form method="POST" action="/admin/posts/create" enctype="multipart/form-data" class="form">
        @csrf
        <div class="form-element">
            <x-form.label name="image" />

            <input class="" type="file" name="images[]" id="images" multiple class="form-control" accept="image/*" required>
            @if ($errors->has('files'))
                @foreach ($errors->get('files') as $error)
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $error }}</strong>
                </span>
                @endforeach
            @endif
        </div>
        
        <x-form.category />
        <x-form.button>Upload</x-form.button>
    </form>
</x-layout>