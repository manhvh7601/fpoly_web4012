<!-- navbar-->
<header class="header bg-gray-300">
    <div class="container px-0 px-lg-3">
        <nav class="navbar navbar-expand-lg navbar-light py-3 px-lg-0"><a class="navbar-brand"
                href="{{ route('welcome') }}"><span
                    class="font-weight-bold text-uppercase text-dark">ManhVH</span></a>
            <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse"
                data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <!-- Link--><a class="nav-link" href="{{ route('welcome') }}">Home</a>
                    </li>
                    <li class="nav-item">
                        <!-- Link--><a class="nav-link" href="{{ route('shop') }}">Shop</a>
                    </li>
                    <li class="nav-item">
                    </li>
                    <li class="nav-item dropdown"><a class="nav-link dropdown-toggle" id="pagesDropdown" href="#"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Pages</a>
                        <div class="dropdown-menu mt-3" aria-labelledby="pagesDropdown"><a
                                class="dropdown-item border-0 transition-link"
                                href="{{ route('welcome') }}">Homepage</a><a
                                class="dropdown-item border-0 transition-link"
                                href="{{ route('shop') }}">Category</a><a
                                class="dropdown-item border-0 transition-link" href="{{ route('cart') }}">Shopping
                                cart</a><a class="dropdown-item border-0 transition-link"
                                href="{{ route('checkout') }}">Checkout</a></div>
                    </li>
                </ul>
                <ul class="navbar-nav ml-auto">
                   
                    <li class="nav-item"><a class="nav-link" href="{{ route('auth.getLoginForm') }}"> <i
                                class="fas fa-user-alt mr-1 text-gray"></i>Login</a></li>
                    @auth
                    <li class="nav-item"><a class="nav-link" href="{{ route('cart') }}"> <i
                        class="fas fa-dolly-flatbed mr-1 text-gray"></i>Cart<small
                        class="text-gray"></small></a></li>
                        <button type="button" class="btn header-item waves-effect" id="page-header-user-dropdown"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span class="d-none d-xl-inline-block ml-1">{{ Auth::user()->name }}</span>
                            <i class="mdi mdi-chevron-down d-none d-xl-inline-block"></i>
                        </button>
                    
                        <div class="dropdown-menu dropdown-menu-right">
                            @if(Auth::user()->role == config('common.user.role.admin'))
                            <a class="dropdown-item text-danger" href="{{ route('admin.categories.index') }}"><i
                                    class="bx bx-power-off font-size-16 align-middle mr-1 text-danger">
                            </i> Dashboard</a>
                            @endif
                            <a class="dropdown-item text-danger" href="{{ route('auth.logout') }}"><i
                                    class="bx bx-power-off font-size-16 align-middle mr-1 text-danger">
                            </i> Logout</a>
                        </div>
                    @endauth
                </ul>
            </div>
        </nav>
    </div>
</header>
<!--  Modal -->
<div class="modal fade" id="productView" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-body p-0">
                <div class="row align-items-stretch">
                    <div class="col-lg-6 p-lg-0"><a class="product-view d-block h-100 bg-cover bg-center"
                            style="background: url(style/img/product-5.jpg)"
                            href="{{ asset('style/img/product-5.jpg') }}" data-lightbox="productview"
                            title="Red digital smartwatch"></a><a class="d-none"
                            href="{{ asset('style/img/product-5-alt-1.jpg') }}" title="Red digital smartwatch"
                            data-lightbox="productview"></a><a class="d-none"
                            href="{{ asset('style/img/product-5-alt-2.jpg') }}" title="Red digital smartwatch"
                            data-lightbox="productview"></a></div>
                    <div class="col-lg-6">
                        <button class="close p-4" type="button" data-dismiss="modal" aria-label="Close"><span
                                aria-hidden="true">×</span></button>
                        <div class="p-5 my-md-4">
                            <ul class="list-inline mb-2">
                                <li class="list-inline-item m-0"><i class="fas fa-star small text-warning"></i></li>
                                <li class="list-inline-item m-0"><i class="fas fa-star small text-warning"></i></li>
                                <li class="list-inline-item m-0"><i class="fas fa-star small text-warning"></i></li>
                                <li class="list-inline-item m-0"><i class="fas fa-star small text-warning"></i></li>
                                <li class="list-inline-item m-0"><i class="fas fa-star small text-warning"></i></li>
                            </ul>
                            <h2 class="h4">Red digital smartwatch</h2>
                            <p class="text-muted">$250</p>
                            <p class="text-small mb-4">Lorem ipsum dolor sit amet, consectetur adipiscing elit. In ut
                                ullamcorper
                                leo, eget euismod orci. Cum sociis natoque penatibus et magnis dis parturient montes
                                nascetur
                                ridiculus mus. Vestibulum ultricies aliquam convallis.</p>
                            <div class="row align-items-stretch mb-4">
                                <div class="col-sm-7 pr-sm-0">
                                    <div class="border d-flex align-items-center justify-content-between py-1 px-3">
                                        <span class="small text-uppercase text-gray mr-4 no-select">Quantity</span>
                                        <div class="quantity">
                                            <button class="dec-btn p-0"><i class="fas fa-caret-left"></i></button>
                                            <input class="form-control border-0 shadow-0 p-0" type="text" value="1">
                                            <button class="inc-btn p-0"><i class="fas fa-caret-right"></i></button>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-5 pl-sm-0"><a
                                        class="btn btn-dark btn-sm btn-block h-100 d-flex align-items-center justify-content-center px-0"
                                        href="{{ route('cart') }}">Add to cart</a></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
