@extends('admin.layouts.app')
@section('title', 'Admin - Hãng ')
@section('content')
    <form action="{{ route('adminProduct.update', $Product->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="card mb-3">
            <div class="card-body">
                <div class="form-group pb-2 align-items-center">
                    <label class="mr-2 mb-2"><i class="fas fa-pen"></i> Tên Sản phẩm</label>
                    <input type="text" class="form-control" placeholder="Nhập tên" name="name"
                        value="{{ $Product->name }}">
                </div>
            </div>
            <div class="card-body">
                <div class="form-group pb-2 align-items-center">
                    <label class="mr-2 mb-2"><i class="fas fa-pen"></i> Hãng</label>
                    <select name="brand_id" id="" class="form-control">
                        {{-- trả về default value band_id thẻ select --}}
                        @foreach ($Brands as $brand)
                            <option @if ($brand->id == $Product->brand_id) selected @endif value="{{ $brand->id }}">
                                {{ $brand->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="card-body">
                <div class="form-group pb-2 align-items-center">
                    <label class="mr-2 mb-2"><i class="fas fa-pen"></i> Nội dung</label>
                    <input type="text" class="form-control" placeholder="Nhập nội dung" name="description"
                        value="{{ $Product->description }}">
                </div>
            </div>
            <div class="card-body">
                <div class="form-group pb-2 align-items-center">
                    <label class="mr-2 mb-2"><i class="fas fa-pen"></i> Trạng thái</label>
                    <select name="is_active" id="" class="form-control">
                        <option @if ($Product->is_active == 1) selected @endif value="1">Đã hoàn thành</option>
                        <option @if ($Product->is_active == 0) selected @endif value="0">Đang chờ</option>
                        <option @if ($Product->is_active == 2) selected @endif value="2">Từ chối</option>
                    </select>
                </div>
            </div>
        </div>
        <div class="form-group">
            <label>Ảnh</label>
            <input type="file" name="thumbnail" class="form-control" id="image">
        </div>
        <div id="preview" class="my-2">
        </div>
        <div class="hienthi my-2" id="hienthi">
            <img src="{{ $Product->thumbnail }}" width="100px" alt="">
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
