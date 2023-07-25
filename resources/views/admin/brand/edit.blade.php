@extends('admin.layouts.app')
@section('title', 'Admin - Hãng ')
@section('content')
    <form action="{{ route('adminBrand.update', $brand->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
				@method('PUT')
        <div class="card mb-3">
            <div class="card-body">
                <div class="form-group pb-2 align-items-center">
                    <label class="mr-2 mb-2"><i class="fas fa-pen"></i> Tên hãng</label>
                    <input type="text" class="form-control" placeholder="Nhập tên" name="name"
                        value="{{ $brand->name }}">
                </div>
            </div>
        </div>
        <div class="form-group">
            <label>Ảnh</label>
            <input type="file" name="logo" class="form-control" id="image">
        </div>
        <div id="preview" class="my-2">
        </div>
        <div class="hienthi my-2" id="hienthi">
            <img src="{{ $brand->logo }}" width="100px" alt="">
        </div>
        <hr>
        <button type="submit" class="btn btn-success btn-block">Thêm</button>
    </form>
@endsection
@section('js_footer_custom')
    <script>
        // Lấy input element
        let imgInput = document.getElementById('image');
				let hienthi = document.getElementById('hienthi');
        // Lắng nghe sự kiện thay đổi
        imgInput.addEventListener('change', function() {
            // Lấy file đã chọn
						hienthi.remove();
            let file = imgInput.files[0];
            // Tạo đối tượng DOM cho img
            let img = document.createElement('img');
            // Hiển thị ảnh preview
            img.src = URL.createObjectURL(file);
						img.style.width = '100px';

            // Thêm vào div preview
            document.getElementById('preview').appendChild(img);
						
        });
    </script>
@endsection
