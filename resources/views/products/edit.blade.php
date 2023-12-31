@extends('admin.admin_master')
@section('admin')

            <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->

                <div class="page-content">
                    <div class="container-fluid">

                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                    <h4 class="mb-sm-0">Edit: {{$product->name}} - {{$product->flavor}}</h4>

                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                                            <li class="breadcrumb-item"><a href="{{ route('products.index') }}">All Products</a></li>
                                            <li class="breadcrumb-item active">Edit Product</li>
                                        </ol>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <!-- end page title -->


                        <div class="row">
                            <div class="col-xl-6">
                                <div class="card">
                                    <div class="card-body">

                                        <form class="custom-validation" action="{{ route('products.update', $product->id) }}" method="POST">
                                            @csrf
                                            @method('PUT')
                                            <div class="mb-3">
                                                <label>Part Number:</label>
                                                <input type="text" name="part_number" value="{{$product->part_number}}" class="form-control" readonly />
                                            </div>

                                            <div class="mb-3">
                                                <label>Name:</label>
                                                <input type="text" name="name" value="{{$product->name}}" class="form-control" readonly />
                                            </div>

                                            <div class="mb-3">
                                                <label>Flavor:</label>
                                                <input type="text" name="flavor" value="{{$product->flavor}}" class="form-control" readonly />
                                            </div>

                                            <div class="mb-3">
                                                <label>Location:</label>
                                                <input type="text" name="location" value="{{$product->location}}" class="form-control" required placeholder="Storage location"/>
                                            </div>

                                            <div class="mb-3">
                                                <label>Bottle size:</label>
                                                <input type="text" name="flavor" value="{{$product->bottle->bottle_size}}" class="form-control" readonly />
                                            </div>




                                            <div class="mb-0">
                                                <div>
                                                    <button type="submit" class="btn btn-primary waves-effect waves-light me-1">
                                                        Submit
                                                    </button>
                                                    {{-- <button type="reset" class="btn btn-secondary waves-effect">
                                                        Cancel
                                                    </button> --}}
                                                </div>
                                            </div>
                                        </form>

                                    </div>
                                </div>
                            </div> <!-- end col -->


                        </div> <!-- end row -->

                    </div> <!-- container-fluid -->
                </div>
                <!-- End Page-content -->

            <!-- end main content-->


@endsection
