@php
    $products = data_get($entry, 'OrderListProduct');

@endphp
<div>
    <table>
    <thead>
    <tr>
        <th>Product Name</th>
        <th>Quantity</th>
        <th>Price</th>
    </tr>
    </thead>
    <tbody>
        @foreach($products as $element)
            <tr>
                <td>
                    <h5>{{ $element->product_name }}</h5>
                </td>
                <td>
                    <h5>{{ $element->qty }}</h5></td>
                <td class="qua-col first-row">
                    {{number_format($element->money)}}đ
                </td>
            </tr>
        @endforeach
    </tbody>
    </table>
</div>
