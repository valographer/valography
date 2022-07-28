@props(['name' => '', 'for' => '', 'class' => ''])
<label for="{{ $for }}" class="{{$class}}">
    {{ ucwords(($name != '')? $name: $for) }}
</label>