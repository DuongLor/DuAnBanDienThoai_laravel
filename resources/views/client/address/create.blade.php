@extends('client.layouts.app')
@section('title', 'Thêm thông tin liên hệ')
@section('content')

    <div class="container px-4 px-lg-5 py-5">
        <div>
            <a href="{{ route('address') }}"><button class="btn btn-primary" type="button" data-bs-toggle="modal"
                    data-bs-target="#exampleModal">Quay lại</button></a>
        </div>
        <h1>Thêm thông tin liên hệ</h1>
        <form action="{{ route('address.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="" class="form-label">Tên</label>
                <input type="text" class="form-control" id="" aria-describedby="" name="name">
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Địa chí</label>
                <input type="text" class="form-control" id="" aria-describedby="" name="address">
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Số điện thoại</label>
                <input type="number" class="form-control" id="" name="phone">
            </div>
            <button type="submit" class="btn btn-primary">Thêm</button>
        </form>
    </div>
@endsection
