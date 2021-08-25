@extends('webshop.checkout')
@section('title', 'Checkout')
@section('content')
<!-- HERO SECTION-->
<section class="py-5 bg-light">
    <div class="container">
        <div class="row px-4 px-lg-5 py-lg-4 align-items-center">
            <div class="col-lg-6">
                <h1 class="h2 text-uppercase mb-0">Checkout</h1>
            </div>
            <div class="col-lg-6 text-lg-right">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb justify-content-lg-end mb-0 px-0">
                        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                        <li class="breadcrumb-item"><a href="cart.html">Cart</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Checkout</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</section>
<section class="py-5">
    <!-- BILLING ADDRESS-->
    <h2 class="h5 text-uppercase mb-4">Billing details</h2>
    <div class="row">
        <div class="col-lg-8">
            <form action="{{ route('payment') }}" method="POST">
                <div class="row">
                    @php
                    $total_price = 0;
                    @endphp
                    @foreach ($cart as $value)
                        @php
                            $total_price += $value['quantity'] * $value['price'];
                        @endphp
                    @endforeach
                    @auth
                        @csrf
                        <input type="hidden" value="{{ Auth::user()->id }}" name="user_id">
                        <div class="col-lg-12 form-group">
                            <label class="text-small text-uppercase" for="fullName">Fullname</label>
                            <input class="form-control form-control-lg" value="{{ Auth::user()->name }}" type="text">
                        </div>
                        <div class="col-lg-12 form-group">
                            <label class="text-small text-uppercase" for="phone">Phone number</label>
                            <input class="form-control form-control-lg" name="number" id="number" type="tel">
                        </div>
                        <div class="col-lg-12 form-group">
                            <label class="text-small text-uppercase" for="address">Address</label>
                            <input class="form-control form-control-lg" name="address" id="address"
                                value="{{ AUTH::user()->address }}" type="text">
                        </div>
                        <input type="hidden" name="total_price" value="{{$total_price}}">
                        <div class="col-lg-12 form-group">
                            <button class="btn btn-dark" type="submit">Place order</button>
                        </div>
                    @endauth
                </div>
            </form>
        </div>
        <div class="col-lg-4">
            <div class="card border-0 rounded-0 p-lg-4 bg-light">
                <div class="card-body">
                    <h5 class="text-uppercase mb-4">Your order</h5>
                    <ul class="list-unstyled mb-0">
                        @foreach ($cart as $value)
                            <li class="d-flex align-items-center justify-content-between">
                                <strong class="small font-weight-bold">{{ $value['name'] }}</strong>
                                <span class="text-muted small">{{ number_format($value['price']) }} VND</span>
                            </li>
                            <li class="border-bottom my-2"></li>
                        @endforeach
                        <li class="d-flex align-items-center justify-content-between">
                            <strong class="text-uppercase small font-weight-bold">Total</strong>
                            <span>{{ number_format($total_price) }} VND</span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
