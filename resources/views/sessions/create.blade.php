<x-layout>
    <h2 class="form-heading">Log in</h2>
    <form method="POST" action="/login" class="form">
        @csrf
        <x-form.input name="email" id="email" type="email" ph="Email"/>
        <x-form.input name="password" id="password" type="password" ph="Password"/>
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
        
        <x-form.button>Log in</x-form.button>
    </form>
</x-layout>