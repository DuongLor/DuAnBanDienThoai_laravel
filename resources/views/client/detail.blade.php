@extends('client.layouts.app')
@section('title', 'Chi tiết sản phẩm')
@section('content')
    <!-- Product section-->
    <section class="py-5">
        <div class="container px-4 px-lg-5 my-5">
            <div class="row gx-4 gx-lg-5 align-items-center">
                <div class="col-md-6">
                    @if ($product->images->count())
                        <div id="carouselExampleIndicators" class="carousel slide mb-4" data-bs-ride="true">
                            <div class="carousel-inner">
                                @foreach ($product_images as $key => $item)
                                    <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
                                        <img src="{{ $item->image }}" class="d-block w-100 object-fit-cover"
                                            style="max-height: 600px" alt="...">
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
                    @else
                        {{-- Các câu lệnh khác --}}
                        <div class="carousel-inner">
                            <div class="carousel mb-4 ">
                                <img src="{{ $product->thumbnail }}" class="d-block w-100 object-fit-cover"
                                    style="max-height: 600px" alt="...">
                            </div>
                        </div>

                    @endif

                </div>
                <div class="col-md-6">
                    <form action="{{ route('cart.store') }}" method="POST">
                        @csrf
                        <input type="text" name="product_id" id="" hidden value="{{ $product->id }}">
                        <div class="small mb-1">Mã:{{ $product->id }}</div>
                        <h1 class="display-5 fw-bolder">{{ $product->name }}</h1>
                        <div class="mb-3">
                            <div class="fs-4">Chọn Màu</div>
                            <div class="row row-cols-3 mt-3">
                                @foreach ($colors as $color)
                                    <div class="form-check col">
                                        <input type="hidden" name="discount" value="{{ $color->pivot->discount }}">
                                        <input type="hidden" name="unit_price" value="{{ $color->pivot->price }}">
                                        <input class="form-check-input" type="radio" required value="{{ $color->id }}"
                                            name="color_id" id="">
                                        <input type="hidden" name="quantitys" value="{{ $color->pivot->quantity }}">
                                        <label class="form-check-label" for="">
                                            {{ $color->name }} | {{ $color->pivot->quantity }}
                                        </label>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="fs-5 mb-3">
                            <span class="text-decoration-line-through"></span>
                            <span id="price"></span>
                        </div>
                        <p class=" mb-3">
                        <h3>Thông số</h3>
                        @foreach ($specifications as $specification)
                            <p> {{ $specification->name }}: {{ $specification->value }}</p>
                        @endforeach
                        </p>
                        <p class=" mb-3 d-flex ">
                            <strong>Hãng</strong>: {{ $brand->name }}
                        </p>
                        <div class="d-flex">
                            <input class="form-control text-center me-3" id="inputQuantity" type="number" value="1"
                                min="1" style="max-width: 3rem" name="quantity" />
                            <button class="btn btn-outline-dark flex-shrink-0" type="submit">
                                <i class="fa-solid fa-cart-shopping fa-bounce me-1"></i>
                                Mua sản phẩm
                            </button>
                        </div>
                    </form>
                </div>
                <div class="col-12">
                    <hr class="my-4">
                    <h3>Bình luận</h3>
                    <div class="row d-flex">
                        <div class="col-10 ">
                            <div class="card mb-3">
                                <div class="card-body" id="review">
                                    @foreach ($reviews as $review)
                                        <div id="review-{{ $review->id }}" class="mb-2 d-flex flex-start">
                                            <img class="rounded-circle shadow-1-strong me-3"
                                                src="https://mdbcdn.b-cdn.net/img/Photos/Avatars/img%20(26).webp"
                                                alt="avatar" width="40" height="40" />
                                            <div class="w-100">
                                                <div class="row  mb-3">
                                                    <h6 class="text-primary fw-bold mb-0 col-10">
                                                        {{ $review->user->name }}
                                                        <span class="text-dark ms-2">{{ $review->comment }}</span>
                                                    </h6>
                                                    <div class="col-2">
                                                        <p class="mb-0">
                                                            {{ $review->created_at->diffForHumans() }}</p>
                                                    </div>
                                                </div>
                                                <div class="d-flex justify-content-between align-items-center">

                                                    <div class="d-flex flex-row">
                                                        @for ($i = 1; $i <= 5; $i++)
                                                            @if ($i <= $review->rating)
                                                                <i class="fa-solid fa-star text-warning me-1"></i>
                                                            @else
                                                                <i class="fa-regular fa-star me-1"></i>
                                                            @endif
                                                        @endfor
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach

                                </div>
                            </div>
                        </div>

                        @if (Auth::check() && $hasPurchased == true && $reviewed == false)
                            <form method="POST" action="{{ route('review.store') }}">
                                @csrf
                                {{-- error --}}
                                @if ($errors->any())
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
                                <input type="hidden" name="product_id" value="{{ $product->id }}">
                                <h3 class="mb-3">Bình luận</h3>
                                <div class="mb-3">
                                    <label class="form-label" for="">Đánh giá</label>
                                    <div class="rating">
                                        <span class="star" data-value="1"><i class="fa-regular fa-star "></i></span>
                                        <span class="star" data-value="2"><i class="fa-regular fa-star "></i></span>
                                        <span class="star" data-value="3"><i class="fa-regular fa-star "></i></span>
                                        <span class="star" data-value="4"><i class="fa-regular fa-star "></i></span>
                                        <span class="star" data-value="5"><i class="fa-regular fa-star "></i></span>
                                    </div>
                                    <input type="hidden" name="rating" id="ratingInput" value="">
                                </div>

                                <div class="mb-3">
                                    <label for="exampleFormControlTextarea1" class="form-label">Nội
                                        dung</label>
                                    <textarea class="form-control" id="exampleFormControlTextarea1" name="comment" rows="3"></textarea>
                                </div>
                                <button type="submit" class="btn btn-primary">Đánh giá</button>
                            </form>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Related items section-->
    <section class="py-5 bg-light">
        <div class="container px-4 px-lg-5 mt-5">
            <h2 class="fw-bolder mb-4">Sản phẩm liên quan</h2>
            <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4">
                @foreach ($related as $product)
                    <div class="col mb-5">
                        @include('client.components.product_card', ['product' => $product])
                    </div>
                @endforeach


            </div>
        </div>
    </section>
