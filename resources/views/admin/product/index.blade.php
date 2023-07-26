@extends('admin.layouts.app')
@section('title', 'Admin - Sản phẩm ')
@section('content')
    <a href="{{ route('adminProduct.create') }}" class="btn btn-primary">
        Thêm Sản phẩm <i class="fa-solid fa-plus"></i></a>
    <br>
    <br>
    <table class="table table-hover table-dark table-bordered">
        <thead>
            <tr>
                <th scope="col" class="text-center font-weight-bold">STT</th>
                <th scope="col" class="text-center font-weight-bold">Tên</th>
                <th scope="col" class="text-center font-weight-bold">Hãng</th>
                <th scope="col" class="text-center font-weight-bold">Ảnh</th>
                <th scope="col" class="text-center font-weight-bold">Nội dung</th>
                <th scope="col" class="text-center font-weight-bold">Trạng thái</th>
                <th scope="col" class="text-center font-weight-bold">Hành động</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($Products as $key => $Product)
                <tr class="table-light">
                    <th scope="row" class="text-center">{{ $key + 1 }}</th>
                    <td class="text-center">{{ $Product->name }}</td>
                    <td class="text-center">{{ $Product->brand->name }}</td>
                    <td class=" d-flex justify-content-center"><img src="{{ $Product->thumbnail }}" alt=""
                            width="100px">
                    </td>
                    <td class="text-center">{{ $Product->description }}</td>
                    <td class="text-center">
                        @if ($Product->is_active == 0)
                            <span class="badge bg-warning">Đang chờ</span>
                        @elseif($Product->is_active == 1)
                            <span class="badge bg-success">Đã hoàn thành</span>
                        @elseif($Product->is_active == 2)
                            <span class="badge bg-danger">Từ chối</span>
                        @endif
                    </td>
                    <td class="text-center">
                        <a href="{{ route('adminProduct.edit', $Product->id) }}" class="btn btn-info"><i
                                class="fa-solid fa-pen-to-square"></i></a>
                        <a href="{{ route('adminProduct.delete', $Product->id) }}" class="btn btn-danger">
                            <i class="fa-solid fa-trash"></i></a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
