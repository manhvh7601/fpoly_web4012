@extends('welcome')
@section('title', 'Đăng nhập')
@section('content')
<div class="container">
    <div class="card">
        @if (session()->get('error'))
            <div class="alert alert-danger">
                {{ session()->get('error') }}
            </div>
        @endif
        <div class="card-header">
            <h3 class="text text-center">Login</h3>
            <div class="d-flex justify-content-end social_icon">
                <span><i class="fab fa-facebook-square"></i></span>
                <span><i class="fab fa-google-plus-square"></i></span>
                <span><i class="fab fa-twitter-square"></i></span>
            </div>
        </div>
        <form action="{{ route('auth.login') }}" method="post">
            @csrf
            <div class="input-group form-group">
                <input type="email" name="email" class="form-control" value="{{ old('email') }}" placeholder="Email">
            </div>
            <div class="input-group form-group">
                <input type="password" name="password" class="form-control" placeholder="password">
            </div>
            <div class="input-group form-group">
                <a href="{{ route('auth.getRegisterForm') }}">Bạn chưa có tài khoản?</a>
            </div>
            <div class="mt-4">
                <button class="btn btn-primary">Login</button>
            </div>
        </form>
    </div>
</div>
@endsection
