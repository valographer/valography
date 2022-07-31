<x-layout>
    <form method="POST" action="/admin/categories/edit" class="form">
        @csrf

        <x-form.input-hidden id="id" value="{{$category->id}}" />
        <x-form.input id="name" value="{{$category->name}}"/>
        <x-form.input id="slug" value="{{$category->slug}}"/>
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

        <x-form.button>Edit</x-form.button>
    </form>
</x-layout>