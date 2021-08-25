@extends('layout')
@section('title', 'Quản lý sản phẩm')
@section('title-content', 'List Product')
@section('content')
@if (!empty($data))
<div>
    @section('search-form')
        <form action="{{ route('admin.products.index') }}" method="GET">
            <div class="col-12">
                <input class="form-control btn text-dark" type="text" name="keyword" value="{{ old('keyword') }}"
                    placeholder="Search..." />
            </div>
        </form>
    @endsection

</div>
<table class="table table-sm">
    <thead class="table-dark">
        <tr>
            <td>#</td>
            <td>Name</td>
            <td>Image</td>
            <td>Price</td>
            <td>Quantity</td>
            <td>Category Name</td>
            <td>Description</td>
            <td colspan="2">Action</td>
        </tr>
    </thead>
    <tbody>
        @foreach ($data as $pro)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $pro->name }}</td>
                <td><img src="{{ asset('upload/' . $pro->image) }}" width="100px" height="200px"></td>
                <td>{{ number_format($pro->price) }} VND</td>
                <td>{{ $pro->quantity }}</td>
                <td>{{ $pro->category->name }}</td>
                <td>{{ $pro->desc }}</td>
                <td>
                    <a class="btn btn-primary" href=" {{ route('admin.products.edit', ['id' => $pro->id]) }}"><span
                            class="iconify" data-icon="dashicons:update-alt"></span></a>
                </td>
                <td>
                    <button class="btn btn-danger" role="button" data-toggle="modal"
                        data-target="#confirm_delete_{{ $pro->id }}"><span class="iconify"
                            data-icon="feather:delete"></span></button>

                    <div class="modal fade" id="confirm_delete_{{ $pro->id }}" tabindex="-1" role="dialog">
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
                                        action="{{ route('admin.products.delete', ['id' => $pro->id]) }}">
                                        @csrf
                                        <button type="submit" class="btn btn-danger">Xóa</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
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
