@extends('admin.layouts.app')
@section('title', 'Admin - Sản phẩm ')
@section('content')
    <form action="{{ route('adminProduct.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="card mb-3">
            <div class="card-body">
                <div class="form-group pb-2 align-items-center">
                    <label class="mr-2 mb-2"><i class="fas fa-pen"></i> Tên Sản phẩm</label>
                    <input type="text" class="form-control" placeholder="Nhập tên" name="name">
                </div>
            </div>
            <div class="card-body">
                <div class="form-group pb-2 align-items-center">
                    <label class="mr-2 mb-2"><i class="fas fa-pen"></i> Hãng</label>
                    <select name="brand_id" id="" class="form-control">
                        @foreach ($Brands as $brand)
                            <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="card-body">
                <div class="form-group pb-2 align-items-center">
                    <label class="mr-2 mb-2"><i class="fas fa-pen"></i> Nội dung</label>
                    <input type="text" class="form-control" placeholder="Nhập nội dung" name="description">
                </div>
            </div>
        </div>
        <div class="form-group">
            <label>Ảnh</label>
            <input type="file" name="thumbnail" class="form-control" id="image">
        </div>
        <div id="preview">
        </div>
        <hr>
        <button type="submit" class="btn btn-success btn-block">Thêm</button>
    </form>
@endsection
@section('js_footer_custom')
    <script>
        // Lấy input element
        let imgInput = document.getElementById('image');
        // Lắng nghe sự kiện thay đổi
        imgInput.addEventListener('change', function() {
            // Lấy file đã chọn
            let file = imgInput.files[0];
            // Tạo đối tượng DOM cho img
            let img = document.createElement('img');
            // Hiển thị ảnh preview
            img.src = URL.createObjectURL(file);
            // Thêm vào div preview
            document.getElementById('preview').appendChild(img);
        });
    </script>
@endsection
