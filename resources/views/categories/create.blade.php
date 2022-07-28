<x-layout>
    <h2 class="form-heading">Create Category</h2>
    <form method="POST" action="/admin/categories/create" class="form">
        @csrf
        <x-form.input id="name" name="name" />
        <x-form.input id="slug" name="slug" />
        
        <x-form.button>Create</x-form.button>
    </form>
</x-layout>