@extends('layout')
@section('title', 'Quản lý danh mục')
@section('title-content', 'List Category')
@section('content')
@if (!empty($data))
@section('search-form')
    <form action="{{ route('admin.categories.index') }}" method="GET">
        <div class="col-12">
            <input class="form-control btn text-dark" type="text" name="keyword" value="{{ old('keyword') }}"
                placeholder="Search..." />
        </div>
    </form>
@endsection
<table class="table table-sm">
    <thead class="table-dark">
        <tr>
            <td>#</td>
            <td>Name</td>
            <td>Product No.</td>
            <td colspan="2">Action</td>
        </tr>
    </thead>
    <tbody>
        @foreach ($data as $cate)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $cate->name }}</td>
                <td>{{ $cate->products->count() }}</td>
                <td>
                    <a class="btn btn-primary"
                        href=" {{ route('admin.categories.edit', ['id' => $cate->id]) }}"><span class="iconify"
                            data-icon="dashicons:update-alt"></span></a>
                </td>
                <td>
                    <button class="btn btn-danger" role="button" data-toggle="modal"
                        data-target="#confirm_delete_{{ $cate->id }}"><span class="iconify"
                            data-icon="feather:delete"></span></button>

                    <div class="modal fade" id="confirm_delete_{{ $cate->id }}" tabindex="-1" role="dialog">
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
                                        action="{{ route('admin.categories.delete', ['id' => $cate->id]) }}">
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
