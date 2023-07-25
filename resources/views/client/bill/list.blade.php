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
                                        <td class="" style="">
                                            @if ($order->status == 'pending')
                                                <span class="badge bg-warning">Đang chờ</span>
                                            @endif
                                            @if ($order->status == 'processing')
                                                <span class="badge bg-info">Đang xử lý</span>
                                            @endif
                                            @if ($order->status == 'completed')
                                                <span class="badge bg-success">Đã hoàn thành</span>
                                            @endif
                                            @if ($order->status == 'cancelled')
                                                <span class="badge bg-danger">Đã hủy</span>
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{ route('bill.show', $order->id) }}"><i class="fa-solid fa-eye "
                                                    style="color: #1764e8; font-size: 20px;margin-left: 10px"></i></a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        @endsection
