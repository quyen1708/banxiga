@extends('banxiga.layout')
@section('contentOne')

        <!-- Product Detail Page Start -->
            <div class="container-fluid">
                <div class="row">
                    <div class="col-5">
                        <div class="gallery-sample">
                            <a href="/{{ $products->images[0]->path }}" class="cloud-zoom" id="cloudZoom">
                                <img src="/{{ $products->images[0]->path }}" title="The Title" class="img-responsive" height="480px" width="480px">
                            </a>
                            <div class="recent_list">
                                @foreach($products->imagesdetail as $item)
                                <div class="photo_container">
                                    <a href="/{{ $item->path }}" rel="gallerySwitchOnMouseOver: true, popupWin:'/{{ $item->path }}', useZoom: 'cloudZoom', smallImage: '/{{ $item->path }}'" class="cloud-zoom-gallery">
                                        <img itemprop="image" src="/{{ $item->path }}" class="img-responsive aaaaa">
                                    </a>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="col-7">
                        <h3>{{ $products->name }}</h3>
                        <h5>{{ number_format($products->price) }}đ</h5>
                        <br>
                        {!! $products->description !!}
                        <a onclick="handleCLickAddCart({{$products->id}})" href="javascript:" class="addtocart btn-secondary"><i class="fas fa-heart"></i> Add to Cart</a>
                        <a onclick="handleCLickBuyNow({{$products->id}})" href="javascript:" class="buynow"><i class="fas fa-shopping-cart"></i> Buy Now</a>
                    </div>
                </div>
            </div>
        <script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>

        <!-- Product Detail Page End -->
@endsection

