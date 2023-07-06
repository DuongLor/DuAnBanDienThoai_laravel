@extends('client.layouts.app')
@section('title', 'Trang chủ')
@section('css_header_custom')
<style>


</style>
@endsection
@section('content')
<!-- Header-->
<header class="">
    <div id="carouselExampleIndicators" class="carousel slide mb-4" data-bs-ride="true">
        <div class="carousel-indicators">
            @foreach ($slides as $key => $item)
            <button type="button" data-bs-target="#carouselExampleIndicators"
                data-bs-slide-to="{{ $key }}" class="{{ $key == 0 ? 'active' : '' }}"
                aria-current="{{ $key == 0 ? 'true' : 'false' }}"
                aria-label="Slide {{ $key + 1 }}"></button>
            @endforeach
        </div>
        <div class="carousel-inner">
            @foreach ($slides as $key => $item)
            <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
                <a href="">
                    <img src="{{ $item->image }}" class="d-block w-100 object-fit-cover"
                        style="max-height: 600px" alt="...">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>{{ $item->title }}</h5>
                    </div>
                </a>
            </div>
            @endforeach
        </div>
        <button class="carousel-control-prev" type="button"
            data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button"
            data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
</header>
<!-- Section-->
<section class="py-5">
    <div class="container px-4 px-lg-5 mt-5">
        {{-- hiện thị danh mục nằm ngang --}}
        <div class="pb-5">
            <h3 class="mb-5">Các sản phẩm thuộc thương hiệu</h3>
            <div class="row row-cols-md-6 gy-4 text-center">
                @foreach ($brands as $item)
                <a href="" class="col text-decoration-none">
                    {{-- img circle and title in bottom= --}}
                    <div class="d-flex flex-column  align-items-center gap-2">
                        <img src="{{ $item->logo }}" class="rounded" width="80" alt="..." />
                        <span class="text-muted">{{ $item->name }}</span>
                    </div>

                </a>
                @endforeach
            </div>
        </div>
        <div class="pb-5 ">
            <h1 class="mb-5">Danh sách sản phẩm mới</h1>
            <div class=" row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 ">
                @foreach ($top_5_new_product as $product)
                <div class="col mb-5">
                    @include('client.components.product_card', ['product' => $product])
                </div>
                @endforeach
            </div>
        </div>
        <h2>Sản phẩm</h2>
        <div class="position-relative">

            <div class=" overflow-auto w-100">
                <div class="scroll-container" id="scrollContainer">
                    @foreach ($chunkedProducts as $item)
                    <div class="list-group list-group-horizontal">
                        @foreach ($item as $product)
                        <div class="list-group-item border-0 px-2">
                            @include('client.components.product_card', ['product' =>
                            $product,'width' => '250px'])
                        </div>
                        @endforeach
                    </div>
                    @endforeach
                </div>
            </div>
            <!-- Nút cuộn sang trái -->
            <button class="btn btn-light rounded-circle position-absolute top-50 start-0"
                onclick="scrollToLeft(this)">&lt;</button>
            <!-- Nút cuộn sang phải -->
            <button class="btn btn-light rounded-circle position-absolute top-50 end-0"
                onclick="scrollToRight(this)">&gt;</button>
        </div>
    </div>
</section>
@endsection
@section('js_footer_custom')
<script>
    function scrollToLeft(button) {
        const container = button.previousElementSibling;
        container.scrollBy({ left: -400, behavior: "smooth" });
    }
    function scrollToRight(button) {
        const container = button.previousElementSibling.previousElementSibling;
        container.scrollBy({ left: 400, behavior: "smooth" });
    }
</script>
@endsection