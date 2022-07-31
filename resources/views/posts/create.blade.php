<x-layout>
    <h2 class="form-heading">Create Post</h2>
    <form method="POST" action="/admin/posts/create" enctype="multipart/form-data" class="form">
        @csrf
        <div class="form-element">
            <x-form.label name="image" />

            <input class="" type="file" name="images[]" id="images" multiple class="form-control" accept="image/*" required>
            
            @if(count($errors) > 0)
                <div class="row">
                    <div class="col-md-12">
                        <div class="alert alert-danger">
                            @foreach ($errors->all() as $error)
                                <div>{{ $error }}</div>
                            @endforeach
                        </div>
                    </div>
                </div>
            @endif
        </div>
        
        <x-form.category />
        <x-form.button>Upload</x-form.button>
    </form>
</x-layout>