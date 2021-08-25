@extends('webshop.shop')
@section('title', 'Shop')
@section('content')
<div class="container">
    <!-- HERO SECTION-->
    <section class="py-5 bg-light">
        <div class="container">
            <div class="row px-4 px-lg-5 py-lg-4 align-items-center">
                <div class="col-lg-6">
                    <h1 class="h2 text-uppercase mb-0">Shop</h1>
                </div>
                <div class="col-lg-6 text-lg-right">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-lg-end mb-0 px-0">
                            <li class="breadcrumb-item"><a href="{{ route('welcome') }}">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Shop</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </section>
    <section class="py-5">
        <div class="container p-0">
            <div class="row">
                <!-- SHOP SIDEBAR-->
                <div class="col-lg-3 order-2 order-lg-1">
                    <h5 class="text-uppercase mb-4">Categories</h5>
                    <ul class="list-unstyled small text-muted pl-lg-4 font-weight-normal">
                        @foreach ($category as $cate)
                            <li class="mb-2">
                                <a class="reset-anchor"
                                    href="{{ route('category', ['id' => $cate->id]) }}">{{ $cate->name }}</a>
                            </li>
                        @endforeach

                    </ul>
                </div>
                <!-- SHOP LISTING-->
                <div class="col-lg-9 order-1 order-lg-2 mb-5 mb-lg-0">

                    <div class="row mb-3 align-items-center">
                        <div class="col-lg-6 mb-2 mb-lg-0">
                           <div class="mb-3">
                                <form action="{{route('shop')}}" method="GET">
                                    <div class="mb-3">
                                        <input class="form-control btn text-dark" type="text" name="keyword" value="{{ old('keyword') }}"
                                            placeholder="Search..." />
                                            <div class="col-12">
                                                <button type="submit" class="btn btn-primary">Search</button>
                                            </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <ul class="list-inline d-flex align-items-center justify-content-lg-end mb-0">
                                <li class="list-inline-item">
                                    @csrf
                                    <select class="selectpicker ml-auto" name="order_by" data-width="200" id="sort"
                                        data-style="bs-select-form-control" data-title="Default sorting">
                                        @foreach (config('common.product_order_by') as $k => $val)
                                            <option value="{{ $k }}">{{ $val }}</option>
                                        @endforeach
                                    </select>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="row">
                        <!-- PRODUCT-->
                        @foreach ($products as $product)
                            <div class="col-lg-4 col-sm-6">
                                <div class="product text-center">
                                    <div class="mb-3 position-relative">
                                        <div class="badge text-white badge-"></div><a class="d-block"
                                            href="{{ route('detail', ['id' => $product->id]) }}"><img
                                                class="img-fluid w-100" src="{{ asset('upload/' . $product->image) }}"
                                                alt="..."></a>
                                        <div class="product-overlay">
                                            <ul class="mb-0 list-inline">
                                                @auth
                                                    <li class="list-inline-item m-0 p-0"><a class="btn btn-sm btn-dark"
                                                            href="{{ route('addCart', ['id' => $product->id]) }}">Add to
                                                            cart</a></li>
                                                @endauth
                                            </ul>
                                        </div>
                                    </div>
                                    <h6> <a class="reset-anchor"
                                            href="{{ route('detail', ['id' => $product->id]) }}">{{ $product->name }}</a>
                                    </h6>
                                    <p class="small text-muted">{{ number_format($product->price) }} VND</p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <!-- PAGINATION-->
                    <nav aria-label="Page navigation example">
                        <ul class="pagination justify-content-center justify-content-lg-end">
                            {{ $products->links() }}
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </section>
</div>
<script>
    let sort = document.querySelector('#sort');
    sort.addEventListener('change', function(e) {
        e.preventDefault();
        window.location.href = `?price=${e.target.value}`
    })
</script>
@endsection
