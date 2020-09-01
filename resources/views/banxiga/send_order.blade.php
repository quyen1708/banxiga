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
                    <a href="/List-Cart">Shopping Cart</a>
                    <span>Check Out</span>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Breadcrumb Section Begin -->
<div class="container" style="padding-top: 100px; padding-bottom: 50px">
    <div class="row">
        <div class="col-4"></div>
        <div class="col-4" id="validation-errors"></div>
        <div class="col-4"></div>
    </div>

</div>

<!-- Shopping Cart Section Begin -->
<div class="container" style="height: 900px">
    <div class="row">
        <div class="col-lg-12" id="form_container">
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
                        <input type="text" class="form-control" id="txtPhone" name="txtPhone"
                               placeholder="Your Phone Number*" >
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12 form-group">
                        <label for="message">
                            Địa chỉ của bạn:</label>
                        <textarea class="form-control" type="textarea" name="address" id="address"
                                  maxlength="6000" rows="2"
                                  placeholder="Địa chỉ của bạn..." ></textarea>
                    </div>
                </div>
                <div class="proceed-checkout">
                    @if(Session::has("Cart") != null)
                        <ul>
                            <li class="subtotal">Tổng số lượng:
                                <span>{{ Session::get('Cart')->totalQuanty }}</span></li>
                            <li class="cart-total">Tổng giá: <span id="payment">{{ number_format(Session::get('Cart')->totalPrice) }}đ</span>
                            </li>
                        </ul>
                        <button style="width: 100%" class="proceed-btn" id="send-order"> Send Order →</button>
                    @endif
                </div>
        </div>
    </div>
</div>
    <!-- Shopping Cart Section End -->

    <!-- Footer Section Begin -->
    <footer class="footer-section margin-bottom" >
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
</div>

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
        $("#send-order").on('click', function(e) {
            e.preventDefault();
            $.ajax({
                type: 'post',
                url: '/Send-Order',
                data: {
                    "_token": "{{ csrf_token() }}",
                    name: $("#txtName").val(),
                    email: $("#txtEmail").val(),
                    phone: $("#txtPhone").val(),
                    address: $("#address").val(),
                },
                success: function (res) {
                    alert("Đơn hàng đã được gửi đi thành công!");
                    window.location.href = "/home"
                },
                error: function (xhr) {
                    $('#validation-errors').html('');
                    $.each(xhr.responseJSON.errors, function (key, value) {
                        $('#validation-errors').append('<div class="alert alert-danger">' + value + '</div');
                    });
                },
            });
        })
    </script>
</body>

</html>
