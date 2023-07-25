@extends('admin.layouts.app')
@section('title', 'Admin - Hãng ')
@section('content')
    <a href="{{ route('adminBrand.create') }}" class="btn btn-primary">Thêm Hãng <i class="fa-solid fa-plus"></i></a>
    <br>
    <br>
    <table class="table table-hover table-dark table-bordered">
        <thead>
            <tr>
                <th scope="col" class="text-center font-weight-bold">STT</th>
                <th scope="col" class="text-center font-weight-bold">Tên</th>
                <th scope="col" class="text-center font-weight-bold">Logo</th>
                <th scope="col" class="text-center font-weight-bold">Hành động</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($brands as $key => $brand)
                <tr class="table-light">
                    <th scope="row" class="text-center">{{ $key + 1 }}</th>
                    <td class="text-center">{{ $brand->name }}</td>
                    <td class=" d-flex justify-content-center"><img src="{{ $brand->logo }}" alt="" width="100px">
                    </td>
                    <td class="text-center">
                        <a href="{{ route('adminBrand.edit', $brand->id) }}" class="btn btn-info"><i
                                class="fa-solid fa-pen-to-square"></i></a>
                        <a href="{{ route('adminBrand.delete', $brand->id) }}" class="btn btn-danger">
                            <i class="fa-solid fa-trash"></i></a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
