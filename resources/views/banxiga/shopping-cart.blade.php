<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Fashi Template">
    <meta name="keywords" content="Fashi, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Xiga.us checkout</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css?family=Muli:300,400,500,600,700,800,900&display=swap" rel="stylesheet">

    <!-- Css Styles -->
    <link rel="stylesheet" href="/assets/css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="/assets/css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="/assets/css/themify-icons.css" type="text/css">
    <link rel="stylesheet" href="/assets/css/elegant-icons.css" type="text/css">
    <link rel="stylesheet" href="/assets/css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="/assets/css/nice-select.css" type="text/css">
    <link rel="stylesheet" href="/assets/css/jquery-ui.min.css" type="text/css">
    <link rel="stylesheet" href="/assets/css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="/assets/css/style.css" type="text/css">
    <!-- JavaScript -->
    <script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>

    <!-- CSS -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css"/>
    <!-- Default theme -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/default.min.css"/>
    <!-- Semantic UI theme -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/semantic.min.css"/>
    <!-- Bootstrap theme -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/bootstrap.min.css"/>
</head>

<body>
<!-- Page Preloder -->
<div id="preloder">
    <div class="loader"></div>
</div>


<!-- Breadcrumb Section Begin -->
<div class="breacrumb-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb-text product-more">
                    <a href="/home"><i class="fa fa-home"></i> Home</a>
                    <span>Shopping Cart</span>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Breadcrumb Section Begin -->

<!-- Shopping Cart Section Begin -->
<section class="shopping-cart spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12" id="list-cart">
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
                        <tr>
                            <td colspan="6"><button id="edit-all" class="btn btn-default" style="background-color: #fa7d09; width: 100%">Save All</button></td>
                        </tr>
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
                                           placeholder="Your Name*" >
                                </div>
                                <div class="col-sm-4 form-group">
                                    <input type="email" class="form-control" id="txtEmail" name="txtEmail"
                                           placeholder="Your Email" >
                                </div>
                                <div class="col-sm-4 form-group">
                                    <input type="number" class="form-control" id="txtPhone" name="txtPhone"
                                           placeholder="Your Phone Number*">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12 form-group">
                                    <label for="message">
                                        Địa chỉ của bạn:</label>
                                    <textarea class="form-control" type="textarea" name="address" id="address"
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
                                    <button style="width: 100%" type="submit" class="proceed-btn" value="Create"> CHECK OUT →</button>
                                @endif
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
</section>
<!-- Shopping Cart Section End -->

<!-- Footer Section Begin -->
<footer class="footer-section">
    <div class="copyright-reserved">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="copyright-text">
                        <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                        Copyright &copy;<script>document.write(new Date().getFullYear());</script>
                        All rights reserved | This template is made with <i class="fa fa-heart-o"
                                                                            aria-hidden="true"></i> by <a
                            href="https://colorlib.com" target="_blank">Colorlib</a>
                        <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                    </div>
                    <div class="payment-pic">
                        <img src="img/payment-method.png" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
<!-- Footer Section End -->

<!-- Js Plugins -->
<script src="/assets/js/jquery-3.3.1.min.js"></script>
<script src="/assets/js/bootstrap.min.js"></script>
<script src="/assets/js/jquery-ui.min.js"></script>
<script src="/assets/js/jquery.countdown.min.js"></script>
<script src="/assets/js/jquery.nice-select.min.js"></script>
<script src="/assets/js/jquery.zoom.min.js"></script>
<script src="/assets/js/jquery.dd.min.js"></script>
<script src="/assets/js/jquery.slicknav.js"></script>
<script src="/assets/js/owl.carousel.min.js"></script>
<script src="/assets/js/main.js"></script>
<script>
    function DeleteListItemCart(id) {
        if (confirm('Bạn muốn bỏ qua sản phẩm này?')) {
            $.ajax({
                type: 'GET',
                url: "/Delete-Item-List-Cart/" + id,
            }).done(function (response) {
                location.reload();
            });
        }
        ;
    }

    // function renderListCart(response){
    //     $("#list-cart").empty();
    //     $("#list-cart").html(response);
    //     var proQty = $('.pro-qty');
    //     proQty.prepend('<span class="dec qtybtn">-</span>');
    //     proQty.append('<span class="inc qtybtn">+</span>');
    //     proQty.on('click', '.qtybtn', function () {
    //         var $button = $(this);
    //         var oldValue = $button.parent().find('input').val();
    //         if ($button.hasClass('inc')) {
    //             var newVal = parseFloat(oldValue) + 1;
    //         } else {
    //             // Don't allow decrementing below zero
    //             if (oldValue > 0) {
    //                 var newVal = parseFloat(oldValue) - 1;
    //             } else {
    //                 newVal = 0;
    //             }
    //         }
    //         $button.parent().find('input').val(newVal);
    //     });
    // }

    // function SaveListItemCart(id){
    //     // console.log(id);
    //     $.ajax({
    //         type: 'GET',
    //         url: "/Save-List-Item-Cart/"+id+'/'+$("#quanty-item-"+id).val(),
    //     }).done(function (response) {
    //         renderListCart(response);
    //         alertify.success('Cập nhập giỏ hàng thành  công');
    //     });
    // }

    $("#edit-all").on("click", function () {
        var lists = [];
        $("table tbody tr td").each(function () {
            $(this).find("input").each(function () {
                var element = {key: $(this).data("id"), value: $(this).val()};
                lists.push(element);
            });
        });
        // console.log(lists)
        alert("Cập nhập thành công")
        $.ajax({
            type: 'POST',
            url: "Save-All",
            data: {
                "_token": "{{ csrf_token() }}",
                "data": lists
            }
        }).done(function (response) {
            location.reload();
        });
    });

    {{--$(".delete-all").on("click", function (){--}}
    {{--    var listsDelete = [];--}}
    {{--    $("table tbody tr td").each(function (){--}}
    {{--        $(this).find("input").each(function (){--}}
    {{--            var element = {key: $(this).data("id"), value: $(this).val()};--}}
    {{--            listsDelete.push(element);--}}
    {{--        });--}}
    {{--    });--}}
    {{--    alert("Đã xóa toàn bộ giỏ hàng")--}}
    {{--    $.ajax({--}}
    {{--        type: 'POST',--}}
    {{--        url: "Delete-All",--}}
    {{--        data: {--}}
    {{--            "_token" : "{{ csrf_token() }}",--}}
    {{--            "data" : lists--}}
    {{--        }--}}
    {{--    }).done(function(response) {--}}
    {{--        location.reload();--}}
    {{--    });--}}
    {{--});--}}
</script>
</body>

</html>
