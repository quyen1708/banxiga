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
                                       id="quanty-item-{{ $item['productInfo']->id }}" type="text"
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
        <tr>
            <td colspan="6"><button id="edit-all" class="btn btn-default" style="background-color: #fa7d09; width: 100%">Save All</button></td>
        </tr>
        </tbody>
    </table>
</div>
<div class="row">
    <div class="col-lg-12" id="form_container">
        <form role="form" method="post" id="reused_form">
            <div class="row">
                <div class="col-sm-4 form-group">
                    <input type="text" class="form-control" id="txtName" name="txtName"
                           placeholder="Your Name*" required>
                </div>
                <div class="col-sm-4 form-group">
                    <input type="email" class="form-control" id="txtEmail" name="txtEmail"
                           placeholder="Your Email" required>
                </div>
                <div class="col-sm-4 form-group">
                    <input type="phone" class="form-control" id="txtPhone" name="txtPhone"
                           placeholder="Your Phone Number*" required>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12 form-group">
                    <label for="message">
                        Địa chỉ của bạn:</label>
                    <textarea class="form-control" type="textarea" name="message" id="message"
                              maxlength="6000" rows="2"
                              placeholder="Địa chỉ của bạn..."></textarea>
                </div>
            </div>
            <div class="proceed-checkout">
                @if(Session::has("Cart") != null)
                    <ul>
                        <li class="subtotal">Tổng số lượng:
                            <span>{{ Session::get('Cart')->totalQuanty }}</span></li>
                        <li class="cart-total">Tổng giá: <span>{{ number_format(Session::get('Cart')->totalPrice) }}đ</span>
                        </li>
                    </ul>
                    <button style=width: 100%" type="submit" class="proceed-btn" value="Order"> Create Order →</button>
                @endif
            </div>
        </form>
    </div>
</div>
