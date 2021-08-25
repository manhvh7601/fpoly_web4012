@extends('layout')
@section('title', 'Edit Category')

@section('content')
<form action="{{ route('admin.categories.update', ['id' => $data->id]) }}" method="post">
    @csrf
    <div>
        <label>Name</label>
        <input class="mt-3 form-control" type="text" name="name" value="{{ $data->name }}">
    </div>
    <div>
        @error('name')
            <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>

    <button class="mt-3 btn btn-primary">UPDATE CATEGORY</button>
</form>
@endsection
