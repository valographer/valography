<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="{{ URL::asset('vendor/twbs/bootstrap/dist/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('resources/css/app.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Valography</title>
</head>
<body>
    <div class="container">
        @auth
            <header>
                <x-navbar.user />
            </header>
            @if(auth()->user()->admin)
                <x-navbar.admin />
            @endif
        @endauth

        {{$slot}}
        
        @if (session()->has('success'))
            <div class="success">
                <p>{{ session('success') }}</p>
            </div>
        @endif
    </div> <!-- container-fluid -->
    <script src="{{ URL::asset('vendor/twbs/bootstrap/dist/js/bootstrap.min.js') }}"></script>
</body>
</html>