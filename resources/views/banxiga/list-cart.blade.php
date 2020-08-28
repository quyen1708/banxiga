<div class="cart-table">
    <table>
        <thead>
        <tr>
            <th>Image</th>
            <th class="p-name">Product Name</th>
            <th>Price</th>
            <th>Quantity</th>
            <th>Total</th>
            <th>Delete</th>
        </tr>

        {{--                        <tr>--}}
        {{--                            <th></th>--}}
        {{--                            <th></th>--}}
        {{--                            <th></th>--}}
        {{--                            <th></th>--}}
        {{--                            <th></th>--}}
        {{--                            <th class="close-td first-row edit-all"><i class="ti-save"></i></th>--}}
        {{--                            <th class="close-td first-row delete-all"><i class="ti-close"></i></th>--}}
        {{--                        </tr>--}}
        </thead>
        <tbody>
        @if(Session::has("Cart") != null)
            @foreach(Session::get('Cart')->products as $item)
                <tr>
                    <td class="cart-pic first-row"><img width="150px" height="150px"
                                                        src="/{{ $item['productInfo']->images->first()->path }}"
                                                        alt=""></td>
                    <td class="cart-title first-row">
                        <h5>{{ $item['productInfo']->name }}</h5>
                    </td>
                    <td class="p-price first-row">{{number_format($item['productInfo']->price)}}đ</td>
                    <td class="qua-col first-row">
                        <div class="quantity">
                            <div class="pro-qty">
                                <input data-id="{{ $item['productInfo']->id }}"
                                       id="quanty-item-{{ $item['productInfo']->id }}"
                                       name="quanty-items"
                                       type="text"
                                       value="{{$item['quanty']}}">
                            </div>
                        </div>
                    </td>
                    <td class="total-price first-row">{{number_format($item['price'])}}đ</td>
                    {{--                                    <td class="close-td first-row"><i onclick="SaveListItemCart({{ $item['productInfo']->id }})" class="ti-save"></i></td>--}}
                    <td class="close-td first-row"><i class="ti-close"
                                                      onclick="DeleteListItemCart({{ $item['productInfo']->id }})"></i>
                    </td>
                </tr>
            @endforeach
        @endif
        </tbody>
    </table>
</div>
<div class="row">
    <div class="col-lg-12" id="form_container">
        <div class="proceed-checkout">
            @if(Session::has("Cart") != null)
                <ul>
                    <li class="subtotal">Tổng số lượng:
                        <span id="totalQuanty">{{ Session::get('Cart')->totalQuanty }}</span></li>
                    <li class="cart-total">Tổng giá: <span id="payment">{{ number_format(Session::get('Cart')->totalPrice) }}đ</span>
                    </li>
                </ul>
                <button type="button" style="width: 100%" class="proceed-btn" id="check-out"> CHECK OUT →</button>
            @else
                <ul>
                    <li class="subtotal">Tổng số lượng:
                        <span id="totalQuanty">0</span></li>
                    <li class="cart-total">Tổng giá: <span id="payment">0đ</span>
                    </li>
                </ul>
                <button type="button" style="width: 100%" class="proceed-btn" id="check-out"> CHECK OUT →</button>
            @endif
        </div>
    </div>
</div>
