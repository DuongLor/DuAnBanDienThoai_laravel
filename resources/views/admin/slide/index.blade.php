@extends('admin.layouts.app')
@section('title', 'Admin - Hãng ')
@section('content')
    <a href="{{ route('adminSlide.create') }}" class="btn btn-primary">Thêm Hãng <i class="fa-solid fa-plus"></i></a>
    <br>
    <br>
    <table class="table table-hover table-dark table-bordered">
        <thead>
            <tr>
                <th scope="col" class="text-center font-weight-bold">STT</th>
                <th scope="col" class="text-center font-weight-bold">Tên</th>
                <th scope="col" class="text-center font-weight-bold">Hình ảnh</th>
                <th scope="col" class="text-center font-weight-bold">Hành động</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($Slides as $key => $Slide)
                <tr class="table-light">
                    <th scope="row" class="text-center">{{ $key + 1 }}</th>
                    <td class="text-center">{{ $Slide->title }}</td>
                    <td class=" d-flex justify-content-center"><img src="{{ $Slide->image }}" alt="" width="100px">
                    </td>
                    <td class="text-center">
                        <a href="{{ route('adminSlide.edit', $Slide->id) }}" class="btn btn-info"><i
                                class="fa-solid fa-pen-to-square"></i></a>
                        <a href="{{ route('adminSlide.delete', $Slide->id) }}" class="btn btn-danger">
                            <i class="fa-solid fa-trash"></i></a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
