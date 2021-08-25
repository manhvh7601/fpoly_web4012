@extends('layout')
@section('title', 'Add Category')

@section('content')
<form action="{{ route('admin.categories.store') }}" method="post">
    @csrf
    <div>
        <label>Name</label>
        <input class="mt-3 form-control" type="text" name="name">
    </div>
    <div>
        @error('name')
            <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>

    <button class="mt-3 btn btn-primary">ADD CATEGORY</button>
</form>
@endsection
