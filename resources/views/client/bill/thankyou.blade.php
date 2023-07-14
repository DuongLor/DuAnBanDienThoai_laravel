@extends('client.layouts.app')
@section('title', 'Cảm ơn đã mua hàng')
@section('content')
    <div class="card py-5">
        <div class="card-body mx-4 my-5">
            <div class="container">
                <p class="my-5 " style="font-size: 30px;">Cảm ơn đã đặt hàng</p>
                <ul class="list-unstyled">
                    <li class="text-black">Tên người dùng: {{ Auth::user()->name }}</li>
                    <li class="text-black mt-1">Ngày đặt hàng: {{ $oder->order_date }}</li>
                </ul>
                <hr>
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Tên sản phẩm</th>
                                <th scope="col">Màu</th>
                                <th scope="col">Số lượng</th>
                                <th scope="col">Giá tiền</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($product_orders as $product_order)
                                <tr class="">
                                    <td scope="row">{{ $product_order->product->name }}</td>
                                    <td>
                                        @foreach ($product_order->product->colors as $color)
                                            @if ($color->id == $product_order->color_id)
                                                {{ $color->name }}
                                            @endif
                                        @endforeach
                                    </td>
																		<td>{{ $product_order->quantity }}</td>
																		<td>{{ $product_order->total_price }}</td>
                                </tr>
                            @endforeach
														<tr>
															<td colspan="4">
																Tổng: {{ $oder->total_amount }}
															</td>
														</tr>
                        </tbody>
                    </table>
                </div>
								<a href="{{ route('bill.list') }}" class="btn btn-primary">Trang đơn hàng</a>
            </div>
        </div>
    </div>
@endsection
