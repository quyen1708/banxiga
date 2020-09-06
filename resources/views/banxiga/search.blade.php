@extends('banxiga.layout')
@section('contentOne')
    <div class="col-md-12">
        <hr>
        <h3>Tìm kiếm: </h3>
        <p>Tìm thấy {{$total}} sản phẩm:</p>
        <hr>
    </div>

    @if (\Session::has('alert'))
        <div class="alert alert-success">
            <ul>
                <li>{!! \Session::get('alert') !!}</li>
            </ul>
        </div>
    @endif

    @foreach ($products as $item)
                <div class="col-md-4">
                    <div class="card">
                        <div class="grid">
                            <figure class="effect-julia">
                                <img src="/{{ $item->images[0]->path }}" height="400px" alt=""/>
                                <figcaption>
                                    <a href="/detail/{{$item->id}}/{{\Str::slug($item->name)}}">View more</a>
                                </figcaption>
                            </figure>
                        </div>
                        <div class="card-body">
                            <h4 class="card-title">{{ $item->name }}</h4>
                            <p class="card-text">{{ number_format($item->price) }}đ</p>
                            <a onclick="handleCLickBuyNow({{$item->id}})" href="javascript:" class="btn btn-primary">
                                <span>Mua ngay</span>
                            </a>
                            <a onclick="handleCLickAddCart({{$item->id}})" href="javascript:" class="btn btn-outline-info ml-3"> <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                                <span>Add to card</span>
                            </a>
                        </div>
                    </div>
                </div>
    @endforeach
    <div class="col-12 ml-3">
        <br>
        {!! $products->appends(Request::except('page'))->render() !!}
    </div>

@endsection
