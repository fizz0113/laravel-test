@extends('adminlte::page')

{{-- @section('title', 'Laravel Test') --}}

@section('content_header')
    <h1>商品列表</h1>
@stop

@section('content')
<style>
    div img {
        width:100%;
        height:100%;
    }
</style>
<div class="row">
    @foreach ($products as $product)
    <div class="col-md-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-aqua">
            <div class="inner" style="height:300px;text-align:center;">
                <img src="data:image/jpeg;base64,
                @if($product["img"]==null || $product["img"] == '') iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAQAAAC1HAwCAAAAC0lEQVR42mP8/x8AAwMCAO+ip1sAAAAASUVORK5CYII=
                @else
                {{ $product["img"] }}
                @endif
                " >
            </div>
            <a href="{{ route('home', $product["id"]) }}" class="small-box-footer" style="color:white;">
                <div class="col-md-12">
                    <p style="overflow: hidden; white-space: nowrap; text-overflow: ellipsis; -webkit-line-clamp: 1;">{{ $product["name"] }}</p>
                </div>
                購買 <i class="fa fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <!-- ./col -->
    @endforeach
</div>
@stop
