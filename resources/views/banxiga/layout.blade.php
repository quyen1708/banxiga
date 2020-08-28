<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="=width=divice-width, initial-scale=1">
    <title>CirgaSaigon</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="/assets/css/themify-icons.css" type="text/css">
    <link href="https://use.fontawesome.com/releases/v5.10.2/css/all.css" rel="stylesheet">
{{--    <script src="/js/jquery-1.10.2.min.js"></script>--}}
    <script type=”text/javascript” src=”https://code.jquery.com/jquery-3.5.1.min.js”></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
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
    <script type="text/javascript" src="http://code.jquery.com/jquery-1.10.2.min.js"></script>
    <script type="text/javascript" src="/js/cloud-zoom.js"></script>
    <link rel="stylesheet" href="/css/style1.css">
    <link rel="stylesheet" href="/css/style2.css">
    <link rel="stylesheet" href="/css/cloud-zoom.css">
</head>
<body>
<!-- Navigation -->
<nav class="navbar navbar-expand-md navbar-light bg-light sticky-top">
    <div class="container-fluid">
        <a class="navbar-branch" href="/home">
            <i class="fas fa-home"></i>
        </a> &emsp; &emsp;
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link active" href="/">Giới thiệu</a>
                </li>&ensp;
                <li class="nav-item">
                    <a class="nav-link active" href="/home">Trang Chủ</a>
                </li>&ensp;
                <li class="nav-item">
                    <a class="nav-link" href="#">Tin tức</a>
                </li>&ensp;
                <li class="nav-item">
                    <a class="nav-link" href="#">Hỗ trợ khách hàng</a>
                </li>&ensp;
                <li class="nav-item">
                    <a class="nav-link" href="#">Liên hệ</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
<!-- Carousel -->
<div id="slides" class="carousel slide" data-ride="carousel">
    <ul class="carousel-indicators">
        <li data-target="#slides" data-slide-to="0" class="active"></li>
        <li data-target="#slides" data-slide-to="1"></li>
        <li data-target="#slides" data-slide-to="2"></li>
        <li data-target="#slides" data-slide-to="3"></li>
    </ul>
    <div class="carousel-inner carou1">
        <div class="carousel-item active">
            <img src="/images/slide1.jpg" height="700">
            <div class="carousel-caption">
                <h1 class="display-2">You chill, We care</h1>
                <h3>Bạn đang tìm một điếu xì gà hoàn hảo??</h3>
            </div>
        </div>
        <div class="carousel-item">
            <img src="/images/slide2.jpg" height="700">
            <div class="carousel-caption">
                <h1 class="display-2">You chill, We care</h1>
                <h3>Bạn đang tìm một điếu xì gà hoàn hảo??</h3>
            </div>
        </div>
        <div class="carousel-item">
            <img src="/images/slide3.jpg" height="700">
            <div class="carousel-caption">
                <h1 class="display-2">You chill, We care</h1>
                <h3>Bạn đang tìm một điếu xì gà hoàn hảo??</h3>
            </div>
        </div>
        <div class="carousel-item">
            <img src="/images/slide4.jpg" height="700">
            <div class="carousel-caption">
                <h1 class="display-2">You play, We care</h1>
                <h3>Bạn đang tìm một điếu xì gà hoàn hảo??</h3>
            </div>
        </div>
    </div>
