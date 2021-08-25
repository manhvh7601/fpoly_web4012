<div class="vertical-menu">
    <div data-simplebar="" class="h-100">
        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled" id="side-menu">
                <li class="menu-title">Menu</li>
                <li>
                    <a href="javascript: void(0);" class="waves-effect">
                        <span class="iconify" data-icon="ant-design:home-filled"></span>
                        <span>Dashboards</span>
                    </a>
                </li>
                <li>
                    <a href="javascript: void(0);" class="waves-effect">
                        <span class="iconify" data-icon="bx:bxs-category"></span>
                        <span>Categories</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{ route('admin.categories.index') }}">List Cate</a></li>
                        <li><a href="{{ route('admin.categories.add') }}">Add Cate</a></li>
                    </ul>
                </li>
                <li>
                    <a href="javascript: void(0);" class="waves-effect">
                        <span class="iconify" data-icon="cib:product-hunt"></span>
                        <span>Products</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{ route('admin.products.index') }}">List Product</a></li>
                        <li><a href="{{ route('admin.products.add') }}">Add Product</a></li>
                    </ul>
                </li>
                <li>
                    <a href="javascript: void(0);" class="waves-effect">
                        <span class="iconify" data-icon="clarity:users-line"></span>
                        <span>Users</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{ route('admin.users.index') }}">List User</a></li>
                        <li><a href="{{ route('admin.users.create-user') }}">Add User</a></li>
                    </ul>
                </li>
                <li>
                    <a href="javascript: void(0);" class="waves-effect">
                        <span class="iconify" data-icon="clarity:users-line"></span>
                        <span>Invoices</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{ route('admin.invoices.index') }}">List Invoices</a></li>
                    </ul>
                </li>
            </ul>
        </div>
        <!-- Sidebar -->
    </div>
</div>
