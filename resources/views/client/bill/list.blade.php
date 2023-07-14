@extends('client.layouts.app')
@section('title', 'Các đơn đặt hàng')
@section('content')
    <div class="container py-5">
        <div class=" py-5">
            <div class="card-body mx-4 my-5">
                <div class="container">
                    <p class="my-5 " style="font-size: 30px;">Lịch sử đặt hàng</p>
                    <hr>
                    <div class="table-responsive">
                        <table class="table table-light">
                            <thead>
                                <tr>
                                    <th scope="col">Column 1</th>
                                    <th scope="col">Column 2</th>
                                    <th scope="col">Column 3</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="">
                                    <td scope="row">R1C1</td>
                                    <td>R1C2</td>
                                    <td>R1C3</td>
                                </tr>
                                <tr class="">
                                    <td scope="row">Item</td>
                                    <td>Item</td>
                                    <td>Item</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        @endsection
