@extends('client.layouts.app')
@section('title', 'Các đơn đặt hàng')
@section('content')
    <div class="container py-5">
      <a href="{{ route('bill.list')}}" class="btn btn-primary">Trở về</a>
        <div class=" py-5">
            <div class="card-body mx-4 my-5">
                <div class="container">
                    <p class="my-5 " style="font-size: 30px;">Lịch sử đặt hàng</p>
                    <hr>
                    <div class="table-responsive">
                        <table class="table table-light">
                            <thead>
                                <tr>
                                    <th scope="col">STT</th>
                                    <th scope="col">Tên sản phẩm</th>
                                    <th scope="col">Giá</th>
                                    <th scope="col">Số lượng</th>
                                    <th scope="col">Thành tiền</th>
                                    <th scope="col">Màu sắc</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($product_orders as $key => $product_order)
                                    <tr>
                                        <th scope="row">{{ $key + 1 }}</th>
                                        <td>{{ $product_order->product->name }}</td>
                                        <td>{{ $product_order->unit_price }}</td>
                                        <td>{{ $product_order->quantity }}</td>
                                        <td>{{ $product_order->total_price }}</td>
                                        <td>
                                            @foreach ($product_order->product->colors as $color)
                                                @if ($color->id == $product_order->color_id)
                                                    {{ $color->name }}
                                                @endif
                                            @endforeach
                                        </td>
                                       
                                    </tr>
                                
                                @endforeach
                                <tr>
                                  <td colspan="6" class="text-center">
                                    Tổng: {{ $order->total_amount }}
                                  </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        @endsection
