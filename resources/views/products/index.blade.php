@extends('admin.admin_master')
@section('admin')





            <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->
            <div class="page-content">
                <div class="container-fluid">

                    @if ($message = Session::get('success'))
                    <div class="alert alert-success">
                        <p>{{ $message }}</p>
                    </div>
                     @endif

                    <!-- start page title -->
                    <div class="row">
                        <div class="col-12">
                            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                <h4 class="mb-sm-0">Products</h4>

                                <div class="page-title-right">
                                    <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item"><a href="javascript: void(0);">Tables</a></li>
                                        <li class="breadcrumb-item active">Data Tables</li>
                                    </ol>
                                </div>

                            </div>
                        </div>
                    </div>
                    <!-- end page title -->

                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">

                                    <a class="btn btn-primary btn-rounded waves-effect waves-light" href="{{ route('products.create') }}"> Create New Product</a>
                                    <p class="card-title-desc">
                                        <div class="col-lg-12 margin-tb">

                                                <h2>Total Labels: {{ number_format($total_labels) }}</h2>
                                                <h2>Total Cost: ${{  number_format($total_cost, 2) }}</h2>


                                        </div>
                                    </p>

                                    <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                        <thead>
                                        <tr>
                                            <th>Part Number</th>
                                            <th>Name</th>
                                            <th>Flavor</th>
                                            <th>Location</th>
                                            <th>Total Inventory</th>
                                            <th width="280px">Action</th>
                                        </tr>
                                        </thead>


                                        <tbody>
                                        @foreach ($products as $product)
                                        <tr>
                                            <td>{{ $product->part_number }}</td>
                                            <td>{{ $product->name }}</td>
                                            <td>{{ $product->flavor }}</td>
                                            <td>{{ $product->location }}</td>
                                            <td>{{ number_format($product->inventories->sum('total_labels')) }}</td>
                                            <td>
                                                <form action="{{ route('products.destroy',$product->id) }}" method="POST">

                                                    <a class="btn btn-info" href="{{ route('products.show',$product->id) }}">Show</a>

                                                    <a class="btn btn-primary" href="{{ route('products.edit',$product->id) }}">Edit</a>

                                                    @csrf
                                                    @method('DELETE')

                                                    <button type="submit" class="btn btn-danger">Delete</button>
                                                </form>
                                            </td>
                                        </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                    {!! $products->links('pagination::bootstrap-5') !!}
                                </div>
                            </div>
                        </div> <!-- end col -->
                    </div> <!-- end row -->


                </div> <!-- container-fluid -->
            </div>
            <!-- end main content-->

























    {{-- <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Total Labels: {{ number_format($total_labels) }}</h2>
                <h2>Total Cost: ${{  number_format($total_cost, 2) }}</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('products.create') }}"> Create New Product</a>
            </div>
        </div>
    </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <table class="table table-bordered">
        <tr>
            <th>Part Number</th>
            <th>Name</th>
            <th>Flavor</th>
            <th>Location</th>
            <th>Total Inventory</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($products as $product)
        <tr>
            <td>{{ $product->part_number }}</td>
            <td>{{ $product->name }}</td>
            <td>{{ $product->flavor }}</td>
            <td>{{ $product->location }}</td>
            <td>{{ number_format($product->inventories->sum('total_labels')) }}</td>
            <td>
                <form action="{{ route('products.destroy',$product->id) }}" method="POST">

                    <a class="btn btn-info" href="{{ route('products.show',$product->id) }}">Show</a>

                    <a class="btn btn-primary" href="{{ route('products.edit',$product->id) }}">Edit</a>

                    @csrf
                    @method('DELETE')

                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>

    {!! $products->links('pagination::bootstrap-5') !!} --}}

@endsection
