<x-layout>
    <form method="POST" action="/admin/categories/edit" class="form">
        @csrf

        <x-form.input-hidden id="id" value="{{$category->id}}" />
        <x-form.input id="name" value="{{$category->name}}"/>
        <x-form.input id="slug" value="{{$category->slug}}"/>

        <x-form.button>Edit</x-form.button>
    </form>
</x-layout>