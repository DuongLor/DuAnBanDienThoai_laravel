@extends('admin.layouts.app')
@section('title', 'Admin - Đơn hàng ')
@section('content')
    <table class="table table-hover table-dark table-bordered">
        <thead>
            <tr>
                <th scope="col" class="text-center font-weight-bold">STT</th>
                <th scope="col" class="text-center font-weight-bold">Thông tin liên lạc</th>
                <th scope="col" class="text-center font-weight-bold">Phương thức thanh toán</th>
                <th scope="col" class="text-center font-weight-bold">Ngày đặt</th>
                <th scope="col" class="text-center font-weight-bold">Tổng tiền</th>
                <th scope="col" class="text-center font-weight-bold">Trạng thái</th>
                <th scope="col" class="text-center font-weight-bold">Hành động</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($Orders as $key => $Order)
                <tr class="table-light">
                    <th scope="row">{{ $key + 1 }}</th>
                    <td>{{ $Order->contact_information }}</td>
                    <td>{{ $Order->paymentMethod->type }}</td>
                    <td>{{ $Order->order_date }}</td>
                    <td>{{ $Order->total_amount }}</td>
                    <td class="" style="">
                        @if ($Order->status == 'pending')
                            <span class="badge bg-warning">Đang chờ</span>
                        @endif
                        @if ($Order->status == 'processing')
                            <span class="badge bg-info">Đang xử lý</span>
                        @endif
                        @if ($Order->status == 'completed')
                            <span class="badge bg-success">Đã hoàn thành</span>
                        @endif
                        @if ($Order->status == 'cancelled')
                            <span class="badge bg-danger">Đã hủy</span>
                        @endif
                    </td>
                    <td class="text-center">
                        <a href="{{ route('adminOrder.edit', $Order->id) }}" class="btn btn-info"><i
                                class="fa-solid fa-pen-to-square"></i></a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
