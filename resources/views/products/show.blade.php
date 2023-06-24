@extends('admin.admin_master')
@section('admin')

<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h2 class="mb-sm-0">{{$product->part_number}} - {{$product->name}} {{$product->flavor}}</h2>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('products.index') }}">All Products</a></li>
                            <li class="breadcrumb-item active">Product Info</li>
                        </ol>
                    </div>

                </div>
            </div>
        </div>
        <!-- end page title -->

        {{-- <div class="row">

            <div class="col-xl-12">

                <div class="card">
                    <div class="card-body pb-0">
                        <h1 class="card-title mb-2 mt-12"></h1>
                    </div>

                </div>
            </div> --}}





        </div>
        <!-- end row -->


        <div class="row">
            {{-- COL LOCATION,BOTTLE,LABEL COST --}}
            <div class="col-xl-6">

                <div class="card">
                    <div class="card-body pb-2">
                        {{-- <h4 class="card-title mb-4">{{$product->part_number}} - {{$product->name}} {{$product->flavor}}</h4> --}}


                            <h5>Location: {{$product->location}}</h3>
                            <h5>Bottle size: {{$product->bottle->bottle_size}}</h3>
                            <h5>Label Cost: ${{$product->bottle->label_cost}}</h3>



                    </div>

                </div><!-- end card -->
            </div>
            <!-- end col -->

            {{-- COL 2 --}}
            <div class="col-xl-6">

                <div class="card">
                    <div class="card-body pb-2">
                        {{-- <h4 class="card-title mb-4">{{$product->part_number}} - {{$product->name}} {{$product->flavor}}</h4> --}}



                            <h5>Rolls: {{$product->inventories->sum('number_of_rolls')}}</h5>
                            <h5>Labels: {{number_format($product->inventories->sum('total_labels'))}}</h5>
                            <h5>Total cost: ${{$product->inventories->sum('total_cost')}}</h5>


                    </div>

                </div><!-- end card -->
            </div>
            <!-- end col -->




        </div>
        <!-- end row -->

        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-body">
                        {{-- <div class="dropdown float-end">
                            <a href="#" class="dropdown-toggle arrow-none card-drop" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="mdi mdi-dots-vertical"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-end">
                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item">Sales Report</a>
                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item">Export Report</a>
                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item">Profit</a>
                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item">Action</a>
                            </div>
                        </div> --}}

                        <h4 class="card-title mb-4">Inventory deductions history</h4>

                        <div class="table-responsive">
                            <table class="table table-centered mb-0 align-middle table-hover table-nowrap">
                                <thead class="table-light">
                                    <tr>
                                        <th>Labels per Roll</th>
                                        <th>Roll Count</th>
                                        <th>Total Labels</th>
                                    </tr>
                                </thead><!-- end thead -->
                                <tbody>
                                    @foreach ($inventories as $inventory)
                                    <tr>
                                        <td>{{ $inventory->labels_per_roll }}</td>
                                        <td>{{ $inventory->number_of_rolls }}</td>
                                        <td>{{ number_format($inventory->total_labels) }}</td>
                                    </tr>
                                    @endforeach
                                     <!-- end -->
                                </tbody><!-- end tbody -->
                            </table> <!-- end table -->
                            {!! $inventories->links('pagination::bootstrap-5') !!}
                        </div>
                    </div><!-- end card -->
                </div><!-- end card -->
            </div>
            <!-- end col -->
            {{-- <div class="col-xl-4">
                <div class="card">
                    <div class="card-body">
                        <div class="float-end">
                            <select class="form-select shadow-none form-select-sm">
                                <option selected>Apr</option>
                                <option value="1">Mar</option>
                                <option value="2">Feb</option>
                                <option value="3">Jan</option>
                            </select>
                        </div>
                        <h4 class="card-title mb-4">Monthly Earnings</h4>

                        <div class="row">
                            <div class="col-4">
                                <div class="text-center mt-4">
                                    <h5>3475</h5>
                                    <p class="mb-2 text-truncate">Market Place</p>
                                </div>
                            </div>
                            <!-- end col -->
                            <div class="col-4">
                                <div class="text-center mt-4">
                                    <h5>458</h5>
                                    <p class="mb-2 text-truncate">Last Week</p>
                                </div>
                            </div>
                            <!-- end col -->
                            <div class="col-4">
                                <div class="text-center mt-4">
                                    <h5>9062</h5>
                                    <p class="mb-2 text-truncate">Last Month</p>
                                </div>
                            </div>
                            <!-- end col -->
                        </div>
                        <!-- end row -->

                        <div class="mt-4">
                            <div id="donut-chart" class="apex-charts"></div>
                        </div>
                    </div>
                </div><!-- end card -->
            </div>     --}}
            <!-- end col -->
        </div>
        <!-- end row -->
    </div>

</div>

@endsection
