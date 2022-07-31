<x-layout>
    <h2 class="form-heading">Create Category</h2>
    <form method="POST" action="/admin/categories/create" class="form">
        @csrf
        <x-form.input id="name" name="name" />
        <x-form.input id="slug" name="slug" />
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
        
        <x-form.button>Create</x-form.button>
    </form>
</x-layout>