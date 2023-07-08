@extends('client.layouts.app')
@section('title', 'Thông tin')
@section('css_header_custom')
    <style>
        .inputfile {
            width: 0.1px;
            height: 0.1px;
            opacity: 0;
            overflow: hidden;
            position: absolute;
            z-index: -1;
        }

        .inputfile+label {
            padding: 10px;
            color: white;
            background-color: #186ded;
            display: inline-block;
            cursor: pointer;
            border-radius: 5px;
        }

        .inputfile:focus+label,
        .inputfile+label:hover {
            background-color: #0f3e83;
        }
    </style>
@endsection
@section('content')
    <form action="{{ route('profile.update', ['profileId' => $user->id]) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <input type="text" value="{{ $user->id }}" name="id" hidden>
        <hr class="mt-0 mb-4" />
        <div class="row">
            <div class="col-md-4">
                <!-- Profile picture card-->
                <div class="card mb-4 mb-xl-0">
                    <div class="card-header">Ảnh đại diện</div>
                    <div class="card-body text-center">
                        <!-- Profile picture image-->
                        @if ($user->avatar && file_exists(public_path('uploads/' . $user->avatar)))
                            <img class=" rounded-circle  mb-2 " src="{{ asset('uploads/' . $user->avatar) }}" alt=""
                                height="309" width="309">
                        @else
                            <img class="rounded-circle mb-2" src="{{ asset('uploads/' . 'profile-1.png') }}" alt=""
                                height="310" width="310">
                        @endif
                        <!-- Profile picture help block-->
                        <div class="small font-italic text-muted mb-4">
                            @error('avatar', 'name', 'address', 'phone')
                                {{ $message }}
                            @enderror
                        </div>
                        <!-- Profile picture upload button-->
                        <input type="file" name="avatar" id="file" class="inputfile form-control" />
                        <label for="file">Đổi ảnh đại diện</label>
                        <br>
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <!-- Account details card-->
                <div class="card mb-4">
                    <div class="card-header">Thông tin tài khoản</div>
                    <div class="card-body">

                        <!-- Form Group (username)-->
                        <div class="mb-3">
                            <label class="small mb-1" for="inputUsername">Tên người dùng</label>
                            <input class="form-control" id="inputUsername" type="text" placeholder="Nhap tên người dùng"
                                value="{{ $user->name }}" name="name">
                        </div>
                        <!-- Form Row        -->
                        <div class=" mb-3">
														<a href="{{ route('address') 	}}" class="small mb-1">Danh sách thông tin liên hệ</a>
                        </div>
                        <!-- Form Row-->
                        <div class="mb-3">
                            <!-- Form Group (phone number)-->
                            <label class="small mb-1" for="">Ngày tạo</label>
                            <input class="form-control" id="" type="text" placeholder=""
                                value="{{ $user->created_at->diffForHumans() }}" disabled />
                        </div>
                        <div class="mb-3">
                            <!-- Form Group (phone number)-->
                            <label class="small mb-1" for="">Ngày sửa</label>
                            <input class="form-control" id="" type="text" placeholder=""
                                value="{{ $user->updated_at->diffForHumans() }}" disabled />
                        </div>
                        <!-- Save changes button-->
                        <button type="submit" class="btn btn-primary">Sửa tài khoản</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection
