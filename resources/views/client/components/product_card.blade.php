<div class="card h-100">
	<!-- Sale badge-->
	{{-- <div class="badge bg-dark text-white position-absolute" style="top: 0.5rem; right: 0.5rem">Sale
	</div> --}}
	<!-- Product image-->
	<img class="card-img-top"
			src="@foreach ($product->images as $item) {{ $item->image }} @endforeach" alt="..." />
	<!-- Product details-->
	<div class="card-body p-4">
			<div class="text-center">
					<!-- Product name-->
					<h5 class="fw-bolder">{{ $product->name }}</h5>
					<!-- Product reviews-->
					@php
							$averageRating = $product->reviews->avg('rating');
							$fullStars = floor($averageRating); // Số lượng biểu tượng sao đầy
							$halfStar = $averageRating - $fullStars; // Biểu tượng sao bán
					@endphp
					<div class="d-flex justify-content-center text-warning  mb-2">
							@if ($averageRating)
									@for ($i = 1; $i <= 5; $i++)
											@if ($i <= $fullStars)
													<i class="fas fa-star"></i> <!-- Biểu tượng sao đầy -->
											@elseif ($halfStar >= 0.5 && $i == ceil($averageRating))
													<i class="fas fa-star-half-alt"></i> <!-- Biểu tượng sao bán -->
											@else
													<i class="far fa-star"></i> <!-- Biểu tượng sao trống -->
											@endif
									@endfor
							@else
							@endif
					</div>
					<!-- Product brand-->
					<!-- Product price-->
					@php
							$minPrice = $product->colors->min(function ($color) {
									return $color->pivot->price;
							}); // Lấy giá từ cột giá trong bảng trung gian
					@endphp
					<p>{{ number_format($minPrice, 0, ',') }} VND</p>
			</div>
	</div>
	<!-- Product actions-->
	<div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
			<div class="text-center"><a class="btn btn-outline-dark mt-auto" href="#">Thêm vào giỏ hàng</a></div>
	</div>
</div>