@extends('welcome')
@section('title', 'Đăng ký')
@section('content')
<div class="container">
    <form action="{{ route('auth.register') }}" method="post">
        @csrf
        @if (session()->get('success'))
            <div class="alert alert-success">
                {{ session()->get('success') }}
            </div>
        @endif
        <div class="card-header">
            <h3 class="text text-center">Register</h3>
            <div class="d-flex justify-content-end social_icon">
                <span><i class="fab fa-facebook-square"></i></span>
                <span><i class="fab fa-google-plus-square"></i></span>
                <span><i class="fab fa-twitter-square"></i></span>
            </div>
        </div>
        <div class="input-group form-group">
            <input class="mt-3 form-control" type="text" name="name" value="{{ old('name') }}" placeholder="Name">

            @error('name')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div class="input-group form-group">
            <input class="mt-3 form-control" type="password" name="password" placeholder="Password">

            @error('password')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div class="input-group form-group">
            <input class="mt-3 form-control" type="text" name="email" value="{{ old('email') }}" placeholder="Email">

            @error('email')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div class="input-group form-group">
            <input class="mt-3 form-control" type="text" name="address" value="{{ old('address') }}"
                placeholder="Address">

            @error('address')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div class="input-group form-group">
            <select name="gender" class="form-control">
                <option value="{{ config('common.user.gender.male') }}"
                    {{ old('gender', config('common.user.gender.male')) == config('common.user.gender.male') ? 'selected' : '' }}>
                    Male</option>
                <option value="{{ config('common.user.gender.female') }}"
                    {{ old('gender', config('common.user.gender.male')) == config('common.user.gender.female') ? 'selected' : '' }}>
                    Female</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Đăng kí</button>
    </form>
</div>
@endsection
