@extends('adminlte::page')

{{-- @section('title', 'Laravel Test') --}}

@section('content_header')
    <h1>出售紀錄</h1>
@stop

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">您的出售列表 (每次10筆)</h3>
                <ul class="pagination pagination-sm no-margin pull-right">
                    <li><a class="btn  @if($rk-1<0) disabled @endif " href="{{ route('sale.record', ($rk-1) < 0 ? 0 : ($rk-1) ) }}">«</a></li>
                    <li><a class="btn  @if(count($record)<10) disabled @endif " href="{{ route('sale.record', $rk+1 ) }}">»</a></li>
                </ul>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <table class="table table-bordered">
                <tbody>
                <tr>
                    <th>單號</th>
                    <th>買家編號</th>
                    <th>商品編號</th>
                    <th>商品名稱</th>
                    <th>商品價錢</th>
                </tr>
                {{-- {{ dd($record) }} --}}
                @foreach($record as $item)
                <tr>
                    <td>{{ $item->id}}</td>
                    <td>{{ $item->user_id}}</td>
                    <td>{{ $item->product_id}}</td>
                    <td>{{ $item->name}}</td>
                    <td>$ {{ $item->price}}</td>
                </tr>
                @endforeach
                </tbody></table>
            </div>
            <!-- /.box-body -->
        </div>
    </div>
</div>


@stop
