<div class="vertical-menu">

    <div data-simplebar class="h-100">



        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled" id="side-menu">
                <li class="menu-title">Naviagtion</li>

                <li>
                    <a href="{{route('dashboard')}}" class="waves-effect">
                        <i class="ri-dashboard-line"></i>
                        <span>Home</span>
                    </a>
                </li>

                {{-- <li>
                    <a href="{{route('products.index')}}" class=" waves-effect">
                        <i class="ri-calendar-2-line"></i>
                        <span>Products</span>
                    </a>
                </li> --}}



                {{-- Products Dropdown --}}
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="ri-bug-fill"></i>
                        <span>Product Pages</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{route('products.index')}}">All Products</a></li>
                        <li><a href="{{route('bottles.index')}}">Bottles</a></li>
                        <li><a href="#">Product Names</a></li>
                        <li><a href="#">Product Flavors</a></li>
                    </ul>
                </li>

                {{-- Inventories Dropdown --}}
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="fas fa-dollar-sign"></i>
                        <span>Inventory Pages</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{route('inventories.index')}}">Inventory List</a></li>
                        <li><a href="{{route('inventories.create')}}">Adjust Inventory</a></li>

                    </ul>
                </li>



                {{-- <li class="menu-title">Pages</li> --}}




                {{-- <li class="menu-title">Components</li> --}}




            </ul>
        </div>
        <!-- Sidebar -->
    </div>
</div>
