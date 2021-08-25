@extends('layout')
@section('title', 'Show')
@section('content')
<div>
    <div class="row mt-5 mb-5">
        <div class="col-12">
            <div class="col-6">
                <div class="col-3">Họ tên</div>
                <div class="col-8">{{ $user->name }}</div>
            </div>
        </div>
    </div>
</div>
<div>
    <p>Lịch sử mua hàng</p>
    <table class="table">
        <thead>
            <tr>
                <td scope="col">#</td>
                <td scope="col">Name</td>
                <td scope="col">Number</td>
                <td scope="col">Address</td>
                <td scope="col">Price</td>
                <td scope="col">Invoice Status</td>
                <td scope="col">Create At</td>
            </tr>
        </thead>
        <tbody>
            @foreach ($user->invoices as $invoice)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $invoice->number }}</td>
                    <td>{{ $user->address }}</td>
                    <td>{{ $invoice->total_price }}</td>
                    <td>
                        @if ($invoice->status == config('common.invoice.status.cho_duyet'))
                            <span class="text-danger">Chờ duyệt</span>
                        @elseif($invoice->status == config('common.invoice.status.dang_xu_ly'))
                            <span class="text-danger">Đang xử lý</span>
                        @elseif($invoice->status == config('common.invoice.status.dang_giao_hang'))
                            <span class="text-danger">Đang giao hàng</span>
                        @elseif($invoice->status == config('common.invoice.status.da_giao_hang'))
                            <span class="text-danger">Đã giao hàng</span>
                        @elseif($invoice->status == config('common.invoice.status.da_huy'))
                            <span class="text-danger">Đã hủy</span>
                        @elseif($invoice->status == config('common.invoice.status.chuyen_hoan'))
                            <span class="text-danger">Chuyển hoàn</span>
                        @endif
                    </td>
                    <td>{{ $invoice->created_at }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
