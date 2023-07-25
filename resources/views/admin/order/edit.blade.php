@extends('admin.layouts.app')
@section('title', 'Admin - Trạng thái ')
@section('content')
    <form action="{{ route('adminOrder.update', $Order->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="card mb-3">
            <div class="card-body">
                <div class="form-group pb-2 align-items-center">
                    <label class="mr-2 mb-2"><i class="fas fa-pen"></i> Trang thái</label>
										<select name="status" class="form-control" id="">
											<option value="pending">Đang chờ</option>	
											<option value="processing">Đang xử lý</option>
											<option value="completed">Đã hoàn thành</option>
											<option value="cancelled">Đã hủy</option>
										</select>
                </div>
            </div>
        </div>
        <hr>
        <button type="submit" class="btn btn-success btn-block">Thay đổi</button>
    </form>
@endsection
