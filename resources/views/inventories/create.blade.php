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
                                    <h4 class="mb-sm-0">Adjust inventory</h4>

                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Forms</a></li>
                                            <li class="breadcrumb-item active">Form Validation</li>
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

                                        <form class="custom-validation" action="{{ route('inventories.store') }}" method="POST">
                                            @csrf
                                            <div class="mb-3">
                                                <label>Product:</label>
                                                <select name="product_id"  id="product_id" class="form-control">
                                                    <option value="">-- Select Product --</option>
                                                    @foreach ($products as $data)
                                                    <option value="{{$data->id}}">
                                                        {{$data->name}} {{$data->flavor}}
                                                    </option>
                                                    @endforeach
                                                </select>
                                            </div>

                                            <div class="mb-3">
                                                <label>Labels per roll:</label>
                                                <input type="text" name="labels_per_roll" class="form-control" required placeholder="Labels/Roll"/>
                                            </div>

                                            <div class="mb-3">
                                                <label>Number of rolls:</label>
                                                <input type="text" name="number_of_rolls" class="form-control" required placeholder="# of Rolls"/>
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
