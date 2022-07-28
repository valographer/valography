@props(['id', 'value' => '', 'class' => 'form-control'])

<div class="form-element">
    <x-form.label for="{{$id}}" />
    
    <textarea class="{{$class}}"
        name="{{$id}}"
        id="{{$id}}"
    >{{ (old($id))?old($id):$value }}</textarea>

    <x-form.error name="{{$id}}" />
</div>