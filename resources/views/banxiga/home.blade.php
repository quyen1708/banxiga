@extends('banxiga.layout')
@section('contentOne')
{{--    @if (Session::has('message'))--}}
{{--        <div class="alert alert-success">{{ Session::get('message') }}</div>--}}
{{--    @endif--}}
        @foreach ($products as $item)
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
                            <div class="card-body" style="height: 260px">
                                <h4 class="card-title">{{ $ele->name }}</h4>
                                <p class="card-text">{{ number_format($ele->price) }}đ</p>
                                <div style="position: absolute; bottom: 20px">
                                    <a onclick="handleCLickBuyNow({{$ele->id}})" href="javascript:" class="btn btn-primary">
                                        <span>Mua ngay</span>
                                    </a>
                                    <a type="button" onclick="handleCLickAddCart({{$ele->id}})" href="javascript:" class="btn btn-outline-info ml-3"> <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                                        <span>Add to card</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
            @endforeach
            </div>
        @endforeach
@endsection

<script>
    window.onload = function() {
        var message = "<?php echo Session::get('message') ?>";
        console.log(message);
        if(message) {
            alert(message);
        }
    }
</script>
