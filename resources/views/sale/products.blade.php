@extends('adminlte::page')

{{-- @section('title', 'Laravel Test') --}}

@section('content_header')
    <h1>出售管理</h1>
    @foreach($errors->all() as $key => $value)
        <p style="color:red;">{{ $value }}</p>
    @endforeach
@stop

@section('content')
<div class="row">
    <div class="col-md-4">
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">新增商品</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" enctype="multipart/form-data" method="post" action="{{ route('sale.product.add') }}">
                {{ csrf_field() }}
                <div class="box-body">
                    <div class="form-group">
                        <label for="productName">商品名稱</label>
                        <input type="text" class="form-control" id="productName" name="productName" placeholder="輸入名稱">
                    </div>
                    <div class="form-group">
                        <label for="productPrice">商品價錢</label>
                        <input type="text" class="form-control" id="productPrice" name="productPrice" placeholder="輸入價錢">
                    </div>
                    <div class="form-group">
                        <label for="productImg">圖片</label>
                        <input type="file" id="productImg" name="productImg">
                    </div>
                </div>
                <!-- /.box-body -->

                <div class="box-footer">
                    <button type="submit" class="btn btn-default pull-right">新增</button>
                </div>
            </form>
        </div>
        <div class="box box-solid">
            <div class="box-header with-border">
                <h3 class="box-title">刪除商品</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" enctype="multipart/form-data" method="post" action="{{ route('sale.product.delete') }}">
                {{ csrf_field() }}
                <div class="box-body">
                    <div class="form-group">
                        <label for="productId">商品編號</label>
                        <input type="text" class="form-control" id="productId" name="productId" placeholder="輸入編號">
                    </div>
                </div>
                <!-- /.box-body -->

                <div class="box-footer">
                    <button type="submit" class="btn btn-default pull-right">刪除</button>
                </div>
            </form>
        </div>
    </div>
    <div class="col-md-8">
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">您的出售列表 (每次10筆)</h3>
                <ul class="pagination pagination-sm no-margin pull-right">
                    <li><a class="btn @if($rk-1<0) disabled @endif" href="{{ route('sale.products', ($rk-1) < 0 ? 0 : ($rk-1) ) }}">«</a></li>
                    <li><a class="btn @if(count($products)<10) disabled @endif" href="{{ route('sale.products', $rk+1 ) }}">»</a></li>
                </ul>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <table class="table table-bordered">
                <tbody><tr>
                    <th>商品編號</th>
                    <th>商品名稱</th>
                    <th>商品價錢</th>
                </tr>
                @foreach($products as $product)
                <tr>
                    <td>{{ $product['id'] }}</td>
                    <td>{{ $product['name'] }}</td>
                    <td>$ {{ $product['price'] }}</td>
                </tr>
                @endforeach
                </tbody></table>
            </div>
            <!-- /.box-body -->
        </div>
    </div>
</div>
@stop
