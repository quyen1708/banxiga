@php
    $images = data_get($entry, 'images');
@endphp
<div>
    @foreach($images as $element)
        <img width="100" height="100" src="http://xiga.us/{{ $element->path }}" />
    @endforeach
</div>
