@extends('client.layouts.app')
@section('title', 'Thêm thông tin liên hệ')
@section('content')
<div class="container px-4 px-lg-5 py-5">
	<h1>Thêm thông tin liên hệ</h1>
<form>
	<div class="mb-3">
    <label for="" class="form-label">Tên</label>
    <input type="text" class="form-control" id="" aria-describedby="" name="name">
  </div>
  <div class="mb-3">
    <label for="" class="form-label">Địa chí</label>
    <input type="text" class="form-control" id="" aria-describedby="" name="address">
  </div>
  <div class="mb-3">
    <label for="" class="form-label">Số điện thoại</label>
    <input type="number" class="form-control" id="" name="phone">
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
</div>
@endsection