@php
    $product_id = data_get($entry, 'product_id');
    $product_name = data_get($entry, 'product_name');
@endphp
<span>{{ $product_id }}</span> <span>{{ $product_name }}</span>
