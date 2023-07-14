@extends('client.layouts.app')
@section('title', 'Thanh Toán')
@section('css_header_custom')
    <style>
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }

            .custom-border {
                border: 2px solid transparent;
                transition: border-color 0.2s;
            }

            .custom-border.active {
                border-color: #0d6efd;
                border-radius: 5px;

            }
        }
    </style>
@endsection
@section('content')
    @php
        $oder_total_price = 0;
    @endphp
    <div class="container py-5">
        <main>
            <form action="{{ route('oder.store') }}" method="POST">
                @csrf
                <input type="hidden" value="" id="contact_information" name="contact_information">
                <div class="row g-5 ">
                    <div class="col-md-5 col-lg-4 order-md-last">
                        <h4 class="d-flex justify-content-between align-items-center mb-3">
                            <span class="text-primary">Giỏ hàng</span>
                            <span class="badge bg-primary rounded-pill">{{ $product_cart->count() }}</span>
                        </h4>

                        <ul class="list-group mb-3">
                            @foreach ($product_cart as $item)
                                <li class="list-group-item d-flex justify-content-between lh-sm ">
                                    <div class="">
                                        @php
                                            $oder_total_price += $item->total_price;
                                        @endphp
                                        <h6 class="my-0">{{ $item->product->name }}</h6>
                                        <small class="text-muted">Color:
                                            @foreach ($item->product->colors as $color)
                                                @if ($color->id == $item->color_id)
                                                    {{ $color->name }}
                                                @endif
                                            @endforeach
                                        </small>
                                        <br>
                                        <small class="text-muted">Số lượng: {{ $item->quantity }}</small>
                                    </div>
                                    <span class="text-muted">{{ $item->total_price }}</span>
                                </li>
                            @endforeach
                            {{-- <li class="list-group-item d-flex justify-content-between bg-light">
                            <div class="text-success">
                                <h6 class="my-0">Promo code</h6>
                                <small>EXAMPLECODE</small>
                            </div>
                            <span class="text-success">−$5</span>
                        </li> --}}
                            <li class="list-group-item d-flex justify-content-between">
                                <span>Total (USD)</span>
                                <strong class="total_price_oder">{{ $oder_total_price }}</strong>
                            </li>
                        </ul>
                    </div>
                    <div class="col-md-7 col-lg-8">
                        <h4 class="mb-3">Địa chỉ đơn hàng</h4>
                        <div class="row gx-4 gx-lg-5 align-items-center">
                            <span>Thêm địa chỉ: </span>
                            <a href="{{ route('address') }}">
                                <i class="fa-sharp fa-solid fa-address-card"style="font-size: 50px"></i></a>
                        </div>
                        <div class="row gx-4 gx-lg-5 align-items-center">
                            @foreach ($user_address->addresses as $item)
                                <div class="py-3">
                                    <div class="card">
                                        <div class="card-body custom-border" onclick="toggleActive(this)">
                                            <h4 class="card-title">Tên: {{ $item->name }}</h4>
                                            <span class="card-text ">Địa chỉ: {{ $item->address }}</span>
                                            <p class="card-text pt-2">Số điện thoại: {{ $item->phone }}</p>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <hr class="my-4">
                        <h4 class="mb-3">Phương thức thanh toán</h4>
                        <div class="my-3">
                            @foreach ($payment_method as $item)
                                <div class="form-check">
                                    <input id="credit" name="paymentMethod" type="radio" class="form-check-input"
                                        value="{{ $item->id }}" checked required>
                                    <label class="form-check-label" for="credit">{{ $item->type }}</label>
                                </div>
                            @endforeach
                        </div>
                        <input type="hidden" value="{{ $oder_total_price }}" id="total_amount" name="total_amount">
                        <hr class="my-4">
                        <button class="w-100 btn btn-primary btn-lg" type="submit">Thanh toán</button>
                    </div>
                </div>
            </form>
        </main>
    </div>
@endsection
@section('js_footer_custom')
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script>
        let activeElement = null;
        // Hàm để thêm/xóa lớp 'active' khi nhấp vào div
        function toggleActive(element) {
            if (activeElement !== null) {
                activeElement.classList.remove('active');
            }
            element.classList.add('active');
            activeElement = element;
            var activeDiv = document.querySelector('.custom-border.active');
            var name = activeDiv.querySelector('h4').innerText;
            var address = activeDiv.querySelector('span').innerText;
            var phone = activeDiv.querySelector('p').innerText;
            var contact_information = document.getElementById('contact_information');
            contact_information.value = name + ', ' + address + ', ' + phone;
        }
    </script>
@endsection