@endsection
@section('js_footer_custom')
    <script>
        // Lấy các radio button
        var colorRadios = document.querySelectorAll('input[name="color"]');
        var inputQuantity = document.getElementById('inputQuantity');
        // Lặp qua từng radio button
        colorRadios.forEach(function(radio) {
            // Đặt sự kiện thay đổi cho từng radio button
            radio.addEventListener('change', function() {
                // Kiểm tra radio button được chọn
                if (this.checked) {
                    var price = this.previousElementSibling.value;
                    var discount = this.parentElement.querySelector('input[name="discount"]').value;
                    var quantity = this.parentElement.querySelector('input[name="quantitys"]').value;
                    // set max for input tag inputQuantity
                    inputQuantity.setAttribute('max', quantity);
                    if (discount) {
                        document.getElementById('price').previousElementSibling.innerText = price;
                        document.getElementById('price').innerText = 'Giá: ' + discount + ' VND';
                    } else {
                        document.getElementById('price').innerText = 'Giá: ' + price + ' VND';
                        document.getElementById('price').previousElementSibling.innerText = '';
                    }
                }
            });
        });
        const stars = document.querySelectorAll('.star');
        const ratingInput = document.getElementById('ratingInput');

        stars.forEach(star => {
            star.addEventListener('click', () => {
                const value = star.getAttribute('data-value');
                ratingInput.value = value;
                highlightStars(value);
            });
        });

        function highlightStars(value) {
            stars.forEach(star => {
                const starValue = star.getAttribute('data-value');
                if (starValue <= value) {
                    star.querySelector('i').classList.add('text-warning');
                    star.querySelector('i').classList.remove('fa-regular');
                    star.querySelector('i').classList.add('fa-solid');
                } else {
                    star.querySelector('i').classList.remove('text-warning');
                    star.querySelector('i').classList.add('fa-regular');
                    star.querySelector('i').classList.remove('fa-solid');
                }
            });
        }
    </script>

@endsection
