@props(['id', 'name' => '', 'type' => 'text', 'value' => '', 'class' => 'form-control', 'ph' => ''])
<div class="form-element">
    <x-form.label for="{{$id}}" />
    <input class="{{$class}}" name="{{($name != '')?$name:$id}}" type="{{$type}}" placeholder="{{$ph}}" id="{{$id}}" value="{{ (old($id))?old($id):$value }}" />
</div>