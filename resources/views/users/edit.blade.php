<x-layout>
    <form method="POST" action="/admin/users/edit" class="form">
        @csrf

        <x-form.input-hidden id="id" value="{{$user->id}}" />
        <x-form.input id="name" value="{{$user->name}}"/>
        <x-form.input id="email" value="{{$user->email}}"/>
        <x-form.textarea id="info" value="{{$user->info}}"/>
        <x-form.checkbox id="admin" value="{{$user->admin}}"/>
        <x-form.checkbox id="kd" value="{{$user->kd}}"/>

        <x-form.button>Edit</x-form.button>
    </form>
</x-layout>