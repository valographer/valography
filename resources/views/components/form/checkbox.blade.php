@props(['id', 'value' => false])

<div class="form-check">
    <x-form.label name="{{$id}}" />
    <input id="{{$id}}" name="{{$id}}" class="form-check-input" type="checkbox" {{($value)?' checked':''}} />
    
    <x-form.error name="{{$id}}" />
</div>