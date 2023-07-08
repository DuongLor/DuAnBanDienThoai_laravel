@extends('client.layouts.app')
@section('title', 'Sửa thông tin liên hệ')
@section('content')
    <div class="container px-4 px-lg-5 py-5">
        <h1>Sửa thông tin liên hệ</h1>
        <form action="{{ route('address.update', $address->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="" class="form-label">Tên</label>
                <input type="text" class="form-control" id="" aria-describedby="" name="name"
                    value="{{ $address->name }}">
                @error('name')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Địa chí</label>
                <input type="text" class="form-control" id="" aria-describedby="" name="address"
                    value="{{ $address->address }}">
                @error('address')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Số điện thoại</label>
                <input type="text" class="form-control" id="" name="phone" value="{{ $address->phone }}">
                @error('phone')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Cập nhật</button>
        </form>
    </div>
@endsection
