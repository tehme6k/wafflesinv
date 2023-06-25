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
                                    <h4 class="mb-sm-0">Edit {{$bottle->bottle_size}} bottle</h4>

                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                                            <li class="breadcrumb-item"><a href="{{ route('bottles.index') }}">All Bottles</a></li>
                                            <li class="breadcrumb-item active">Edit Bottle</li>
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

                                        <form class="custom-validation" action="{{ route('bottles.update', $bottle->id) }}" method="POST">
                                            @csrf
                                            @method('PUT')

                                            <div class="mb-3">
                                                <label>Bottle size:</label>
                                                <input type="text" name="bottle_size" value="{{$bottle->bottle_size}}" class="form-control" readonly />
                                            </div>

                                            <div class="mb-3">
                                                <label>Label cost:</label>
                                                <input type="text" name="label_cost" value="{{$bottle->label_cost}}" class="form-control" required placeholder="Label Cost" />
                                            </div>

                                            <div class="mb-0">
                                                <div>
                                                    <button type="submit" class="btn btn-primary waves-effect waves-light me-1">
                                                        Submit
                                                    </button>
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
