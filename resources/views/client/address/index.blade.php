@extends('client.layouts.app')
@section('title', 'Thông tin liên hệ')
@section('content')
    <div class="container px-4 px-lg-5 py-5">
        <div class="justify-content-between d-flex py-2">
            <h1 class="">Thông tin liên hệ</h1>
        </div>
        <div class="py-3">
            <a href="{{ route('address.create') }}" class="btn btn-primary align-items-center ">Thêm thông tin liên hệ</a>
        </div>
        <div class="row gx-4 gx-lg-5 align-items-center">
            @foreach ($addresses as $item)
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Tên: {{ $item->name }}</h4>
                            <p class="card-text">Địa chỉ: {{ $item->address }}</p>
                            <p class="card-text">Số điện thoại: {{ $item->phone }}</p>
                            <a href="{{ route('address.edit', $item->id) }}" class="card-link">Sửa</a>
                            <a href="{{ route('address.destroy', $item->id) }}" class="card-link">Xóa</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
