@extends('client.layouts.app')
@section('title', 'Trang chủ')
@section('css_header_custom')
    <style>
        .product-card {
            display: flex;
            align-items: center;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            margin-bottom: 10px;
        }

        .product-card img {
            width: 100px;
            height: auto;
            margin-right: 10px;
        }

        .brand-card {
            margin-bottom: 20px;
        }

        .brand-card .card-header {
            background-color: #f8f9fa;
            border-bottom: none;
            font-weight: bold;
        }

        .brand-card .list-group-item {
            border: none;
            padding: 10px;
            background-color: #fff;
            border-radius: 0;
            box-shadow: 0px 2px 4px rgba(0, 0, 0, 0.1);
        }

        .brand-card .list-group-item:hover {
            box-shadow: 0px 2px 8px rgba(0, 0, 0, 0.2);
        }

        .brand-card .badge {
            font-size: 12px;
            padding: 5px 10px;
            border-radius: 20px;
        }

        .full-width-img-brand {
            width: 20px;
        }
    </style>
@endsection
@section('content')
    <!-- Header-->
    <header class="">
        <div id="carouselExampleIndicators" class="carousel slide mb-4" data-bs-ride="true">
            <div class="carousel-indicators">
                @foreach ($slides as $key => $item)
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="{{ $key }}"
                        class="{{ $key == 0 ? 'active' : '' }}" aria-current="{{ $key == 0 ? 'true' : 'false' }}"
                        aria-label="Slide {{ $key + 1 }}"></button>
                @endforeach
            </div>
            <div class="carousel-inner">
                @foreach ($slides as $key => $item)
                    <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
                        <a href="">
                            <img src="{{ $item->image }}" class="d-block w-100 object-fit-cover" style="max-height: 600px"
                                alt="...">
                            <div class="carousel-caption d-none d-md-block">
                                <h5>{{ $item->title }}</h5>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators"
                data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators"
                data-bs-slide="next">
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
                <div class="row">
                    <div class="col-md-12">
                        <div class="brand-card card">
                            <div class="card-header">
                                Thương hiệu
                            </div>
                            <div class="card-body ">
                                <div class="">
                                    <div class="">
                                        <div class="list-group">
                                            @foreach ($brands as $brand)
                                                {{-- logo brand --}}
                                                <a href="#" class="list-group-item d-flex align-items-center ">
                                                    <img src="{{ $brand->logo }}" alt=""
                                                        class="full-width-img-brand">
                                                    <span class="px-3">{{ $brand->name }}</span>
                                                </a>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="pb-5 ">
                <h1>Danh sách sản phẩm mới</h1>
                <div class="d-flex justify-content-between mb-4">
                    @foreach ($top_5_new_product as $product)
                        <div class="product-card">
                            <img class="" src="@foreach ($product->images as $item) {{ $item->image }} @endforeach"
                                alt="..." />
                            <span>{{ $product->name }}</span>
                        </div>
                    @endforeach
                </div>
            </div>
            <h2>Sản phẩm</h2>

            <div class=" row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 ">
                @foreach ($products as $product)
                    <div class="col mb-5">
                        @include('client.components.product_card', ['product' => $product])
                    </div>
                @endforeach
            </div>
        </div>
    </section>

@endsection
