@extends('admin.layouts.app')
@section('title', 'Admin - Màu ')
@section('content')
    <form action="{{ route('adminColor.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="card mb-3">
            <div class="card-body">
                <div class="form-group pb-2 align-items-center">
                    <label class="mr-2 mb-2"><i class="fas fa-pen"></i> Tên Màu</label>
                    <input type="text" class="form-control" placeholder="Nhập tên" name="name">
                </div>
            </div>
        </div>
        <hr>
        <button type="submit" class="btn btn-success btn-block">Thêm</button>
    </form>
@endsection
