@extends('banxiga.layout')
@section('contentOne')

    @foreach ($products as $item)
        <br>
        <div class="col-md-12">
            <hr>
            <h2 class="pl-3">{{ $item->first()->category->name }}:</h2>
            <hr>
        </div>
        <div class="row padding">
            @foreach($item as $ele)
                <div class="col-md-4">
                    <div class="card">
                        <div class="grid">
                            <figure class="effect-julia">
                                <img src="/{{ $ele->images[0]->path }}" height="400px" alt=""/>
                                <figcaption>
                                    <a href="/detail/{{$ele->id}}/{{\Str::slug($ele->name)}}">View more</a>
                                </figcaption>
                            </figure>
                        </div>
                        <div class="card-body">
                            <h4 class="card-title">{{ $ele->name }}</h4>
                            <p class="card-text">{{ number_format($ele->price) }}đ</p>
                            <a onclick="handleCLickBuyNow({{$ele->id}})" href="javascript:" class="btn btn-primary">
                                <span>Mua ngay</span>
                            </a>
                            <a onclick="handleCLickAddCart({{$ele->id}})" href="javascript:" class="btn btn-outline-info ml-3"> <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                                <span class="badge badge-danger">0</span>
                                <span>Add to card</span>
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="col-12 ml-3">
            <br>
            {!! $item->appends(Request::except('page'))->render() !!}
        </div>
    @endforeach
@endsection

