@extends('admin.layouts.app')
@section('title', 'Admin - Màu ')
@section('content')
    <a href="{{ route('adminColor.create') }}" class="btn btn-primary">Thêm màu <i class="fa-solid fa-plus"></i></a>
    <br>
    <br>
    <table class="table table-hover table-dark table-bordered">
        <thead>
            <tr>
                <th scope="col" class="text-center font-weight-bold">STT</th>
                <th scope="col" class="text-center font-weight-bold">Màu</th>
                <th scope="col" class="text-center font-weight-bold">Hành động</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($colors as $key => $color)
                <tr class="table-light">
                    <th scope="row" class="text-center">{{ $key + 1 }}</th>
                    <td class="text-center">{{ $color->name }}</td>
                    <td class="text-center">
                        <a href="{{ route('adminColor.edit', $color->id) }}" class="btn btn-info"><i
                                class="fa-solid fa-pen-to-square"></i></a>
                        <a href="{{ route('adminColor.delete', $color->id) }}" class="btn btn-danger">
                            <i class="fa-solid fa-trash"></i></a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
