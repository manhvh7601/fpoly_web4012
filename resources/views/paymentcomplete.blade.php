@extends('welcome')
@section('title', 'Thanh toán')
@section('content')
<div class="container">
    @auth
        <div>
            <h4>Cảm ơn {{ Auth::user()->name }} đã mua hàng của cửa hàng chúng tôi!</h4>
            <br>
            <p>Tiếp tục mua hàng thì vui lòng ấn vào <a href="{{ route('shop') }}">đây</a> để tiếp tục mua hàng</p>
        </div>
    @endauth
</div>
@endsection
