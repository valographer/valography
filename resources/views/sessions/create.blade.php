<x-layout>
    <h2 class="form-heading">Log in</h2>
    <form method="POST" action="/login" class="form">
        @csrf
        <x-form.input name="email" id="email" type="email" ph="Email"/>
        <x-form.input name="password" id="password" type="password" ph="Password"/>
        
        <x-form.button>Log in</x-form.button>
    </form>
</x-layout>