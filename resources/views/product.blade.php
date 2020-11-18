@extends('adminlte::page')

{{-- @section('title', 'Laravel Test') --}}

@section('content_header')
    <h1>商品</h1>
@stop

@section('content')
<style>
    div img {
        width:100%;
        height:100%;
    }
</style>

<div class="row">
    <div class="box box-solid box-default">
        <div class="box-body ">
            <div class="col-md-4">
                <div class="box box-solid box-default inner text-center" style="height:300px">
                    <img src="data:image/jpeg;base64,
                    @if($product["img"]==null || $product["img"] == '') iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAQAAAC1HAwCAAAAC0lEQVR42mP8/x8AAwMCAO+ip1sAAAAASUVORK5CYII=
                    @else
                    {{ $product["img"] }}
                    @endif
                    " >
                </div>
                <div class="small-box-footer">
                    <p></p>
                </div>
            </div>
            <div class="col-md-8 ">
                <div class="inner" style="height:300px;">

                    <h2 class="text-muted">書名 : {{ $product['name'] }}</h2>
                    <p class="text-muted">賣家 : {{ $product['user_id'] }}</p>
                    <h1 class="text-muted">$ {{ $product['price'] }}</h1>
                    <p></p>
                </div>
                <form role="form" method="post" action="{{ route('buy.order.add') }}">
                    {{ csrf_field() }}
                    <input type="hidden" name="productId" value="{{ $product['id'] }}">
                    <button type="submit" class="btn btn-default btn-lg pull-right "><b>購買</b></button>
                </form>
                </div>
            </div>
        </div>
        <!-- /.box-body -->
    </div>
    <!-- /.box -->
</div>

@stop
