@extends('layout')
@section('title', 'Chi tiết đơn hàng')
@section('content')
<div>
    <div class="row mt-5 mb-5">
        <div class="col-12">
            <div class="col-6">
                <div class="col-3">Họ tên</div>
                <div class="col-8">{{ $data->user->name }}</div>
            </div>
        </div>
    </div>
</div>
<div>
    <p>Chi tiết đơn hàng</p>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Product Name</th>
                <th scope="col">Unit Price</th>
                <th scope="col">Quantity</th>
                <th scope="col">Create At</th>
            </tr>
        </thead>
        <tbody>
            @php
                $total = 0;
            @endphp
            @foreach ($data->invoiceDetails as $in)
                @php
                    $total += $in->unit_price * $in->quantity;
                @endphp
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $in->product->name }}</td>
                    <td>{{ number_format($in->unit_price) }} VND</td>
                    <td>{{ $in->quantity }}</td>
                    <td>{{ $in->created_at }}</td>
                </tr>
            @endforeach
            <tr>
                <th scope="row"></th>
                <td colspan="2" class="table-active">Tổng tiền đơn hàng</td>
                <td>{{ number_format($total) }} VND</td>
            </tr>
        </tbody>
    </table>
</div>
@endsection
