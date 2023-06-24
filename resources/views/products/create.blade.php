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
                                    <h4 class="mb-sm-0">Create new product</h4>

                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                                            <li class="breadcrumb-item"><a href="{{ route('products.index') }}">All Products</a></li>
                                            <li class="breadcrumb-item active">New Product</li>
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
                                        {{-- <h4 class="card-title">Validation type</h4>
                                        <p class="card-title-desc">Parsley is a javascript form validation
                                            library. It helps you provide your users with feedback on their form
                                            submission before sending it to your server.</p> --}}

                                        <form class="custom-validation" action="{{ route('products.store') }}" method="POST">
                                            @csrf
                                            <div class="mb-3">
                                                <label>Part Number:</label>
                                                <input type="text" name="part_number" class="form-control" required placeholder="Part Number"/>
                                            </div>

                                            <div class="mb-3">
                                                <label>Name:</label>
                                                <input type="text" name="name" class="form-control" required placeholder="Product name"/>
                                            </div>

                                            <div class="mb-3">
                                                <label>Flavor:</label>
                                                <input type="text" name="flavor" class="form-control" required placeholder="Product flavor"/>
                                            </div>

                                            <div class="mb-3">
                                                <label>Location:</label>
                                                <input type="text" name="location" class="form-control" required placeholder="Storage location"/>
                                            </div>



                                            <div class="mb-3">
                                                <label>Bottle Size:</label>
                                                <select name="bottle_id"  id="bottle_id" class="form-control">
                                                    <option value="">-- Select Bottle --</option>
                                                    @foreach ($bottles as $data)
                                                    <option value="{{$data->id}}">
                                                        {{$data->bottle_size}}
                                                    </option>
                                                    @endforeach
                                                </select>
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
