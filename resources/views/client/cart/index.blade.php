@extends('client.layouts.app')
@section('title', 'Giỏ hàng')
@section('content')
    <section class="h-100 py-5" style="background-color: #eee;">
        <div class="container h-100 py-5">
            <div class="row d-flex justify-content-center align-items-center h-100 py-2">
                <div class="col-10">
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <h3 class="fw-normal mb-0 text-black">Giỏ hàng</h3>
                        <div>
                            <p class="mb-0"><span class="text-muted">sắp xếp</span> <a href="#!" class="text-body">giá
                                    <i class="fas fa-angle-down mt-1"></i></a></p>
                        </div>
                    </div>
                    <div class="card rounded-3 mb-4">
                        @foreach ($product_cart as $item)
                            <div class="card-body p-4">
                                <form class="form-cart">
                                    <input type="hidden" name="cartId" value="{{ $item->id }}">
                                    <div class="row d-flex justify-content-between align-items-center">
                                        <div class="col-md-2 col-lg-2 col-xl-2">
                                            <img src="@if ($item->product->images->first() != null) {{ $item->product->images->first()->image }} @endif {{ asset('uploads/profile-1.png') }}"
                                                class="img-fluid rounded-3" alt="Cotton T-shirt">
                                        </div>
                                        <div class="col-md-3 col-lg-3 col-xl-3">
                                            <p class="lead fw-normal mb-2">{{ $item->product->name }}</p>
                                            <span class="text-muted">Color:
                                            </span>
                                            @foreach ($item->product->colors as $color)
                                                @if ($item->color_id == $color->id)
                                                    <span class="badge bg-primary">{{ $color->name }}</span>
                                                @endif
                                            @endforeach
                                            </p>
                                        </div>
                                        <div class="col-md-3 col-lg-3 col-xl-2 d-flex">
                                            <input id="quantity" min="0" name="quantity"
                                                value="{{ $item->quantity }}" type="number"
                                                class="form-control form-control-sm" />
                                        </div>
                                        <div class="col-md-3 col-lg-2 col-xl-2 offset-lg-1">
                                            <h5 class="total_price" class="mb-0">
                                                {{ $item->total_price }}
                                            </h5>
                                        </div>
                                        <div class="col-md-1 col-lg-1 col-xl-1 text-end">
                                            <a href="{{ route('cart.delete', $item->id) }}" class="text-danger"><i
                                                    class="fas fa-trash fa-lg"></i></a>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        @endforeach
                        <button type="button" hidden class="btn btn-primary btn-block btn-lg mt-4"
                            style="width: 10%;">sửa</button>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <a  href="{{ route('oder.index') }}" class="btn btn-success btn-block btn-lg">Mua sản phẩm</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@section('js_footer_custom')
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script>
        // quantity.forEach(element => {
        //     console.log(boquantity);
        //     element.onchange = function() {
        //     }
        // });
        var forms = document.querySelectorAll('.form-cart');
        forms.forEach(form => {
            var quantity = form.querySelector('input[name=quantity]');
            var boquantity = quantity.parentNode.nextElementSibling.querySelector('h5');
            var cartId = form.querySelector('input[name=cartId]');
            quantity.onchange = function() {
                axios.put('/cart/' + cartId.value, {
                        quantity: quantity.value
                    })
                    .then(response => {
                        console.log(response.data.total_price);
                        boquantity.innerHTML = response.data.total_price;
                        // Xử lý các bước tiếp theo sau khi cập nhật thành công
                    })
                    .catch(error => {
                        console.error(error);
                        // Xử lý lỗi nếu có
                    });
            }
        })
    </script>
@endsection
