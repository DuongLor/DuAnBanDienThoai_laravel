@extends('client.layouts.app')
@section('title', 'Các đơn đặt hàng')
@section('content')
    <div class="container py-5">
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
                                    <th scope="col">Thông tin liên lạc</th>
                                    <th scope="col">Phương thức thanh toán</th>
                                    <th scope="col">Ngày đặt</th>
                                    <th scope="col">Tổng tiền</th>
                                    <th scope="col">Trạng thái</th>
                                    <th scope="col">Hành động</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($orders as $key => $order)
                                    <tr>
                                        <th scope="row">{{ $key + 1 }}</th>
                                        <td>{{ $order->contact_information }}</td>
                                        <td>{{ $order->paymentMethod->type }}</td>
                                        <td>{{ $order->order_date }}</td>
                                        <td>{{ $order->total_amount }}</td>
                                        <td>{{ $order->status }}</td>
                                        <td>
                                            <a href="{{ route('bill.show', $order->id) }}">Xem</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        @endsection
