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
                        <td>{{ number_format($invoice->total_price) }} VND</td>
                        <td class="text text-center">{{ $invoice->invoiceDetails->count() }}</td>
                        <td>
                            @if ($invoice->status == config('common.invoice.status.cho_duyet'))
                                <span class="text-danger">Chờ duyệt</span>
                            @elseif($invoice->status == config('common.invoice.status.dang_xu_ly'))
                                <span class="text-secondary">Đang xử lý</span>
                            @elseif($invoice->status == config('common.invoice.status.dang_giao_hang'))
                                <span class="text-primary">Đang giao hàng</span>
                            @elseif($invoice->status == config('common.invoice.status.da_giao_hang'))
                                <span class="text-success">Đã giao hàng</span>
                            @elseif($invoice->status == config('common.invoice.status.da_huy'))
                                <span class="text-warning">Đã hủy</span>
                            @elseif($invoice->status == config('common.invoice.status.chuyen_hoan'))
                                <span class="text-danger">Chuyển hoàn</span>
                            @endif
                        </td>
                        <td>
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#update_invoice_{{$invoice->id}}">
                                Update
                            </button>
                            <div class="modal fade" id="update_invoice_{{$invoice->id}}" tabindex="-1" role="dialog"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                            <button type="button" class="close" data-dismiss="modal"
                                                aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="{{ route('admin.invoices.update', ['id' => $invoice->id]) }}"
                                                method="post">
                                                @csrf
                                                <label>Change Status</label>
                                                <select name="status" class="form-control">
                                                    <option value="{{ config('common.invoice.status.cho_duyet') }}"
                                                    {{ old('status', config('common.invoice.status.cho_duyet')) == config('common.invoice.status.cho_duyet') ? 'selected' : '' }}>
                                                        Chờ duyệt</option>
                                                    <option value="{{ config('common.invoice.status.dang_xu_ly') }}"
                                                    {{ old('status', config('common.invoice.status.dang_xu_ly')) == config('common.invoice.status.dang_xu_ly') ? 'selected' : '' }}>
                                                        Đang xử lý</option>
                                                    <option value="{{ config('common.invoice.status.dang_giao_hang') }}"
                                                    {{ old('status', config('common.invoice.status.dang_giao_hang')) == config('common.invoice.status.dang_giao_hang') ? 'selected' : '' }}>
                                                        Đang giao hàng</option>
                                                    <option value="{{ config('common.invoice.status.da_giao_hang') }}"
                                                    {{ old('status', config('common.invoice.status.da_giao_hang')) == config('common.invoice.status.da_giao_hang') ? 'selected' : '' }}>
                                                        Đã giao hàng</option>
                                                    <option value="{{ config('common.invoice.status.da_huy') }}"
                                                    {{ old('status', config('common.invoice.status.da_huy')) == config('common.invoice.status.da_huy') ? 'selected' : '' }}>
                                                        Đã hủy</option>
                                                    <option value="{{ config('common.invoice.status.chuyen_hoan') }}"
                                                    {{ old('status', config('common.invoice.status.chuyen_hoan')) == config('common.invoice.status.chuyen_hoan') ? 'selected' : '' }}>
                                                        Chuyển hoàn</option>
                                                </select>
                                                <button type="submit" class="btn btn-primary">Update</button>
                                            </form>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-dismiss="modal">Close</button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <button class="btn btn-danger" role="button" data-toggle="modal"
                                data-target="#confirm_delete_{{ $invoice->id }}">Delete</button>
                            <div class="modal fade" id="confirm_delete_{{ $invoice->id }}" tabindex="-1"
                                role="dialog">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Xác nhận</h5>
                                            <button type="button" class="close" data-dismiss="modal"
                                                aria-label="Close">
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
                            <button class="btn btn-success"><a
                                    href="{{ route('admin.invoices.show', ['id' => $invoice->id]) }}"
                                    class="text-decoration-none text-light">Chi tiết</button>
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
