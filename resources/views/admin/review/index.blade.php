@extends('admin.layouts.app')
@section('title', 'Admin - Đánh giá ')
@section('content')

    <table class="table table-hover table-dark table-bordered">
        <thead>
            <tr>
                <th scope="col" class="text-center font-weight-bold">STT</th>
                <th scope="col" class="text-center font-weight-bold">Sản phẩm</th>
								<th scope="col" class="text-center font-weight-bold">Người dùng</th>
								<th scope="col" class="text-center font-weight-bold">Nội dung</th>
								<th scope="col" class="text-center font-weight-bold">Đánh giá</th>
                <th scope="col" class="text-center font-weight-bold">Hành động</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($Reviews as $key => $Review)
                <tr class="table-light">
                    <th scope="row" class="text-center">{{ $key + 1 }}</th>
                    <td class="text-center">{{ $Review->product->name }}</td>
                    <td class="text-center">{{ $Review->user->name }}</td>
										<td class="text-center">{{ $Review->comment }}</td>
										<td>
											<div class="d-flex justify-content-between align-items-center">
													<div class="d-flex flex-row">
															@for ($i = 1; $i <= 5; $i++)
																	@if ($i <= $Review->rating)
																			<i class="fa-solid fa-star text-warning me-1"></i>
																	@else
																			<i class="fa-regular fa-star me-1"></i>
																	@endif
															@endfor
													</div>
											</div>
									</td>
                    <td class="text-center">
                        <a href="{{ route('adminReview.delete', $Review->id) }}" class="btn btn-danger">
                            <i class="fa-solid fa-trash"></i></a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