</div>
<!-- jumbotron -->
<div class="container-fluid">
    <div class="jumbotron">
        <div class="col-12">
            <div class="d-flex justify-content-between">
                <span>Welcome!</span>
                <div class="dropdown">
                    <a href="/List-Cart" class="dropbtn btn btn-outline-info">
                            <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                            <i class="badge badge-danger">
                                <span id="total-quant-show">{{ Session::has('Cart') ? Session::get('Cart')->totalQuanty :'0' }}</span>
                            </i>
                            <span>Giỏ hàng</span>
                    </a>
                    <div class="dropdown-content ">
                        <div id="change-item-cart">
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
                                                <p>{{number_format($item['productInfo']->price)}}đ x {{$item['quanty']}} </p>
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

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid">
    <div class="row">
        <div class="col-3" style="padding-left: 3%">
            <div class="row border">
                <div class="panel panel-default">
                    <div class="panel-heading text-bold"><h3 class="pl-3">Tìm kiếm sản phẩm</h3></div>
                    <div class="panel-body">
                        <form id="form-search" role="form" method="GET" action="/search">
                            <div class="form-group" style="width: 100%">
                                <div class="input-group ml-4" style="width: 85%">
                                    <input type="text" name="search" id="search" class="form-control"
                                           placeholder="Tìm kiếm sản phẩm...">
                                    <span class="input-group-btn">
                                        <button id="btn-search" value="search" class="btn btn-primary">
                                            <i class="fa fa-search"></i>
                                        </button>
                                    </span>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <br>
            </div>
            <br>
            <div class="row border">
                <div class="panel panel-default">
                    <div class="panel-heading p-1"><h4 class="pl-3 pt-2">DANH MỤC SẢN PHẨM</h4></div>
                    <div class="panel-body đirec-menu1 pt-3">
                        @if($cates)
                            @foreach ($cates as $cate)
                                <div class="dropright">
                                    <a href="/category/{{$cate->id}}/{{\Str::slug($cate->name)}}"
                                       class="btn btn-default đirec-menu2">
                                        <span class="caret">{{ $cate->name }}</span>
                                    </a>
                                </div>
                            @endforeach
                        @endif
                    </div>
                </div>
            </div>
            <br>
            <div class="row border">
                <div class="panel panel-default">
                    <div class="panel-heading p-1"><h4 class="m-1">Hỗ trợ trực tuyến</h4></div>
                    <br>
                    <div class="panel-body">
                        <div class="container" style="margin-left: 7%">
                            <div class="row">
                                <div class="col-7">
                                    <div class="row">
                                        <div class="col-3">
                                            <a class="pull-left" href="mailto:vhkb1708@gmail.com">
                                                <img src="/images/1.png" alt="Kinh Doanh 1" height="80">
                                            </a>
                                        </div>
                                        <div class="col2">
                                            &emsp;&emsp;
                                        </div>
                                        <div class="col-7">
                                            <a style="font-weight: 600" href="tel:0123456789">Kinh doanh 1</a>
                                            <br>
                                            <a style="color: #f00" href="tel:0123456789">0123456789</a>
                                        </div>
                                        <a href="mailto:vhkb1708@gmail.com">&emsp;vhkb1708@gmail.com</a>
                                    </div>
                                </div>
                                <div class="col-5">
                                    <img src="/images/2.png" alt="" height="60">
                                </div>
                            </div>
                            <br>
                            <br>
                            <div class="row">
                                <div class="col-7">
                                    <div class="row">
                                        <div class="col-3">
                                            <a class="pull-left" href="mailto:vhkb1708@gmail.com">
                                                <img src="/images/1.png" alt="Kinh Doanh 1" height="80">
                                            </a>
                                        </div>
                                        <div class="col2">
                                            &emsp;&emsp;
                                        </div>
                                        <div class="col-7">
                                            <a style="font-weight: 600" href="tel:0123456789">Kinh doanh 1</a>
                                            <br>
                                            <a style="color: #f00" href="tel:0123456789">0123456789</a>
                                        </div>
                                        <a href="mailto:vhkb1708@gmail.com">&emsp;vhkb1708@gmail.com</a>
                                    </div>
                                </div>
                                <div class="col-5">
                                    <img src="/images/2.png" alt="" height="60">
                                </div>
                            </div>
                        </div>
                        <br><br>
                    </div>
                </div>
            </div>
            <br><br>
            <div class="row border">
                <div class="panel panel-default">
                    <div class="panel-heading"><h4>Sản phẩm bán chạy</h4></div>
                    <div class="panel-body">
                        <div class="container">
                            <div class="thumbnail">
                                <div class="row">
                                    <div class="col-4">
                                        <a href="#" title="Đầu lọc thuốc lá cuốn OCB Virgin Filter Slim 150">
                                            <img src="/images/6.jpg"
                                                 alt="Đầu lọc thuốc lá cuốn OCB Virgin Filter Slim 150" height="80px"
                                                 style="margin-left: 10%">
                                        </a>
                                    </div>
                                    <div class="col-8">
                                        <a class="text-bold" href="#"
                                           title="Đầu lọc thuốc lá cuốn OCB Virgin Filter Slim 150">Đầu lọc thuốc lá
                                            cuốn OCB Virgin</a>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <div style="padding: 5px 0;">
                                                <span class="money">
                                                    "80.000"
                                                    <sup>đ</sup>
                                                </span>
                                        </div>
                                        <div class="text-center">
                                            <a class="btn btn-success" href="#"><i class="far fa-eye"></i></a>
                                            <a class="btn btn-info" href="#"><i class="fa fa-shopping-cart"></i>Đặt
                                                Hàng</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="thumbnail">
                                <div class="row">
                                    <div class="col-4">
                                        <a href="#" title="Đầu lọc thuốc lá cuốn OCB Virgin Filter Slim 150">
                                            <img src="/images/6.jpg"
                                                 alt="Đầu lọc thuốc lá cuốn OCB Virgin Filter Slim 150" height="80px"
                                                 style="margin-left: 10%">
                                        </a>
                                    </div>
                                    <div class="col-8">
                                        <a class="text-bold" href="#"
                                           title="Đầu lọc thuốc lá cuốn OCB Virgin Filter Slim 150">Đầu lọc thuốc lá
                                            cuốn OCB Virgin</a>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <div style="padding: 5px 0;">
                                                <span class="money">
                                                    "80.000"
                                                    <sup>đ</sup>
                                                </span>
                                        </div>
                                        <div class="text-center">
                                            <a class="btn btn-success" href="#"><i class="far fa-eye"></i></a>
                                            <a class="btn btn-info" href="#"><i class="fa fa-shopping-cart"></i>Đặt
                                                Hàng</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="thumbnail">
                                <div class="row">
                                    <div class="col-4">
                                        <a href="#" title="Đầu lọc thuốc lá cuốn OCB Virgin Filter Slim 150">
                                            <img src="/images/6.jpg"
                                                 alt="Đầu lọc thuốc lá cuốn OCB Virgin Filter Slim 150" height="80px"
                                                 style="margin-left: 10%">
                                        </a>
                                    </div>
                                    <div class="col-8">
                                        <a class="text-bold" href="#"
                                           title="Đầu lọc thuốc lá cuốn OCB Virgin Filter Slim 150">Đầu lọc thuốc lá
                                            cuốn OCB Virgin</a>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <div style="padding: 5px 0;">
                                                <span class="money">
                                                    "80.000"
                                                    <sup>đ</sup>
                                                </span>
                                        </div>
                                        <div class="text-center">
                                            <a class="btn btn-success" href="#"><i class="far fa-eye"></i></a>
                                            <a class="btn btn-info" href="#"><i class="fa fa-shopping-cart"></i>Đặt
                                                Hàng</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="thumbnail">
                                <div class="row">
                                    <div class="col-4">
                                        <a href="#" title="Đầu lọc thuốc lá cuốn OCB Virgin Filter Slim 150">
                                            <img src="/images/6.jpg"
                                                 alt="Đầu lọc thuốc lá cuốn OCB Virgin Filter Slim 150" height="80px"
                                                 style="margin-left: 10%">
                                        </a>
                                    </div>
                                    <div class="col-8">
                                        <a class="text-bold" href="#"
                                           title="Đầu lọc thuốc lá cuốn OCB Virgin Filter Slim 150">Đầu lọc thuốc lá
                                            cuốn OCB Virgin</a>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <div style="padding: 5px 0;">
                                                <span class="money">
                                                    "80.000"
                                                    <sup>đ</sup>
                                                </span>
                                        </div>
                                        <div class="text-center">
                                            <a class="btn btn-success" href="#"><i class="far fa-eye"></i></a>
                                            <a class="btn btn-info" href="#"><i class="fa fa-shopping-cart"></i>Đặt
                                                Hàng</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <br>
            <div class="row border">
                <div class="panel panel-default">
                    <div class="panel-heading"><h4>Thống kê truy cập</h4></div>
                    <div class="panel-body">
                        <div class="row justify-content-between">
                            <div class="col-12 d-flex justify-content-between">
                                <div>
                                    <i class="fa fa-bolt fa-lg fa-horizon pl-4"></i>
                                    <span>Đang truy cập</span>
                                </div>
                                <span class="pr-3">4</span>
                            </div>
                        </div>
                        <div class="row justify-content-between">
                            <div class="col-12 d-flex justify-content-between">
                                <div>
                                    <i class="fa fa-user fa-lg fa-horizon pl-4"></i>
                                    <span>Thành viên online</span>
                                </div>
                                <span class="pr-3">1</span>
                            </div>
                        </div>
                        <div class="row justify-content-between">
                            <div class="col-12 d-flex justify-content-between">
                                <div>
                                    <i class="fa fa-magic fa-lg fa-horizon pl-4"></i>
                                    <span>Khách viếng thăm</span>
                                </div>
                                <span class="pr-3">6</span>
                            </div>
                        </div>
                        <div class="row justify-content-between">
                            <div class="col-12 d-flex justify-content-between">
                                <div>
                                    <i class="fa fa-bullseye fa-lg fa-horizon pl-4"></i>
                                    <span>Hôm nay</span>
                                </div>
                                <span class="pr-3">610</span>
                            </div>
                        </div>
                        <div class="row justify-content-between">
                            <div class="col-12 d-flex justify-content-between">
                                <div>
                                    <i class="fa fa-filter fa-lg fa-horizon pl-4"></i>
                                    <span>Tháng hiện tại</span>
                                </div>
                                <span class="pr-3">42,414</span>
                            </div>

                        </div>
                        <div class="row">
                            <div class="col-12 d-flex justify-content-between">
                                <div>
                                    <i class="far fa-calendar fa-lg fa-horizon pl-4"></i>
                                    <span>Tổng lượt truy cập</span>
                                </div>
                                <span class="pr-3">1,046,406</span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 d-flex justify-content-between">
                                <div>
                                    <i class="fa fa-bars fa-lg fa-horizon pl-4"></i>
                                    <span>Tổng lượt truy cập</span>
                                </div>
                                <span class="pr-3">1,046,406</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-9">
            <div class="container-fluid">
                <div class="row">
                    @yield('contentOne')
                </div>
            </div>
        </div>
    </div>
    <!--Contact-->
    <div class="container-fluid padding">
        <div class="row text-center padding">
            <div class="col-12">
                <h2>Contact us</h2>
            </div>
            <div class="col-12 social padding">
                <a href="#"><i class="fab fa-instagram"></i></a>&ensp;
                <a href="#"><i class="fab fa-facebook-f"></i></a>&ensp;
                <a href="#"><i class="fab fa-google-plus-g"></i></a>&ensp;
                <a href="#"><i class="fab fa-twitter"></i></a>
                <p>Tổng đài hỗ trợ luôn trực 24/24</p>
                <p>1900 8888 </p>
            </div>
        </div>
    </div>
    <!-- Footer -->
    <footer>
        <div class="container-fluid">
            <div class="row pt-3">
                <div class="col-md-2"></div>
                <div class="col-md-4">
                    <h3>Store info</h3>
                    <p>091 234 5678</p>
                    <p>thiendia69@gmail.com</p>
                    <p>69 Tran Duy Hung, Hanoi, VietNam</p>
                </div>
                <div class="col-md-2"></div>
                <div class="col-md-4 pr-3">
                    <h3>Woking time</h3>
                    <p>Monday-Friday:11am-10pm</p>
                    <p>Weekend: 24/24h</p>
                    <p>Nghỉ các ngày lễ lớn</p>
                </div>
            </div>
        </div>
    </footer>
    <!-- Footer -->
</div>
<script type="text/javascript" src="/js/javascript.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
<script>

</script>
</body>
<script type="text/javascript" src="/js/javascript.js"></script>
</html>
