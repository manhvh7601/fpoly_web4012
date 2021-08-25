@extends('webshop.detail')
@section('title', 'Detail Product')
@section('content')
@foreach ($hotProducts as $product)

    <div class="row mb-5">
        <div class="col-lg-6">
            <!-- PRODUCT SLIDER-->
            <div class="row m-sm-0">
                <div class="col-sm-12 order-1 order-sm-2">
                    <div class="owl-carousel product-slider" data-slider-id="1">
                        <a class="d-block" href="{{ asset('upload/' . $product->image) }}" data-lightbox="product"
                            title="{{ $product->name }}">
                            <img class="img-fluid" src="{{ asset('upload/' . $product->image) }}" alt="..."></a>
                    </div>
                </div>
            </div>
        </div>
        <!-- PRODUCT DETAILS-->
        <div class="col-lg-6">
            <ul class="list-inline mb-2">
                <li class="list-inline-item m-0"><i class="fas fa-star small text-warning"></i></li>
                <li class="list-inline-item m-0"><i class="fas fa-star small text-warning"></i></li>
                <li class="list-inline-item m-0"><i class="fas fa-star small text-warning"></i></li>
                <li class="list-inline-item m-0"><i class="fas fa-star small text-warning"></i></li>
                <li class="list-inline-item m-0"><i class="fas fa-star small text-warning"></i></li>
            </ul>
            <h1>{{ $product->name }}</h1>
            <p class="text-muted lead">{{ number_format($product->price) }} VND</p>
            <p class="text-small mb-4">{{ $product->desc }}</p>
            <div class="row align-items-stretch mb-4">
                <div class="col-sm-5 pr-sm-0">
                    <div
                        class="border d-flex align-items-center justify-content-between py-1 px-3 bg-white border-white">
                        <span class="small text-uppercase text-gray mr-4 no-select ">Quantity</span>
                        <div class="quantity">
                            <button class="dec-btn p-0"><i class="fas fa-caret-left"></i></button>
                            <input class="form-control border-0 shadow-0 p-0" type="number" min="0" max="" value="1">
                            <button class="inc-btn p-0"><i class="fas fa-caret-right"></i></button>
                        </div>
                    </div>
                </div>
                <div class="col-sm-3 pl-sm-0">
                    @auth
                        <a class="btn btn-dark btn-sm btn-block h-100 d-flex align-items-center justify-content-center px-0"
                            href="{{ route('addCart', ['id' => $product->id]) }}">Add to cart</a>
                    @endauth
                </div>
            </div><a class="btn btn-link text-dark p-0 mb-4" href="#"><i class="far fa-heart mr-2"></i>Add to wish
                list</a><br>
            <ul class="list-unstyled small d-inline-block">
                <li class="px-3 py-2 mb-1 bg-white text-muted"><strong
                        class="text-uppercase text-dark">Category:</strong><a class="reset-anchor ml-2"
                        href="#">{{ $product->category->name }}</a></li>
            </ul>
        </div>
    </div>
    <!-- DETAILS TABS-->
    <ul class="nav nav-tabs border-0" id="myTab" role="tablist">
        <li class="nav-item"><a class="nav-link active" id="description-tab" data-toggle="tab" href="#description"
                role="tab" aria-controls="description" aria-selected="true">Description</a></li>
        <li class="nav-item"><a class="nav-link" id="reviews-tab" data-toggle="tab" href="#reviews" role="tab"
                aria-controls="reviews" aria-selected="false">Reviews</a></li>
    </ul>
    <div class="tab-content mb-5" id="myTabContent">
        <div class="tab-pane fade show active" id="description" role="tabpanel" aria-labelledby="description-tab">
            <div class="p-4 p-lg-5 bg-white">
                <h6 class="text-uppercase">Product description </h6>
                <p class="text-muted text-small mb-0">{{ $product->desc }}</p>
            </div>
        </div>
        <div class="tab-pane fade" id="reviews" role="tabpanel" aria-labelledby="reviews-tab">
            <div class="p-4 p-lg-5 bg-white">
                <div class="row">
                    <div class="col-lg-8">
                        <div class="media mb-3"><img class="rounded-circle" src="style/img/customer-1.png" alt=""
                                width="50">
                            <div class="media-body ml-3">
                                <h6 class="mb-0 text-uppercase">Jason Doe</h6>
                                <p class="small text-muted mb-0 text-uppercase">20 May 2020</p>
                                <ul class="list-inline mb-1 text-xs">
                                    <li class="list-inline-item m-0"><i class="fas fa-star text-warning"></i></li>
                                    <li class="list-inline-item m-0"><i class="fas fa-star text-warning"></i></li>
                                    <li class="list-inline-item m-0"><i class="fas fa-star text-warning"></i></li>
                                    <li class="list-inline-item m-0"><i class="fas fa-star text-warning"></i></li>
                                    <li class="list-inline-item m-0"><i class="fas fa-star-half-alt text-warning"></i>
                                    </li>
                                </ul>
                                <p class="text-small mb-0 text-muted">Lorem ipsum dolor sit amet, consectetur
                                    adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                                </p>
                            </div>
                        </div>
                        <div class="media"><img class="rounded-circle" src="style/img/customer-2.png" alt="" width="50">
                            <div class="media-body ml-3">
                                <h6 class="mb-0 text-uppercase">Jason Doe</h6>
                                <p class="small text-muted mb-0 text-uppercase">20 May 2020</p>
                                <ul class="list-inline mb-1 text-xs">
                                    <li class="list-inline-item m-0"><i class="fas fa-star text-warning"></i></li>
                                    <li class="list-inline-item m-0"><i class="fas fa-star text-warning"></i></li>
                                    <li class="list-inline-item m-0"><i class="fas fa-star text-warning"></i></li>
                                    <li class="list-inline-item m-0"><i class="fas fa-star text-warning"></i></li>
                                    <li class="list-inline-item m-0"><i class="fas fa-star-half-alt text-warning"></i>
                                    </li>
                                </ul>
                                <p class="text-small mb-0 text-muted">Lorem ipsum dolor sit amet, consectetur
                                    adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endforeach

<!-- RELATED PRODUCTS-->
<h2 class="h5 text-uppercase mb-4">Related products</h2>
<div class="row">
    <!-- PRODUCT-->
    @foreach ($relatedProduct as $related)
        <div class="col-lg-3 col-sm-6">
            <div class="product text-center skel-loader">
                <div class="d-block mb-3 position-relative"><a class="d-block"
                        href="{{ route('detail', ['id' => $related->id]) }}"><img class="img-fluid w-100"
                            src="{{ asset('upload/' . $related->image) }}" alt="..."></a>
                    <div class="product-overlay">
                        <ul class="mb-0 list-inline">
                            @auth
                            <li class="list-inline-item m-0 p-0">
                                <a class="btn btn-sm btn-dark"
                                    href="{{ route('cart') }}">Add to cart</a>
                            </li>
                            @endauth
                        </ul>
                    </div>
                </div>
                <h6> <a class="reset-anchor"
                        href="{{ route('detail', ['id' => $related->id]) }}">{{ $related->name }}</a></h6>
                <p class="small text-muted">{{ number_format($related->price) }} VND</p>
            </div>
        </div>
    @endforeach
</div>
@endsection
