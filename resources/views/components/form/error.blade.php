@props(['name'])

@error($name)
    <p class="alert">{{$message}}</p>
@enderror