@extends('layout')
@section('title', 'Quản lý đơn hàng')
@section('title-content', 'List Invoice')
@section('content')
@if (!empty($data))

<table class="table">
    <thead class="table-dark">
        <tr>
            <th scope="col">#</th>
            <th scope="col">Username</th>
            <th scope="col">Number</th>
            <th scope="col">Address</th>
            <th scope="col">Total Price</th>
            <th scope="col">Invoice Details.no</th>
            <th scope="col">Status</th>
            <th scope="col">Action</th>
        </tr>
    </thead>
    <tbody>

        @foreach ($data as $invoice)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>
                    {{ $invoice->user->name }}</a>
                </td>
                <td>{{ $invoice->number }}</td>
                <td>{{ $invoice->address }}</td>
                <td>{{ $invoice->total_price }}</td>
                <td class="text text-center">{{ $invoice->invoiceDetails->count() }}</td>
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

                <td>
                        <button class="btn btn-danger" role="button" data-toggle="modal"
                            data-target="#confirm_delete_{{ $invoice->id }}"><span class="iconify"
                                data-icon="feather:delete">Delete</span></button>
                        <div class="modal fade" id="confirm_delete_{{ $invoice->id }}" tabindex="-1"
                            role="dialog">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Xác nhận</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        Xác nhận xóa bản ghi này?
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-default"
                                            data-dismiss="modal">Cancel</button>
                                        <form method="POST"
                                            action="{{ route('admin.invoices.delete', ['id' => $invoice->id]) }}">
                                            @csrf
                                            <button type="submit" class="btn btn-danger">Xóa</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <span><a href="{{ route('admin.invoices.show', ['id' => $invoice->id]) }}"
                            class="text-decoration-none">Chi tiết</span>
                </td>
            </tr>
        @endforeach

    </tbody>
</table>
@else
<h2>Not Found</h2>
@endif
{{ $data->links() }}
@endsection
