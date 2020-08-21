@if(Session::has("Cart") != null)
<table>
    <tbody class="text-center">
    @foreach(Session::get('Cart')->products as $item)
    <tr>
        <td style="width: 10px"></td>
        <td class="si-pic">
            <img src="/{{ $item['productInfo']->images->first()->path }}" height="100px" width="100px" alt="">
        </td>
        <td class="si-text">
            <div class="product-selected">
                <h6>{{ $item['productInfo']->name }}</h6>
            </div>
        </td>
        <td class="si-text" style="width: 35%">
            <p>{{number_format($item['productInfo']->price)}} x {{$item['quanty']}} </p>
        </td>
        <td class="si-close">
            <i class="ti-close" data-id="{{$item['productInfo']->id}}"></i>
        </td>
        <td style="width: 10px"></td>
    </tr>
    <tr>
        <td>
            <div>
                <hr>
            </div>
        </td>
        <td>
            <div>
                <hr>
            </div>
        </td>
        <td>
            <div>
                <hr>
            </div>
        </td>
        <td>
            <div>
                <hr>
            </div>
        </td>
        <td>
            <div>
                <hr>
            </div>
        </td>
        <td>
            <div>
                <hr>
            </div>
        </td>
    </tr>
    @endforeach
    </tbody>
</table>
<input type="number" id="total-quanty-cart" hidden value="{{ Session::get('Cart')->totalQuanty }}">
@endif
