@extends('layout')
@section('title', 'Add Product')

@section('content')
<form action="{{ route('admin.products.store') }}" method="post" enctype="multipart/form-data">
    @csrf
    <div>
        <label>Name</label>
        <input class="mt-3 form-control" type="text" name="name" value="{{ old('name') }}">
    </div>
    <div>
        @error('name')
            <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>
    <div>
        <label>Image</label>
        <input class="mt-3 form-control" type="file" name="image" value="{{ old('image') }}">
    </div>
    <div>
        @error('image')
            <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>
    <div>
        <label>Price</label>
        <input class="mt-3 form-control" type="number" name="price" value="{{ old('price') }}">
    </div>
    <div>
        @error('price')
            <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>
    <div>
        <label>Quantity</label>
        <input class="mt-3 form-control" type="number" name="quantity" value="{{ old('quantity') }}">
    </div>
    <div>
        @error('quantity')
            <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>
    <div>
        <label>Category Name</label>
        <select name="category_id" class="mt-3 form-control">
            @foreach ($lstCate as $item)
                <option value="{{ $item->id }}" {{ old('category_id') == 0 ? 'selected' : '' }}}}>
                    {{ $item->name }}</option>
            @endforeach
        </select>
    </div>
    <div>
        @error('category_id')
            <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>
    <div>
        <label>Description</label>
        <textarea name="desc" cols="30" rows="4" class="mt-3 form-control">{{ old('desc') }}</textarea>
    </div>
    <div>
        @error('desc')
            <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>
    <button class="mt-3 btn btn-primary">ADD PRODUCT</button>
</form>
@endsection
